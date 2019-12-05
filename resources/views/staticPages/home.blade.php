@extends('layouts.global')

@section('title', 'Home')

@section('content')
<div class="row center jumbotron home-main center">
  <h1>Sample App<span class="text-danger">.</span></h1>
  <p class="center">This is the home page for the Laravel Sample Application</p>
  <a href="{{ action('StaticPages@getHome') }}" class="btn btn-lg btn-primary center">Sign up Now!</a>
</div>
@endsection
