<?php 
session_start();
require_once('../connect.php');
				$id= $_POST['actualizar_id'];
                $nombre= $_POST['actualizar_nombre'];
				$estado_civil= $_POST['estado_actualizar'];
                $nacimiento= $_POST['actualizar_nacimiento'].' 00:00:00.000000';
				$dni= $_POST['actualizar_dni'];
				$numero_cliente= $_POST['actualizar_numero'];
				$email= $_POST['actualizar_email'];
				$direccion= $_POST['actualizar_direccion'];
				$nombre_familiar= $_POST['nombre_familiar_actualizar'];
				$numero_familiar= $_POST['numero_familiar_actualizar'];
                $genero= $_POST['genero_actualizar'];
				
               

mysqli_set_charset($connection, "utf8");
		$sql="UPDATE Clientes SET nombre= ?, estado= ?, nacimiento= ?, dni= ?, numero= ?, email= ?, direccion= ?, nombre_familiar= ?, numero_familiar= ?, sexo=?  WHERE id_cliente=?";
		$resultado=mysqli_prepare($connection, $sql);
		$ok=mysqli_stmt_bind_param($resultado, "ssssssssssi", $nombre, $estado_civil, $nacimiento,$dni,$numero_cliente,$email,$direccion,$nombre_familiar,$numero_familiar,$genero,$id);
		$ok=mysqli_stmt_execute($resultado);

       
mysqli_stmt_close($resultado);

?>