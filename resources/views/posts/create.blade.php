@extends('layouts.app')
@section('title','register')
@section('new', 'active')
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data" >
  @csrf
    <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Title</label>
    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Title">
    </div>
    <div class="mb-4">
    <label for="exampleFormControlInput1" class="form-label">Body</label>
    <input type="textarea" name="body" class="form-control" id="exampleFormControlInput2" placeholder="body">
    </div>
    <div class="mb-5">
    <label for="exampleFormControlInput1" class="form-label">Enabled</label>
    <input type="checkbox" name="enabled" class="enabled" id="exampleFormControlInput2" placeholder="body">
    </div>
    <div class="mb-6">
    <label for="exampleFormControlInput1" class="form-label">Insert Image</label>
    <input type="file" name="image" class="form-control" id="exampleFormControlInput2">
    </div>
    <br>
    <div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3">POST</button>
  </div>
</form>


@endsection