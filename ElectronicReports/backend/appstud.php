<?php
session_start();
require_once '../backend/connection.php';
$mysql = new mysqli($host, $myuser, $mypassword, $database);
$mysql->query("SET names utf8");

$kost = $_GET['stud_id'];
$student_id = (int)$kost;

$kost = $_SESSION['group'];
$id = (int)$kost;
$mysql->query("INSERT INTO `groupstudlink` (`student_id`, `group_id`) VALUES('$student_id', '$id')");
header('Location: ../frontend/groupList.html');

?>
