<?php
  session_start();
  require_once( "../../tcpdf_min/tcpdf.php" );
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

  $str = "Спискок обучающихся программы \"".$program["title"]."\". Группа №".$group["groupNum"].":";

  $pdf = new TCPDF();
  $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');
 /* Установка отступов
 - 20 слева
 - 30 справа
 - 20 сверху
 */
 $pdf->SetMargins(20, 30, 20);
 $pdf->AddPage(); // Добавляем страницу
 $pdf->SetXY(20, 50); // Установка текущей точки (в мм)
 $pdf->SetDrawColor(100, 100, 0); // Установка цвета (RGB)
 //$pdf->SetTextColor(200, 0, 0); // Установка цвета текста (RGB)
 /* Выводим надпись.
 - Ширина 30 мм
 - Высота 10 мм
 - Текст "Hello, World"
 */
  $pdf->SetFont ('arial','',12);
 $pdf->Image( $image, 55, 30, 100 );
 $pdf->SetXY(20, 90); // Установка текущей точки (в мм)
 $pdf->Cell(170, 0, $str, 0, $ln=0, 'C', 0, '', 0, false, 'B', 'B');
  $pdf->SetXY(20, 95); // Установка текущей точки (в мм)

$count = 1;
  foreach ($allstud as $value) {
    #  $pdf->Ln( 0 );
    $val = $value["student_id"];
    $result = $mysql->query("SELECT * FROM `students` WHERE `student_id` = '$val'");
    $print = $result->fetch_assoc();
 $pdf->MultiCell ($w = 4, $h = 4.5,
  $txt = $count, $border = array('LTRB' => array('width' => 0.1)), $align = 'C', $fill = 0, $ln = 0,
  $x = '',  $y = '', $reseth = true, $stretch = 0,
  $ishtml = false, $autopadding = true, $maxh = $h,
  $valign = 'M', $fitcell = true);

  $pdf->MultiCell ($w = 35, $h = 4.5,
   $txt = $print["LastName"], $border = array('LTRB' => array('width' => 0.1)), $align = 'C', $fill = 0, $ln = 0,
   $x = '',  $y = '', $reseth = true, $stretch = 0,
   $ishtml = false, $autopadding = true, $maxh = $h,
   $valign = 'M', $fitcell = true);

   $pdf->MultiCell ($w = 25, $h = 4.5,
    $txt = $print["Name"], $border = array('LTRB' => array('width' => 0.1)), $align = 'C', $fill = 0, $ln = 0,
    $x = '',  $y = '', $reseth = true, $stretch = 0,
    $ishtml = false, $autopadding = true, $maxh = $h,
    $valign = 'M', $fitcell = true);

    $pdf->MultiCell ($w = 35, $h = 4.5,
     $txt = $print["Fathers_name"], $border = array('LTRB' => array('width' => 0.1)), $align = 'C', $fill = 0, $ln = 0,
     $x = '',  $y = '', $reseth = true, $stretch = 0,
     $ishtml = false, $autopadding = true, $maxh = $h,
     $valign = 'M', $fitcell = true);

     $pdf->MultiCell ($w = 15, $h = 4.5,
      $txt = $print["BirthDate"], $border = array('LTRB' => array('width' => 0.1)), $align = 'C', $fill = 0, $ln = 0,
      $x = '',  $y = '', $reseth = true, $stretch = 0,
      $ishtml = false, $autopadding = true, $maxh = $h,
      $valign = 'M', $fitcell = true);

    $pdf->MultiCell ($w = 60, $h = 4.5,
     $txt = $print["Address"], $border = array('LTRB' => array('width' => 0.1)), $align = 'C', $fill = 0, $ln = 10,
     $x = '',  $y = '', $reseth = true, $stretch = 0,
     $ishtml = false, $autopadding = true, $maxh = $h,
     $valign = 'M', $fitcell = true);

     $count = $count + 1;

   }

   $link = $_SERVER['DOCUMENT_ROOT'].'/ElectronicReports/reports/';

   $today = date("m.d.y");
   $str = $program["title"].".".$group["groupNum"].".";
   $name = $today.".".$str. "groups.pdf";

 $pdf->Output($link.$name, 'F'); // Выводим в браузер
 $pdf->Output('groups.pdf', 'D');

 if ($_SESSION['status'] == 2){
   $link = "../../frontend/personal.html";
 } else {
   if ($_SESSION['status'] == 1){
     $link = "../../frontend/personalAdmin.html";
   }
 }



 header("Location: ".$link);
?>
