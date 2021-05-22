<?php
  require_once '../backend/connection.php';
  $mysql = new mysqli($host, $myuser, $mypassword, $database);
  $mysql->query("SET names utf8");

  $kostil1 = $_SESSION['user']["user_id"];
  $result = $mysql->query("SELECT * FROM `userproglink` WHERE `user_id` = '$kostil1'");
  $allusers=array();
  foreach ($result as $value) {
    $allusers[] = $value;
  }
  //$allusers = $result->fetch_assoc();

?>

<p><?php echo $_SESSION['user']["Name"], " ", $_SESSION['user']["Lastname"], " ",  $_SESSION['user']["Fathers_name"] ?></p>
<p>Должность: педагог дополнительного образования</p>
<p>Дата начала работы: <?php echo $_SESSION['user']["EmploymentDate"] ?>
