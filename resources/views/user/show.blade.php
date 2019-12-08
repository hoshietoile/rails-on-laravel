@extends('layouts.global')
@section('title', 'profile')

@section('content')

<div class="row">
  <aside class="col-md-4">
    <section class="user_info">
      <h1>
        プロフィール
      </h1>
      <p>{{ Auth::user()->name }}</p>
      <p>{{ Auth::user()->email }}</p>
      <p>{{ Auth::user()->id }}</p>
    </section>
  </aside>
</div>
@endsection
