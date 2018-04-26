<?php 
session_start();
include('connect.php');

                $usu= $_POST['nombre_usuario'];
                $edad= $_POST['edad_usuario'];
                $estado_civil= $_POST['civil_usuario'];
                $dni_usuario= $_POST['dni_usuario'];                
                $comentario_usuario= $_POST['comentario_usuario'];
                $pagado_usuario = 0;
                


        mysqli_set_charset($connection, "utf8");
        $sql="INSERT INTO User_servicios_indiduales (nombre,edad,estado_civil,dni,comentario,pagado) VALUES (?,?,?,?,?,?)";
        $resultado=mysqli_prepare($connection, $sql);
        $ok=mysqli_stmt_bind_param($resultado, "sisisi", $usu,$edad , $estado_civil, $dni_usuario, $comentario_usuario,$pagado_usuario);
        $ok=mysqli_stmt_execute($resultado);        
                
        $idgenerado =mysqli_insert_id($connection);
        mysqli_stmt_close($resultado);


		$servicios= $_POST['servicios_venta_venta'];
  /////////////////////////////////INSERT PARA LOS SERVICIOS     
  ///         
            
            foreach($servicios as $serviciostotal){

                mysqli_set_charset($connection, "utf8");
                $sql2="INSERT INTO user_has_services (servicios_id_user, servicio_id_servicios) VALUES (?,?)";
                $resultado2=mysqli_prepare($connection, $sql2);
                $ok2=mysqli_stmt_bind_param($resultado2, "ii", $idgenerado,$serviciostotal );
                $ok2=mysqli_stmt_execute($resultado2);
                mysqli_stmt_close($resultado2);
              
              }

              if (!$ok) {
              	echo "
						<script>

							alert('Error');
						</script>

              	";
              }

              if (!$ok2) {
              	echo "
						<script>

							alert('Error2');
						</script>

              	";
              }
                

               include('venta_servicios_tabla.php');
        

                  ?>
                    
                    




