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


<?php
foreach ($allusers as $value) {
  $val = $value["program_id"];
  $result = $mysql->query("SELECT * FROM `programs` WHERE `program_id` = '$val' ORDER BY `title` ASC");
  $print = $result->fetch_assoc();
  echo "<li>";
  echo '<a href="../backend/program.php?prog_id='. $val.'" class="header_link">';
  echo($print["title"]);
  echo "</li>";
}
?>
