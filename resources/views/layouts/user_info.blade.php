@section('user_info')
<aside class="col-md-4">
  <section class="user_info">
    <p>name : {{ Auth::user()->name }}</p>
    <p>email: {{ Auth::user()->email }}</p>
    <p>id   : {{ Auth::user()->id }}</p>
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
@endsection
