<header>
  <div class="container">
    <div class="row">
      <!-- <div class="search col-md-4">
        <form>
          <div class="form-group row">
            <input type="text" class="form-control col-9">
            <input type="submit" class="btn btn-danger col-3 text-center" value="検索する">
          </div>
        </form>
      </div> -->
      <nav class="navbar navbar-expand-md navbar-light col-md-8">
        <a class="navbar-brand" href="{{ action('StaticPages@getHome') }}" id="logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="{{ route('help')}}">HELP</a></li>
            @if(Auth::check())
            <li class="nav-item"><a class="nav-link" href="{{ route('user.logout') }}">LOGOUT</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('user.show') }}">PROFILE</a></li>
            @else
            <li class="nav-item"><a class="nav-link" href="{{ route('user.getLogin') }}">LOGIN</a></li>
            @endif
            <li class="nav-item"><a class="nav-link" href="{{ route('home')}}">HOME</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('users')}}">USERS</a></li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
</header>
