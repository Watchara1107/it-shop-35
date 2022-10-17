<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(){
        return view('admin.product.index');
    }
    public function createform(){
        return view('admin.product.create');
    }
    public function insert(Request $request){
       $product = new Product();
       $product->name = $request->name;
       $product->price = $request->price;
       $product->description = $request->description;
       $product->category_id = $request->category;
       $filename = Str::random(10). '.' . $request->file('image')->getClientOriginalExtension();   //025G025365.jpg
       $request->file('image')->move(public_path().'/admin/upload/product/',$filename );
    }
}
