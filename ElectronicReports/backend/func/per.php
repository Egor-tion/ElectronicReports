<?php
if ($_SESSION['status'] == 2){
  $link = "../frontend/personal.html";
} else {
  if ($_SESSION['status'] == 1){
    $link = "../frontend/personalAdmin.html";
  }
}



echo "<a href= \"".$link."\" class=\"header_link\">Личная страница</a>";
?>
