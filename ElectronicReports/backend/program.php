<?php
  require_once '../backend/connection.php';
  $mysql = new mysqli($host, $myuser, $mypassword, $database);
  $mysql->query("SET names utf8");

  session_start();
  $val = $_GET['prog_id'];
  $_SESSION['progid'] = $val;

  header('Location: ../frontend/program.html');
?>
