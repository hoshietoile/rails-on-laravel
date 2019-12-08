@extends('layouts.global')
@section('title', $user->name . 's profile')

@section('content')

<div class="row">

  <aside class="col-md-4">
    <section class="user_info">
      <p>{{ $user->name }}</p>
      <p>{{ $user->email }}</p>
      <p>{{ $user->id }}</p>
    </section>
  </aside>

  <div class="main col-md-8">
    <h3>
      {{ $user->name }}さんのプロフィール
    </h3>
  </div>

</div>
@endsection
