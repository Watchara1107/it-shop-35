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
    public function index()
    {
        return view('admin.product.index')
            ->with('product', Product::all());
    }
    public function createform()
    {
        return view('admin.product.create');
    }
    public function insert(Request $request)
    {

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = $request->category;
        if ($request->hasFile('image')) {
            $filename = Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension();   //025G025365.jpg
            $request->file('image')->move(public_path() . '/admin/upload/product/', $filename);
            Image::make(public_path() . '/admin/upload/product/' . $filename);
            $product->image = $filename;
        } else {
            $product->image = 'nopic.jpg';
        }
        $product->save();
        toast('บันทึกข้อมูลสำเร็จ', 'success');
        return redirect()->route('product.index');
    }

    public function edit($product_id)
    {
        return view('admin.product.edit')
            ->with("product", Product::find($product_id));
    }

    public function update(Request $request, $product_id)
    {
        
        if ($request->hasFile('image')) {
            $product = Product::find($product_id);
             // ลบรูปภาพ
            if ($product->image != 'nopic.jpg') {
                File::delete(public_path() . '/admin/upload/product/' . $product->image);
            }
            //เพิ่มรูปภาพ
            $filename = Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension();   //025G025365.jpg
            $request->file('image')->move(public_path() . '/admin/upload/product/', $filename);
            Image::make(public_path() . '/admin/upload/product/' . $filename);
            $product->image = $filename;
            //เพิ่มฟิล์ดในกรณีที่มีรูปภาพ
            $product->name = $request->name;
            $product->price = $request->price;
            $product->description = $request->description;
            $product->category_id = $request->category;
          
          
        } else{
            //เพิ่มฟิล์ดในกรณีที่ไม่มีรูปภาพ
            $product = Product::find($product_id);
            $product->name = $request->name;
            $product->price = $request->price;
            $product->description = $request->description;
            $product->category_id = $request->category;
        }
        
        $product->save();
        toast('แก้ไขข้อมูลสำเร็จ', 'success');
        return redirect()->route('product.index');
    }

    public function delete($product_id)
    {
        $product = Product::find($product_id);
        if ($product->image != 'nopic.jpg') {
            File::delete(public_path() . '/admin/upload/product/' . $product->image);
        }
        $product->delete();
        toast('ลบข้อมูลสำเร็จ', 'success');
        return redirect()->route('product.index');
    }
}
