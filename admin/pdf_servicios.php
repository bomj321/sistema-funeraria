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
$sql = "SELECT * FROM User_servicios_indiduales WHERE idUser = '$usuarioid'";
			$resultado= mysqli_query($connection, $sql); 
        		$fila =mysqli_fetch_array($resultado);
            
            $planid =$fila['idUser'];

            $sql_servicios = "SELECT * FROM Servicios INNER JOIN user_has_services ON user_has_services.servicio_id_servicios = Servicios.id_servicios && user_has_services.servicios_id_user= $planid ";
               $resultado_servicios= mysqli_query($connection, $sql_servicios);



             $sql_total_servicios ="SELECT SUM(costo) AS value_sum FROM Servicios INNER JOIN user_has_services ON user_has_services.servicio_id_servicios = Servicios.id_servicios && user_has_services.servicios_id_user= $planid";
             $resultado_total_servicios= mysqli_query($connection, $sql_total_servicios);
             $row = mysqli_fetch_assoc($resultado_total_servicios);
              $sum = $row['value_sum']; 
$codigoHTML.='  
    <tr>
        <td>Nombre del usuario: '.$fila['nombre'].'</td>                                                    
    </tr>

	<tr>
        <td>DNI del usuario: '.$fila['dni'].'</td>                                                    
    </tr>

	<tr>
        <td>Total de la factura: '.$row['value_sum'].'$</td>                                                    
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