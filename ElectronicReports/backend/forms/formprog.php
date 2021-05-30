<?php
  session_start();
  $id = $_POST["taskOption"];
  $_SESSION['progid'] = $id;

  echo "string";
  header('Location: ../../frontend/listOfGroups1.html');
 ?>
