<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Auth;
use Laravel\Socialite\Contracts\Provider;
use App\User;
use Illuminate\Foundation\Auth\User as Authenticatable;
class SocialAuthController extends Controller
{
  public function callback($provider)
  {

          $user = $this->createOrGetUser(Socialite::driver($provider));


            Auth::login($user);


                return redirect()->route('login');
  }

  public function redirect($provider)
  {
      return Socialite::driver($provider)->stateless()->redirect();
  }

  private function createOrGetUser(Provider $provider)
  {

      $providerUser = $provider->stateless()->user();

      $providerName = class_basename($provider);

      $user = User::whereProvider($providerName)
          ->whereProviderId($providerUser->getId())
          ->first();

      if (!$user) {
        $password = str_random(30);
          $user = User::create([
              'email' => $providerUser->getEmail(),
              'firstName' => $providerUser->getName(),
              'password' => $password,
              'lastName' => '',
              'provider_id' => $providerUser->getId(),
              'provider' => $providerName,
              'confirmed' => 1,

          ]);
      }



return $user;
  }

    }
