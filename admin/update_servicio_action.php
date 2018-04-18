<?php 
session_start();
include('connect.php');
				$ids= $_POST['id_servicio'];
                $descs= $_POST['descripcion'];
                $costs= $_POST['costo'];
               

mysqli_set_charset($connection, "utf8");
		$sql="UPDATE Servicios SET descripcion_servicio= ?, servicio_activo= '1', costo= ?  WHERE id_servicios= ?";
		$resultado=mysqli_prepare($connection, $sql);
		$ok=mysqli_stmt_bind_param($resultado, "sii", $descs, $costs, $ids);
		$ok=mysqli_stmt_execute($resultado);

       
mysqli_stmt_close($resultado);

?>