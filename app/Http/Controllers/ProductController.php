<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use App\Manufacturer;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        // $products = Product::all();
    	$products = Product::orderby('created_at', 'desc')->get();
        // $products = Product::latest()->take(2)->get();
    	return view('products.products', compact('products'));
    }

    public function show($id){
    	$product = Product::find($id);

    	return view('products.single', compact('product'));
    }

    public function create(){
        $categories = Category::all();
        $manufacturers = Manufacturer::all();
    	return view('products.form', compact('categories', 'manufacturers'));
    }

    public function store(Request $request){

        $this->validate($request, [
        'title' => 'required',
        'image_url' => 'required',
        'description' => 'required',
        'price' => 'required',
        'quantity' => 'required',
        'category_id' => 'required',
        'manufacturer_id' => 'required',
    ]);
      $product = new Product;
      //On left field name in DB and on right field name in Form/view
      // $product->Duombazės kintamasis = $request->input(inputo vardas);
        // Product::create($request->all());
      $product->title = $request->input('title');
      $product->image_url = $request->input('image_url');
      $product->description = $request->input('description');
      $product->price = $request->input('price');
      $product->quantity = $request->input('quantity');
      $product->category_id = $request->input('category_id');
      $product->manufacturer_id = $request->input('manufacturer_id');
      $product->save();
        return redirect()->route('mainPage');
    }

    public function edit($id){
        $product = Product::find($id);
        $categories = Category::all();
        $manufacturers = Manufacturer::all();
        return view('products.form', compact('product', 'categories', 'manufacturers'));
    }

    public function update($id, Request $request){
        $this->validate($request, [
        'title' => 'required',
        'image_url' => 'required',
        'description' => 'required',
        'price' => 'required',
        'quantity' => 'required',
        'category_id' => 'required|min:1',
        'manufacturer_id' => 'required|min:1',
    ]);
        Product::find($id)->update($request->all());
     // $product->Duombazės kintamasis = $request->input(inputo vardas);
    $product = Product::find($id);

    $product->title = $request->input('title');
    $product->image_url = $request->input('image_url');
    $product->description = $request->input('description');
    $product->price = $request->input('price');
    $product->quantity = $request->input('quantity');
    $product->category_id = $request->input('category_id');
    $product->manufacturer_id = $request->input('manufacturer_id');
    $product->update();

    return redirect()->route('single.product', $product->id);
    }

    public function delete(Request $request, $id){
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('mainPage');
    }
}

