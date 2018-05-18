<?php
session_start();
require_once('../connect.php');
$session_id= session_id();


if (isset($_POST['id']) AND isset($_POST['cantidad']) AND isset($_POST['precio_venta'])) {
	   $id=$_POST['id'];
	   $cantidad=$_POST['cantidad'];
	   $precio_venta=$_POST['precio_venta'];
}

if (isset($_POST['id_producto']) AND isset($_POST['cantidad_producto']) AND isset($_POST['precio_venta_producto'])) {
	   $id_producto=$_POST['id_producto'];
		$cantidad_producto=$_POST['cantidad_producto'];
		$precio_venta_producto=$_POST['precio_venta_producto'];
}


//////////////Insertar Servicios

if (!empty($id) AND !empty($cantidad) AND !empty($precio_venta)) {
	   mysqli_set_charset($connection, "utf8");
            $sql_tmp_servicios="INSERT INTO tmp_servicios_inviduales (id_servicio,cantidad_tmp,precio_tmp,session_id) VALUES (?,?,?,?)";
            $resultado_tmp_servicios=mysqli_prepare($connection, $sql_tmp_servicios);
            mysqli_stmt_bind_param($resultado_tmp_servicios, "iiis", $id,$cantidad , $precio_venta, $session_id);
            mysqli_stmt_execute($resultado_tmp_servicios);
            mysqli_stmt_close($resultado_tmp_servicios);
}
///////////////Insertar Servicios Cierro


///////////////Insertar Productos

if (!empty($id_producto) AND !empty($cantidad_producto) AND !empty($precio_venta_producto)) {
	   mysqli_set_charset($connection, "utf8");
            $sql_tmp_servicios="INSERT INTO tmp_productos_individuales (id_producto,cantidad_tmp_producto,precio_tmp_producto,session_id) VALUES (?,?,?,?)";
            $resultado_tmp_servicios=mysqli_prepare($connection, $sql_tmp_servicios);
            mysqli_stmt_bind_param($resultado_tmp_servicios, "iiis", $id_producto,$cantidad_producto , $precio_venta_producto, $session_id);
            mysqli_stmt_execute($resultado_tmp_servicios);
            mysqli_stmt_close($resultado_tmp_servicios);
}
///////////////Insertar Productos Cierro


////////////////////ELIMINAR SERVICIOS
if (isset($_GET['id_servicio']))//codigo elimina un elemento del array
{
		$id_tmp_servicio=intval($_GET['id_servicio']);
		mysqli_set_charset($connection, "utf8");
		$sql_servicio="DELETE FROM tmp_servicios_inviduales WHERE id_tmp=? ";
		$resultado_servicio=mysqli_prepare($connection, $sql_servicio);
		mysqli_stmt_bind_param($resultado_servicio, "i", $id_tmp_servicio);
		mysqli_stmt_execute($resultado_servicio);	
}
////////////////////ELIMINAR SERVICIOS CIERRO


////////////////////ELIMINAR PRODUCTOS
if (isset($_GET['id_producto']))//codigo elimina un elemento del array
{
		$id_tmp_producto=intval($_GET['id_producto']);
		mysqli_set_charset($connection, "utf8");
		$sql_producto="DELETE FROM  tmp_productos_individuales WHERE id_tmp_producto=? ";
		$resultado_producto=mysqli_prepare($connection, $sql_producto);
		mysqli_stmt_bind_param($resultado_producto, "i", $id_tmp_producto);
		mysqli_stmt_execute($resultado_producto);	
}


////////////////////ELIMINAR PRODUCTOS CIERRO

 ?>
 <table>
 	<thead>
 		<th>Cantidad</th>
 		<th>Descripcion</th>
 		<th class='text-right'>Precio Unit.</th>
 	    <th class='text-right'>Precio Total</th>
 	</thead>
 	<tbody>
 		<?php
 			$sumador_total=0; 
 			$sql_servicios="SELECT * FROM Servicios,tmp_servicios_inviduales WHERE Servicios.id_servicios=tmp_servicios_inviduales.id_servicio AND tmp_servicios_inviduales.session_id='".$session_id."'";
                 $resultado_servicios= mysqli_query($connection, $sql_servicios);
                 $sumador_total_producto=0;
                  
                 $sql_productos="SELECT * FROM stock,tmp_productos_individuales WHERE stock.id=tmp_productos_individuales.id_producto AND tmp_productos_individuales.session_id='".$session_id."'";
                 $resultado_productos= mysqli_query($connection, $sql_productos); 

                 while($row=mysqli_fetch_array($resultado_servicios)) {
                 	$id_tmp=$row["id_tmp"];
					$cantidad=$row['cantidad_tmp'];
					$nombre_servicio=$row['descripcion_servicio'];
					$precio_venta=$row['precio_tmp'];
					$precio_total=$precio_venta*$cantidad;
					$sumador_total+=$precio_total;
 		 ?>
			<tr>
				<td><?php echo $cantidad; ?></td>
				<td>Servicio-<?php echo $nombre_servicio; ?></td>
				<td class="text-right"><?php echo $precio_venta; ?></td>
				<td class="text-right"> <?php echo $precio_total; ?></td>
				<td class="text-center"><a onclick="eliminar_servicio('<?php echo $id_tmp ?>')"><i class="material-icons pdf">cancel</i></a></td>
			</tr>
 		 <?php 
 		 	 }
 		 	 $sumador_total_producto=0;
 		 	 while($row_producto=mysqli_fetch_array($resultado_productos)) {
                 	$id_tmp_producto=$row_producto["id_tmp_producto"];
					$cantidad_producto=$row_producto['cantidad_tmp_producto'];
					$nombre_producto=$row_producto['objeto'];
					$precio_venta_producto=$row_producto['precio_tmp_producto'];
					$precio_total_producto=$precio_venta_producto*$cantidad_producto;
					$sumador_total_producto+=$precio_total_producto;

 		 ?>
			<tr>
				<td><?php echo $cantidad_producto; ?></td>
				<td>Producto-<?php echo $nombre_producto; ?></td>
				<td class="text-right"><?php echo $precio_venta_producto; ?></td>
				<td class="text-right"> <?php echo $precio_total_producto; ?></td>
				<td class="text-center"><a onclick="eliminar_producto('<?php echo $id_tmp_producto ?>')"><i class="material-icons pdf">cancel</i></a></td>

			</tr>
 		 <?php 
 		 	 }
 		  ?>
 		
 			<tr> 				
			<td class="text-right" colspan="3">TOTAL $</td>
			<td class='text-right'><?php echo $sumador_total+$sumador_total_producto;?>$</td>

 			</tr>
 			


 		
 	</tbody>
 </table>