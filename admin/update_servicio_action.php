<?php 
session_start();
include('connect.php');
				$ids= $_POST['id_servicio'];
                $descs= $_POST['descripcion'];
                $costs= $_POST['costo'];
               

       $sql = "UPDATE Servicios SET descripcion_servicio='$descs', servicio_activo= '1', costo='$costs'  WHERE id_servicios='$ids'";
		mysqli_query($connection, $sql);
            mysqli_close($connection);

?>