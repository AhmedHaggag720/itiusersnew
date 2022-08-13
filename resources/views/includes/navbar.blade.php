<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Laravel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{Route('users.index')}}">Home</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Users
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a @class(['dropdown-item ',' active'=> Route::is("users.index")]) href="{{Route('users.index')}}">List</a></li>
            <li><a @class(['dropdown-item ',' active'=> Route::is("users.create")]) href="{{Route('users.create')}}">New User</a></li>
            <li><a @class(['dropdown-item ',' active'=> Route::is("posts.create")]) href="{{Route('posts.create')}}">New Post</a></li>
            <li><a @class(['dropdown-item ',' active'=> Route::is("posts.index")]) href="{{Route('posts.index')}}">Posts</a></li>
            <li><a @class(['dropdown-item ',' active'=> Route::is("posts.restore")]) href="{{Route('posts.restore')}}">Restore</a></li>
          </ul>
        </li>
        @if(auth()->check())
        <li>
          <button class="btn btn-light">
            {{ Auth::user()->name }}
          </button>
          </li>
          <li>
          <div class="mt-3 space-y-1">
            <!-- Authentication -->


            <form method="POST" action="{{ route('logout') }}">
              @csrf<a href="route('logout')" onclick="event.preventDefault();
                  this.closest('form').submit();">
                {{ __('Log Out') }}
              </a>
            </form>
        
    </div>
    </li>
    @else
    <li>
      <a class="btn btn-secondary" href="{{route('login')}}">login</a>
    </li>
  

  @endif

  </ul>
  </div>
  </div>
</nav>