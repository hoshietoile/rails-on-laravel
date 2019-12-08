@extends('layouts.global')

@section('title', 'login')

@section('content')
  <h1>Log in</h1>
  <div class="row">
    @if (count($errors) > 0)
      <div class="alert alert-danger">
        @foreach($errors->all() as $error)
          <p>{{ $error }}</p>
        @endforeach
      </div>
    @endif
    <div class="col-md-6 col-md-offset-3">
      {!! Form::open(['route' => 'user.login']) !!}
      {{ csrf_field() }}
      @if ($errors->first('email') != null)
        <div class="form-group">
          {!! Form::label('email', 'Eメール:', ['class' => 'control-label text-danger']) !!}
          {!! Form::email('email', null, ['class' => 'form-control is-invalid']) !!}
        </div>
      @else
        <div class="form-group">
          {!! Form::label('email', 'Eメール:', ['class' => 'control-label']) !!}
          {!! Form::email('email', null, ['class' => 'form-control']) !!}
        </div>
      @endif
      @if ($errors->first('password') != null)
        <div class="form-group">
          {!! Form::label('password', 'パスワード:', ['class' => 'control-label text-danger']) !!}
          {!! Form::password('password', ['class' => 'form-control is-invalid']) !!}
        </div>
      @else
        <div class="form-group">
          {!! Form::label('password', 'パスワード:', ['class' => 'control-label']) !!}
          {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>
      @endif
      <div class="custom-control custom-checkbox">
      <!-- <div class="remember-box"> -->
        {!! Form::checkbox('remember', 'true', '',  ['id' => 'remember_me', 'class' => 'custom-control-input']) !!}
        {!! Form::label('remember_me', 'remember', ['class' => 'custom-control-label']) !!}
        <!-- <input type="checkbox" id="remember" value="true">
        <label for="remember">remember</label> -->
      </div>
      <div class="form-group">
        {!! Form::submit('Login', ['class' => 'btn btn-info']) !!}
      </div>
      {!! Form::close() !!}
    </div>
  </div>
@endsection
