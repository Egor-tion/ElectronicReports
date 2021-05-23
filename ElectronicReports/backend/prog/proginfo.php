<?php
  require_once '../backend/connection.php';
  $mysql = new mysqli($host, $myuser, $mypassword, $database);
  $mysql->query("SET names utf8");

  $val = $_SESSION['progid'];
  $result = $mysql->query("SELECT * FROM `programs` WHERE `program_id` = '$val'");
  $print = $result->fetch_assoc();

  $info = $print;

  echo "<p>".$info["title"]."</p>
  <p>Длительность в часах: ".$info["duration"]."</p>
  <p>Количество групп: ".$info["CountGroup"]."</p>"
?>
