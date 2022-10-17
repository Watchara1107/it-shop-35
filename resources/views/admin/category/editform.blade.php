@extends('layouts.back-end.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-9">
                <h5 class="card-header">Edit Category</h5>
                <div class="card-body">
                    <div>
                        <form action="{{ route('category.update',$category->category_id) }}" method="post">
                            @csrf
                            <label for="defaultFormControlInput" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $category->name }}" id="defaultFormControlInput"
                            aria-describedby="defaultFormControlHelp" />
                            <input  type="submit" value="Update" class="btn btn-primary mt-3">
                            <a href="{{ route('category.index') }}" class="btn btn-danger mt-3 mx-2">ย้อนกลับ</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
