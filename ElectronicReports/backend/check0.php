<?php
    require_once 'connection.php';

    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $password = md5($_POST['password']."ap1800");
    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $lastname = filter_var(trim($_POST['lastname']), FILTER_SANITIZE_STRING);
    $fathers_name = filter_var(trim($_POST['fathers_name']), FILTER_SANITIZE_STRING);
    $status = $_POST['status'];
    $employmentDate = $_POST['employmentDate'];

    //подключимся к бд
    $mysql = new mysqli($host, $myuser, $mypassword, $database);
    $mysql->query("SET names utf8");
    $mysql->query("INSERT INTO `userss` (`Login`, `Password`, `Name`, `Lastname`, `Fathers_name`, `Admin`, `EmploymentDate`)
        VALUES('$login', '$password', '$name', '$lastname', '$fathers_name', '$status', '$employmentDate')");
    $mysql->close();
    header('Location: ../Frontend/personalAdmin.html');
?>
