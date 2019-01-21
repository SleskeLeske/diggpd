<?php

namespace App\Http\Controllers;
use Auth;
use App\Mail\VerificationEmail;
use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use App\Admin;
use Illuminate\Support\Facades\Redirect;
class RegistrationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstName' => 'required|string|max:255|min:2',
            'lastName' => 'required|string|max:255|min:2',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    public function register() {
      $admin = Admin::findOrFail(1);
      if ($admin->website_status !== 1){
      return redirect()->route('downPage');
      }
      return view('auth.register');
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

     public function store()
         {
             $rules = [
                 'firstName' => 'required|min:1',
                 'lastName' => 'required|min:1',
                 'email' => 'required|email|unique:users',
                 'password' => 'required|confirmed|min:6'
             ];

             $input = Input::only(
                 'firstName',
                 'lastName',
                 'email',
                 'password',
                 'password_confirmation'
             );

             $validator = Validator::make($input, $rules);

             if($validator->fails())
             {
                 return redirect()->back()->withInput()->withErrors($validator);
             }

              $confirmation_code = str_random(30);

                $user = new User;
               User::create([
                 'firstName' => Input::get('firstName'),
                 'lastName' => Input::get('lastName'),
                 'email' => Input::get('email'),
                 'password' => Hash::make(Input::get('password')),
                 'confirmation_code' => $confirmation_code,
             ]);

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

             \Mail::send('email.verify', ['confirmation_code' => $confirmation_code], function($message) {
             $message->to(Input::get('email'), Input::get('firstName'))
                 ->subject('Vennligst bekreft din epost');
         });



         session()->flash('message','Vennligst bekreft kontoen din.');
         $id = Auth::user()->id;
       return redirect()->route('auth.verify', ['id' => $id]);
         }






}
