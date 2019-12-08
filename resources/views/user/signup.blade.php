@extends('layouts.global')

@section('title', 'signup')

@section('content')
  <h1>Sign up</h1>
  <div class="row">
    @if (count($errors) > 0)
      <div class="alert alert-danger">
        @foreach($errors->all() as $error)
          <p>{{ $error }}</p>
        @endforeach
      </div>
    @endif
    <div class="col-md-6 col-md-offset-3">
      {!! Form::open(['route' => 'user.signup']) !!}
      {{ csrf_field() }}
      @if ($errors->first('name') != null)
      <div class="form-group">
        {!! Form::label('name', 'お名前:', ['class' => 'control-label text-danger']) !!}
        {!! Form::text('name', null, ['class' => 'form-control is-invalid']) !!}
      </div>
      @else
      <div class="form-group">
        {!! Form::label('name', 'お名前:', ['class' => 'control-label']) !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
      </div>
      @endif
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
      @if ($errors->first('password') != null)
      <div class="form-group">
        {!! Form::label('password_confirm', 'パスワード(確認):', ['class' => 'control-label text-danger']) !!}
        {!! Form::password('password_confirm', ['class' => 'form-control is-invalid']) !!}
      </div>
      @else
      <div class="form-group">
        {!! Form::label('password_confirm', 'パスワード(確認):', ['class' => 'control-label']) !!}
        {!! Form::password('password_confirm', ['class' => 'form-control']) !!}
      </div>
      @endif
      <div class="form-group">
        {!! Form::submit('Create my Account', ['class' => 'btn btn-info']) !!}
      </div>
      {!! Form::close() !!}
    </div>
  </div>
@endsection
