@extends('layouts.global')
@section('title', 'profile')

@section('content')

<div class="row">
  <aside class="col-md-4">
    {!! Form::open(['action' =>  ['UsersController@edit', Auth::user()->id], 'method' => 'GET']) !!}
    {!! Form::submit('ユーザー内容の更新ページへ', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
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
