@extends('layouts.global')
@section('title', $user->name . 's profile')

@section('content')

<div class="row">

  <aside class="col-md-4 border-right">
    <div class="main col-md-8">
      <h4>
        {{ $user->name }}さんのプロフィール
      </h4>
    </div>
    <section class="user_info">
      <p>name : {{ $user->name }}</p>
      <p>email: {{ $user->email }}</p>
      <p>id   : {{ $user->id }}</p>
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
@endsection
