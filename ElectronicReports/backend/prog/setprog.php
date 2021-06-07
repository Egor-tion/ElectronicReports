<?php
  session_start();
  require_once $_SERVER['DOCUMENT_ROOT'].'/ElectronicReports/backend/connection.php';
  $mysql = new mysqli($host, $myuser, $mypassword, $database);
  $mysql->query("SET names utf8");

  $kost =  $_SESSION['progid'];
  $prog_id = (int)$kost;

  $result = $mysql->query("SELECT * FROM `programs` WHERE `program_id` = '$prog_id'");
  $kostil = $result->fetch_assoc();

  $allusers=array();
  foreach ($result as $value) {
    $allusers[] = $value;
  }

  $duration = filter_var(trim($_POST['duration']), FILTER_SANITIZE_STRING);
  if ($duration != $kostil["duration"]){
    $mysql->query("UPDATE `programs` SET `duration` = '$duration' WHERE `program_id` = '$prog_id'");
  }

  $title = filter_var(trim($_POST['title']), FILTER_SANITIZE_STRING);
  if ($title != $kostil["title"]){
    $mysql->query("UPDATE `programs` SET `title` = '$title' WHERE `program_id` = '$prog_id'");
  }


  if (isset($_POST['checkbox1'])){
    if ($_POST['checkbox1'] == 'on'){
      $id = $_SESSION['user']["user_id"];
      $result = $mysql->query("SELECT * FROM `userproglink` WHERE `program_id` = '$prog_id' and `user_id` != '$id'");
      $kostil1 = $result->fetch_assoc();
      if (empty($kostil1)){ // Проверяем существует ли уже доп препод
        if ( !(empty($_POST['secName'])) and !(empty($_POST['secLast'])) and !(empty($_POST['secFather'])) ){

          $secName = $_POST['secName'];
          $secLast = $_POST['secLast'];
          $secFather = $_POST['secFather']; // Проверить введенного преподавателя

          $resultch = $mysql->query("SELECT * FROM `userss`
            WHERE `Name` = '$secName' and `Lastname` = '$secLast' and `Fathers_name` = '$secFather'");
          $kostil = $resultch->fetch_assoc();

          $trfl = empty($kostil);
          if($trfl) {
            $_SESSION['aut'] = 3;
            header('Location: ../../frontend/setprogram.html'); // Если преподаватель введён неверно
          } else {
            $chtoza = intval($kostil["user_id"]);
            $tr= $chtoza != $id;

            if ($chtoza == intval($id)) // Если ввел сам себя
            {
              $_SESSION['aut'] = 3;
              header('Location: ../../frontend/setprogram.html');
            } else { // Если всё ок
              $secId = $kostil["user_id"];

              $mysql->query("INSERT INTO `userproglink` (`program_id`, `user_id`) VALUES('$prog_id', '$secId')");

              $mysql->close();
              $_SESSION['aut'] = 0;
              header('Location: ../../frontend/program.html');
            }
          }
        } else {
          $_SESSION['aut'] = 3;
          header('Location: ../../frontend/setprogram.html'); // Если доп препод незаполнен
        }

      } else { //Если уже есть доп преподаватель
        $secName = $_POST['secName'];
        $secLast = $_POST['secLast'];
        $secFather = $_POST['secFather']; // Проверить введенного преподавателя

        $resultch = $mysql->query("SELECT * FROM `userss`
          WHERE `Name` = '$secName' and `Lastname` = '$secLast' and `Fathers_name` = '$secFather'");
        $kostil = $resultch->fetch_assoc();

        $trfl = empty($kostil);
        if($trfl) {
          $_SESSION['aut'] = 3;
          header('Location: ../../frontend/setprogram.html'); // Если преподаватель введён неверно
        }

        if ($kostil["user_id"] == $id)
        {
          $_SESSION['aut'] = 3;
          header('Location: ../../frontend/setprogram.html');
        }

        $secId = $kostil1["user_id"];

        $mysql->query("DELETE FROM `userproglink` WHERE `program_id` = '$prog_id' and `user_id` = '$secId'");

        $secId = $kostil["user_id"];

        $mysql->query("INSERT INTO `userproglink` (`program_id`, `user_id`)
            VALUES('$prog_id', '$secId')");

        $mysql->close();
        $_SESSION['aut'] = 0;
        header('Location: ../../frontend/program.html');
      }
    }
  } else {
    $id = $_SESSION['user']["user_id"];
    $result = $mysql->query("SELECT * FROM `userproglink` WHERE `program_id` = '$prog_id' and `user_id` != '$id'");
    $kostil1 = $result->fetch_assoc();
    if (empty($kostil1)){
      $mysql->close();
      $_SESSION['aut'] = 0;
      header('Location: ../../frontend/program.html');
    } else {
      $secId = $kostil1["user_id"];
      $mysql->query("DELETE FROM `userproglink` WHERE `program_id` = '$prog_id' and `user_id` = '$secId'");

      $mysql->close();
      $_SESSION['aut'] = 0;
      header('Location: ../../frontend/program.html');
    }
  }

?>
