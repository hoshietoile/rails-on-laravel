@extends('layouts.global')

@section('title', 'All Users')

@section('content')
<div id="users" class="row">

  <aside class="col-md-4" style="margin-top:36px;">
    @if (count($errors) > 0)
      <div class="alert alert-danger">
        @foreach ($errors->all() as $key => $error)
          <p>{{ $error }}</p>
        @endforeach
      </div>
    @endif
    <section class="user_info card">
      <div class="card-body">
        <p>name : {{ Auth::user()->name }}</p>
        <p>email: {{ Auth::user()->email }}</p>
        <p>id   : {{ Auth::user()->id }}</p>
      </div>
    </section>
    <section class="new_post">
      <p>Post new Micropost</p>
        {!! Form::open(['action' => ['MicropostsController@create', Auth::user()->id], 'method' => 'POST']) !!}
          {{ csrf_field() }}
          <div class="form-group">
            {!! Form::text('title', null, ['class' => 'form form-control']) !!}
          </div>
          <div class="form-group">
            {!! Form::textarea('content', null, ['class' => 'form form-control']) !!}
          </div>
          <div class="form-group">
            {!! Form::submit('Post!!', ['class' => 'btn btn-primary']) !!}
          </div>
        {!! Form::close() !!}
    </section>
  </aside>

  <div class="main col-md-8">
    <h1 class="text-center">All Users</h1>
    @foreach ($users as $user)
      <div class="card">
          <div class="card-body">
            @if (Auth::user()->admin == 1 && $user->id != Auth::user()->id)
              {!! Form::open(['action' => ['UsersController@destroy', $user->id], 'method' => 'DELETE', 'id' => 'form_'.$user->id]) !!}
              {{ method_field('delete') }}
                <a href="{{ route('user.profile', $user->id) }}">
                  {{ $user->name }}さんのページへ。
                </a>
                <input type="button" value="|削除" data-id="{{ $user->id }}"  style="display:inline;background:transparent;border:none;width:auto;" onclick="deleteSubmit(this)">
              {!! Form::close() !!}
            @else
              <a href="{{ route('user.profile', $user->id) }}">
                {{ $user->name }}さんのページへ。
              </a>
            @endif
          </div>
      </div>
    @endforeach
    <div>
      {{ $users->links() }}
    </div>
  </div>
</div>
<script>
  function deleteSubmit(e) {
    if (confirm('you sure?')) {
      document.getElementById('form_' + e.dataset.id).submit();
    }
  }

</script>
@endsection
