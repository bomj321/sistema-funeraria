<?php
session_start();
require_once('../connect.php');
$session_id= session_id();

////////////////////////////////VERIFICAR VARIABLES COSTO Y DESCUENTO////////////////////////////////////////////
if (isset($_POST['costo_contrato']) AND isset($_POST['descuento_contrato'])) {
	   $costo_contrato=$_POST['costo_contrato'];
	   $descuento_contrato=$_POST['descuento_contrato'];
	   $total_descuento = $costo_contrato-($costo_contrato*($descuento_contrato/100)); 
}
/////////////////////VERIFICAR VARIABLES COSTO Y DESCUENTO CIERRO

//////////////Insertar COSTO Y DESCUENTO

if (!empty($costo_contrato) AND !empty($descuento_contrato) AND !empty($total_descuento)) {
	   mysqli_set_charset($connection, "utf8");
            $sql_tmp_costo="INSERT INTO  tmp_costo_descuento_contratp(costo_contrato,descuento_contrato,session_id) VALUES (?,?,?)";
            $resultado_tmp_costo=mysqli_prepare($connection, $sql_tmp_costo);
            mysqli_stmt_bind_param($resultado_tmp_costo, "iis", $costo_contrato,$descuento_contrato,$session_id);
            mysqli_stmt_execute($resultado_tmp_costo);
            mysqli_stmt_close($resultado_tmp_costo);
}
///////////////Insertar COSTO Y DESCUENTO Cierro

////////////////////ELIMINAR COSTO Y DESCUENTO
if (isset($_GET['id_costo_contrato']))//codigo elimina un elemento del array
{
		$id_tmp_costo_descuento=intval($_GET['id_costo_contrato']);
		mysqli_set_charset($connection, "utf8");
		$sql_costo_descuento="DELETE FROM tmp_costo_descuento_contratp WHERE id_tmp_costo=? ";
		$resultado_costo_descuento=mysqli_prepare($connection, $sql_costo_descuento);
		mysqli_stmt_bind_param($resultado_costo_descuento, "i", $id_tmp_costo_descuento);
		mysqli_stmt_execute($resultado_costo_descuento);	
}
////////////////////ELIMINAR COSTO Y DESCUENTO CIERRO





/////////////////////////////////////////////////VERIFICAR VARIABLES PLANES//////////////////////////////////////
if (isset($_POST['id_plan']) AND isset($_POST['precio_venta_planes']) AND isset($_POST['nombre_contrato_plan'])) {
	   $id_plan=$_POST['id_plan'];
	   $precio_plan=$_POST['precio_venta_planes'];
	   $nombre_plan=$_POST['nombre_contrato_plan']; 
}
/////////////////////////////////////////////////VERIFICAR VARIABLES PLANES CIERRO


/////////////Insertar PLANES

if (!empty($id_plan) AND !empty($precio_plan) AND !empty($nombre_plan)) {
	   mysqli_set_charset($connection, "utf8");
            $sql_tmp_plan="INSERT INTO tmp_planes_contrato(id_plan_contrato,nombre_plan_contrato,precio_plan_contrato ,session_id) VALUES (?,?,?,?)";
            $resultado_tmp_plan=mysqli_prepare($connection, $sql_tmp_plan);
            mysqli_stmt_bind_param($resultado_tmp_plan, "isis", $id_plan,$nombre_plan,$precio_plan,$session_id);
            mysqli_stmt_execute($resultado_tmp_plan);
            mysqli_stmt_close($resultado_tmp_plan);
}
///////////////Insertar PLANESO Cierro

////////////////////ELIMINAR PLANES
if (isset($_GET['id_planes_contrato']))//codigo elimina un elemento del array
{
		$id_tmp_planes=intval($_GET['id_planes_contrato']);
		mysqli_set_charset($connection, "utf8");
		$sql_eliminar_planes="DELETE FROM tmp_planes_contrato WHERE id_tmp_planes=? ";
		$resultado_eliminar_planes=mysqli_prepare($connection, $sql_eliminar_planes);
		mysqli_stmt_bind_param($resultado_eliminar_planes, "i", $id_tmp_planes);
		mysqli_stmt_execute($resultado_eliminar_planes);	
}
////////////////////ELIMINAR PLANES CIERRO

/////////////////////////////////////////////////VERIFICAR SERVICIOS ADICIONALES//////////////////////////////////////
if (isset($_POST['id_servicio']) AND isset($_POST['precio_servicio_contrato']) AND isset($_POST['cantidad_servicio_contrato']) AND isset($_POST['nombre_servicio_contrato'])) {
	   $id_servicio=$_POST['id_servicio'];
	   $precio_servicio=$_POST['precio_servicio_contrato'];
	   $cantidad_servicio=$_POST['cantidad_servicio_contrato'];
	   $nombre_servicio=$_POST['nombre_servicio_contrato']; 
}

///////////////Insertar SERVICIOS

if (!empty($id_servicio) AND !empty($precio_servicio) AND !empty($cantidad_servicio)) {
	   mysqli_set_charset($connection, "utf8");
            $sql_tmp_servicios="INSERT INTO tmp_servicios_contratos (id_servicio_contrato ,cantidad_tmp_contrato,nombre_tmp_contrato ,precio_tmp_contrato,session_id_contrato) VALUES (?,?,?,?,?)";
            $resultado_tmp_servicios=mysqli_prepare($connection, $sql_tmp_servicios);
            mysqli_stmt_bind_param($resultado_tmp_servicios, "iisis", $id_servicio,$cantidad_servicio,$nombre_servicio,$precio_servicio,$session_id);
            mysqli_stmt_execute($resultado_tmp_servicios);
            mysqli_stmt_close($resultado_tmp_servicios);
}
///////////////Insertar SERVICIOS Cierro


////////////////////ELIMINAR SERVICIOS
if (isset($_GET['id_servicio']))//codigo elimina un elemento del array
{
		$id_tmp_servicio=intval($_GET['id_servicio']);
		mysqli_set_charset($connection, "utf8");
		$sql_servicio="DELETE FROM tmp_servicios_contratos WHERE id_tmp=? ";
		$resultado_servicio=mysqli_prepare($connection, $sql_servicio);
		mysqli_stmt_bind_param($resultado_servicio, "i", $id_tmp_servicio);
		mysqli_stmt_execute($resultado_servicio);	
}
////////////////////ELIMINAR SERVICIOS CIERRO


/////////////////////////////////////////////////VERIFICAR FAMILIARES DIRECTO//////////////////////////////////////
if (isset($_POST['id_servicio']) AND isset($_POST['precio_servicio_contrato']) AND isset($_POST['cantidad_servicio_contrato']) AND isset($_POST['nombre_servicio_contrato'])) {
	   $id_servicio=$_POST['id_servicio'];
	   $precio_servicio=$_POST['precio_servicio_contrato'];
	   $cantidad_servicio=$_POST['cantidad_servicio_contrato'];
	   $nombre_servicio=$_POST['nombre_servicio_contrato']; 
}

///////////////Insertar SERVICIOS

if (!empty($id_servicio) AND !empty($precio_servicio) AND !empty($cantidad_servicio)) {
	   mysqli_set_charset($connection, "utf8");
            $sql_tmp_servicios="INSERT INTO tmp_servicios_contratos (id_servicio_contrato ,cantidad_tmp_contrato,nombre_tmp_contrato ,precio_tmp_contrato,session_id_contrato) VALUES (?,?,?,?,?)";
            $resultado_tmp_servicios=mysqli_prepare($connection, $sql_tmp_servicios);
            mysqli_stmt_bind_param($resultado_tmp_servicios, "iisis", $id_servicio,$cantidad_servicio,$nombre_servicio,$precio_servicio,$session_id);
            mysqli_stmt_execute($resultado_tmp_servicios);
            mysqli_stmt_close($resultado_tmp_servicios);
}
///////////////Insertar SERVICIOS Cierro


////////////////////ELIMINAR SERVICIOS
if (isset($_GET['id_servicio']))//codigo elimina un elemento del array
{
		$id_tmp_servicio=intval($_GET['id_servicio']);
		mysqli_set_charset($connection, "utf8");
		$sql_servicio="DELETE FROM tmp_servicios_contratos WHERE id_tmp=? ";
		$resultado_servicio=mysqli_prepare($connection, $sql_servicio);
		mysqli_stmt_bind_param($resultado_servicio, "i", $id_tmp_servicio);
		mysqli_stmt_execute($resultado_servicio);	
}
////////////////////ELIMINAR SERVICIOS CIERRO


?>

 <table>
 	<thead>
 		<th>Cantidad</th>
 		<th class="text-left">Descripcion</th>
 		<th class='text-right'>Precio Unit.</th>
 	    <th class='text-right'>Precio Total</th>
 	</thead>
 	<tbody>

		<?php
//////////////////////////////////////////////////COSTO Y DESCUENTO///////////////////////////////////////////////		 
			$sql_costo_descuento="SELECT * FROM tmp_costo_descuento_contratp WHERE session_id='".$session_id."'";
            $resultado_costo_descuento= mysqli_query($connection, $sql_costo_descuento);
/////////////////////////////////////////////////7COSTO Y DESCUENTO///////////////////////////////////////////////

/////////////////////////////////////////PLANES///////////////////////////////////////////////
            $sql_planes_resultado="SELECT * FROM tmp_planes_contrato WHERE session_id='".$session_id."'";
            $resultado_planes_resultado= mysqli_query($connection, $sql_planes_resultado);
/////////////////////////////////////////PLANES///////////////////////////////////////////////

/////////////////////////////////////////SERVICIOS///////////////////////////////////////////////
            $sql_servicios_resultado="SELECT * FROM tmp_servicios_contratos WHERE session_id_contrato ='".$session_id."'";
            $resultado_servicios_resultado= mysqli_query($connection, $sql_servicios_resultado);
/////////////////////////////////////////SERVICIOS///////////////////////////////////////////////



            $descuento_contrato=0;
            $costo_contrato=0;
            while($row_total=mysqli_fetch_array($resultado_costo_descuento)){
            $id_tmp_costo=$row_total['id_tmp_costo'];
            $costo_contrato=$row_total['costo_contrato'];
            $descuento_contrato=$row_total['descuento_contrato'];            
		?> 		
 		 	    <tr>
 		 	   		<td class="text-right"></td>
 		 	    	<td class="text-right"></td> 				
					<td class="text-right" >Costo Base del Contrato</td>
					<td class='text-right'><?php echo $costo_contrato;?>$</td>
					<td class="text-left"><a href="#" onclick="eliminar_costo_descuento('<?php echo $id_tmp_costo ?>')"><i class="material-icons pdf">cancel</i></a></td>
		 		</tr>
				<?php 
				}
				 ?>

			<?php
				$sumador_total_planes=0; 
				while($row_planes = mysqli_fetch_array($resultado_planes_resultado)){
				$id_tmp_plan=$row_planes['id_tmp_planes'];
				$id_plan=$row_planes['id_plan_contrato'];
				$nombre_tmp_plan=$row_planes['nombre_plan_contrato'];
				$precio_tmp_plan=$row_planes['precio_plan_contrato'];
				$sumador_total_planes+=$precio_tmp_plan;
			 ?>	 
				<tr>
					<td class="text-left"></td>
					<td class="text-left" >Plan-<?php echo $nombre_tmp_plan;?></td>
					<td class="text-left"></td>
					<td class='text-right' ><?php echo $precio_tmp_plan;?>$</td>
					<td class="text-left" ><a href="#" onclick="eliminar_planes_contrato('<?php echo $id_tmp_plan ?>')"><i class="material-icons pdf">cancel</i></a></td>
		 		</tr>
			<?php 
			  }
			 ?>

			 <?php
				$sumador_total_servicio=0; 
				while($row_servicio = mysqli_fetch_array($resultado_servicios_resultado)){
				$id_tmp_servicio=$row_servicio['id_tmp'];
				$id_servicio=$row_servicio['id_servicio_contrato'];
				$cantidad_servicio=$row_servicio['cantidad_tmp_contrato'];
				$nombre_tmp_servicio=$row_servicio['nombre_tmp_contrato'];
				$precio_tmp_servicio=$row_servicio['precio_tmp_contrato'];
				$total_servicio=$precio_tmp_servicio*$cantidad_servicio;
				$sumador_total_servicio+=$total_servicio;
			 ?>	 
				<tr>
					<td class="text-left"><?php echo $cantidad_servicio;?></td>
					<td class="text-left">Servicio-<?php echo $nombre_tmp_servicio;?></td>
					<td class='text-right' ><?php echo $precio_tmp_servicio;?>$</td>
					<td class='text-right' ><?php echo $total_servicio;?>$</td>
					<td class="text-left" ><a href="#" onclick="eliminar_servicios_contrato('<?php echo $id_tmp_servicio ?>')"><i class="material-icons pdf">cancel</i></a></td>
		 		</tr>
			<?php 
			  }
			 ?>


			 	<tr> 				
					<td class="text-right" colspan="3">SubTotal</td>
					<td class='text-right'><?php echo $costo_contrato+$sumador_total_planes+$sumador_total_servicio;?>$</td>
	 			</tr>
	 			
	 			<tr> 				
					<td class="text-right" colspan="3">Descuento</td>
					<td class='text-right'><?php echo $descuento_contrato;?>%</td>
	 			</tr>

	 			<tr> 				
					<td class="text-right" colspan="3">Total</td>
					<td class='text-right'><?php echo ($costo_contrato+$sumador_total_planes+$sumador_total_servicio)-(($costo_contrato+$sumador_total_planes+$sumador_total_servicio)*($descuento_contrato/100));?></td>

 				</tr>
    </tbody>
 </table>