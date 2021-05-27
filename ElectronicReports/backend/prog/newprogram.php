<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'].'/ElectronicReports/backend/connection.php';

    //подключимся к бд
    $mysql = new mysqli($host, $myuser, $mypassword, $database);
    $mysql->query("SET names utf8");

    $duration = $_POST['duration'];
    $title = $_POST['title'];

    $resultch = $mysql->query("SELECT count(*) FROM `programs` WHERE `title` = '$title'");
    $resultUser = $resultch->fetch_row();
    if($resultUser[0] > 0) {
      header('Location: ../../frontend/newprogram.html');  // ЕСЛИ НАЗВАНИЕ ПОВТОРЯЕТСЯ, ТО НИЗЯ СОЗДАТЬ
    }else{
      if ($_POST['checkbox1'] == 'on'){
        if ( ($_POST['secName'] == 0) and ($_POST['secLast'] == 0) and ($_POST['secFather'] == 0) ) {
          $secName = $_POST['secName'];
          $secLast = $_POST['secLast'];
          $secFather = $_POST['secFather']; // Проверить введенного преподавателя

          $resultch = $mysql->query("SELECT * FROM `userss`
            WHERE `Name` = '$secName' and `Lastname` = '$secLast' and `Fathers_name` = '$secFather'");
          $kostil = $resultch->fetch_assoc();

          if(count($kostil) == 0) {
            header('Location: ../../frontend/newprogram.html'); // Если преподаватель введён неверно
          }

          $secId = $kostil["user_id"];
          $id = $_SESSION['user']["user_id"];

          $mysql->query("INSERT INTO `programs` (`title`, `duration`) VALUES('$title', '$duration')");

          $result = $mysql->query("SELECT `program_id` FROM `programs` WHERE `title` = '$title'");
          $program_id = $result->fetch_assoc();
          $id2 = $program_id["program_id"];

          $_SESSION['progid'] = $id2;

          $mysql->query("INSERT INTO `userproglink` (`program_id`, `user_id`)
              VALUES('$id2', '$id')");

          $mysql->query("INSERT INTO `userproglink` (`program_id`, `user_id`)
              VALUES('$id2', '$secId')");

          $mysql->close();
          header('Location: ../../frontend/program.html');
        } else {
          echo "string";
          //header('Location: ../../frontend/newprogram.html'); // Если доп препод незаполнен
        }
      } else {
        $id = $_SESSION['user']["user_id"];

        $mysql->query("INSERT INTO `programs` (`title`, `duration`) VALUES('$title', '$duration')");

        $result = $mysql->query("SELECT `program_id` FROM `programs` WHERE `title` = '$title'");
        $program_id = $result->fetch_assoc();
        $id2 = $program_id["program_id"];

        $_SESSION['progid'] = $id2;

        $mysql->query("INSERT INTO `userproglink` (`program_id`, `user_id`)
            VALUES('$id2', '$id')");

        $mysql->close();
        header('Location: ../../frontend/program.html');
      }


    }
?>
