<?php
    require_once 'connection.php';

    $str = $_SESSION['prog']["CountGroup"] + 1;
    $groupNum = (int)$str;
    //$groupNum = 1;
    $program_id = $_SESSION['progid'];
    $d=(int)($program_id);
    $_SESSION['progidy'] =$d;
    //$program_id = (int)$str1;
    //$program_id = 33;
    //подключимся к бд
    $mysql = new mysqli($host, $myuser, $mypassword, $database);
    $mysql->query("SET names utf8");
    $mysql->query("INSERT INTO `groups` (`groupNum`, `program_id`)
        VALUES('$groupNum', '$d')");
    $mysql->close();
    header('Location: ../Frontend/groupList.html');
?>
