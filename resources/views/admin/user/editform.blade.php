@extends('layouts.back-end.master')
@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card mb-9">
        <h5 class="card-header">Edit User</h5>
        <div class="card-body">
          <div>
            <form action="{{ route('user.update',$user->id) }}" method="post">
                @csrf
                <label for="defaultFormControlInput" class="form-label">Name</label>
            <input
              type="text"
              name="name"
              value="{{ $user->name }}"
              class="form-control"
              id="defaultFormControlInput"
              aria-describedby="defaultFormControlHelp"
            />

            <label for="defaultFormControlInput" class="form-label">Address</label>
            <input
              type="text"
              name="address"
              value="{{ $user->address }}"
              class="form-control"
              id="defaultFormControlInput"
              aria-describedby="defaultFormControlHelp"
            />

            <label for="defaultFormControlInput" class="form-label">Email</label>
            <input
              type="email"
              name="email"
              value="{{ $user->email }}"
              class="form-control"
              id="defaultFormControlInput"
              aria-describedby="defaultFormControlHelp"
            />

            <label for="defaultFormControlInput" class="form-label">Phone</label>
            <input
              type="text"
              name="phone"
              value="{{ $user->phone }}"
              class="form-control"
              id="defaultFormControlInput"
              aria-describedby="defaultFormControlHelp"
            />

            <input class="btn btn-primary mt-3 mx-2" type="submit" value="Update">
            <a href="{{ route('user.index') }}" class="btn btn-danger mt-3 mx-2">ย้อนกลับ</a>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
