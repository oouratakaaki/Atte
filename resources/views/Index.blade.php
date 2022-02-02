<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Atte</title>
  <link rel="stylesheet" href="{{url('css/reset.css')}}">
  <link rel="stylesheet" href="{{url('css/default.css')}}">
  <link rel="stylesheet" href="{{url('css/index.css')}}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Murecho:wght@600&family=Noto+Sans+JP:wght@300;700&display=swap" rel="stylesheet">
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
          <a href="http://127.0.0.1:8000/attendance/{num}" class="header_link">日付一覧</a>
        </li>
        <li class="header_nav_item">
          <a href="logout" class="header_link">ログアウト</a>
        </li>
      </ul>
    </nav>
  </header>
  <main class="main">
    <p class="top_text index">{{session('name')}}さんお疲れ様です！</p>
    @csrf
    <ul class="button_flex">
      <li class="start atte">
        @if($startAtte === 1)
        <button class="button" disabled>勤務開始</button>
        @elseif($startAtte === 0)
        <form action='/attendance/start' method="get">
          <button type="submit" class="button" value="">勤務開始</button>
        </form>
        @else
        <button class="button" disabled>勤務開始</button>
        @endif
      </li>
      <li class="end atte">
        @if($startAtte === 0 or $endAtte === 1)
        <button type="submit" class="button" disabled>勤務終了</button>
        @else
        <form action='/attendance/end' method="get">
          <button type="submit" class="button" value="">勤務終了</button>
        </form>
        @endif
      </li>
      <li class="start rest">
        @if($startAtte === 1 && $endAtte === 1)
        <button type="submit" class="button" disabled>休憩開始</button>
        @elseif($startAtte === 0 && $endAtte === 1)
        <button type="submit" class="button" disabled>休憩開始</button>
        @else
        <form action='/rest/start' method="get">
          <button type="submit" class="button" value="">休憩開始</button>
        </form>
        @endif
      </li>
      <li class="end rest">
        @if($startAtte === 1 && $endAtte === 1 && $startRest === 1)
        <form action='/rest/end' method="get">
          <button type="submit" class="button" value="">休憩終了</button>
        </form>
        @elseif($startAtte === 1 && $endAtte === 1)
        <button type="submit" class="button" disabled>休憩終了</button>
        @elseif($startAtte === 0 && $endAtte === 1)
        <button type="submit" class="button" disabled>休憩終了</button>
        @else($startAtte === 1 && $endAtte === 0)
        <button type="submit" class="button" disabled>休憩終了</button>
        @endif
      </li>
    </ul>
  </main>
  <footer class="footer">
    <p class="footer_text">Atte,inc.</p>
  </footer>
</body>

</html>