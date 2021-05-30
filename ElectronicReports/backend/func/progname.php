<?php
  if (isset($_SESSION['aut'])){
    if ($_SESSION['aut'] == 2){
      echo "<a style = \"
          text-align: center;
          background-color: #FF7373;
          color: black;\"> Программа с таким названием уже существует </a>";
    }
    if ($_SESSION['aut'] == 3){
      echo "<a style = \"
          text-align: center;
          background-color: #FF7373;
          color: black;\"> Неправильно введены данные дополнительного педагога </a>";
    }
  }
?>
