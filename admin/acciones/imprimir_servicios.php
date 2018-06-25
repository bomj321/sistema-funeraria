<?php
$usuarioid = $_GET['id'];
require_once('../connect.php');
include('fpdf_plantilla.php');

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


$sql = "SELECT * FROM User_servicios_individuales WHERE idUser = '$usuarioid'";
      $resultado= mysqli_query($connection, $sql); 
            $fila =mysqli_fetch_array($resultado);
            
            $planid =$fila['idUser'];

            $sql_servicios = "SELECT * FROM Servicios INNER JOIN user_has_services ON user_has_services.servicio_id_servicios = Servicios.id_servicios && user_has_services.servicios_id_user= $planid ";
               $resultado_servicios= mysqli_query($connection, $sql_servicios);
               $fila_servicio_consulta= mysqli_num_rows($resultado_servicios);


             $sql_total_servicios ="SELECT SUM(precio_total) AS value_sum FROM user_has_services INNER JOIN Servicios ON user_has_services.servicio_id_servicios = Servicios.id_servicios && user_has_services.servicios_id_user= $planid";
                    $resultado_total_servicios= mysqli_query($connection, $sql_total_servicios);
                    $row_servicio = mysqli_fetch_assoc($resultado_total_servicios);
                    $sum_servicio = $row_servicio['value_sum'];

               $sql_productos = "SELECT * FROM stock INNER JOIN user_has_products ON user_has_products.stock_id_stock = stock.id && user_has_products.products_id_user= $planid ";
                    $resultado_productos= mysqli_query($connection, $sql_productos);
                    $fila_producto_consulta= mysqli_num_rows($resultado_productos);

                    $sql_total_productos ="SELECT SUM(precio_total) AS value_sum FROM user_has_products INNER JOIN stock ON user_has_products.stock_id_stock = stock.id && user_has_products.products_id_user= $planid";
                    $resultado_total_productos= mysqli_query($connection, $sql_total_productos);
                    $row_producto = mysqli_fetch_assoc($resultado_total_productos);
                    $sum_producto = $row_producto['value_sum'];
                    $sum = $sum_servicio + $sum_producto;

/*CIERRO MULTIPLES CONSULTAS*/    

/*************************PARTE PRODUCTOS****************************************/
$pdf= new PDF_AutoPrint('P','mm',array(58,150));
$pdf->AliasNbPages();
$pdf->AddPage();
if ($fila_producto_consulta>0) {
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(10,6,'Cant.',0,0,'C',1);
	$pdf->Cell(20,6,'Producto',0,0,'C',1);
	$pdf->Cell(10,6,'Total',0,1,'C',1);

	$pdf->SetFont('Arial','',5);
	while($row = $resultado_productos->fetch_assoc())
	{
		
	$pdf->Cell(10,6,$row['cantidad_comprada'],0,0,'C');
	$pdf->Cell(20,6,utf8_decode($row['objeto']),0,0,'C');
	$pdf->Cell(10,6,'RD$'.$row['cantidad_comprada']*$row['precio_total'].',00',0,1,'C');
	}
	$pdf->SetFont('Arial','B',5);
	$pdf->SetX(21);
	$pdf->Cell(15,6,'Subtotal',0,0,'C',0);
    $pdf->SetX(40);
	$pdf->Cell(10,6,'RD$'.$sum_producto.',00',0,1,'C',0);
	
}else{
	
	
}
/*************************PARTE PRODUCTOS CIERRO****************************************/
$pdf->Ln(5);
/*************************PARTE SERVICIOS****************************************/
/*$pdf->AliasNbPages();*/
if ($fila_servicio_consulta>0) {
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,6,'Cant.',0,0,'C',1);
$pdf->Cell(20,6,'Servicio',0,0,'C',1);
$pdf->Cell(10,6,'Total',0,1,'C',1);

$pdf->SetFont('Arial','',5);

while($row = $resultado_servicios->fetch_assoc())
{
	
$pdf->Cell(10,6,$row['cantidad_servicio'],0,0,'C');
$pdf->Cell(20,6,utf8_decode($row['descripcion_servicio']),0,0,'C');
$pdf->Cell(10,6,'RD$'.$row['cantidad_servicio']*$row['precio_total'].',00',0,1,'C');
}
$pdf->SetFont('Arial','B',5);
$pdf->SetX(21);
$pdf->Cell(15,6,'Subtotal',0,0,'C',0);
$pdf->SetX(40); 
$pdf->Cell(10,6,'RD$'.$sum_servicio.',00',0,1,'C',0);
}else{

}
/*************************PARTE SERVICIOS CIERRO****************************************/
$pdf->Ln(5);
if (!$fila_servicio_consulta AND !$fila_producto_consulta) {
	$pdf->Cell(40,10, 'No hay Nada para Vender',0,1,'C');
}else{
$pdf->SetX(15); 
$pdf->Cell(30,6,'Total de la Factura',0,0,'C',0);
$pdf->SetX(40);
$pdf->Cell(10,6,'RD$'.$sum.',00',0,1,'C',0);
}
$pdf->Ln(5);
$pdf->Cell(40,10, 'Gracias por su Compra!!!',0,1,'C');
/*$pdf->AutoPrint();*/
$pdf->AutoPrint();
$pdf->Output();
 ?>

