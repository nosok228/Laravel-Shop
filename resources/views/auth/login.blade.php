<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Вход</title>
  <link rel="stylesheet" href="/css/form.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<link rel="icon" href="http://vladmaxi.net/favicon.ico" type="image/x-icon">
  <link rel="shortcut icon" href="http://vladmaxi.net/favicon.ico" type="image/x-icon">
  <script src = "/js/form.js"></script>
	<!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>

<!-- vladmaxi top bar -->
    <div class="vladmaxi-top">
        <a href="{{ route('index') }}" target="_blank">Главная</a>
    <div class="clr"></div>
    </div>
<!--/ vladmaxi top bar -->
  <form method="post" action="" class="login">
    {{ csrf_field() }}

    <p>
        <label for="login">Email:</label>
        <input type="text" name="email" id="login" required>
      </p>
  

    <p>
      <label for="password">Пароль:</label>
      <input type="password" name="password" id="password" required>
    </p>

    <p class="login-submit">
      <button type="submit" class="login-button">Войти</button>
    </p>

    <p class="forgot-password"><a href="/account/login">Регистрация</a></p>
  </form>
</body>
</html>
