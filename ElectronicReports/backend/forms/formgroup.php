<?php
  session_start();
  require_once( "../../fpdf/fpdf.php" );
  $image = "logo.png";

  require_once  $_SERVER['DOCUMENT_ROOT'].'/ElectronicReports/backend/connection.php';
  $mysql = new mysqli($host, $myuser, $mypassword, $database);
  $mysql->query("SET names utf8");
  $group_id = $_POST["taskOption"];


  $prog_id = $_SESSION['progid'];
  $result = $mysql->query("SELECT * FROM `programs` WHERE `program_id` = '$prog_id'");
  $program = $result->fetch_assoc();

  $result = $mysql->query("SELECT * FROM `groups` WHERE `group_id` = '$group_id'");
  $group = $result->fetch_assoc();

  $result = $mysql->query("SELECT * FROM `groupstudlink` WHERE `group_id` = '$group_id'");
  $allstud = array();
  foreach ($result as $value) {
    $allstud[] = $value;
  }

  $str = "Спискок обучающихся программы \"".$program["title"]."\", группа №".$group["groupNum"].":";

  $pdf = new FPDF();
  $pdf->AddPage();
  $pdf->Image( $image, 50, 10, 100 );
  $pdf->AddFont('NewFont','','times-new-roman.php');
  $pdf->SetFont('NewFont','',12);
  $pdf->Cell(40,120,$str);
    $count = 130;
    foreach ($allstud as $value) {
      $val = $value["student_id"];
      $result = $mysql->query("SELECT * FROM `students` WHERE `student_id` = '$val'");
      $print = $result->fetch_assoc();
      $str = $print["LastName"]." ".$print["Name"]." ".$print["Fathers_name"]." ".$print["BirthDate"]." ".$print["CertificateNum"];
      $pdf->Cell(1,$count,$str);
      $count = $count + 10;
    }
  $pdf->Output();
?>
