<?php
  require_once '../backend/connection.php';
  $mysql = new mysqli($host, $myuser, $mypassword, $database);
  $mysql->query("SET names utf8");

  $id = $_SESSION['progid'];
  $result = $mysql->query("SELECT * FROM `groups` WHERE `program_id` = '$id'");

  $allusers=array();
  $first = 1;
  foreach ($result as $value) {
    $val = $value["group_id"];
    if ($first == 1){
      echo '<option value="'.$val.'" name = "'.$val.'" selected>'.$value["groupNum"].'</option>';
      $first = 2;
    }else {
      echo '<option value="'.$val.'" name = "'.$val.'" >'.$value["groupNum"].'</option>';
    }

  }
?>
