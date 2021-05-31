<?php
  session_start();
  require_once( "../../fpdf/fpdf.php" );
  $image = "logo.png";

  require_once  $_SERVER['DOCUMENT_ROOT'].'/ElectronicReports/backend/connection.php';
  $mysql = new mysqli($host, $myuser, $mypassword, $database);
  $mysql->query("SET names utf8");
  $group_id = $_POST["taskOption"];

  $textColour = array( 0, 0, 0 );
  $headerColour = array( 100, 100, 100 );
  $tableHeaderTopTextColour = array( 255, 255, 255 );
  $tableHeaderTopFillColour = array( 125, 152, 179 );
  $tableHeaderTopProductTextColour = array( 0, 0, 0 );
  $tableHeaderTopProductFillColour = array( 143, 173, 204 );
  $tableHeaderLeftTextColour = array( 99, 42, 57 );
  $tableHeaderLeftFillColour = array( 184, 207, 229 );
  $tableBorderColour = array( 50, 50, 50 );
  $tableRowFillColour = array( 213, 170, 170 );

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
    $pdf->Ln( 50 );
  $pdf->Cell(1,5,$str, 0, 2, 'L', false);
    $count = 1;
    foreach ($allstud as $value) {
      #  $pdf->Ln( 0 );
      $val = $value["student_id"];
      $result = $mysql->query("SELECT * FROM `students` WHERE `student_id` = '$val'");
      $print = $result->fetch_assoc();
      $text=$print["Fathers_name"];
      $ff = iconv('utf-8', 'CP1251', $text);
      $cod = mb_detect_encoding($ff);
      //echo $cod;
      $text = "sss";
      $ff = iconv('utf-8', 'CP1251', $text);
#$ff =  mb_convert_encoding($f,'UTF-8');$f =  mb_convert_encoding($ff,'Unicode');
      $pdf->MultiCell(5,5,$ff, 'LBR');
      $pdf->Cell(30,5,$print["LastName"], 1, 'C', false);
      $pdf->Cell(20,5,$cod, 1, 'C', false);
      $pdf->Cell(20,5,$print["Fathers_name"], 1, 0, 'C', false);
      $pdf->Cell(30,5,$print["BirthDate"], 1, 0, 'C', false);
      $pdf->Cell(85,5,$print["Address"], 1, 1, 'C', false);

      $count = $count +1;
    #  $pdf->Ln( 1 );
    }


// Ячейка "PRODUCT"
$pdf->SetTextColor( $tableHeaderTopProductTextColour[0], $tableHeaderTopProductTextColour[1], $tableHeaderTopProductTextColour[2] );
$pdf->SetFillColor( $tableHeaderTopProductFillColour[0], $tableHeaderTopProductFillColour[1], $tableHeaderTopProductFillColour[2] );
$pdf->Cell( 46, 12, " PRODUCT", 0, 1, 'L', false);

// Остальные ячейки заголовков
$pdf->SetTextColor( $tableHeaderTopTextColour[0], $tableHeaderTopTextColour[1], $tableHeaderTopTextColour[2] );
$pdf->SetFillColor( $tableHeaderTopFillColour[0], $tableHeaderTopFillColour[1], $tableHeaderTopFillColour[2] );

for ( $i=1; $i<12; $i++ ) {
  #$pdf->Cell( 1, 1, $i, 1, 0, 'L', true );
#aszswaq  $pdf->Ln( 15 );

}

$pdf->Ln( 12 );
  $pdf->Output('D','jopa.pdf');
?>
