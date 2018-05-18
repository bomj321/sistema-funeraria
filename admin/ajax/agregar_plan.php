<?php
session_start();
require_once('../connect.php');
$session_id= session_id();


////////////////////////////////VERIFICAR VARIABLES COSTO Y DESCUENTO////////////////////////////////////////////
if (isset($_POST['costo_planes']) AND isset($_POST['descuento_planes'])) {
	   $costo_planes=$_POST['costo_planes'];
	   $descuento_planes=$_POST['descuento_planes'];	  
	   $total_descuento = $costo_planes-($costo_planes*($descuento_planes/100)); 
}
/////////////////////VERIFICAR VARIABLES COSTO Y DESCUENTO CIERRO

//////////////Insertar COSTO Y DESCUENTO

if (isset($costo_planes) AND isset($descuento_planes)) {
	   mysqli_set_charset($connection, "utf8");
            $sql_tmp_planes="INSERT INTO  tmp_costo_descuento_plan(costo_planes,descuento_planes,session_id) VALUES (?,?,?)";
            $resultado_tmp_planes=mysqli_prepare($connection, $sql_tmp_planes);
            mysqli_stmt_bind_param($resultado_tmp_planes, "iis", $costo_planes,$descuento_planes,$session_id);
            mysqli_stmt_execute($resultado_tmp_planes);
            mysqli_stmt_close($resultado_tmp_planes);
}
///////////////Insertar COSTO Y DESCUENTO Cierro

////////////////////ELIMINAR COSTO Y DESCUENTO
if (isset($_GET['id_costo_planes']))//codigo elimina un elemento del array
{
		$id_tmp_planes=intval($_GET['id_costo_planes']);
		mysqli_set_charset($connection, "utf8");
		$sql_planes="DELETE FROM tmp_costo_descuento_plan WHERE id_tmp_planes=?";
		$resultado_planes=mysqli_prepare($connection, $sql_planes);
		mysqli_stmt_bind_param($resultado_planes, "i", $id_tmp_planes);
		mysqli_stmt_execute($resultado_planes);	
}
////////////////////ELIMINAR COSTO Y DESCUENTO CIERRO////////////////////////////////////////////////////



////////////////////////////////////////VERIFICAR SERVICIOS//////////////////////////////////////////////
if (isset($_POST['id_servicio']) AND isset($_POST['cantidad']) AND isset($_POST['precio_venta']) AND isset($_POST['nombre_servicio'])) {
	   $id=$_POST['id_servicio'];
	   $cantidad=$_POST['cantidad'];
	   $precio_venta=$_POST['precio_venta'];
	   $nombre=$_POST['nombre_servicio'];
}
////////////////////////////////////////VERIFICAR SERVICIOS CIERRO//////////////////////////////////////////////

////////////////////////////////////////VERIFICAR PRODUCTOS//////////////////////////////////////////////

if (isset($_POST['id_producto']) AND isset($_POST['cantidad_producto']) AND isset($_POST['precio_venta_producto'])) {
	    $id_producto=$_POST['id_producto'];
		$cantidad_producto=$_POST['cantidad_producto'];
		$precio_venta_producto=$_POST['precio_venta_producto'];
}

////////////////////////////////////////VERIFICAR PRODUCTOS CIERRO//////////////////////////////////////////////

//////////////Insertar Servicios

if (!empty($id) AND !empty($cantidad) AND !empty($precio_venta) AND !empty($precio_venta) AND !empty($nombre)) {
	   mysqli_set_charset($connection, "utf8");
            $sql_tmp_servicios="INSERT INTO tmp_servicios_planes (id_servicio_planes,cantidad_tmp_planes,nombre_tmp_planes ,precio_tmp_planes,session_id) VALUES (?,?,?,?,?)";
            $resultado_tmp_servicios=mysqli_prepare($connection, $sql_tmp_servicios);
            mysqli_stmt_bind_param($resultado_tmp_servicios, "iisis", $id,$cantidad,$precio_venta,$nombre,$session_id);
            mysqli_stmt_execute($resultado_tmp_servicios);
            mysqli_stmt_close($resultado_tmp_servicios);
}
///////////////Insertar Servicios Cierro


///////////////Insertar Productos

if (!empty($id_producto) AND !empty($cantidad_producto) AND !empty($precio_venta_producto)) {
	   mysqli_set_charset($connection, "utf8");
            $sql_tmp_servicios="INSERT INTO tmp_producto_plan (id_producto,cantidad_tmp_producto,precio_tmp_producto,session_id) VALUES (?,?,?,?)";
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
		$sql_servicio="DELETE FROM tmp_servicios_planes WHERE id_tmp_servicios=? ";
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
		$sql_producto="DELETE FROM  tmp_producto_plan WHERE id_tmp_producto=? ";
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
 		<th class='text-right'>Acciones</th>		
 	</thead>
 	<tbody>
 		<?php
 			$sumador_total=0;

 //////////////////////////////////////////////////COSTO Y DESCUENTO///////////////////////////////////////////////		 
			$sql_costo_descuento_planes="SELECT * FROM tmp_costo_descuento_plan WHERE session_id='".$session_id."'";
            $resultado_costo_descuento_planes= mysqli_query($connection, $sql_costo_descuento_planes);
/////////////////////////////////////////////////7COSTO Y DESCUENTO///////////////////////////////////////////////


 			/////////////////////////////////////////////SELECT SERVICIOS///////////////////////////////////// 
 			$sql_servicios="SELECT * FROM Servicios,tmp_servicios_planes WHERE Servicios.id_servicios=tmp_servicios_planes.id_servicio_planes AND tmp_servicios_planes.session_id='".$session_id."'";
                 $resultado_servicios= mysqli_query($connection, $sql_servicios);
 			/////////////////////////////////////////////SELECT SERVICIOS CIERRO///////////////////////////////////// 
     

            /////////////////////////////////////////////SELECT PLANES///////////////////////////////////// 
      
                 $sql_productos="SELECT * FROM stock,tmp_producto_plan WHERE stock.id=tmp_producto_plan.id_producto AND tmp_producto_plan.session_id='".$session_id."'";
                 $resultado_productos= mysqli_query($connection, $sql_productos);
            /////////////////////////////////////////////SELECT PLANES CIERRO/////////////////////////////////////      
 			$descuento_planes=0;
            $costo_planes=0;
            while($row_total=mysqli_fetch_array($resultado_costo_descuento_planes)){
            $id_tmp_costo=$row_total['id_tmp_planes'];
            $costo_planes=$row_total['costo_planes'];
            $descuento_planes=$row_total['descuento_planes'];            
		?> 		
 		 	    <tr> 		 	   		
 		 	    	<td class="text-right"></td> 				
					<td class="text-left" >Costo del Plan</td>
					<td class='text-right'><?php echo $costo_planes;?>$</td>
					<td class="text-left"><a onclick="eliminar_costo_descuento_planes('<?php echo $id_tmp_costo ?>')"><i class="material-icons pdf">cancel</i></a></td>
		 		</tr>
				<?php 
				}
                 while($row=mysqli_fetch_array($resultado_servicios)) {
                 	$id_tmp=$row["id_tmp_servicios"];
					$cantidad=$row['cantidad_tmp_planes'];
					$nombre_servicio=$row['descripcion_servicio'];
 		 ?>
			<tr>
				<td><?php echo $cantidad; ?></td>
				<td>Servicio-<?php echo $nombre_servicio; ?></td>			
				<td class="text-right"><a onclick="eliminar_servicio_planes('<?php echo $id_tmp ?>')"><i class="material-icons pdf">cancel</i></a></td>
			</tr>
 		 <?php 
 		 	 }
 		 	  while($row_producto=mysqli_fetch_array($resultado_productos)) {
                 	$id_tmp_producto=$row_producto["id_tmp_producto"];
					$cantidad_producto=$row_producto['cantidad_tmp_producto'];
					$nombre_producto=$row_producto['objeto'];

 		 ?>
			<tr>
				<td><?php echo $cantidad_producto; ?></td>
				<td>Producto-<?php echo $nombre_producto; ?></td>
				<td class="text-right"><a onclick="eliminar_producto_planes('<?php echo $id_tmp_producto ?>')"><i class="material-icons pdf">cancel</i></a></td>

			</tr>

			<?php
				}
			 ?>

			<tr> 				
				<td class="text-right" colspan="3">SubTotal</td>
					<td class='text-right'><?php echo $costo_planes;?>%</td>
	 		</tr>

			<tr> 				
				<td class="text-right" colspan="3">Descuento</td>
					<td class='text-right'><?php echo $descuento_planes;?>%</td>
	 		</tr>
 		 
 			<tr> 				
			<td class="text-right" colspan="3">TOTAL $</td>
			<td class='text-right'><?php echo $costo_planes-($costo_planes*($descuento_planes/100));?>$</td>

 			</tr>
 			


 		
 	</tbody>
 </table>