<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use Image;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(){
        return view('admin.product.index')
        ->with('product',Product::all());
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
       if($request->hasFile('image')){
       $filename = Str::random(10). '.' . $request->file('image')->getClientOriginalExtension();   //025G025365.jpg
       $request->file('image')->move(public_path().'/admin/upload/product/',$filename );
       Image::make(public_path().'/admin/upload/product/'.$filename);
       $product->image = $filename;
       }else{
            $product->image = 'nopic.png';
       }
       $product->save();
       toast('บันทึกข้อมูลสำเร็จ','success');
       return redirect()->route('product.index');
    }

    public function delete($product_id){
        $product = Product::find($product_id);
        if($product->image != 'nopic.png');{
            File::delete(public_path().'/admin/upload/product/' . $product->image);
        }
        $product->delete();
        toast('ลบข้อมูลสำเร็จ','success');
        return redirect()->route('product.index');
    }
}
