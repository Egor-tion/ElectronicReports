<?php
  session_start();
  require_once $_SERVER['DOCUMENT_ROOT'].'/ElectronicReports/backend/connection.php';
  $mysql = new mysqli($host, $myuser, $mypassword, $database);
  $mysql->query("SET names utf8");

  $kost = $_GET['stud_id'];
  $student_id = (int)$kost;

  $result = $mysql->query("SELECT * FROM `students` WHERE `student_id` = '$student_id'");
  $kostil = $result->fetch_assoc();

  $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
  if ($name != $kostil["Name"]){
    $mysql->query("UPDATE `students` SET `Name` = '$name' WHERE `student_id` = '$student_id'");
  }

  $lastname = filter_var(trim($_POST['lastname']), FILTER_SANITIZE_STRING);
  if ($lastname != $kostil["Lastname"]){
    $mysql->query("UPDATE `students` SET `Lastname` = '$lastname' WHERE `student_id` = '$student_id'");
  }

  $fathers_name = filter_var(trim($_POST['fathers_name']), FILTER_SANITIZE_STRING);
  if ($fathers_name != $kostil["Fathers_name"]){
    $mysql->query("UPDATE `students` SET `Fathers_name` = '$fathers_name' WHERE `student_id` = '$student_id'");
  }

  $birthdate = $_POST['birthdate'];
  if ($birthdate != $kostil["BirthDate"]){
    $mysql->query("UPDATE `students` SET `BirthDate` = '$birthdate' WHERE `student_id` = '$student_id'");
  }

  $certificatenum = $_POST['certificatenum'];
  if ($certificatenum != $kostil["CertificateNum"]){
    $mysql->query("UPDATE `students` SET `CertificateNum` = '$certificatenum' WHERE `student_id` = '$student_id'");
  }

  $address = $_POST['address'];
  if ($address != $kostil["Address"]){
    $mysql->query("UPDATE `students` SET `Address` = '$address' WHERE `student_id` = '$student_id'");
  }

  $telephonnum = $_POST['telephonnum'];
  if ($telephonnum != $kostil["TelephonNum"]){
    $mysql->query("UPDATE `students` SET `TelephonNum` = '$telephonnum' WHERE `student_id` = '$student_id'");
  }

  $snils = $_POST['snils'];
  if ($snils != $kostil["Snils"]){
    $mysql->query("UPDATE `students` SET `Snils` = '$snils' WHERE `student_id` = '$student_id'");
  }
      $mysql->close();
      header("Location: ".$_SERVER['HTTP_REFERER']);
?>
