<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\User;
use App\Product;
use App\Category;
Use Session;
use Auth;
use App\Admin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;

class AdminController extends Controller
{
  public function getAdminPassword() {
    $admin = Admin::where('user_id', 1)->first();
    $password = $admin->admin_password;
    return view('admin.admin.password', compact('password'));
  }

  public function saveAdminPassword(Request $request) {
    $admin = Admin::where('user_id', 1)->first();
    $user = Auth::user();

    $this->validate($request, [
      'password' => 'required',
      'admin_password' => 'required',
    ]);

    $password = $request->password;


      if (Hash::check($password, $user->password)) {
        $admin_password = $request->admin_password;
        $admin->admin_password = $admin_password;
        $admin->save();
        session()->flash('message','Passord er lagret');
        return view('admin.index');
      }
      else {
        session()->flash('message','Passord er feil');
        return view('admin.index');
      }


  }

  public function websiteStatus() {
    $admin = Admin::findOrFail(1);
    return view('admin.admin.website-status', compact('admin'));
  }

  public function websiteStatusToggle(Request $request) {
    $adminPassword = $request->adminPassword;
    $admin = Admin::where('user_id', 1)->firstOrFail();
    $admin_password = $admin->admin_password;
    $user = Auth::user();
    if($adminPassword !== $admin_password) {
      session()->flash('message','Passord er feil');
      return redirect()->back();
    }
    $admin = Admin::findOrFail(1);
    $admin->website_status = $request->website_status;
    $admin->save();
            session()->flash('message','Nettside status er endret');
    return redirect()->route('admin.website-status');

  }

}
