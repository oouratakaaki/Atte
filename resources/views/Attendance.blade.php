<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{url('css/reset.css')}}">
  <link rel="stylesheet" href="{{url('css/default.css')}}">
  <link rel="stylesheet" href="{{url('css/attendance.css')}}">
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
          <a href="" class="header_link">ログアウト</a>
        </li>
      </ul>
    </nav>
  </header>
  <main class="main">
    <form action="" method="get">
      @csrf
      <p class="top_text index">{{"日付取得"}}</p>
      <table class="table">
        <tr class="list">
          <th class="item">名前</th>
          <th class="item">勤務開始</th>
          <th class="item">勤務終了</th>
          <th class="item">休憩時間</th>
          <th class="item">勤務時間</th>
        </tr>
        <!-- @ foreachディレクティブを使用する -->
        <tr class="list">
          <td class="item">
            {テスト太郎}
          </td>
          <td class="item_time">
            {time}
          </td>
          <td class="item_time">
            {time}
          </td>
          <td class="item_time">
            {time}
          </td>
          <td class="item_time">
            {time}
          </td>
        <tr class="list">
          <td class="item">
            {テスト太郎}
          </td>
          <td class="item_time">
            {time}
          </td>
          <td class="item_time">
            {time}
          </td>
          <td class="item_time">
            {time}
          </td>
          <td class="item_time">
            {time}
          </td>
        <tr class="list">
          <td class="item">
            {テスト太郎}
          </td>
          <td class="item_time">
            {time}
          </td>
          <td class="item_time">
            {time}
          </td>
          <td class="item_time">
            {time}
          </td>
          <td class="item_time">
            {time}
          </td>
        <tr class="list">
          <td class="item">
            {テスト太郎}
          </td>
          <td class="item_time">
            {time}
          </td>
          <td class="item_time">
            {time}
          </td>
          <td class="item_time">
            {time}
          </td>
          <td class="item_time">
            {time}
          </td>
        <tr class="list">
          <td class="item">
            {テスト太郎}
          </td>
          <td class="item_time">
            {time}
          </td>
          <td class="item_time">
            {time}
          </td>
          <td class="item_time">
            {time}
          </td>
          <td class="item_time">
            {time}
          </td>
        </tr>
      </table>
      <div class="page">
        <p>ページネーション</p>
      </div>
    </form>


  </main>
  <footer class="footer">
    <p class="footer_text">Atte,inc.</p>
  </footer>
</body>

</html>