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
        $sql="INSERT INTO User_servicios_individuales (nombre,edad,estado_civil,dni,comentario,pagado) VALUES (?,?,?,?,?,?)";
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

            $productos= $_POST['producto'];
/////////////////////////////////INSERT PARA LOS PRODUCTOS     
  ///
              foreach ($productos as $productostotales) {
                mysqli_set_charset($connection, "utf8");
                $sql3 = "INSERT INTO user_has_products(stock_id_stock, products_id_user) VALUES (?,?)";
                $resultado3=mysqli_prepare($connection, $sql3);
                mysqli_stmt_bind_param($resultado3, "ii",$productostotales['id'], $idgenerado );
                $ok3=mysqli_stmt_execute($resultado3);
                mysqli_stmt_close($resultado3);
    
    
                }

              if (!$ok) {
              	echo "
						<script>

							alert('Error en la insercion de datos de Usuario');
						</script>

              	";
              }

              if (!$ok2) {
              	echo "
						<script>

							alert('Error en la insercion de servicios vendidos');
						</script>

              	";
              }
              if (!$ok3) {
                echo "error";               
                echo $productos[1]['id'];
              }
                

              // include('venta_servicios_tabla.php');
        

                  ?>
                    
                    




