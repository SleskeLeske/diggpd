<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use App\Clientheaderimg;
use Auth;
use App\User;
use Illuminate\Http\Request;

class HeaderimgController extends Controller
{
  public function clientHeaderImg() {
    $client_id = Auth::id();
    $id = User::find($client_id)->clientHeaderImg->id;
    $clientheaderimg = User::find($client_id)->clientHeaderImg->image;
    return view('admin.header-img',compact(['clientheaderimg','client_id','id']));
  }

  public function saveHeaderImg(Request $request) {
    if(Auth::user()->admin == 1 && Auth::user()->client == 0) {
      $formInput = $request->except('image');

      $this->validate($request, [
        'image' => 'image|mimes:png,jpg,jpeg|max:10000',
      ]);

      $image = $request->image;
      if($image){
        $imageName = $image->getClientOriginalName();
        $image->move('img', $imageName);
        $formInput['image'] = $imageName;
      }

      Clientheaderimg::create($formInput);
          session()->flash('message','Topp-bilde er lagret!');
      return redirect()->route('admin.index');
    }

    elseif(Auth::user()->admin == 0 && Auth::user()->client == 1) {
      $formInput = $request->except('image');
      $user_id = Auth::id();
      $this->validate($request, [
        'image' => 'image|mimes:png,jpg,jpeg|max:10000',
      ]);

      $image = $request->image;
      if($image){
        $imageName = $image->getClientOriginalName();
        $image->move('img', $imageName);
        $formInput['image'] = $imageName;
      }
      $formInput['user_id'] = $user_id;

      Clientheaderimg::create($formInput);
          session()->flash('message','Topp-bilde er lagret!');
      return redirect()->route('admin.index');
  }
  }

  public function destroyHeaderImg($id) {
    Clientheaderimg::destroy($id);
    return redirect()->back();
  }
}
