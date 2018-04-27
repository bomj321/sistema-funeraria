<?php
session_start();
$usuarioid = $_GET['id'];
        require_once("dompdf/dompdf_config.inc.php");  
        include('connect.php');
   


$codigoHTML='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<body>
<div style="text-align:center;">
<table width="40%" border="1" cellspacing="0" cellpadding="0">'; 
$sql = "SELECT * FROM User_servicios_individuales WHERE idUser = '$usuarioid'";
			$resultado= mysqli_query($connection, $sql); 
        		$fila =mysqli_fetch_array($resultado);
            
            $planid =$fila['idUser'];

            $sql_servicios = "SELECT * FROM Servicios INNER JOIN user_has_services ON user_has_services.servicio_id_servicios = Servicios.id_servicios && user_has_services.servicios_id_user= $planid ";
               $resultado_servicios= mysqli_query($connection, $sql_servicios);



             $sql_total_servicios ="SELECT SUM(costo) AS value_sum FROM Servicios INNER JOIN user_has_services ON user_has_services.servicio_id_servicios = Servicios.id_servicios && user_has_services.servicios_id_user= $planid";
                    $resultado_total_servicios= mysqli_query($connection, $sql_total_servicios);
                    $row_servicio = mysqli_fetch_assoc($resultado_total_servicios);
                    $sum_servicio = $row_servicio['value_sum'];

               $sql_productos = "SELECT * FROM stock INNER JOIN user_has_products ON user_has_products.stock_id_stock = stock.id && user_has_products.products_id_user= $planid ";
                    $resultado_productos= mysqli_query($connection, $sql_productos);



                    $sql_total_productos ="SELECT SUM(precio) AS value_sum FROM stock INNER JOIN user_has_products ON user_has_products.stock_id_stock = stock.id && user_has_products.products_id_user= $planid";
                    $resultado_total_productos= mysqli_query($connection, $sql_total_productos);
                    $row_producto = mysqli_fetch_assoc($resultado_total_productos);
                    $sum_producto = $row_producto['value_sum'];
                    $sum = $sum_servicio + $sum_producto;   
$codigoHTML.='  
    <tr>
        <td>Nombre del usuario: '.$fila['nombre'].'</td>                                                    
    </tr>

	<tr>
        <td>DNI del usuario: '.$fila['dni'].'</td>                                                    
    </tr>

	<tr>
        <td>Total de la factura: '.$sum.'$</td>                                                    
    </tr>

    <tr>
        <td style="margin-bottom:-10px;">Servicios Adquiridos:</td>                                                    
    </tr>';


			while ( $fila_servicio =mysqli_fetch_array($resultado_servicios)){
 			$codigoHTML.='	 
                 <tr >
                 	<td style="margin-bottom: -10px;">-'.$fila_servicio['descripcion_servicio'].' '.$fila_servicio['costo'].'$</td>
                 </tr>';
                
                   }

    $codigoHTML.='
    <tr>
        <td style="margin-bottom:-10px;">Productos Adquiridos:</td>                                                    
    </tr>';

    while ( $fila_producto =mysqli_fetch_array($resultado_productos)){
            $codigoHTML.='   
                 <tr >
                    <td style="margin-bottom: -10px;">-'.$fila_producto['objeto'].' '.$fila_producto['precio'].'$</td>
                 </tr>';
                
                   }


            $codigoHTML.='
                        <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center"> 
                <tr> 
                    <td width=150 valign="top"> 
                    1
                    </td> 
                    <td width=10></td> 
                    <td width=484 valign="top"> 
                    2 
                    </td> 
                    <td width=10></td> 
                    <td width=124 align=center valign="top"> 
                    3
                    </td> 
                </tr> 
                </table>';


$codigoHTML.='

</table>
</div>
</body>
</html>';
$codigoHTML=utf8_encode($codigoHTML);
$dompdf=new DOMPDF();
$dompdf->load_html($codigoHTML);
ini_set("memory_limit","128M");
$dompdf->render();
$dompdf->stream("Reporte_servicios_usuarios.pdf");
?>