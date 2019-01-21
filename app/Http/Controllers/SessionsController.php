<?php

namespace App\Http\Controllers;

use App\Category;
use Auth;
use App\Mail\VerificationEmail;
use Illuminate\Http\Request;
use App\User;
use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
class SessionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
      $admin = Admin::findOrFail(1);
          if ($admin->website_status !== 1){
          return redirect()->route('downPage');
          }
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $rules = [
         'email' => 'required|exists:users',
         'password' => 'required'
     ];

     $input = Input::only('email', 'password');

     $validator = Validator::make($input, $rules);

     if($validator->fails())
     {
         return redirect()->back()->withInput()->withErrors($validator);
     }

     $credentials = [
         'email' => Input::get('email'),
         'password' => Input::get('password'),
     ];

     if ( ! Auth::attempt($credentials))
     {
         return redirect()->back()
             ->withInput()
             ->withErrors([
                 'credentials' => 'Brukernavn eller passord er feil'
             ]);
     }



     if(Auth::user()->admin == 1) {
       return redirect()->route('admin.index');
     }

     if(Auth::user()->confirmed == 0) {
        session()->flash('message','Vennligst bekreft kontoen din.');
        $id = Auth::user()->id;
      return redirect()->route('auth.verify', ['id' => $id]);
     } else {
       session()->flash('message','Velkommen tilbake!');
       return redirect()->route('home');
     }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

  /*  public function show(Request $request) {
      $user = Auth::user();
      return view('auth.user', compact('user'));
    }*/

    public function logout(Request $request) {
      Auth::logout();
      return redirect()->route('home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function adminLogin() {
        return view('auth.adminlogin');
    }

    public function storeAdminLogin(Request $request)
    {
      $rules = [
         'email' => 'required|exists:users',
         'password' => 'required'
     ];

     $input = Input::only('email', 'password');

     $validator = Validator::make($input, $rules);

     if($validator->fails())
     {
         return redirect()->back()->withInput()->withErrors($validator);
     }

     $credentials = [
         'email' => Input::get('email'),
         'password' => Input::get('password'),
     ];

     if ( ! Auth::attempt($credentials))
     {
         return redirect()->back()
             ->withInput()
             ->withErrors([
                 'credentials' => 'Brukernavn eller passord er feil'
             ]);
     }



     if(Auth::user()->admin == 1) {
       return view('admin.index');
     }

     if(Auth::user()->confirmed == 0) {
        session()->flash('message','Vennligst bekreft kontoen din.');
       return view('auth.unverified');
     } else {
       session()->flash('message','Velkommen tilbake!');
       return redirect()->route('home');
     }

    }
}
