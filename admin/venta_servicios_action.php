<?php 
session_start();
include('connect.php');

                $usu= $_POST['nombre_usuario'];
                $edad= $_POST['edad_usuario'];
                $estado_civil= $_POST['civil_usuario'];
                $dni_usuario= $_POST['dni_usuario'];                
                $comentario_usuario= $_POST['comentario_usuario'];
                $pagado_usuario = 0;
                

                $productos= $_POST['producto'];
/////////////////////////////////VERIFICAR STOCK    
  ///
              foreach ($productos as $productosverificar) {
                $sql4="SELECT objeto,cantidad FROM stock WHERE id= ? AND cantidad >= ?";
                  $resultado4=mysqli_prepare($connection, $sql4);
                  mysqli_stmt_bind_param($resultado4, "ii", $productosverificar['id'], $productosverificar['cantidad']);    
                  $ok4=mysqli_stmt_execute($resultado4);
                  mysqli_stmt_bind_result($resultado4, $nombre, $cantidad);
                  mysqli_stmt_store_result($resultado4);
                  $fila= mysqli_stmt_num_rows($resultado4);

                  if ($fila ==0){

                    echo "

                      <script>
                          alert('La cantidad es mayor a lo que posee el Stock');
                          window.location.href ='venta_servicios.php';
                      </script>
                    ";
                  }             
             
                }



/////////////////////////////////VERIFICAR STOCK    CIERRO  


//////////////////////INSERT USUARIO
            mysqli_set_charset($connection, "utf8");
            $sql="INSERT INTO User_servicios_individuales (nombre,edad,estado_civil,dni,comentario,pagado) VALUES (?,?,?,?,?,?)";
            $resultado=mysqli_prepare($connection, $sql);
            $ok=mysqli_stmt_bind_param($resultado, "sisisi", $usu,$edad , $estado_civil, $dni_usuario, $comentario_usuario,$pagado_usuario);
            $ok=mysqli_stmt_execute($resultado);        
                    
            $idgenerado =mysqli_insert_id($connection);
            mysqli_stmt_close($resultado);

             if (!$ok) {
               echo "
             <script>

              alert('Error en la insercion de datos de Usuario');
             </script>

               ";
              }

//////////////////////INSERT USUARIO CIERRO





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

                if (!$ok2) {
               echo "
              <script>

               alert('Error en la insercion de servicios vendidos');
              </script>

               ";
              }
              
              }
 /////////////////////////////////INSERT PARA LOS SERVICIOS  CIERRO  
 /// 
      
              ////////////////////////////////SEGUNDO FOREACH
                foreach ($productos as $productostotales) {
                $sql5="SELECT objeto,cantidad,precio FROM stock WHERE id= ? AND cantidad >= ?";
                  $resultado5=mysqli_prepare($connection, $sql5);
                  mysqli_stmt_bind_param($resultado5, "ii", $productostotales['id'], $productostotales['cantidad']);    
                  $ok5=mysqli_stmt_execute($resultado5);
                  mysqli_stmt_bind_result($resultado5, $nombre, $cantidad, $precio_articulo);
                  mysqli_stmt_store_result($resultado5);
                  $fila5= mysqli_stmt_num_rows($resultado5);

                 // actualizo la db con los datos nuevos!

               while (mysqli_stmt_fetch($resultado5)) {
                if (empty($productostotales['cantidad'])) {
                 $productostotales['cantidad'] = 0 ;
                }

                $resta = $cantidad - $productostotales['cantidad'];

                mysqli_set_charset($connection, "utf8");
                $sql_update="UPDATE stock SET  cantidad=? WHERE id=?";
                $resultado_update=mysqli_prepare($connection, $sql_update);
                $ok=mysqli_stmt_bind_param($resultado_update, "ii", $resta,$productostotales['id'] );
                $ok5=mysqli_stmt_execute($resultado_update);

                     
              mysqli_stmt_close($resultado_update);               
          }

      
       


            if (!empty($productostotales['cantidad'])) {
                  $precio_total=$productostotales['cantidad'] * $precio_articulo;
                      mysqli_set_charset($connection, "utf8");
                $sql3 = "INSERT INTO user_has_products(stock_id_stock, products_id_user,cantidad_comprada,precio_total) VALUES (?,?,?,?)";
                $resultado3=mysqli_prepare($connection, $sql3);
                mysqli_stmt_bind_param($resultado3, "iiii",$productostotales['id'], $idgenerado,$productostotales['cantidad'], $precio_total );
                $ok3=mysqli_stmt_execute($resultado3);
                mysqli_stmt_close($resultado3);

                 if (!$ok3) {
                echo "

                <script>

               alert('Error en la insercion de Productos vendidos');
              </script>";               
                
              }
                }

                }
////////////////////////////////SEGUNDO FOREACH
         
                
mysqli_stmt_close($resultado4);
              // include('venta_servicios_tabla.php');
        

                  ?>
              
                    
                    




