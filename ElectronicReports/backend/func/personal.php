<?php
  require_once '../backend/connection.php';
  $mysql = new mysqli($host, $myuser, $mypassword, $database);
  $mysql->query("SET names utf8");

  $id = $_SESSION['user']["user_id"];
  $pols = $mysql->query("SELECT * FROM `userss` WHERE `user_id` = '$id'");
  $kostil = $pols->fetch_assoc();

  echo "<p>".$kostil["Name"]." ".$kostil["Lastname"]." ".$kostil["Fathers_name"]."</p>
  <p>Должность:".$kostil["Post"]."</p>
  <p>Дата начала работы: ".$kostil["EmploymentDate"]."</p>";

  $_SESSION['aut'] = 0; // Проверка всплывашки

?>
