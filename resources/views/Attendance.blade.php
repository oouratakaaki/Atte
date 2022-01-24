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
      <input type="submit" name="calendar[2020-09*2020-10-24]" value="<<">
      <p class="top_text index">{{$days}}</p>
      <table class="table">
        <tr class="list">
          <th class="item">名前</th>
          <th class="item">勤務開始</th>
          <th class="item">勤務終了</th>
          <th class="item">休憩時間</th>
          <th class="item">勤務時間</th>
        </tr>
        <!-- @ foreachディレクティブを使用する -->
        @foreach ($items as $item)
        <tr class="list">

          <td class="item">
            {{$item->user->name}}
          </td>
          <td class="item_time">
            {{$item->atteStartTime()}}
          </td>

          <td class="item_time">
            {{$item->atteEndTime()}}

          </td>
          @if(isset($item->rests))
          <td class="item_time">
          </td>
          @else
          <td class="item_time">
            {{$item->rests}}
          </td>
          @endif
          <td class="item_time">
            {{$item->getAtte()}}
          </td>
        </tr>
        @endforeach
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