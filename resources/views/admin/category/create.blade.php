@extends('layouts.back-end.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="row mt-2">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            </div>
            <div class="card mb-9">
                <h5 class="card-header">Category</h5>
                <div class="card-body">
                    <div>
                        <form action="{{ route('category.insert') }}" method="post">
                            @csrf
                            <label for="defaultFormControlInput" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="defaultFormControlInput"
                                placeholder="กรุณากรอกประเภทสินค้า" aria-describedby="defaultFormControlHelp" />
                            
                            <input href="" type="submit" value="บันทึก" class="btn btn-primary mt-3">
                            <a href="{{ route('category.index') }}" class="btn btn-danger mt-3 mx-2">ย้อนกลับ</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
