@extends('layouts.global')
@section('title', 'profile')

@section('content')

<div class="row">
  <aside class="col-md-4">
    {!! Form::open(['action' =>  ['UsersController@edit', Auth::user()->id], 'method' => 'GET']) !!}
    {!! Form::submit('ユーザー設定更新', ['class' => 'btn btn-success']) !!}
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
  <div class="main col-md-8">
    @if (count($microposts) == 0)
      <p>No Micropost Posted...</p>
    @else
      <h4>
        Posted Microposts ({{ count($microposts) }} / {{ $count }})
      </h4>
      @foreach ($microposts as $key => $value)
      {!! Form::open(['action' => ['MicropostsController@destroy', $value->id], 'method' => 'DELETE', 'id' => 'form_' . $value->id]) !!}
      <p style="border-bottom:1px solid #aaa;">
        title : {{ $value['title'] }}<br>
        content : {{ mb_substr($value['content'], 0, 20) }} ...<br>
        updated_at : {{ $value['updated_at'] }}|
        <input type="button" value="削除" data-id="{{ $value->id }}" style="border:none;display:inline;background:transparent;width:auto;" onclick="deleteSubmit(this);">
      </p>
      {!! Form::close() !!}
      @endforeach
    @endif

    {{ $microposts->links() }}
  </div>

</div>

<script>
  function deleteSubmit(e) {
    if (confirm('you sure?')) {
      document.getElementById('form_' + e.dataset.id).submit();
    }
  }
</script>
</div>
@endsection
