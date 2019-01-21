<?php

namespace App\Http\Controllers;
use App\User;
use App\Category;
use Illuminate\Http\Request;
use Auth;
use App\Admin;
use App\Mail\VerificationEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
class UserController extends Controller
{
public function editAddress() {
  $user = Auth::user();
  return view('auth.update-shipping', compact('user'));
}

public function getUsers() {
  $users = User::all();
  return view('admin/user/user', compact ('users'));
}

public function createUser() {
  return view('admin.user.create');
}

public function saveUser(Request $request) {

  $this->validate($request, [
    'name' => 'required',
    'adminPassword' => 'required'
  ]);
  $adminPassword = $request->adminPassword;
  $admin = Admin::where('user_id', 1)->firstOrFail();
  $admin_password = $admin->admin_password;
  $user = Auth::user();
  if($adminPassword !== $admin_password) {
    session()->flash('message','Passord er feil');
    return redirect()->back();
  }
  $formInput = $request->except('adminPassword');
  $this->validate($request, [
    'firstName' => 'required',
    'lastName' => 'required',
    'email' => 'required|unique:users',
    'password' => 'required',
  ]);

  $password = $request['password'];
  $safePassword = bcrypt($password);

  $user = new User;
    $user->email = $request['email'];
    $user->firstName = $request['firstName'];
    $user->lastName = $request['lastName'];
    $user->password = $safePassword;
    $user->confirmed = 1;
    $user->admin = Input::get('admin');
    $user->client = Input::get('client');
    $user->client = Input::get('driver');
  $user->save();
      session()->flash('message','Bruker er skapt');
  return redirect()->route('admin.user');
}

public function getDestroyUser($id) {
  $user = User::find($id);
  return view('admin.user.destroy', compact('user'));
}

public function destroyUser(Request $request, $id) {
  $this->validate($request, [

  'adminPassword' => 'required'
]);
$adminPassword = $request->adminPassword;
$admin = Admin::where('user_id', 1)->firstOrFail();
$admin_password = $admin->admin_password;
$user = Auth::user();
 if($adminPassword !== $admin_password) {
   session()->flash('message','Passord er feil');
   return redirect()->back();
 }
 $formInput = $request->except('adminPassword');


  User::destroy($id);
    session()->flash('message','Bruker er slettet');
return redirect()->route('admin.user');

}

public function editUser($id) {
  $user = User::find($id);
  return view('admin.user.edit', compact('user'));
}

public function updateUser(Request $request, $id) {

  $adminPassword = $request->adminPassword;
  $admin = Admin::where('user_id', 1)->firstOrFail();
  $admin_password = $admin->admin_password;
  $user = Auth::user();
  if($adminPassword !== $admin_password) {
    session()->flash('message','Passord er feil');
    return redirect()->back();
  }

  $user = User::find($id);
  $password = $request['password'];
  $safePassword = bcrypt($password);

    $email = $request['email'];
    $firstName = $request['firstName'];
    $lastName = $request['lastName'];
    $password = $safePassword;
    $confirmed = 1;
    $admin = $request['admin'];
    $client = $request['client'];
    $driver = $request['driver'];
    $phone = $request['phone'];
    $postnr = $request['postnr'];
    $addressline = $request['addressline'];
    $place = $request['place'];
//basic info
    $user->email = $email ? $email : $user->email;
    $user->firstName = $firstName ? $firstName : $user->firstName;
    $user->lastName = $lastName ? $lastName : $user->lastName;
//password
    $user->password = $password ? $password : $user->password;
    $user->confirmed = $confirmed ? $confirmed : $user->confirmed;
//role
    $user->admin = $admin;
    $user->client = $client;
    $user->driver = $driver;
//delivery info
    $user->phone = $phone ? $phone : $user->phone;
    $user->postnr = $postnr ? $postnr : $user->postnr;
    $user->addressline = $addressline ? $addressline : $user->addressline;
    $user->place = $place ? $place : $user->place;

  $user->save();
  return redirect()->route('admin.user');
}

public function storeAddress(Request $request, User $user) {
  $admin = Admin::findOrFail(1);
  if ($admin->website_status !== 1){
  return redirect()->route('downPage');
  }
  $user = Auth::user();
    $user->phone = $request['phone'];
    $user->postnr = $request['postnr'];
    $user->addressline = $request['addressline'];
    $user->place = $request['place'];


  $user->save();
  return redirect()->route('cart.index');
  }

  public function showClient($id)
  {
    $admin = Admin::findOrFail(1);
    if ($admin->website_status !== 1){
    return redirect()->route('downPage');
    }
    $client  = User::find($id);
    $products = User::find($id)->products;

    return view('front.products', compact(['client', 'products']));
  }

  public function sendNewVerificationEmail() {
    $admin = Admin::findOrFail(1);
    if ($admin->website_status !== 1){
    return redirect()->route('downPage');
    }
    $id = Auth::id();
    $user = User::findOrFail($id);
    $confirmation_code = $user->confirmation_code;
    $email = $user->email;
    $firstName = $user->firstName;


$data = array('email' => $email, 'firstName' => $firstName, 'from' => 'hei@diggpd.no', 'fromName' => 'Digg På Døren', 'confirmation_code' => $confirmation_code );

    \Mail::send('email.verify', $data, function($message) use ($data) {

    $message->to($data['email'], $data['firstName'])
        ->subject('Bekreft din bruker hos Digg På Døren!');
  });


           session()->flash('message','Din nye bekreftelses email er sendt!');
return view('auth.unverified');
  }



  public function confirm($confirmation_code) {

      if( ! $confirmation_code)
      {
        session()->flash('message','Bekreftelses koden er feil');
return redirect()->back();
      }

      $user = User::whereConfirmationCode($confirmation_code)->first();

      if ( ! $user)
      {
                    session()->flash('message','Ingen slik bruker finnes.');
          return redirect()->back();
      }

      $user->confirmed = 1;
      $user->confirmation_code = null;
      $user->save();
     Auth::login($user);

      return redirect()->route('home');
}

}
