<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class VerificationController extends Controller
{
    public function verify($token) {
      $admin = Admin::findOrFail(1);
      if ($admin->website_status !== 1){
      return redirect()->route('downPage');
      }
    User::where('token', $token)->firstOrFail()
      ->update(['verified' => 1]);

      session()->flash('message','Din bruker er bekreftet!');
      return redirect()->route('home')->with('success', 'Account verified');
    }
}
