<?php 
session_start();
include('connect.php');
				$id_usuario= $_GET['id'];
                $pagado_usuario= $_GET['pagado'];
               
if (!$pagado_usuario) {
$pagado_usuario=0;	

mysqli_set_charset($connection, "utf8");
		$sql="UPDATE User_servicios_individuales SET pagado= ? WHERE idUser= ?";
		$resultado=mysqli_prepare($connection, $sql);
		$ok=mysqli_stmt_bind_param($resultado, "ii", $pagado_usuario, $id_usuario);
		$ok=mysqli_stmt_execute($resultado);

		echo "
                                 <script>
                                        
                                        window.location.href ='control_venta_servicios.php';
                                 </script>  
                            ";

 }elseif($pagado_usuario=1){

 	$pagado_usuario=1;
 	mysqli_set_charset($connection, "utf8");
		$sql="UPDATE User_servicios_individuales SET pagado= ? WHERE idUser= ?";
		$resultado=mysqli_prepare($connection, $sql);
		$ok=mysqli_stmt_bind_param($resultado, "ii", $pagado_usuario, $id_usuario);
		$ok=mysqli_stmt_execute($resultado);

		echo "
                                 <script>
                                        
                                        window.location.href ='control_venta_servicios.php';
                                 </script>  
                            ";
 }      
mysqli_stmt_close($resultado);

?>