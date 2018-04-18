<?php 
session_start();
include('connect.php');

                $id= $_GET['id'];               
                $estatus = mysqli_real_escape_string($connection, $_GET['estado']);



if ($estatus==0) {

mysqli_set_charset($connection, "utf8");
        $sql="UPDATE Servicios SET servicio_activo='0' WHERE id_servicios= ? ";
        $resultado=mysqli_prepare($connection, $sql);
        $ok=mysqli_stmt_bind_param($resultado, "i", $id);
        $ok=mysqli_stmt_execute($resultado);
      
            echo "
				 <script>
                    window.location.href='servicio.php';           
                    </script>
            ";
}elseif($estatus==1){


mysqli_set_charset($connection, "utf8");
        $sql="UPDATE Servicios SET servicio_activo='1' WHERE id_servicios= ? ";
        $resultado=mysqli_prepare($connection, $sql);
        $ok=mysqli_stmt_bind_param($resultado, "i", $id);
        $ok=mysqli_stmt_execute($resultado);

         echo "
				<script>
                window.location.href='servicio.php';           
                </script>
             ";


}

mysqli_stmt_close($resultado);

?>