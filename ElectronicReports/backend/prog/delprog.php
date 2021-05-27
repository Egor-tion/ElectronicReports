<?php
  session_start();
  require_once $_SERVER['DOCUMENT_ROOT'].'/ElectronicReports/backend/connection.php';
  $mysql = new mysqli($host, $myuser, $mypassword, $database);
  $mysql->query("SET names utf8");

  $val = $_SESSION['progid'];

  $res =  $mysql->query("SELECT * FROM `groups` WHERE `program_id` = '$val'");
  $del = $res->fetch_assoc();
  $dd = $del["group_id"];
  $mysql->query("DELETE FROM `groupstudlink` WHERE `program_id` = '$dd'");

  $mysql->query("DELETE FROM `groups` WHERE `program_id` = '$val'");
  $mysql->query("DELETE FROM `programs` WHERE `program_id` = '$val'");

  if ($_SESSION['status'] == 2){
    $link = "../../frontend/personal.html";
  } else {
    if ($_SESSION['status'] == 1){
      $link = "../../frontend/personalAdmin.html";
    }
  }

  $mysql->query("DELETE FROM `userproglink` WHERE `program_id` = '$val'");

  header("Location: ".$link);
?>
