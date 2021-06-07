<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'].'/ElectronicReports/backend/connection.php';
    $mysql = new mysqli($host, $myuser, $mypassword, $database);
    $mysql->query("SET names utf8");

    $kost = $_SESSION['group'];
    $group_id = (int)$kost;

    $mysql->query("DELETE FROM `groupstudlink` WHERE `group_id` = '$group_id'");
    $mysql->query("DELETE FROM `groups` WHERE `group_id` = '$group_id'");

    $kost = $_SESSION['progid'];
    $program_id = (int)$kost;

    $result = $mysql->query("SELECT * FROM `programs` WHERE `program_id` = '$program_id'");
    $kostil = $result->fetch_assoc();

    $count = $kostil["CountGroup"];
    $cc = (int)$count - 1;

    $mysql->query("UPDATE `programs` SET `CountGroup` = '$cc' WHERE `program_id` = '$program_id'");

    $mysql->close();
    header("Location: ../../frontend/program.html");
?>
