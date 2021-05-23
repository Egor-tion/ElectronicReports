<?php
  require_once '../backend/connection.php';
  $mysql = new mysqli($host, $myuser, $mypassword, $database);
  $mysql->query("SET names utf8");

  $val = $_SESSION['progid'];
  $numbers = $mysql->query("SELECT * FROM `groups` WHERE `program_id` = '$val' ORDER BY `groupNum` ASC");
  foreach ($numbers as $value){

    echo '<a href="../frontend/groupList.html?num='.$value["group_id"].'">Группа '.$value["groupNum"].'</a>';
  }

?>
