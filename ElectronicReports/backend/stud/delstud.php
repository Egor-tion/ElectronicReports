<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'].'/ElectronicReports/backend/connection.php';
    $mysql = new mysqli($host, $myuser, $mypassword, $database);
    $mysql->query("SET names utf8");

    $kost = $_GET['stud_id'];
    $student_id = (int)$kost;

    $mysql->query("DELETE FROM `groupstudlink` WHERE `student_id` = '$student_id'");
    $mysql->query("DELETE FROM `students` WHERE `student_id` = '$student_id'");
    $mysql->close();
    header("Location: ".$_SERVER['HTTP_REFERER']);
?>
