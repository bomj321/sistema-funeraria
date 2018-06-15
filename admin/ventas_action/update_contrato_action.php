<?php 
session_start();
require_once('../connect.php');
				$id= $_POST['editar_id'];
                $nombre= $_POST['editar_nombre'];
				$estado_civil= $_POST['estado_editar'];
                $nacimiento= $_POST['editar_nacimiento'].' 00:00:00.000000';
				$dni= $_POST['editar_dni'];
				$numero_cliente= $_POST['editar_numero'];
				$email= $_POST['editar_email'];
				$direccion= $_POST['editar_direccion'];
				$nombre_familiar= $_POST['nombre_familiar_editar'];
				$numero_familiar= $_POST['numero_familiar_editar'];
                $genero= $_POST['genero_editar'];
				
               

mysqli_set_charset($connection, "utf8");
		$sql="UPDATE User SET nombre= ?, estado= ?, nacimiento= ?, dni= ?, numero= ?, email= ?, direccion= ?, nombre_familiar= ?, numero_familiar= ?, sexo=?  WHERE idUser_user= ?";
		$resultado=mysqli_prepare($connection, $sql);
		$ok=mysqli_stmt_bind_param($resultado, "ssssssssssi", $nombre, $estado_civil, $nacimiento,$dni,$numero_cliente,$email,$direccion,$nombre_familiar,$numero_familiar,$genero,$id);
		$ok=mysqli_stmt_execute($resultado);

       
mysqli_stmt_close($resultado);

?>