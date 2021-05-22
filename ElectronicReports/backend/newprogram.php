<?php
    require_once 'connection.php';
    session_start();
    $duration = $_POST['duration'];
    $title = $_POST['title'];
    $id = $_SESSION['user']["user_id"];//хм
    //$id = 9;
    //подключимся к бд
    $mysql = new mysqli($host, $myuser, $mypassword, $database);
    $mysql->query("SET names utf8");
    $mysql->query("INSERT INTO `programs` (`title`, `duration`)
        VALUES('$title', '$duration')");

    $result = $mysql->query("SELECT `program_id` FROM `programs` WHERE `title` = '$title'");
    $program_id = $result->fetch_assoc();
    $id2 = $program_id["program_id"];
    $mysql->query("INSERT INTO `userproglink` (`program_id`, `user_id`)
        VALUES('$id2', '$id')");

    $mysql->close();
    header('Location: ../Frontend/personal.html');
?>
