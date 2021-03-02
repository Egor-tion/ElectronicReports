<!doctype html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <title>Форма авторизации</title>
  <head>

  <body>
    <h1> Форма авторизации</h1>
    <form action="authorization.php" method="post">
      Логин <input name="login" type="text" class="from-control"
        id="login" placeholder="Введите логин"><br>
      Пароль <input name="password" type="text" class="from-control"
        id="password" placeholder="Введите пароль"><br>


      <button class="btn btn-success" type="submit"> Войти </button>
    </form>
  </body>
</html>
