@extends('layouts.app')

@section('title' , 'Edit Page')

@section('content')

<form method="POST" action="{{Route('posts.update',['id'=>$post['id']])}}">
    @method("PUT")
    @csrf
    <div class="mb-3">
        <label for="exampleInputName1" class="form-label">Title</label>
        <input type="Text" class="form-control" id="exampleInputName1" name="title" value="{{$post['title']}}">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Body</label>
        <input type="Text" class="form-control" id="exampleInputEmail1" name="body" value="{{$post['body']}}">
    </div>
    <button type="submit" class="btn btn-primary" >Submit</button>
</form>

@endsection