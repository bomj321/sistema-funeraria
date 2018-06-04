<?php
require_once('../connect.php');
$usuarioid = $connection->real_escape_string($_GET['id']);
include('fpdf_plantilla_contrato.php');

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

/////////////////////////////////////////DESCUENTO//////////////////////////////////
                    $sql_contrato = "SELECT * FROM User WHERE idUser=$usuarioid ";
                    $resultado_contrato= mysqli_query($connection, $sql_contrato);
                    $row_contrato = mysqli_fetch_assoc($resultado_contrato);
                    $sum_total = 0;
                    $sum_descuento = $row_contrato['descuento'];

                /////////////////////////////////////////DESCUENTO//////////////////////////////////

                /////////////////////////////////////////COST PLANES//////////////////////////////////

                    $sql_total_planes ="SELECT SUM(precio_total) AS value_planes FROM User_has_planes WHERE User_idUser=$usuarioid";
                    $resultado_total_planes= mysqli_query($connection, $sql_total_planes);
                    $row_contrato_planes = mysqli_fetch_assoc($resultado_total_planes);
                    $sum_total_planes = $row_contrato_planes['value_planes'];
                /////////////////////////////////////////COST PLANES CIERRO//////////////////////////////////
                
                
                /////////////////////////////////////////SERVICIOS ADICIONALES//////////////////////////////////

                    $sql_total_servicio ="SELECT * FROM User_has_Servicios_Adicionales WHERE User_idUser=$usuarioid";
                    $resultado_total_servicio= mysqli_query($connection, $sql_total_servicio);
                    $sumador_total_servicios=0;
                    while ($row_contrato_servicio = mysqli_fetch_array($resultado_total_servicio)) {
                      $cantidad_servicio=$row_contrato_servicio['cantidad_servicios'];
                      $costo_servicio=$row_contrato_servicio['costo'];
                      $total_servicio=$costo_servicio*$cantidad_servicio;
                      $sumador_total_servicios+=$total_servicio; 
                    }
                    
                    
                /////////////////////////////////////////SERVICIOS ADICIONALES CIERRO//////////////////////////////////
                
                
                /////////////////////////////////////////FAMILIARES INDEPENDIENTE//////////////////////////////////

                    $sql_total_contrato ="SELECT SUM(costo_adicional) AS value_sum FROM User_family_independent WHERE User_idUser= $usuarioid";
                    $resultado_total_contrato= mysqli_query($connection, $sql_total_contrato);
                    $row_contrato_familiares = mysqli_fetch_assoc($resultado_total_contrato);
                    $sum_total_familiares = $row_contrato_familiares['value_sum'];
                    $sum = ($sum_total + $sum_total_familiares+$sum_total_planes+$sumador_total_servicios)- (($sum_total_planes+$sum_total + $sum_total_familiares+$sumador_total_servicios) * ($sum_descuento/100));
                /////////////////////////////////////////FAMILIARES INDEPENDIENTE CIERRO//////////////////////////////////





/*CIERRO MULTIPLES CONSULTAS*/    

$pdf= new PDF_AutoPrint('P','mm','A4');
/*$pdf->AliasNbPages();*/
$pdf->AddPage();
$pdf->Image('../img/logo.png', 55, 8, 100);
			$pdf->SetFont('Arial','B',10);
			$pdf->Ln(25);
			$pdf->SetX(55);
			$pdf->Cell(100,10, 'Calle Santome # 102,  Tel.:809-521-3511,  Cel.:809-250-3711  y  809-627-7485
 			Azua R.D.',0,1,'C');
			$pdf->Ln(0);
$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(80,77,208);
$pdf->SetFillColor(232,232,232);
$pdf->MultiCell(180,6,utf8_decode('En la Protectora San José, ubicada en la casa #102, de la calle Santome, en esta ciudad de Azua, R.D.,  y el (la) Sr.(a). ').$row_contrato['name'].' domiciliado(a) y residente en Republica Dominicana, con el telefono '.$row_contrato['numero'].', de edad '.$row_contrato['edad'].', estado civil '.$row_contrato['estado_civil'].utf8_decode(' cuyo numero de identicación es ').$row_contrato['dni'].' y email '.$row_contrato['email'].', el (la) cual tiene el contrato numero '.$row_contrato['idUser'].' cuyo costo total es de '.$sum.'$.',0,'FJ',0);
$pdf->Ln(10);
$pdf->SetTextColor(231,14,14);
$pdf->Cell(180,6,'HAN PACTADO Y CONVENIDO LO SIGUIENTE',0,0,'C',0);
$pdf->SetTextColor(80,77,208);
$pdf->Ln(10);
$pdf->MultiCell(180,6,utf8_decode('A) El señor(a). '.$row_contrato['name'].' y demás miembros de su familia, los cuales se detallan a continuación:'),0,'L',0);
$pdf->Ln(5);
/*************************FAMILIARES DEPENDIENTES**************************************/
	$sql_familiaresde = "SELECT * FROM User_family WHERE User_idUser = $usuarioid";
	$resultado_familiaresde= mysqli_query($connection, $sql_familiaresde);
/*************************FAMILIARES DEPENDIENTES CIERRO**************************************/
 if (mysqli_num_rows($resultado_familiaresde)>0) {
$pdf->Cell(180,6,'DEPENDIENTES',0,0,'C',0);
$pdf->Ln(10);
$pdf->Cell(60,6,'Parentezco',0,0,'C',1);
$pdf->Cell(60,6,'Nombre',0,0,'C',1);
$pdf->Cell(60,6,'Edad',0,1,'C',1);
	while($row = $resultado_familiaresde->fetch_assoc())
	{		
	$pdf->Cell(60,6,utf8_decode($row['Parentezco']),0,0,'C');
	$pdf->Cell(60,6,utf8_decode($row['nombre']),0,0,'C');
	$pdf->Cell(60,6,$row['edad'],0,1,'C');
	}
}else{
	$pdf->SetTextColor(231,14,14);
	$pdf->Cell(180,10, 'No hay Familiares Dependientes Inscritos',0,1,'C');
}
$pdf->Ln(5);
$pdf->SetTextColor(80,77,208);
/*************************FAMILIARES INDEPENDIENTES**************************************/
	$sql_familiaresde = "SELECT * FROM User_family_independent WHERE User_idUser = $usuarioid";
	$resultado_familiaresde= mysqli_query($connection, $sql_familiaresde);
/*************************FAMILIARES INDEPENDIENTES CIERRO**************************************/
 if (mysqli_num_rows($resultado_familiaresde)>0) {
$pdf->Cell(180,6,'DEPENDIENTES',0,0,'C',0);
$pdf->Ln(10);
$pdf->Cell(45,6,'Parentezco',0,0,'C',1);
$pdf->Cell(45,6,'Nombre',0,0,'C',1);
$pdf->Cell(45,6,'Edad',0,0,'C',1);
$pdf->Cell(45,6,'Costo Adicional',0,1,'C',1);
	while($row_in = $resultado_familiaresde->fetch_assoc())
	{		
	$pdf->Cell(45,6,utf8_decode($row_in['Parentezco']),0,0,'C');
	$pdf->Cell(45,6,utf8_decode($row_in['nombre']),0,0,'C');
	$pdf->Cell(45,6,$row_in['edad'],0,0,'C');
	$pdf->Cell(45,6,$row_in['costo_adicional'].'$',0,1,'C');
	}
}else{
	$pdf->SetTextColor(231,14,14);
	$pdf->Cell(180,10, 'No hay Familiares Independientes Inscritos',0,1,'C');
}
$pdf->Ln(5);
$pdf->SetTextColor(80,77,208);
$pdf->MultiCell(180,6,utf8_decode('Las personas inscritas mayores de edad, recibirán en caso de muerte comprobada  y  dictaminada por las autoridades competentes, los servicios y planes que se detallan mas adelante:'),0,'L',0);
$pdf->Ln(5);
/*********************************************************PLANES*************************************************/
	$sql_planes = "SELECT * FROM planes INNER JOIN User_has_planes ON User_has_planes.planes_id_planes = planes.id_planes && User_has_planes.User_idUser= $usuarioid ";
	$resultado_planes= mysqli_query($connection, $sql_planes);

/****************************************************PLANES**************************************************/	
    if (mysqli_num_rows($resultado_planes)>0) {    	
			while ($fila_planes =mysqli_fetch_array($resultado_planes)){
				$pdf->SetTextColor(231,14,14);
				$pdf->Cell(90,6,'Nombre del Plan',0,0,'C',1);
				$pdf->Cell(90,6,'Precio del Plan',0,1,'C',1);
				$pdf->SetTextColor(80,77,208);
				$planes_id= $fila_planes['planes_id_planes'];///////////////VARIABLE DE PHP

				$pdf->Cell(90,6,$fila_planes['nombre'],0,0,'C');
				$pdf->Cell(90,6,$fila_planes['precio_plan'].'$',0,1,'C');
				$pdf->SetTextColor(23,242,5);
    			$pdf->Cell(180,10, 'SERVICIOS DEL PLAN',0,1,'C');
    			$pdf->SetTextColor(80,77,208);
/*************************SERVICIOS DEL PLAN**************************************/    			
    	$sql_servicios = "SELECT * FROM Servicios INNER JOIN planes_has_services_delivered ON planes_has_services_delivered.servicio_id_servicios = Servicios.id_servicios && planes_has_services_delivered.idUser_services= $usuarioid ";
               $resultado_servicios= mysqli_query($connection, $sql_servicios);
/*************************SERVICIOS DEL PLAN CIERRO**************************************/
		if (mysqli_num_rows($resultado_servicios)>0) {
		$pdf->Cell(120,6,'Nombre del Servicio',0,0,'C',1);
		$pdf->Cell(60,6,'Precio Total',0,1,'C',1);    			
		while ( $fila_servicio =mysqli_fetch_array($resultado_servicios)){
					$pdf->Cell(120,6,$fila_servicio['cantidad_servicio'].' servicio(s) de '.$fila_servicio['descripcion_servicio'],0,0,'L');
					$pdf->Cell(60,6,$fila_servicio['costo']*$fila_servicio['cantidad_servicio'].'$',0,1,'C');					
				}//CIERRO WHILE DE LOS SERVICIOS DE LOS PLANES	
		}else{
			$pdf->SetTextColor(231,14,14);
			$pdf->Cell(180,10, 'No hay servicios registrados',0,1,'C');
			$pdf->SetTextColor(80,77,208);
		}/////////////CIERRO IF DE LOS SERVICIOS	
/*************************************PRODUCTOS DEL PLAN**********************************************/    			
    	$sql_productos = "SELECT * FROM stock INNER JOIN planes_has_products_delivered ON planes_has_products_delivered.products_id_products_products = stock.id && planes_has_products_delivered.idUser_products= $usuarioid AND planes_has_products_delivered.planes_id_planes=$planes_id";
                $resultado_productos= mysqli_query($connection, $sql_productos);
/*************************************PRODUCTOS DEL PLAN CIERRO**************************************/
			if (mysqli_num_rows($resultado_productos)>0) {
					$pdf->SetTextColor(23,242,5);
				    $pdf->Cell(180,10, 'PRODUCTOS DEL PLAN',0,1,'C');
				    $pdf->SetTextColor(80,77,208); 
					$pdf->Cell(120,6,'Nombre del Producto',0,0,'C',1);
					$pdf->Cell(60,6,'Precio Total',0,1,'C',1); 	
		while ($fila_producto =mysqli_fetch_array($resultado_productos)){
					   
					$pdf->Cell(120,6,$fila_producto['cantidad_producto'].' producto(s) de '.$fila_producto['objeto'],0,0,'L');
					$pdf->Cell(60,6,$fila_producto['precio']*$fila_producto['cantidad_producto'].'$',0,1,'C');					
				}//CIERRO WHILE DE LOS PRODUCTOS DE LOS PLANES
			}else{
				$pdf->SetTextColor(231,14,14);
				$pdf->Cell(180,10, 'No hay productos registrados',0,1,'C');
				$pdf->SetTextColor(80,77,208);

			}/////////////CIERRO IF DE LOS PRODUCTOS	
				$pdf->Ln(10);
			}////CIERRO WHILE DE LOS PLANES
    }else{
    	$pdf->SetTextColor(231,14,14);
    	$pdf->Cell(180,10, 'NO HAY PlANES REGISTRADOS',0,1,'C');
    }
$pdf->Ln(5);
$pdf->SetTextColor(231,14,14);
$pdf->Cell(180,10, 'SERVICIOS ADICIONALES',0,1,'C');
$pdf->SetTextColor(80,77,208);
/*************************************SERVICIOS ADICIONALES**********************************************/    			

$sql_servicios_adicionales = "SELECT * FROM Servicios INNER JOIN User_has_Servicios_Adicionales ON User_has_Servicios_Adicionales.Servicios_Adicionales_id = Servicios.id_servicios && User_has_Servicios_Adicionales.User_idUser= $usuarioid";
$resultado_servicios_adicionales= mysqli_query($connection, $sql_servicios_adicionales);
/*************************************SERVICIOS ADICIONALES CIERRO**********************************************/ 
       if (mysqli_num_rows($resultado_servicios_adicionales)>0) {
       			$pdf->Cell(120,6,'Nombre del Servicio',0,0,'C',1);
				$pdf->Cell(60,6,'Precio Total',0,1,'C',1);

			while ($fila_servicios_adicionales =mysqli_fetch_array($resultado_servicios_adicionales)){
				$pdf->Cell(120,6,$fila_servicios_adicionales['cantidad_servicios'].' servicio(s) de '.$fila_servicios_adicionales['descripcion_servicio'],0,0,'L',0);
				$pdf->Cell(60,6,$fila_servicios_adicionales['costo']*$fila_servicios_adicionales['cantidad_servicios'].'$',0,1,'C',0);
			}

       }else{
       	$pdf->Cell(180,10, 'NO HAY SERVICIOS ADICIONALES REGISTRADOS',0,1,'C');
       }///////////////////CIERRO IF DE LOS SERVICIOS ADICIONALES
$pdf->Ln(5);        
$pdf->MultiCell(180,6,utf8_decode('Las personas menores de 18 años recibirán un ataúd cuyo valor y tamaño lo determinan   la   edad  y un valor en efectivo de RD$. 2,000.00 (DOS MIL PESOS).'),0,'FJ',0);
$pdf->Ln(5);
$pdf->MultiCell(180,6,utf8_decode('B) En caso de recibir un servicio mas costoso, el cliente deberá pagar la diferencia.'),0,'FJ',0);
$pdf->Ln(5);
$pdf->MultiCell(180,6,utf8_decode('C) En caso de que uno de los beneficiarios de este contrato muera  fuera de la jurisdicción  de esta provincia, la protectora cobrará el servicio adicional del traslado.'),0,'FJ',0);
$pdf->Ln(5);
$pdf->MultiCell(180,6,utf8_decode('D) Si después de haber firmado el contrato, el cliente no desea continuar dicho contrato,  el dinero  ya pagado no se  reembolsará.'),0,'FJ',0);
$pdf->Ln(5);
$pdf->MultiCell(180,6,utf8_decode('E) En caso de que el cliente no reciba el servicio por causas ajenas a la voluntad de la protectora San José, se le entregara un documento especificando que tenemos dicho servicio pendiente por cumplir; si el cliente desea utilizarlo con otro familiar o cualquier persona esta en su derecho de consumir este servicio cuando lo desee.'),0,'FJ',0);
$pdf->Ln(5);
$pdf->MultiCell(180,6,utf8_decode('F) Los derechos Comienzan a partir de  los  60 días  (dos meses)  después de la fecha de  inscripción.'),0,'FJ',0);
$pdf->Ln(5);
$pdf->MultiCell(180,6,utf8_decode('G) En caso de atraso en el pago mensual por 90 días (tres meses), se perderán todos los derechos.'),0,'FJ',0);
$pdf->Ln(5);
$pdf->MultiCell(180,6,utf8_decode('H) Cuando los menores de edad, inscritos en este contrato,pasan de 18 años, deberan ser informados a la protectora para cambiarlo al servicio de adulto. En caso de no ser asi, cuando le toque recibir el servicio, se le entregara el asignado en el contrato.'),0,'FJ',0);
$pdf->Ln(5);
$pdf->MultiCell(180,6,utf8_decode('I) En caso de  surgir cualquier litigio que no pueda solucionarse de mutuo acuerdo, las partes firmantes, le atribuyen competencia a los tribunales, para la satisfactoria solución de los mismos.'),0,'FJ',0);
$pdf->Ln(5);
$pdf->MultiCell(180,6,utf8_decode('J) Una persona en caso de muerte comprobada y determinada por las autoridades competentes, no podrá recibir mas de un servicio (especificado en el acápite (A) ) aunque  este inscrito  en otro  con  trato por otro familiar o persona.'),0,'FJ',0);
$pdf->Ln(5);
$pdf->MultiCell(180,6,utf8_decode('K) En caso de fuerza mayor tales como: Huracanes, huelgas, desobediencia civil, revolución, terremotos, etc. La protectora San José, Se reserva los derechos de brindar los servicios contratados por los afiliados.'),0,'FJ',0);
$pdf->Ln(5);
$pdf->SetTextColor(231,14,14);
$pdf->Cell(180,10, 'PAGOS',0,1,'C');
$pdf->SetTextColor(80,77,208);
	$sql_pagos = "SELECT * FROM Pagos WHERE User_id= $usuarioid ";
            $resultado_pagos= mysqli_query($connection, $sql_pagos);
            	$pdf->Cell(90,6,'Monto del Pago',0,0,'C',1);
				$pdf->Cell(90,6,'Fecha a Pagar',0,1,'C',1);
               while ($fila_pago =mysqli_fetch_array($resultado_pagos)){               	
				$pdf->Cell(90,6,$fila_pago['pago'].'$',0,0,'C');
					$pdf->Cell(90,6,$fila_pago['fecha'],0,1,'C');
               }
$pdf->Ln(10);               
$hoy = date('d-m-Y');
$pdf->MultiCell(180,6,utf8_decode('Hecho y firmado, en la ciudad de Azua De Compostela, hoy: '.$hoy.'.'),0,'FJ',0);
$pdf->Ln(30);
$pdf->SetTextColor(231,14,14);
$pdf->Cell(90,6,'Firma de la Empresa',0,0,'C',0);
$pdf->Cell(90,6,'Firma del Cliente',0,1,'C',0);
$pdf->AutoPrint();
$pdf->Output();
 ?>

