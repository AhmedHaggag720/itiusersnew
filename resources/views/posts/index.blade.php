@extends('layouts.app')

@section('title' , 'Home')

@section('content')

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Body</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach ($posts as $post)
            <td>{{$post['id']}}</td>
            <td><a href="{{route('posts.show',['id'=>$post['id']])}}">{{$post['title']}}</a></td>
            <td>{{$post['body']}}</td>
            <td>
                <a class="btn btn-primary" href="{{route('posts.edit',['id'=>$post['id']])}}"  role="button">Edit</a>
                <form action="{{route('posts.destroy',['id'=>$post['id']])}}" method="post">
                @METHOD('Delete')
                @csrf
                <button type="submit" class="btn btn-danger"> Delete </button>
                </form>
            </td>

        </tr>


        @endforeach

    </tbody>
</table>
<center>{{ $posts->links() }}</center>


@endsection