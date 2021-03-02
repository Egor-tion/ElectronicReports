<?php
    require_once 'connection.php';

    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $password = md5($_POST['password']."ap1800");
    $status = $_POST['status'];

    if(mb_strlen($login) < 4 || mb_strlen($login) > 30) {
      echo "Недопустимая длина логина";
      exit();
    }

    //подключимся к бд
    $mysql = new mysqli($host, $myuser, $mypassword, $database);
    $mysql->query("INSERT INTO `users` (`user_login`, `user_password`, `user_admin`)
        VALUES('$login', '$password', '$status')");
    $mysql->close();
?>
