<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Admin;
use Auth;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('admin.category.index', compact('categories'));
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




      Category::create($formInput);
          session()->flash('message','Ny kategori er lagret!');
      return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $products = Category::find($id)->products;

      $categories = Category::all();

      return view('admin.category.index', compact(['categories', 'products']));
    }


    public function showProducts($id)
    {
      $admin = Admin::findOrFail(1);
      if ($admin->website_status !== 1){
      return redirect()->route('downPage');
      }
      $category = Category::find($id);
      $products = Category::find($id)->products;


      return view('front.products', compact(['category', 'products']));
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

        Category::destroy($id);
        return redirect()->back();
    }
}
