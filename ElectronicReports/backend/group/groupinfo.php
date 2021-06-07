<?php
  require_once '../backend/connection.php';
  $mysql = new mysqli($host, $myuser, $mypassword, $database);
  $mysql->query("SET names utf8");

  $check = isset($_GET['num']);
  if ($check){
    $_SESSION['group'] = $_GET['num'];
  } else {
    $val1 = $_SESSION['group'];
    $_SESSION['group'] = $val1;
  }


  $val = $_SESSION['progid'];
  $result = $mysql->query("SELECT * FROM `programs` WHERE `program_id` = '$val'");
  $print = $result->fetch_assoc();

  $val1 = $_SESSION['group'];
  $result = $mysql->query("SELECT * FROM `groups` WHERE `group_id` = '$val1'");
  $printt = $result->fetch_assoc();

  echo $print["title"].': Группа  '.$printt["groupNum"];
?>
