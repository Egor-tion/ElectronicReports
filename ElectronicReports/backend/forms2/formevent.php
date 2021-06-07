<?php
  session_start();
  require_once( "../../tcpdf_min/tcpdf.php" );

  $nameEvent = $_POST["nameEvent"];
  $dateEvent = $_POST["dateEvent"];
  $titleEvent = $_POST["titleEvent"];
  $placeEvent = $_POST["placeEvent"];
  $descEvent = $_POST["descEvent"];
  $forEvent = $_POST["forEvent"];
  $amountEvent = $_POST["amountEvent"];
  $guestsEvent = $_POST["guestsEvent"];
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


     $pdf->MultiCell ($w = 170, $h = 14,
      $txt = "Отчёт о проведении мероприятия:", $border = 0, $align = 'C', $fill = 0, $ln = 25,
      $x = 20,  $y = '', $reseth = true, $stretch = 0,
      $ishtml = false, $autopadding = true, $maxh = $h,
      $valign = 'M', $fitcell = true);


      $pdf->SetFont ('arial','',10);
      $pdf->MultiCell ($w = 40, $h = 10,
       $txt = "Название мероприятия", $border = array('LTRB' => array('width' => 0.1)), $align = 'L', $fill = 0, $ln = 0,
       $x = '',  $y = '', $reseth = true, $stretch = 0,
       $ishtml = false, $autopadding = true, $maxh = $h,
       $valign = 'M', $fitcell = true);

       $pdf->SetFont ('arial','',10);
       $pdf->MultiCell ($w = 130, $h = 10,
        $txt = $nameEvent, $border = array('LTRB' => array('width' => 0.1)), $align = 'C', $fill = 0, $ln = 1,
        $x = '',  $y = '', $reseth = true, $stretch = 0,
        $ishtml = false, $autopadding = true, $maxh = $h,
        $valign = 'M', $fitcell = true);

        $pdf->SetFont ('arial','',10);
        $pdf->MultiCell ($w = 40, $h = 10,
         $txt = "Дата проведения", $border = array('LTRB' => array('width' => 0.1)), $align = 'L', $fill = 0, $ln = 0,
         $x = '',  $y = '', $reseth = true, $stretch = 0,
         $ishtml = false, $autopadding = true, $maxh = $h,
         $valign = 'M', $fitcell = true);

         $pdf->SetFont ('arial','',10);
         $pdf->MultiCell ($w = 130, $h = 10,
          $txt = $dateEvent, $border = array('LTRB' => array('width' => 0.1)), $align = 'C', $fill = 0, $ln = 1,
          $x = '',  $y = '', $reseth = true, $stretch = 0,
          $ishtml = false, $autopadding = true, $maxh = $h,
          $valign = 'M', $fitcell = true);

          $pdf->SetFont ('arial','',10);
          $pdf->MultiCell ($w = 40, $h = 10,
           $txt = "Тематика мероприятия", $border = array('LTRB' => array('width' => 0.1)), $align = 'L', $fill = 0, $ln = 0,
           $x = '',  $y = '', $reseth = true, $stretch = 0,
           $ishtml = false, $autopadding = true, $maxh = $h,
           $valign = 'M', $fitcell = true);

           $pdf->SetFont ('arial','',10);
           $pdf->MultiCell ($w = 130, $h = 10,
            $txt = $titleEvent, $border = array('LTRB' => array('width' => 0.1)), $align = 'C', $fill = 0, $ln = 1,
            $x = '',  $y = '', $reseth = true, $stretch = 0,
            $ishtml = false, $autopadding = true, $maxh = $h,
            $valign = 'M', $fitcell = true);

            $pdf->SetFont ('arial','',10);
            $pdf->MultiCell ($w = 40, $h = 10,
             $txt = "Место проведения", $border = array('LTRB' => array('width' => 0.1)), $align = 'L', $fill = 0, $ln = 0,
             $x = '',  $y = '', $reseth = true, $stretch = 0,
             $ishtml = false, $autopadding = true, $maxh = $h,
             $valign = 'M', $fitcell = true);

             $pdf->SetFont ('arial','',10);
             $pdf->MultiCell ($w = 130, $h = 10,
              $txt = $placeEvent, $border = array('LTRB' => array('width' => 0.1)), $align = 'C', $fill = 0, $ln = 1,
              $x = '',  $y = '', $reseth = true, $stretch = 0,
              $ishtml = false, $autopadding = true, $maxh = $h,
              $valign = 'M', $fitcell = true);


              $pdf->SetFont ('arial','',10);
              $pdf->MultiCell ($w = 40, $h = 50,
               $txt = "Формат мероприятия (краткое описание)", $border = array('LTRB' => array('width' => 0.1)), $align = 'L', $fill = 0, $ln = 0,
               $x = '',  $y = '', $reseth = true, $stretch = 0,
               $ishtml = false, $autopadding = true, $maxh = $h,
               $valign = 'M', $fitcell = true);

               $pdf->SetFont ('arial','',10);
               $pdf->MultiCell ($w = 130, $h = 50,
                $txt = $placeEvent, $border = array('LTRB' => array('width' => 0.1)), $align = 'C', $fill = 0, $ln = 1,
                $x = '',  $y = '', $reseth = true, $stretch = 0,
                $ishtml = false, $autopadding = true, $maxh = $h,
                $valign = 'M', $fitcell = true);

                $pdf->SetFont ('arial','',10);
                $pdf->MultiCell ($w = 40, $h = 40,
                 $txt = "Для кого", $border = array('LTRB' => array('width' => 0.1)), $align = 'L', $fill = 0, $ln = 0,
                 $x = '',  $y = '', $reseth = true, $stretch = 0,
                 $ishtml = false, $autopadding = true, $maxh = $h,
                 $valign = 'M', $fitcell = true);

                 $pdf->SetFont ('arial','',10);
                 $pdf->MultiCell ($w = 130, $h = 40,
                  $txt = $forEvent, $border = array('LTRB' => array('width' => 0.1)), $align = 'C', $fill = 0, $ln = 1,
                  $x = '',  $y = '', $reseth = true, $stretch = 0,
                  $ishtml = false, $autopadding = true, $maxh = $h,
                  $valign = 'M', $fitcell = true);

                  $pdf->SetFont ('arial','',10);
                  $pdf->MultiCell ($w = 40, $h = 40,
                   $txt = "Количество участников", $border = array('LTRB' => array('width' => 0.1)), $align = 'L', $fill = 0, $ln = 0,
                   $x = '',  $y = '', $reseth = true, $stretch = 0,
                   $ishtml = false, $autopadding = true, $maxh = $h,
                   $valign = 'M', $fitcell = true);

                   $pdf->SetFont ('arial','',10);
                   $pdf->MultiCell ($w = 130, $h = 40,
                    $txt = $amountEvent, $border = array('LTRB' => array('width' => 0.1)), $align = 'C', $fill = 0, $ln = 1,
                    $x = '',  $y = '', $reseth = true, $stretch = 0,
                    $ishtml = false, $autopadding = true, $maxh = $h,
                    $valign = 'M', $fitcell = true);

                    $pdf->SetFont ('arial','',10);
                    $pdf->MultiCell ($w = 40, $h = 50,
                     $txt = "Приглашенные спикеры/гости/заказчики/специалисты", $border = array('LTRB' => array('width' => 0.1)), $align = 'L', $fill = 0, $ln = 0,
                     $x = '',  $y = '', $reseth = true, $stretch = 0,
                     $ishtml = false, $autopadding = true, $maxh = $h,
                     $valign = 'M', $fitcell = true);

                     $pdf->SetFont ('arial','',10);
                     $pdf->MultiCell ($w = 130, $h = 50,
                      $txt = $guestsEvent, $border = array('LTRB' => array('width' => 0.1)), $align = 'C', $fill = 0, $ln = 1,
                      $x = '',  $y = '', $reseth = true, $stretch = 0,
                      $ishtml = false, $autopadding = true, $maxh = $h,
                      $valign = 'M', $fitcell = true);

                      $pdf->SetFont ('arial','',10);
                      $pdf->MultiCell ($w = 40, $h = 10,
                       $txt = "Ссылка на пресс-релиз в социальных сетях", $border = array('LTRB' => array('width' => 0.1)), $align = 'L', $fill = 0, $ln = 0,
                       $x = '',  $y = '', $reseth = true, $stretch = 0,
                       $ishtml = false, $autopadding = true, $maxh = $h,
                       $valign = 'M', $fitcell = true);

                       $pdf->SetFont ('arial','',10);
                       $pdf->MultiCell ($w = 130, $h = 10,
                        $txt = $refEvent, $border = array('LTRB' => array('width' => 0.1)), $align = 'C', $fill = 0, $ln = 1,
                        $x = '',  $y = '', $reseth = true, $stretch = 0,
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
