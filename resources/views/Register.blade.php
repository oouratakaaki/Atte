<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>register</title>
  <link rel="stylesheet" href="{{url('css/reset.css')}}">
  <link rel="stylesheet" href="{{url('css/default.css')}}">
  <link rel="stylesheet" href="{{url('css/register.css')}}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Murecho:wght@600&family=Noto+Sans+JP:wght@300;700&display=swap" rel="stylesheet">

</head>

<body>
  <header class="header">
    <h1 class="Atte_text">Atte</h1>
  </header>
  <main class="main">

    <form action="register" method="post">
      @csrf
      <p class="top_text">会員登録</p>
      <div class=input_box>
        <input type="text" class="input" name="name" value="{{old('name')}}" placeholder="名前" onblur="nameMessage(this)">
      </div>
      <p id="name"></p>
      @error('name')
      <div>{{$message}}</div>
      @enderror
      <script type="text/javascript">
        function nameMessage(element) {
          if (!element.value) {
            document.getElementById('name').innerHTML = '名前を入力してください';
          } else {
            document.getElementById('name').innerHTML = '';
          }
        }
      </script>
      <div class=input_box>
        <input type="email" class="input" name="email" value="{{old('email')}}" placeholder="メールアドレス">
      </div>
      @error('email')
      <div>{{$message}}</div>
      @enderror
      <div class="input_box">
        <input type="password" class="input" name="password" value="{{old('password')}}" placeholder="パスワード">
      </div>
      @error('password')
      <div>{{$message}}</div>
      @enderror
      <div class="input_box">
        <input type="password" class="input" name="password_confirmation" value="{{old('password_confirmation')}}" placeholder="確認用パスワード">
      </div>
      @error('password_confirmation')
      <div>{{$message}}</div>
      @enderror
      <div>
        <button type="submit" class="login_button">会員登録</button>
      </div>
      <p class="bottom_text">アカウントをお持ちの方はこちらから</p>
      <div class="login_User">
        <a class="login_User_link" href="http://127.0.0.1:8000/login">ログイン</a>
      </div>
    </form>
  </main>
  <footer class="footer">
    <p class="footer_text">Atte,inc.</p>
  </footer>
</body>

</html>