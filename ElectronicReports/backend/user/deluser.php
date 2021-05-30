<?php
  echo "string";
  session_start();
  require_once $_SERVER['DOCUMENT_ROOT'].'/ElectronicReports/backend/connection.php';
  $mysql = new mysqli($host, $myuser, $mypassword, $database);
  $mysql->query("SET names utf8");


  $user_id2 =  $_GET['us_id'];
  $id = $_SESSION['user']["user_id"];
  if ($user_id2 != $id and $user_id2 != 0){
    echo "можно";
  } else{
    echo "низя";
  }

  
?>
