<?php 
session_start();
include('connect.php');	




        $id= $_GET['id'];

		mysqli_set_charset($connection, "utf8");
		$sql="DELETE FROM planes WHERE id_planes=? ";
		$resultado=mysqli_prepare($connection, $sql);
		$ok=mysqli_stmt_bind_param($resultado, "i", $id);
		$ok=mysqli_stmt_execute($resultado);


if($ok==true){

			 echo "
				 <script>
                 
                    window.location.href='nuevoplan.php';           
                </script>
            ";
            mysqli_stmt_close($resultado);

		}else{

			echo "
				 <script>
                 	alert('Eliminacion no Exitosa');
                    window.location.href='nuevoplan.php';           
                </script>
            ";
			
		}
            
           



mysqli_stmt_close($resultado);
?>