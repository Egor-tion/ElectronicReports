<? php
  require_once 'connection.php';
  if ($_session['statusLog'] == false)
  {
    die('Доступ закрыт');
    exit();
  }
?>

<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <title>Личный кабинет</title>
  <head>
  <body>

    Привет!
    <a href="exit.php"> Выход. </a>

  </body>
</html>
