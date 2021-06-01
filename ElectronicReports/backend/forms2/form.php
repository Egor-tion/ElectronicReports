<?php
  session_start();
  require_once( "../../tcpdf_min/tcpdf.php" );

  $nameEvent = $_POST["nameEvent"];
  $titleEvent = $_POST["titleEvent"];
  $descEvent = $_POST["descEvent"];
  $goalEvent = $_POST["goalEvent"];
  $dateEvent = $_POST["dateEvent"];
  $placeEvent = $_POST["placeEvent"];
  $amountEvent = $_POST["amountEvent"];
  $guestsEvent = $_POST["guestsEvent"];
  $regEvent = $_POST["regEvent"];
  $winEvent = $_POST["winEvent"];
  $refEvent = $_POST["refEvent"];

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




  $link = $_SERVER['DOCUMENT_ROOT'].'/ElectronicReports/reports/';

  $today = date("m.d.y");
  $name = $today.".".$nameEvent.".report.pdf";

  $cordY = 30;
  $pdf->SetFont ('arialb','',14);
  $pdf->SetXY(20, $cordY);


   $pdf->MultiCell ($w = 400, $h = 4.5,
    $txt = "Аналитический отчёт:", $border = 0, $align = 'L', $fill = 0, $ln = 25,
    $x = 20,  $y = '', $reseth = true, $stretch = 0,
    $ishtml = false, $autopadding = true, $maxh = $h,
    $valign = 'M', $fitcell = true);


    $pdf->SetFont ('arialb','',12);
    $pdf->MultiCell ($w = 400, $h = 4.5,
     $txt = "Название:", $border = 0, $align = 'L', $fill = 0, $ln = 0,
     $x = 20,  $y = '', $reseth = true, $stretch = 0,
     $ishtml = false, $autopadding = true, $maxh = $h,
     $valign = 'M', $fitcell = true);

   $pdf->SetFont ('arial','',12);
   $pdf->MultiCell ($w = 400, $h = 4.5,
    $txt = $nameEvent, $border = 0, $align = 'L', $fill = 0, $ln = 25,
    $x = 38,  $y = '', $reseth = true, $stretch = 0,
    $ishtml = false, $autopadding = true, $maxh = $h,
    $valign = 'M', $fitcell = true);



    $pdf->SetFont ('arialb','',12);
    $pdf->MultiCell ($w = 400, $h = 4.5,
     $txt = "Тематика:", $border = 0, $align = 'L', $fill = 0, $ln = 0,
     $x = 20,  $y = '', $reseth = true, $stretch = 0,
     $ishtml = false, $autopadding = true, $maxh = $h,
     $valign = 'M', $fitcell = true);


    $pdf->SetFont ('arial','',12);
    $pdf->MultiCell ($w = 400, $h = 4.5,
     $txt = $titleEvent, $border = 0, $align = 'L', $fill = 0, $ln = 25,
     $x = 38,  $y = '', $reseth = true, $stretch = 0,
     $ishtml = false, $autopadding = true, $maxh = $h,
     $valign = 'M', $fitcell = true);

     $pdf->SetFont ('arialb','',12);
     $pdf->MultiCell ($w = 400, $h = 4.5,
      $txt = "Формат мероприятия (краткое описание):", $border = 0, $align = 'L', $fill = 0, $ln = 10,
      $x = 20,  $y = '', $reseth = true, $stretch = 0,
      $ishtml = false, $autopadding = true, $maxh = $h,
      $valign = 'M', $fitcell = true);


     $pdf->SetFont ('arial','',10);
     $pdf->MultiCell ($w = 170, $h = 20,
      $txt = $descEvent, $border = 0, $align = 'L', $fill = 0, $ln = 25,
      $x = '',  $y = '', $reseth = true, $stretch = 0,
      $ishtml = false, $autopadding = true, $maxh = $h,
      $valign = 'M', $fitcell = true);

      $pdf->SetFont ('arialb','',12);
      $pdf->MultiCell ($w = 400, $h = 4.5,
       $txt = "Цель/задачи:", $border = 0, $align = 'L', $fill = 0, $ln = 0,
       $x = 20,  $y = '', $reseth = true, $stretch = 0,
       $ishtml = false, $autopadding = true, $maxh = $h,
       $valign = 'M', $fitcell = true);


      $pdf->SetFont ('arial','',10);
      $pdf->MultiCell ($w = 170, $h = 20,
       $txt = $placeEvent, $border = 0, $align = 'L', $fill = 0, $ln = 25,
       $x = 20,  $y = '', $reseth = true, $stretch = 0,
       $ishtml = false, $autopadding = true, $maxh = $h,
       $valign = 'M', $fitcell = true);

     $pdf->SetFont ('arialb','',12);
     $pdf->MultiCell ($w = 400, $h = 4.5,
      $txt = "Дата проведения:", $border = 0, $align = 'L', $fill = 0, $ln = 0,
      $x = 20,  $y = '', $reseth = true, $stretch = 0,
      $ishtml = false, $autopadding = true, $maxh = $h,
      $valign = 'M', $fitcell = true);


     $pdf->SetFont ('arial','',12);
     $pdf->MultiCell ($w = 170, $h = 4.5,
      $txt = $dateEvent, $border = 0, $align = 'L', $fill = 0, $ln = 25,
      $x = 52,  $y = '', $reseth = true, $stretch = 0,
      $ishtml = false, $autopadding = true, $maxh = $h,
      $valign = 'M', $fitcell = true);

      $pdf->SetFont ('arialb','',12);
      $pdf->MultiCell ($w = 400, $h = 4.5,
       $txt = "Место проведения:", $border = 0, $align = 'L', $fill = 0, $ln = 0,
       $x = 20,  $y = '', $reseth = true, $stretch = 0,
       $ishtml = false, $autopadding = true, $maxh = $h,
       $valign = 'M', $fitcell = true);


      $pdf->SetFont ('arial','',12);
      $pdf->MultiCell ($w = 170, $h = 4.5,
       $txt = $placeEvent, $border = 0, $align = 'L', $fill = 0, $ln = 25,
       $x = 55,  $y = '', $reseth = true, $stretch = 0,
       $ishtml = false, $autopadding = true, $maxh = $h,
       $valign = 'M', $fitcell = true);

      $pdf->SetFont ('arialb','',12);
      $pdf->MultiCell ($w = 400, $h = 4.5,
       $txt = "Участники:", $border = 0, $align = 'L', $fill = 0, $ln = 10,
       $x = 20,  $y = '', $reseth = true, $stretch = 0,
       $ishtml = false, $autopadding = true, $maxh = $h,
       $valign = 'M', $fitcell = true);


      $pdf->SetFont ('arial','',10);
      $pdf->MultiCell ($w = 170, $h = 30,
       $txt = $amountEvent, $border = 0, $align = 'L', $fill = 0, $ln = 25,
       $x = 20,  $y = '', $reseth = true, $stretch = 0,
       $ishtml = false, $autopadding = true, $maxh = $h,
       $valign = 'M', $fitcell = true);

       $pdf->SetFont ('arialb','',12);
       $pdf->MultiCell ($w = 400, $h = 4.5,
        $txt = "Приглашенные спикеры/гости/заказчики/специалисты:", $border = 0, $align = 'L', $fill = 0, $ln = 10,
        $x = 20,  $y = '', $reseth = true, $stretch = 0,
        $ishtml = false, $autopadding = true, $maxh = $h,
        $valign = 'M', $fitcell = true);


       $pdf->SetFont ('arial','',10);
       $pdf->MultiCell ($w = 170, $h = 30,
        $txt = $guestsEvent, $border = 0, $align = 'L', $fill = 0, $ln = 25,
        $x = 20,  $y = '', $reseth = true, $stretch = 0,
        $ishtml = false, $autopadding = true, $maxh = $h,
        $valign = 'M', $fitcell = true);

        $pdf->SetFont ('arialb','',12);
        $pdf->MultiCell ($w = 400, $h = 4.5,
         $txt = "Представленные районы/регионы:", $border = 0, $align = 'L', $fill = 0, $ln = 10,
         $x = 20,  $y = '', $reseth = true, $stretch = 0,
         $ishtml = false, $autopadding = true, $maxh = $h,
         $valign = 'M', $fitcell = true);


        $pdf->SetFont ('arial','',10);
        $pdf->MultiCell ($w = 170, $h = 40,
         $txt = $regEvent, $border = 0, $align = 'L', $fill = 0, $ln = 25,
         $x = 20,  $y = '', $reseth = true, $stretch = 0,
         $ishtml = false, $autopadding = true, $maxh = $h,
         $valign = 'M', $fitcell = true);

         $pdf->SetFont ('arialb','',12);
         $pdf->MultiCell ($w = 400, $h = 4.5,
          $txt = "Победители/призеры:", $border = 0, $align = 'L', $fill = 0, $ln = 10,
          $x = 20,  $y = '', $reseth = true, $stretch = 0,
          $ishtml = false, $autopadding = true, $maxh = $h,
          $valign = 'M', $fitcell = true);


         $pdf->SetFont ('arial','',10);
         $pdf->MultiCell ($w = 170, $h = 30,
          $txt = $winEvent, $border = 0, $align = 'L', $fill = 0, $ln = 25,
          $x = 20,  $y = '', $reseth = true, $stretch = 0,
          $ishtml = false, $autopadding = true, $maxh = $h,
          $valign = 'M', $fitcell = true);

          $pdf->SetFont ('arialb','',12);
          $pdf->MultiCell ($w = 400, $h = 4.5,
           $txt = "Ссылка на пресс-релиз в социальных сетях:", $border = 0, $align = 'L', $fill = 0, $ln = 10,
           $x = 20,  $y = '', $reseth = true, $stretch = 0,
           $ishtml = false, $autopadding = true, $maxh = $h,
           $valign = 'M', $fitcell = true);


          $pdf->SetFont ('arial','',10);
          $pdf->MultiCell ($w = 170, $h = 10,
           $txt = $refEvent, $border = 0, $align = 'L', $fill = 0, $ln = 25,
           $x = 20,  $y = '', $reseth = true, $stretch = 0,
           $ishtml = false, $autopadding = true, $maxh = $h,
           $valign = 'M', $fitcell = true);



$pdf->Output($link.$name, 'F'); // Выводим в браузер
$pdf->Output($name, 'D');

if ($_SESSION['status'] == 2){
  $link = "../../frontend/personal.html";
} else {
  if ($_SESSION['status'] == 1){
    $link = "../../frontend/personalAdmin.html";
  }
}



header("Location: ".$link);
?>
