<?php
    require_once 'connection.php';

    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $lastname = filter_var(trim($_POST['lastname']), FILTER_SANITIZE_STRING);
    $fathers_name = filter_var(trim($_POST['fathers_name']), FILTER_SANITIZE_STRING);
    $birthdate = $_POST['birthdate'];
    $certificatenum = $_POST['certificatenum'];
    $address = $_POST['address'];
    $telephonnum = $_POST['telephonnum'];
    $snils = $_POST['snils'];

    //подключимся к бд
    $mysql = new mysqli($host, $myuser, $mypassword, $database);
    $mysql->query("SET names utf8");
    $mysql->query("INSERT INTO `students` (`Name`, `Lastname`, `Fathers_name`, `BirthDate`, `CertificateNum`, `Address`, `TelephonNum`, `Snils`)
        VALUES('$name', '$lastname', '$fathers_name', '$birthdate', '$certificatenum', '$address', '$telephonnum', '$snils')");
    
    $mysql->close();
    header('Location: ../Frontend/childrenList.html');
?>
