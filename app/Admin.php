<?php

namespace App;
use Auth;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
  protected  $fillable = ['admin_password', 'user_id', 'website_status'];

  public static function checkAdmin($adminPassword) {
    $admin = Admin::where('user_id', 1)->firstOrFail();
    $admin_password = $admin->admin_password;
    $user = Auth::user();
    if($adminPassword !== $admin_password) {
      session()->flash('message','Passord er feil');
      return redirect()->back();
    }
  }
  public static function downPageCheck() {
    $admin = Admin::findOrFail(1);
    if ($admin->website_status == 1){
        return $next($request);
    } else{
    return redirect()->route('downPage');
    }
  }


}
