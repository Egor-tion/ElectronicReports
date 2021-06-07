<?php
  require_once '../backend/connection.php';
  $mysql = new mysqli($host, $myuser, $mypassword, $database);
  $mysql->query("SET names utf8");

  $id = $_SESSION['user']["user_id"];
  $result = $mysql->query("SELECT * FROM `userproglink` WHERE `user_id` = '$id'");

  $allusers=array();
  foreach ($result as $value) {
    $allusers[] = $value;
  }

  $first = 1;
  foreach ($allusers as $value) {
    $val = $value["program_id"];
    $result = $mysql->query("SELECT * FROM `programs` WHERE `program_id` = '$val'");
    $print = $result->fetch_assoc();
    if ($first == 1){
      echo '<option value="'.$val.'" selected>'.$print["title"].'</option>';
      $first = 2;
    }else{
      echo '<option value="'.$val.'">'.$print["title"].'</option>';
    }
    }
?>
