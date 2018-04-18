<?php 
session_start();
include('connect.php');
				$estatus= $_GET['estado'];
                $id= $_GET['id'];               




if ($estatus == 0) {

       $sql = "UPDATE Servicios SET  servicio_activo= '0' WHERE id_servicios='$id'";
		mysqli_query($connection, $sql);
            mysqli_close($connection);
            echo "
				 <script>
                    window.location.href='servicio.php';           
                    </script>
            ";
}else{
$sql = "UPDATE Servicios SET  servicio_activo= '1' WHERE id_servicios='$id'";
		mysqli_query($connection, $sql);
            mysqli_close($connection);
            echo "
				 <script>
                    window.location.href='servicio.php';           
                    </script>
            ";


}
?>