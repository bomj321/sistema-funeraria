<?php
$usuarioid = $_GET['id_user'];
$cuotaid = $_GET['id_cuota'];
require_once('../connect.php');
/*LIMPIEZA DE VARIABLES*/
$usuarioid_limpio = mysqli_escape_string($connection,$usuarioid);
$cuotaid_limpio = mysqli_escape_string($connection,$cuotaid);

/*LIMPIEZA DE VARIABLES*/

include('fpdf_plantilla_cuotas_header.php');

class PDF_AutoPrint extends PDF
{
   function AutoPrint($printer='')
    {
        // Open the print dialog
        if($printer)
        {
            $printer = str_replace('\\', '\\\\', $printer);
            $script = "var pp = getPrintParams();";
            $script .= "pp.interactive = pp.constants.interactionLevel.full;";
            $script .= "pp.printerName = '$printer'";
            $script .= "print(pp);";
        }
        else
            $script = 'print(true);';
        $this->IncludeJS($script);
    }
}


$sql_usuario= "SELECT * FROM User WHERE idUser = '$usuarioid_limpio'";
      $resultado= mysqli_query($connection, $sql_usuario); 
            

$sql_cuota = "SELECT * FROM Pagos WHERE id_pagos='$cuotaid_limpio' AND User_id='$usuarioid_limpio' ";
               $resultado_cuota= mysqli_query($connection, $sql_cuota);

/*CIERRO MULTIPLES CONSULTAS*/    

/*************************PARTE PRODUCTOS****************************************/
/*$pdf= new PDF_AutoPrint('P','mm',array(58,150));*/
$pdf= new PDF('P','mm',array(58,95));
/*$pdf->AliasNbPages();*/
$pdf->AddPage();
 $row_user=$resultado->fetch_assoc();
  $pdf->SetFillColor(232,232,232);
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(13,6,'Cliente:',0,0,'C',0);
  $pdf->Cell(16,6,utf8_decode($row_user['nombre']),0,1,'C',0);
  $row_cuota=$resultado_cuota->fetch_assoc();
  $pdf->Cell(22,6,'Cuota numero:',0,0,'C',0);
  $pdf->Cell(1,6,utf8_decode($row_cuota['numero_cuota']),0,0,'C',0);
  $pdf->Cell(18,6,'('.utf8_decode($row_cuota['fecha']).')',0,1,'C',0);
  $pdf->Cell(22,6,'Monto Pagado:',0,0,'C',0);
  $pdf->Cell(18,6,'RD$'. utf8_decode($row_cuota['pago']).',00',0,1,'C',0);
  $hoy = date('d-m-Y');
  $pdf->Cell(16,6,'Pagada el:',0,0,'C',0);
  $pdf->Cell(27,6,$hoy,0,1,'C',0);
 
  
    
  
  
mysqli_close($connection);
/*************************PARTE PRODUCTOS CIERRO****************************************/

$pdf->Cell(40,10, 'Gracias por Preferirnos!!!',0,1,'C');

$pdf->AutoPrint();
$pdf->Output();
 ?>

