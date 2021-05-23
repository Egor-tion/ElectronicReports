<?php
    require_once 'connection.php';
    session_start();

    //подключимся к бд
    $mysql = new mysqli($host, $myuser, $mypassword, $database);
    $mysql->query("SET names utf8");

    $duration = $_POST['duration'];
    $title = $_POST['title'];

    $resultch = $mysql->query("SELECT * FROM `programs` WHERE `title` = '$title'");
    $resultUser = $resultch->fetch_assoc(); // Я закончил я тут
    if($resultUser["program_id"] != "0") {
      header('Location: ../frontend/program.html');
    }

    $id = $_SESSION['user']["user_id"];

    $mysql->query("INSERT INTO `programs` (`title`, `duration`) VALUES('$title', '$duration')");

    $result = $mysql->query("SELECT `program_id` FROM `programs` WHERE `title` = '$title'");
    $program_id = $result->fetch_assoc();
    $id2 = $program_id["program_id"];

    $_SESSION['progid'] = $id2;

    $mysql->query("INSERT INTO `userproglink` (`program_id`, `user_id`)
        VALUES('$id2', '$id')");

    $mysql->close();
    header('Location: ../frontend/program.html');
?>
