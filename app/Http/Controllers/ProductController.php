<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
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
}
