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
      $_SESSION['aut'] = 2;
      header('Location: ../../frontend/newprogram.html');  // ЕСЛИ НАЗВАНИЕ ПОВТОРЯЕТСЯ, ТО НИЗЯ СОЗДАТЬ
    }else{
      if ($_POST['checkbox1'] == 'on'){
        if ( !(empty($_POST['secName'])) and !(empty($_POST['secLast'])) and !(empty($_POST['secFather'])) ) {
          $secName = $_POST['secName'];
          $secLast = $_POST['secLast'];
          $secFather = $_POST['secFather']; // Проверить введенного преподавателя

          $resultch = $mysql->query("SELECT * FROM `userss`
            WHERE `Name` = '$secName' and `Lastname` = '$secLast' and `Fathers_name` = '$secFather'");
          $kostil = $resultch->fetch_assoc();

          $trfl = empty($kostil);
          if($trfl) {
            $_SESSION['aut'] = 3;
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
          $_SESSION['aut'] = 0;
          header('Location: ../../frontend/program.html');
        } else {
          $_SESSION['aut'] = 3;
          header('Location: ../../frontend/newprogram.html'); // Если доп препод незаполнен
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
        $_SESSION['aut'] = 0;
        header('Location: ../../frontend/program.html');
      }


    }
?>
