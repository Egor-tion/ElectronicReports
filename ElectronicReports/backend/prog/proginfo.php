<?php
  require_once '../backend/connection.php';
  $mysql = new mysqli($host, $myuser, $mypassword, $database);
  $mysql->query("SET names utf8");

  $val = $_SESSION['progid'];
  $result = $mysql->query("SELECT * FROM `programs` WHERE `program_id` = '$val'");
  $print = $result->fetch_assoc();

  $info = $print;

  if ($_SESSION['status'] == 2){
    $link = "./personal.html";
  } else {
    if ($_SESSION['status'] == 1){
      $link = "./personalAdmin.html";
    }
  }

  $val1 = $_SESSION['user']["user_id"];
  $result = $mysql->query("SELECT * FROM `userproglink` WHERE `program_id` = '$val' and `user_id` = '$val1'");
  $resultUser = $result->fetch_assoc();
  if(count($resultUser) == 0){
    $ll = "";
  } else {
    $ll = "";
    //$ll = "<a href=\"./prog/otkaz.php\">Отказаться от программы</a>";
  }

  echo "<header>
      <div class=\"name_page\">".$info["title"]."</div>
      <div class=\"header_list\">
          <a href=".$link." class=\"header_link\">В личный кабинет</a>
  </div>
  </header>
  <div class=\"wrapper\">
      <div class=\"info\">
        <p>Длительность в часах: ".$info["duration"]."</p>
        <p>Количество групп: ".$info["CountGroup"]."</p>
        ".$ll."
      </div>"
?>
