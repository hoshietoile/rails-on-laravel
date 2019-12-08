@extends('layouts.global')

@section('title', 'All Users')

@section('content')
<!-- <div id="users" class="row"> -->
<h1 class="text-center">All Users</h1>
  @foreach ($users as $user)
    <div class="card">
      <a href="{{ route('user.profile', $user->id) }}">
        <div class="card-body">
          {{ $user->name }}さんのページへ。
          @if (Auth::user()->admin == 1)
            {!! Form::open(['action' => ['UsersController@destroy', $user->id], 'method' => 'DELETE']) !!}
            {{ method_field('delete') }}
              <input type="submit" value="|削除" style="display:inline-block;background:transparent;border:none;">
            {!! Form::close() !!}
          @endif
        </div>
      </a>
    </div>
  @endforeach
  <div>
    {{ $users->links() }}
  </div>
<!-- </div> -->
@endsection
