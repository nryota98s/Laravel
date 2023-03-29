<!DOCTYPE html>

<html>


<head>

  <meta charset='utf-8"'>

  <link rel='stylesheet' href="{{ asset('/css/app.css') }}">

  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>


<body>

  <header>

    <h1>サーバーサイド課題 沼村竜汰</h1>
    <div class="dropdown-menu">
      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth:: user()->name }}
      </a>
    </div>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
        {{ __('ログアウト') }}
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
      </form>
    </div>
  </header>

  <div class='container'>
    {!! Form::open(['url' => '/main']) !!}
    {!! Form::input('text', 'keyword','', ['class' => 'form-control','placeholder' => 'キーワードを入力']) !!}
    {!! Form::input('submit',"",'検索') !!}

    <div class="post_btn">

      <p class="pull-right"><a class="btn btn-success" href="/create-form">投稿する</a></p>

    </div>
    @if(count($list)===0)
    <p>検索結果は0件です。</p>
    <a href="http://127.0.0.1:8000/main">一覧に戻る
      @endif

      <h2 class='page-header'>投稿一覧</h2>

      <table class='table table-hover'>

        <tr>

          <th>名前</th>

          <th>投稿内容</th>

          <th>投稿日時</th>

          <th></th>
          <th></th>
        </tr>

        @foreach ($list as $list)

        <tr>

          <td>{{ $list->user_name }}</td>

          <td>{{ $list->contents }}</td>

          <td>{{ $list->created_at }}</td>

          <td><a class="btn btn-primary" href="/post/{{ $list->id }}/update-form">更新</a></td>

          <td><a class="btn btn-danger" href="/post/{{ $list->id }}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</a></td>
        </tr>

        @endforeach

      </table>

  </div>


  <footer>



  </footer>

  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

</body>


</html>
