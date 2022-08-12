@extends('layouts.app')
@section('title','register')
@section('new', 'active')
@section('content')

<form action="{{route('posts.store')}}" method="post">
  @csrf
    <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Title</label>
    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="username">
    </div>
    <div class="mb-4">
    <label for="exampleFormControlInput1" class="form-label">Body</label>
    <input type="textarea" name="body" class="form-control" id="exampleFormControlInput2" placeholder="body">
    </div>
    <div class="mb-5">
    <label for="exampleFormControlInput1" class="form-label">Enabled</label>
    <input type="checkbox" name="enabled" class="enabled" id="exampleFormControlInput2" placeholder="body">
    </div>
    <div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3">POST</button>
  </div>
</form>


@endsection