<header class="navbar navbar-fixed-top navbar-inverse">
  <div class="container">
    <a href="{{ action('StaticPages@getHome') }}" id="logo"></a>
    <nav>
      <ul>
        <li><a href="{{ action('StaticPages@getHelp')}}">HELP</a></li>
        <li><a href="{{ action('UsersController@login') }}">LOGIN</a></li>
        <li><a href="{{ action('StaticPages@getHelp')}}">HOME</a></li>
      </ul>
    </nav>
  </div>
</header>
