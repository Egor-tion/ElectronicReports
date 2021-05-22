<?php
  require_once '../backend/connection.php';
  $mysql = new mysqli($host, $myuser, $mypassword, $database);
  $mysql->query("SET names utf8");

  session_start();
  $val = $_GET['prog_id'];
  $_SESSION['progid'] = $val;
  //$val = 30;
  $result = $mysql->query("SELECT * FROM `programs` WHERE `program_id` = '$val'");
  $print = $result->fetch_assoc();

  $_SESSION['prog'] = $print;

  header('Location: ../frontend/program.html');
?>
