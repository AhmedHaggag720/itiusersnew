@extends('layouts.app')

@section('title' , 'Home')

@section('content')

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">#POSTS</th>
            <th scope="col">Actions</th>
            
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach ($users as $user)
            <td>{{$user['id']}}</td>
            <td><a href="{{route('users.show',['id'=>$user['id']])}}">{{$user['name']}}</a></td>
            <td>{{$user['email']}}</td>
            <td>{{$user->posts_count}}</td>
            <td>
                <a class="btn btn-primary" href="{{route('users.edit',['id'=>$user['id']])}}"  role="button">Edit</a>
                <form action="{{route('users.destroy',['id'=>$user['id']])}}" method="post">
                @METHOD('Delete')
                @csrf
                <button type="submit" class="btn btn-danger"> Delete </button>
                </form>
            </td>

        </tr>


        @endforeach

    </tbody>
</table>
<center>{{ $users->links() }}</center>


@endsection