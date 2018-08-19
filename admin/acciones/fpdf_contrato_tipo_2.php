<?php
require_once('../connect.php');
$unicoid= $connection->real_escape_string($_GET['idunico']);
$usuarioid = $connection->real_escape_string($_GET['id']);
include('fpdf_plantilla_contrato.php');

/*class PDF_AutoPrint extends PDF
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
}*/
/////////////////////////////////////////DESCUENTO//////////////////////////////////
                    $sql_contrato = "SELECT * FROM user WHERE idUser = $usuarioid AND idUser_user=$unicoid";
                    $resultado_contrato= mysqli_query($connection, $sql_contrato);
                    $row_contrato = mysqli_fetch_assoc($resultado_contrato);
                    $sum_total = 0;
                    $sum_descuento = $row_contrato['descuento'];

                /////////////////////////////////////////DESCUENTO//////////////////////////////////

                /////////////////////////////////////////COST PLANES//////////////////////////////////

                    $sql_total_planes ="SELECT SUM(precio_total) AS value_planes FROM user_has_planes WHERE User_idUser=$usuarioid AND id_user_plan=$unicoid";
                    $resultado_total_planes= mysqli_query($connection, $sql_total_planes);
                    $row_contrato_planes = mysqli_fetch_assoc($resultado_total_planes);
                    $sum_total_planes = $row_contrato_planes['value_planes'];
                /////////////////////////////////////////COST PLANES CIERRO//////////////////////////////////
                
                
                /////////////////////////////////////////SERVICIOS ADICIONALES//////////////////////////////////

                    $sql_total_servicio ="SELECT * FROM user_has_servicios_adicionales WHERE User_idUser=$usuarioid AND id_user_servicio=$unicoid";
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

                   
                    $sum = ($sum_total +$sum_total_planes+$sumador_total_servicios)- (($sum_total_planes+$sum_total +$sumador_total_servicios) * ($sum_descuento/100));
                /////////////////////////////////////////FAMILIARES INDEPENDIENTE CIERRO//////////////////////////////////
//////////////////////////////////////////FORMATEO FECHA

/***FECHA CREACION**/                    
$fechabbdd=date_create($row_contrato['fecha_contrato']);

$fechabbdd_dia=date_format($fechabbdd, 'd');
$fechabbdd_mes=date_format($fechabbdd, 'm');
$fechabbdd_año=date_format($fechabbdd, 'Y');

/***FECHA CREACION**/                    



$fecha_hoy= date("F j, Y, g:i a");                    
$generar_hoy= date('Y-m-d H:i:s');
$hoy = new DateTime($generar_hoy);        
$nacimiento= $row_contrato['nacimiento'];         
$nacimiento= new DateTime($nacimiento);          
$interval = date_diff($nacimiento, $hoy); 
//////////////////////////////////////////FORMATEO CIERRO

$sql_pagos = "SELECT * FROM pagos WHERE User_id= $usuarioid AND id_pagos_user=$unicoid";
$resultado_pagos= mysqli_query($connection, $sql_pagos);
$fila_pago =mysqli_fetch_array($resultado_pagos);

/*CIERRO MULTIPLES CONSULTAS*/    


$pdf = new PDF('P', 'mm', 'A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Image('../img/logo.png', 55, 8, 100);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Ln(25);
$pdf->SetX(55);
$pdf->Cell(100, 10, 'Calle Santome # 102,  Tel.:809-521-3511,  Cel.:809-250-3711  y  809-627-7485 Azua R.D.', 0, 1, 'C');
$pdf->SetX(122);
$pdf->Cell(100, 10, utf8_decode('Contrato N° #00000'.$row_contrato['idUser_user'].''), 0, 1, 'C');
$pdf->Ln(2);
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetTextColor(80, 77, 208);
$pdf->SetFillColor(232, 232, 232);
$pdf->MultiCell(180,6,utf8_decode('En la Ciudad de Azur De Compostela, Provincia del mismo nombre, República Dominicana a los '.$fechabbdd_dia.' días del mes '.$fechabbdd_mes.' del año '.$fechabbdd_año.' lugar donde ha comparecido ante el/la señor/a '.$row_contrato['nombre'].' de nacionalidad dominicano/a, mayor de edad y portador/a de la cedula de Identidad y Electoral Nº '.$row_contrato['dni'].', domiciliado y residente en '.$row_contrato['direccion'].' de Azua De Compostel, República Dominicana, quien se reconoce ser deudor/a de la FUNERARIA SAN JOSE, entidad comercial constituidad de conformidad con las leyes de la República Dominicana, RNC Nº 010-00903086-6 con su domicilio y asiento social en la casa Nº 102 de la calle Santome, sector La Placeta de esta ciudad de Azua, Provincia del mismo nombre, debidamente representada por la Lic. Juana Miguelina Agramonte Andujar, dominicana, mayor de edad, casada, domiciliada y residente en esta ciudad de Azua De Compostela, República Dominicana, provista con la cèdula de Identidad y Electoral Nº 010-0017919-0.'),0,'FJ',0);
$pdf->Ln(10);
$pdf->SetTextColor(231, 14, 14);
$pdf->Cell(180, 6, 'HAN PACTADO Y CONVENIDO LO SIGUIENTE', 0, 0, 'C', 0);
$pdf->SetTextColor(80, 77, 208);
$pdf->Ln(10);
$pdf->SetTextColor(80,77,208);
$pdf->MultiCell(180,6,utf8_decode('A) El señor/a '.$row_contrato['nombre'].', recibirá en caso de muerte comprobada y dictaminada por las autoridades competentes, los servicios que se detallan más adelante:'),0,'L',0);
$pdf->Ln(5);
$pdf->SetTextColor(80,77,208);
/*************************************SERVICIOS ADICIONALES**********************************************/    			

$sql_servicios_adicionales = "SELECT * FROM servicios INNER JOIN user_has_servicios_adicionales ON user_has_servicios_adicionales.Servicios_Adicionales_id = servicios.id_servicios && user_has_servicios_adicionales.User_idUser= $usuarioid AND user_has_servicios_adicionales.id_user_servicio=$unicoid";
$resultado_servicios_adicionales= mysqli_query($connection, $sql_servicios_adicionales);
/*************************************SERVICIOS ADICIONALES CIERRO**********************************************/ 
       if (mysqli_num_rows($resultado_servicios_adicionales)>0) {
       	$i=1;
			while ($fila_servicios_adicionales =mysqli_fetch_array($resultado_servicios_adicionales)){
				$pdf->Cell(120,6,$i.')'.$fila_servicios_adicionales['cantidad_servicios'].' servicio(s) de '.$fila_servicios_adicionales['descripcion_servicio'].' RD$'.$fila_servicios_adicionales['costo']*$fila_servicios_adicionales['cantidad_servicios'] ,0,1,'L',0);
				$i++;
			}

       }else{
		$pdf->SetTextColor(231,14,14);     
       	$pdf->Cell(180,10, 'NO HAY SERVICIOS REGISTRADOS',0,1,'C');
       }///////////////////CIERRO IF DE LOS SERVICIOS ADICIONALES
$pdf->SetTextColor(80,77,208);
$pdf->Ln(5);
/*CONSULTA DE LOS PAGOS*/
$sql_pagos_extra = "SELECT * FROM pagos WHERE User_id= $usuarioid AND id_pagos_user=$unicoid";
$resultado_pagos_extra= mysqli_query($connection, $sql_pagos_extra);
$fila_pago_extra =mysqli_fetch_array($resultado_pagos_extra);
/*CONSULTA DE LOS PAGOS*/
$pdf->MultiCell(180,6,utf8_decode('B) El cliente deberá pagar: RD$'.$sum),0,'L',0);
$pdf->Ln(1);
$pdf->MultiCell(180,6,utf8_decode('1) Una inicial de: RD$'.$fila_pago_extra['pago']),0,'L',0);
$pdf->Ln(1);
$pdf->MultiCell(180,6,utf8_decode('2) Una mensualidad de: RD$'.$fila_pago_extra['pago']),0,'L',0);
$pdf->Ln(1);
$pdf->MultiCell(180,6,utf8_decode('3) Número de cuotas '.$row_contrato['cuotas']),0,'L',0);
$pdf->Ln(5);
$pdf->MultiCell(180,6,utf8_decode('C) Si se utilizan servicios no pactados en este contrato, el valor de estos se anexara a la suma monetaria acordada.'),0,'FJ',0);
$pdf->Ln(5);
$pdf->MultiCell(180,6,utf8_decode('D) Si después de haber firmado el contrato, el cliente no desea continuar dicho contrato, el dinero ya pagado no se reembolsará, podrà ser retirado en servicios cuando el cliente lo crea conveniente.'),0,'FJ',0);
$pdf->Ln(5);
$pdf->MultiCell(180,6,utf8_decode('E) Los derechos para retirar los servicios comienzan a partir de la fecha de haber firmado el contrato.'),0,'FJ',0);
$pdf->Ln(5);
$pdf->MultiCell(180,6,utf8_decode('F) El cliente deberá cumplir los pagos antes pactados aunque haya retirado los servicios, reconociendo el/la declarante que de no hacerlo será exigible la obligación de pago de la referida suma, así mismo se reconoce que en caso de incumplir con su obligación de pagar en el tiempo acordado, perderá el derecho del termino aquí acordado y por consiguiente se dará por vencidad la deuda siendo responsable de cubrir todos los accesorios, gastos y honorarios en que incurra para su cobro. Así mismo el/la compareciente en su indicada calidad, se reconoce como deudor/a principal a favor de la acreedora y que el presente contrato se convierte en un pagare notarial, teniendo la fuerta ejecutoria que le asigna el artículo 545 del código de procesamientos civil, que da ejecutoria a las sentenias y a los actos notariales que contienen un crédito, cierto, liquido y exigible, compromentiendo todos sus bienes muebles e inmuebles presentes y futuros, habidos y por haber, renunciando al fuero de domicilio. De todo lo que antecede, he procedido a levantar el presente acto de Pagare Notarial, que despuès de haberlo leìdo y encontrado conforme con las declaraciones, han procedido a firmarlo'),0,'FJ',0);

$pdf->Ln(10);               
$pdf->MultiCell(180,6,utf8_decode('Hecho y firmado, en la ciudad de Azua De Compostela,  a los '.$fechabbdd_dia.' días del mes '.$fechabbdd_mes.' del año '.$fechabbdd_año.'.'),0,'L',0);
$pdf->Ln(20);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(90,6,'Por la Acreedora',0,0,'C',0);
$pdf->Cell(90,6,'Por el/la Deudor/a',0,1,'C',0);
/*$pdf->AutoPrint();*/
$pdf->Output();
mysqli_close($connection);
 ?>

