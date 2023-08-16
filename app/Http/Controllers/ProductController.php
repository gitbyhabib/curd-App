<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $productlist = Product::orderBy('name','asc')->paginate(10);
        return view('products.index',['products'=> $productlist]);
    }
    public function create(){
        return view('products.create');
    }

    public function store(ProductRequest $request)
    {
        $requestData = $request->validated();
        $imageName=time().'.'.$request->image->extension();
        $request->image->move(public_path('products'),$imageName);

        Product::create(['name' => $requestData['name'], 'description' => $requestData['description'],'image' => $imageName]);
        return redirect()->route('home');

    }

    public function deleteproduct(Product $product){
        $product->delete();
        return redirect('/');
    }

    public function editProduct(Product $product)
    {
        return view('products.edit',compact('product'));
    }

    public function update(Product $product ,UpdateProductRequest $request)
    {
    
       $requestData = $request->validated();

       if($request->hasFile('image')){//insert new image
        $imageName = $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('products'), $imageName);
       }else{
        $imageName = $product->image;
       }

       //update the product
        Product::where('id', $requestData['id'])->update(['name' => $requestData['name'], 'description' =>  $requestData['description'], 'image' => $imageName]);
        return redirect('/');

    }
}
