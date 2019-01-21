<?php

namespace App\Http\Controllers;
use Cart;
use App\User;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
Use Session;
use App\Admin;
use Auth;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Input;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(Auth::user()->isAdmin()) {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
      }
      else {
        $userId = Auth::user()->id;
            $products = User::find($userId)->products;
        return view('admin.product.index', compact('products'));
      }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if (Auth::check() && Auth::user()->admin == 1)
      {



        $categories = Category::pluck('name', 'id');
          return view('admin.product.create', compact('categories'));


      }
      elseif(Auth::check() && Auth::user()->client == 1) {
      return view('admin.product.create');
      }

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
        'image' => 'image|mimes:png,jpg,jpeg|max:10000',
        'price' => 'required',
        'category_id' => 'required',
        'description' => 'required',
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

        $formInput = $request->except('image');

            $image = Input::file('image');
        if($image){
          $filename = $image->getClientOriginalName();
          $path = public_path('img\products\.'.$filename);
      		Image::make($image->getRealPath())->resize(200, 200)->save($path);
          $imageName = $filename;
          $formInput['image'] = $imageName;
        }

        Product::create($formInput);
            session()->flash('message','Nytt produkt er lagret');
    return redirect()->route('admin.index');

      /*CLIENT STORE PRODUCT
      elseif(Auth::check() && Auth::user()->client == 1 && Auth::user()->admin == 0) {

        $this->validate($request, [
          'name' => 'required',
          'image' => 'image|mimes:png,jpg,jpeg|max:10000',
          'price' => 'required',
          'description' => 'required',
        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->user_id = Auth::user()->id;

        $image = $request->image;
        if($image){
          $imageName = $image->getClientOriginalName();
          $image->move('img', $imageName);
          $formInput['image'] = $imageName;
        }
        $product->image = $imageName;
        $product->save();
        session()->flash('message','Nytt produkt er lagret');
    return redirect()->route('admin.product.index');
  }*/

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $admin = Admin::findOrFail(1);
      if ($admin->website_status !== 1){
      return redirect()->route('downPage');
      }
      $product = Product::find($id);
        return view('front.product', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $product = Product::find($id);
      $category = $product->category;
      $categoryName = $category['name'];
            $categories = Category::pluck('name', 'id');
        return view('admin.product.edit', compact(['product', 'categories', 'categoryName']));

}
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'adminPassword' => 'required',
         'image' => 'image|mimes:png,jpg,jpeg|max:10000',
      ]);
      $adminPassword = $request->adminPassword;
      $admin = Admin::where('user_id', 1)->firstOrFail();
      $admin_password = $admin->admin_password;
      $user = Auth::user();
      if($adminPassword !== $admin_password) {
        session()->flash('message','Passord er feil');
        return redirect()->back();
      }

      if($request->hasFile('image')) {
        $image = Input::file('image');
        $destinationPath = public_path(). '/img';
        $filename = $image->getClientOriginalName();

        Input::file('image')->move($destinationPath, $filename);
        $image = $filename;
      }

      $product = product::find($id);

        $name = $request['name'];
        $description = $request['description'];
        $category_id = $request['category_id'];
        $price = $request['price'];

        $product->name = $name ? $name : $product->name;
        $product->description = $description ? $description : $product->description;
        $product->category_id = $category_id ? $category_id : $product->category_id;
        $product->price = $price ? $price : $product->price;
        $product->image = $image ? $image : $product->image;

      $product->save();
          session()->flash('message','Produkt er oppdatert');
    return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
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


      Product::destroy($id);
                session()->flash('message','Produkt er slettet');
      return redirect()->back();
    }



}
