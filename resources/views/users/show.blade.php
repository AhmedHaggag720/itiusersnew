<!DOCTYPE html>

@extends('layouts.app')

@section('title' , 'home')

@section('content')

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- <p>Display the specified resource with id {{$id}} </p> -->
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Body</th>

            </tr>
        </thead>
        <tbody>

            @foreach($posts as $post)
            <tr>
                <th scope="row">{{ $post['id'] }} </th>
                <td><a href="{{route('posts.show',$post['id'])}}">{{ $post['title'] }}</a> </td>
                <td>{{ $post['body'] }} </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
@endsection 
</html>