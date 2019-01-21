<?php

namespace App;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use App\Notifications\VerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Gloudemans\Shoppingcart\Facades\Cart;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email','phone', 'addressline', 'place', 'postnr', 'password','firstName','lastName', 'token','confirmation_code','admin','client', 'credit', 'provider', 'provider_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin() {
      return $this->admin;
    }

    public function isClient() {
      return $this->client;
    }

    public function isDriver() {
      return $this->driver;
    }


    public function clientHeaderImg() {
      return $this->hasOne(Clientheaderimg::class);
    }

    public function createHeaderimg(Request $request, $id) {

  }

    public function orders()
    {
      return $this->hasMany(Order::class);
    }

    public function verified()
    {
      return $this->token === null;
    }
    public function products() {
      return $this->hasMany(Product::class);
    }

    public function sendVerificationEmail() {
      $this->notify(new VerifyEmail($this));
    }

    public function buyCredits($amount) {

    }

    public static function removeCredits() {
      $user = Auth::user();
      $amount = Cart::subtotal();
      $userCredits = $user->credits;
      $userCredits = $userCredits - $amount;
      $user->credits = $userCredits;
      $user->save();
    }

    public static function checkVerification() {
      if(Auth::user()) {
        $id = Auth::id();
        $user = User::find($id);
        if($user['confirmed'] == 0) {
                      session()->flash('message','Vennligst bekreft kontoen din');
          return redirect()->route('auth.verify');
        }
      }

    }

    }
