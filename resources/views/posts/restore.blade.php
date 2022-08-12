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
                <form action="{{route('posts.restoredeleted',['id'=>$post['id']])}}" method="post">
                @csrf
                <button type="submit" class="btn btn-primary"> Restore </button>
                </form>
            </td>

        </tr>


        @endforeach

    </tbody>
</table>
<center>{{ $posts->links() }}</center>


@endsection