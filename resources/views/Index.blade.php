<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{url('css/reset.css')}}">
  <link rel="stylesheet" href="{{url('css/default.css')}}">
  <link rel="stylesheet" href="{{url('css/index.css')}}">
</head>

<body>
  <header class="header">
    <h1 class="Atte_text">Atte</h1>
    <nav class="header-nav">
      <ul class="header-nav-list">
        <li class="header_nav_item">
          <a href="http://127.0.0.1:8000/" class="header_link">ホーム</a>
        </li>
        <li class="header_nav_item">
          <a href="" class="header_link">日付一覧</a>
        </li>
        <li class="header_nav_item">
          <a href="logout" class="header_link">ログアウト</a>
        </li>
      </ul>
    </nav>
  </header>
  <main class="main">
    <p class="top_text index">{{session('name')}}{{session('attendance_id')}}さんお疲れ様です！</p>
    @if(session('error'))
    <p>{{session('error')}}</p>
    @elseif(session('start'))
    <p>{{session('start')}}</p>
    @elseif(session('end'))
    <p>{{session('end')}}</p>
    @endif
    @csrf
    <ul class="button_flex">
      <li class="start atte">
        <form action='/attendamce/start' method="get">
          <button type="submit" class="button" value="">勤務開始</button>
        </form>
      </li>
      <li class="end atte">
        <form action='/attendance/end' method="get">
          <button type="submit" class="button" value="">勤務終了</button>
        </form>
      </li>
      <li class="start rest">
        <form action='/break/start' method="get">
          <button type="submit" class="button" value="">休憩開始</button>
        </form>
      </li>
      <li class="end rest">
        <form action='/break/end' method="get">
          <button type="submit" class="button" value="">休憩終了</button>
        </form>
      </li>
    </ul>
  </main>
  <footer class="footer">
    <p class="footer_text">Atte,inc.</p>
  </footer>
</body>

</html>