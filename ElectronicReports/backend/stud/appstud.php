<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'].'/ElectronicReports/backend/connection.php';
    $mysql = new mysqli($host, $myuser, $mypassword, $database);
    $mysql->query("SET names utf8");

    $kost = $_GET['stud_id'];
    $student_id = (int)$kost;

    $kost = $_SESSION['group'];
    $id = (int)$kost;

    $resultch = $mysql->query("SELECT count(*) FROM `groupstudlink` WHERE `group_id` = '$id' AND `student_id` = '$student_id'");
    $resultUser = $resultch->fetch_row();
    if($resultUser[0] > 0) {
      $mysql->close();
      header('Location: ../../frontend/groupList.html');  // ЕСЛИ Студент ПОВТОРЯЕТСЯ, ТО НИЗЯ добавить
    } else {
      $mysql->query("INSERT INTO `groupstudlink` (`student_id`, `group_id`) VALUES('$student_id', '$id')");
      $mysql->close();
      header('Location: ../../frontend/groupList.html');
    }
?>
