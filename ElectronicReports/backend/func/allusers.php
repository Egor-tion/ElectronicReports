<?php
    require_once '../backend/connection.php';
    $mysql = new mysqli($host, $myuser, $mypassword, $database);
    $mysql->query("SET names utf8");

    $result = $mysql->query("SELECT * FROM `userss`");
    $allusers=array();
    foreach ($result as $value) {
      $allusers[] = $value;
    }
    //$allusers = $result->fetch_assoc();
    foreach ($allusers as $value) {
      echo '<a href="./personalAdmin.php" class="header_link">';
      //echo($value["Login"]);
      foreach ($value as $kost) {
        echo $kost." ";
      }
      echo "</br>";
    }
?>
