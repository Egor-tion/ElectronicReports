<?php
//<img src="./frontend/img/logo.png" alt="logo">
  session_start();
  if (isset($_SESSION['aut'])){
    if ($_SESSION['aut'] == 1){
      echo "<p> Неправильный логин или пароль </p>";
    }
  }
?>
