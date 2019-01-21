<?php

namespace App\Http\Controllers;

use App\Category;
use App\Admin;
use Auth;
use App\Postnr;
use Illuminate\Http\Request;

class PostnrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $postnumbers = Postnr::all();
        return view('admin.postnumber.index', compact('postnumbers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $postnumbers = Postnr::all();
        return view('admin.postnumber.create', compact('postnumbers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'name' => 'required|max:9999|unique:postnrs|integer',
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
      Postnr::create($formInput);
                session()->flash('message','Nytt postnr er lagret!');
              return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Postnr  $postnr
     * @return \Illuminate\Http\Response
     */
    public function show(Postnr $postnr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Postnr  $postnr
     * @return \Illuminate\Http\Response
     */
    public function edit(Postnr $postnr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Postnr  $postnr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Postnr $postnr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Postnr  $postnr
     * @return \Illuminate\Http\Response
     */
     public function destroy(Request $request, $id)
     {



       $adminPassword = $request->adminPassword;
       $admin = Admin::where('user_id', 1)->firstOrFail();
       $admin_password = $admin->admin_password;
       $user = Auth::user();
       if($adminPassword !== $admin_password) {
         session()->flash('message','Passord er feil');
         return redirect()->back();
       }

         Postnr::destroy($id);
         return redirect()->back();
     }
}
