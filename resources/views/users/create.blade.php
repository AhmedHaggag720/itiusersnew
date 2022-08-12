@extends('layouts.app')
@section('title','register')
@section('new', 'active')
@section('content')

<form action="{{route('users.store')}}" method="post">
  @csrf
    <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Username</label>
    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="username">
    </div>
    <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>
    <div class="mb-4">
    <label for="exampleFormControlInput1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="password">
    </div>
    <div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3">register</button>
  </div>
</form>


@endsection