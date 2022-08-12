<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use  App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::withCount('posts')->simplepaginate(15);

        // $users = json_decode(\Illuminate\Support\Facades\File::get(storage_path('users.json')),
        // true);
        //return view('users.index' , ['users' => $users]);
        return view('users.index')->with(['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        //return $request->all();

        $users = User::simplepaginate(15);
        $name = $req->input('name');
        $email = $req->input('email');
        $password = $req->input('password');
        User::create(['name' => $name, 'email' => $email, 'password' => $password]);
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = User::find($id)->posts;
        return view("users.show" , ['id' => $id  , 'posts' => $posts ]);
       
       //return dd(User::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //     $users = json_decode(\Illuminate\Support\Facades\File::get(storage_path('users.json')),
        //     true);
        //     $user = $users[$id-1];
        //   //  return $user;
        //     return view("users.edit" , ['user' => $user]);

        return view('users.edit')->with(['user' => User::find($id), 'id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        //return $request->all();
        $users = User::simplepaginate(15);
        $name = $req->input('name');
        $email = $req->input('email');
        User::find($id)->update(['name' => $name, 'email' => $email]);

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$users = json_decode(\Illuminate\Support\Facades\File::get(storage_path('users.json')),
        //  true);
        // $user = $users[$id-1];
        //  return $user;
        //return 'User with ID : '.$user['id'].' has been destroyed';

        $users = User::simplepaginate(15);
        User::find($id) -> delete();

        return redirect()->route('users.index');
    }
}
