<?php
    require_once 'connection.php';
    session_start();

    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $password = md5($_POST['password']."ap1800");

    //подключимся к бд
    $mysql = new mysqli($host, $myuser, $mypassword, $database);
    //$mysql = new PDO("mysql:host=$host;dbname=$database", $myuser, $mypassword);
    $mysql->query("SET names utf8");

    $result = $mysql->query("SELECT * FROM `userss` WHERE `Login` = '$login'
      AND `Password` = '$password'");
    $resultUser = $result->fetch_assoc();
    if(count($resultUser) == 0) {
      header('Location: ../index.html');
    }
    else {
      if($resultUser["Admin"] == 1){
        $_SESSION['status'] = 1;
        $kostil = $mysql->query("SELECT * FROM `userss` WHERE `Login` = '$login' AND `Password` = '$password'");
        $_SESSION['user'] = $kostil->fetch_assoc();
        header('Location: ../frontend/personalAdmin.html');
      }
      else{
        $_SESSION['status'] = 2;
        $kostil = $mysql->query("SELECT * FROM `userss` WHERE `Login` = '$login' AND `Password` = '$password'");
        $_SESSION['user'] = $kostil->fetch_assoc();
        header('Location: ../frontend/personal.html');
      }
    }

    $mysql->close();
?>
