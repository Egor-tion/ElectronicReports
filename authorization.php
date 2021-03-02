<?php
    require_once 'connection.php';
    session_start();

    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $password = md5($_POST['password']."ap1800");

    //подключимся к бд
    $mysql = new mysqli($host, $myuser, $mypassword, $database);
    //$mysql = new PDO("mysql:host=$host;dbname=$database", $myuser, $mypassword);

    $result = $mysql->query("SELECT * FROM `users` WHERE `user_login` = '$login'
      AND `user_password` = '$password'");
    $resultUser = $result->fetch_assoc();
    $_session['statusLog'] = false;
    if(count($resultUser) == 0) {
      echo "Неправильный логин или пароль";
      die('Доступ закрыт'); // не даёт зайти без логина
      exit();
    }
    else {
      //echo "Cool!";
      $_session['statusLog'] = true;
      header('Location: personalAccount.php');
    }

    $mysql->close();
?>
