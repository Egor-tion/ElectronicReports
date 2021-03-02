<!doctype html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <title>Форма регистрации</title>
  <head>

  <body>
    <h1> Форма регистрации</h1>
    <form action="check.php" method="post">
      Логин <input name="login" type="text" class="from-control"
        id="login" placeholder="Введите логин"><br>
      Пароль <input name="password" type="text" class="from-control"
        id="password" placeholder="Введите пароль"><br>
      Статус <input name="status" type="text" class="from-control"
        id="status" placeholder="1 - admin, 0 - user"><br>

      <button class="btn btn-success" type="submit"> Зарегистрироваться </button>
    </form>
  </body>
</html>
