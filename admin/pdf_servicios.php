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


                    $sql_total_productos ="SELECT SUM(precio_total) AS value_sum FROM user_has_products INNER JOIN stock ON user_has_products.stock_id_stock = stock.id && user_has_products.products_id_user= $planid";
                    $resultado_total_productos= mysqli_query($connection, $sql_total_productos);
                    $row_producto = mysqli_fetch_assoc($resultado_total_productos);
                    $sum_producto = $row_producto['value_sum'];
                    $sum = $sum_servicio + $sum_producto;   
 
            $codigoHTML.='
                <table > 
                <tr> 

                    <td > 
                       Nombre del Usuario:
                    </td> 
                
                
                    <td "> 
                       '.$fila['nombre'].'
                    </td>
                     
                </tr>
                     
                <tr> 
                    
                    <td > 
                        DNI:
                    </td> 

                     

                    <td > 
                        '.$fila['dni'].' 
                    </td> 
                    
                </tr>

                <tr > 
                    <td colspan="3" style="border-top:2px solid;"> 
                    <h4>Productos Adquiridos</h4>
                       
                    </td> 
                </tr>';


    while ( $fila_producto =mysqli_fetch_array($resultado_productos)){
$precio_total_productos = $fila_producto['cantidad_comprada'] * $fila_producto['precio'];

$codigoHTML.='
                <tr> 
                    <td colspan="1"> 
                       '.$fila_producto['objeto'].'('.$fila_producto['cantidad_comprada'].')
                    </td
                
                    <td style="text-align:center"> 
                       '.$precio_total_productos.'$
                    </td>

                    
                </tr>';

}
$codigoHTML.='
                <tr> 
                    <td colspan="3" style="border-top:2px solid;"> 
                       <h4>Servicios Adquiridos</h4>
                    </td> 
                </tr>';


    while ( $fila_servicio =mysqli_fetch_array($resultado_servicios)){
$codigoHTML.='
                <tr> 
                    <td> 
                       '.$fila_servicio['descripcion_servicio'].'
                    </td> 
               
                
                    <td style="text-align:center"> 
                       '.$fila_servicio['costo'].'$
                    </td> 
                </tr>
                ';

 }

 $codigoHTML.='
                <tr > 
                    <td > 
                       Total:
                    </td> 
               
                
                    <td style="border-top:1px solid; text-align:center"> 
                       '.$sum.'$
                    </td> 
                </tr>
                ';

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