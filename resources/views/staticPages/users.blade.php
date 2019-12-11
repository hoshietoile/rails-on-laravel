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
          @if (Auth::user()->admin == 1 && Auth::user()->id != $user->id)
            {!! Form::open(['action' => ['UsersController@destroy', $user->id], 'method' => 'DELETE', 'id' => 'form_'.$user->id]) !!}
            {{ method_field('delete') }}
              <input type="submit" value="削除" data-id="{{ $user->id }}"  style="display:inline-block;background:transparent;border:none;" onclick="deleteSubmit(this)">
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
<script>
  function deleteSubmit(e) {
    if (confirm('you sure?')) {
      document.getElementById('form_' + e.dataset.id).submit();
    }
  }
</script>
@endsection
