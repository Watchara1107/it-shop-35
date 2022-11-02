@extends('layouts.back-end.master')
@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card mb-9">
        <h5 class="card-header">Edit Product</h5>
        <div class="card-body">
          <div>
            <form action="{{ url('/admin/product/update/'.$product->product_id) }}" method="post" enctype="multipart/form-data">
              @csrf
              <label for="defaultFormControlInput" class="form-label">Name</label>
            <input
              type="text"
              name="name"
              value="{{ $product->name }}"
              class="form-control"
              id="defaultFormControlInput"
              placeholder="กรุณากรอกชื่อสินค้า"
              aria-describedby="defaultFormControlHelp"
            />


            <label for="defaultFormControlInput" class="form-label">Price</label>
            <input
              type="text"
              name="price"
              value="{{ $product->price }}"
              class="form-control"
              id="defaultFormControlInput"
              placeholder="กรุณากรอกราคาสินค้า"
              aria-describedby="defaultFormControlHelp"
            />

            <label for="defaultFormControlInput" class="form-label">Description</label>
            <input
              type="text"
              name="description"
              value="{{ $product->description }}"
              class="form-control"
              id="defaultFormControlInput"
              placeholder="กรุณากรอกรายละเอียดสินค้า"
              aria-describedby="defaultFormControlHelp"
            />

            <label for="exampleFormControlSelect1" class="form-label">Category</label>
            <select class="form-select" id="exampleFormControlSelect1" name="category" aria-label="Default select example">
              <option selected value="{{ $product->category_id }}">{{ $product->category_id }}</option>
              <option value="1">โทรศัพท์มือถือ</option>
              <option value="2">โน๊ตบุ๊ค</option>
              <option value="3">คอมพิวเตอร์ตั้งโต๊ะ</option>
            </select>


            <label for="defaultFormControlInput" class="form-label">Images</label>
              <div class="input-group">
                <input type="file" class="form-control" name="image" id="inputGroupFile02" />
                <label class="input-group-text" for="inputGroupFile02">Upload</label>
              </div>
              <div class="mt-4">
                <img src="{{ asset('admin/upload/product/'.$product->image)}}" width="100px" height="80px" alt="">
              </div>

              <input type="submit" class="btn btn-primary mt-3" value="บันทึก" >
              <a href="{{ route('product.index') }}" class="btn btn-danger mt-3 mx-2">ย้อนกลับ</a>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
