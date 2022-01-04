<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{url('css/reset.css')}}">
  <link rel="stylesheet" href="{{url('css/default.css')}}">
</head>

<body>
  <header class="header">
    <h1 class="Atte_text">Atte</h1>
  </header>
  <main class="main">
    <form action="login" method="post">
      @csrf
      <p class="top_text">ログイン</p>
      @if (count($errors) > 0)
      <li>メールアドレスかパスワードが間違っています</li>
      @endif

      <div class="input_box">
        <input type="email" class="input" name='email' placeholder="メールアドレス">
      </div>

      <div class="input_box">
        <input type="password" class="input" name='password' placeholder="パスワード">
      </div>

      <div>
        <button type="submit" class="login_button">ログイン</button>
      </div>
      <p class="bottom_text">アカウントをお持ちでない方はこちらから</p>
      <div class="create_User">
        <a class="create_User_link" href="http://127.0.0.1:8000/register">会員登録</a>
      </div>
    </form>
  </main>
  <footer class="footer">
    <p class="footer_text">Atte,inc.</p>
  </footer>
</body>

</html>