<?php
    require_once 'connection.php';

    session_start();
    $mysql = new mysqli($host, $myuser, $mypassword, $database);
    $mysql->query("SET names utf8");

    $program_id = $_SESSION['progid'];
    $id2=(int)($program_id);

    $result = $mysql->query("SELECT `CountGroup` FROM `programs` WHERE `program_id` = '$id2'");
    $mas = $result->fetch_assoc();
    $cc = 0;
    foreach ($mas as $c){
      $cc = $c;
    }



    if ($cc == 0){
      $groupNum = (int)$cc + 1;
      $mysql->query("UPDATE `programs` SET `CountGroup` = '$groupNum'  WHERE `program_id` = '$program_id'");
      $mysql->query("INSERT INTO `groups` (`groupNum`, `program_id`) VALUES('$groupNum', '$id2')");

      $result1 = $mysql->query("SELECT * FROM `groups` WHERE `program_id` = '$id2' AND `groupNum` = '$groupNum'");

      $mysql->close();
      $kost = $result1->fetch_assoc();
      $_SESSION['group'] = $kost["group_id"];
      header('Location: ../Frontend/groupList.html');
    }
    else{
      $numbers = $mysql->query("SELECT `groupNum` FROM `groups` WHERE `program_id` = '$id2'");
      foreach ($numbers as $value){
        foreach ($value as $val){
          if ($val == $cc){
            $groupNum = (int)$cc + 1;
            $mysql->query("UPDATE `programs` SET `CountGroup` = '$groupNum'  WHERE `program_id` = '$program_id'");
            $mysql->query("INSERT INTO `groups` (`groupNum`, `program_id`) VALUES('$groupNum', '$id2')");

            $result1 = $mysql->query("SELECT * FROM `groups` WHERE `program_id` = '$id2' AND `groupNum` = '$groupNum'");

            $mysql->close();
            $kost = $result1->fetch_assoc();
            $_SESSION['group'] = $kost["group_id"];
            header('Location: ../Frontend/groupList.html');
          }
          else{
            if ($val > $cc){
              $groupNum = (int)$cc + 1;
              $mysql->query("UPDATE `programs` SET `CountGroup` = '$groupNum'  WHERE `program_id` = '$program_id'");
              $groupNum = $val - 1;
              $mysql->query("INSERT INTO `groups` (`groupNum`, `program_id`) VALUES('$groupNum', '$id2')");

              $result = $mysql->query("SELECT `group_id` FROM `groups` WHERE `program_id` = '$id2' AND `groupNum` = '$groupNum'");

              $mysql->close();
              $kost = $result1->fetch_assoc();
              $_SESSION['group'] = $kost["group_id"];
              header('Location: ../Frontend/groupList.html');
            }
          }
        }
      }
    }
?>
