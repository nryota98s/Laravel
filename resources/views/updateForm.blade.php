@extends('layouts/app')

@section('content')

<h1 class='page-header'>サーバーサイド課題 沼村竜汰</h1>

</header>

<div class='container'>

  <h2 class='page-header'>投稿内容を変更する</h2>
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  {!! Form::open(['url' => '/post/update']) !!}

  <div class="form-group">
    {!! Form::hidden('id', $post->id) !!}
    {!! Form::input('text', 'userName',$post->user_name, ['class' => 'form-control', 'required','placeholder' => 'ユーザーネーム']) !!}

    {!! Form::input('text', 'upPost', $post->contents, ['required', 'class' => 'form-control']) !!}
  </div>

  <button type="submit" class="btn btn-primary pull-right">更新</button>

  {!! Form::close() !!}

</div>

@endsection
