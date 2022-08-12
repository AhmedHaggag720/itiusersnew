@extends('layouts.app')

@section('title' , 'Edit Page')

@section('content')

<form method="POST" action="{{Route('users.update',['id'=>$user['id']])}}">
    @method("PUT")
    @csrf
    <div class="mb-3">
        <label for="exampleInputName1" class="form-label">Name</label>
        <input type="Text" class="form-control" id="exampleInputName1" name="name" value="{{$user['name']}}">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="Email" class="form-control" id="exampleInputEmail1" name="email" value="{{$user['email']}}">
    </div>
    <button type="submit" class="btn btn-primary" >Submit</button>
</form>

@endsection