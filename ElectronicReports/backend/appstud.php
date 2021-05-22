<?php
require_once '../backend/connection.php';
$mysql = new mysqli($host, $myuser, $mypassword, $database);
$mysql->query("SET names utf8");

$student_id = $_GET('stud_id')

$mysql->query("INSERT INTO `groupstudlink` (`student_id`, `EmploymentDate`)
    VALUES('$student_id', '$employmentDate')");

?>
