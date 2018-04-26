<?php
session_start();
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment; filename=Reporte_Personal_usuarios.doc");
include('connect.php');
$usuarioid = $_GET['id'];
 //--------------------if--------------------
      
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
    <link rel="stylesheet" href="css/materialize.css" media="screen">

  <title>Document</title>  
</head> 
<body>


        	<?php 
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
        	 ?>
	<div style="text-align:center;">
			<table width="40%" border="1" cellspacing="0" cellpadding="0">
				<tr>
					<td>Nombre del usuario: <?php echo $fila['nombre'];?></td>
						
				</tr>

				<tr>
					<td>DNI del usuario: <?php echo $fila['dni'];?></td>						

				</tr>

				<tr>
					<td>Total de la factura: <?php echo $sum;?>$</td>
				</tr>


				<tr>
					<td style="margin-bottom:-10px;">Servicios Adquiridos:</td>				
				</tr>


                 <?php 
					while ( $fila_servicio =mysqli_fetch_array($resultado_servicios)){
 				 ?>
                 <tr >
                 	<td style="margin-bottom: -10px;">- <?php echo $fila_servicio['descripcion_servicio'];?> <?php echo $fila_servicio['costo'];?>$</td>
                 </tr>
                 <?php 
                   }
                 ?>
			</table>
	</div>
</body>
</html>
<?php 
mysqli_close($connection);
 ?>
