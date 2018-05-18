<?php 
session_start();
$session_id= session_id();
require_once('../connect.php');

                $usu= $_POST['nombre_usuario'];
                $edad= $_POST['edad_usuario'];
                $estado_civil= $_POST['civil_usuario'];
                $dni_usuario= $_POST['dni_usuario'];                
                $comentario_usuario= $_POST['comentario_usuario'];
                $numero=$_POST['numero'];
                $pagado_usuario = 0;




//////////////////////INSERT USUARIO
            mysqli_set_charset($connection, "utf8");
            $sql="INSERT INTO User_servicios_individuales (nombre,edad,estado_civil,dni,comentario,numero_telefonico,pagado) VALUES (?,?,?,?,?,?,?)";
            $resultado=mysqli_prepare($connection, $sql);
            $ok=mysqli_stmt_bind_param($resultado, "sisissi", $usu,$edad,$estado_civil,$dni_usuario,$comentario_usuario,$numero,$pagado_usuario);
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



/////////////////////////////////////////////////////////////////////INSERT PARA LOS SERVICIOS
              $sql_servicios="SELECT * FROM Servicios,tmp_servicios_inviduales WHERE Servicios.id_servicios=tmp_servicios_inviduales.id_servicio AND tmp_servicios_inviduales.session_id='".$session_id."'";
                 $resultado_servicios= mysqli_query($connection, $sql_servicios);
                 while($row=mysqli_fetch_array($resultado_servicios)) {
                    $id_tmp_servicio=$row["id_servicio"];
                    $costo_servicio=$row['precio_tmp'];
                    $cantidad_servicio=$row['cantidad_tmp'];
                    $precio_total = $costo_servicio * $cantidad_servicio;
                  mysqli_set_charset($connection, "utf8");
                $sql2="INSERT INTO user_has_services (servicios_id_user, servicio_id_servicios,cantidad_servicio,precio_total) VALUES (?,?,?,?)";
                $resultado2=mysqli_prepare($connection, $sql2);
                $ok2=mysqli_stmt_bind_param($resultado2, "iiii", $idgenerado,$id_tmp_servicio,$cantidad_servicio,$precio_total);
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
 

  /////////////////////////////////INSERT PARA LOS PRODUCTOS  CIERRO  

 
             $sql_productos="SELECT * FROM stock,tmp_productos_individuales WHERE stock.id=tmp_productos_individuales.id_producto AND tmp_productos_individuales.session_id='".$session_id."'";
                 $resultado_productos= mysqli_query($connection, $sql_productos);
               while($row_producto=mysqli_fetch_array($resultado_productos)) {
                $id_tmp_producto=$row_producto["id_producto"];
                $cantidad_producto=$row_producto['cantidad_tmp_producto'];
                $precio_venta_producto=$row_producto['precio_tmp_producto'];


                  $sql5="SELECT objeto,cantidad,precio FROM stock WHERE id= ? AND cantidad >= ?";
                  $resultado5=mysqli_prepare($connection, $sql5);
                  mysqli_stmt_bind_param($resultado5, "ii", $id_tmp_producto, $cantidad_producto);    
                  $ok_producto=mysqli_stmt_execute($resultado5);
                  if (!$ok_producto) {
                    echo "Falla Al actualizar pedir el stock";
                  }
                  mysqli_stmt_bind_result($resultado5, $nombre, $cantidad, $precio_articulo);
                  mysqli_stmt_store_result($resultado5);
                  $fila5= mysqli_stmt_num_rows($resultado5);

                 // actualizo la db con los datos nuevos!

               while (mysqli_stmt_fetch($resultado5)) {

                if (empty($cantidad_producto)) {
                 $cantidad_producto = 0 ;
                }

                $resta = $cantidad - $cantidad_producto;

                mysqli_set_charset($connection, "utf8");
                $sql_update="UPDATE stock SET  cantidad=? WHERE id=?";
                $resultado_update=mysqli_prepare($connection, $sql_update);
                mysqli_stmt_bind_param($resultado_update, "ii", $resta,$id_tmp_producto);
                $ok5=mysqli_stmt_execute($resultado_update);
                mysqli_stmt_close($resultado_update);  

                  if (!$ok5) {
                    echo "Falla Al actualizar Stock";
                  }

               }


               $precio_total=$cantidad_producto * $precio_venta_producto;
                mysqli_set_charset($connection, "utf8");
                $sql3 = "INSERT INTO user_has_products(stock_id_stock, products_id_user,cantidad_comprada,precio_total) VALUES (?,?,?,?)";
                $resultado3=mysqli_prepare($connection, $sql3);
                mysqli_stmt_bind_param($resultado3, "iiii",$id_tmp_producto, $idgenerado,$cantidad_producto, $precio_total );
                $ok3=mysqli_stmt_execute($resultado3);
                mysqli_stmt_close($resultado3);
}


  /////////////////////////////////INSERT PARA LOS PRODUCTOS  CIERRO  

  /////////////////////////////////BORRAR SERVICIOS EN TMP
  
  mysqli_set_charset($connection, "utf8");
    $sql_servicio_borrar="DELETE FROM tmp_servicios_inviduales WHERE session_id=? ";
    $resultado_servicio_borrar=mysqli_prepare($connection, $sql_servicio_borrar);
    mysqli_stmt_bind_param($resultado_servicio_borrar, "s", $session_id);
    mysqli_stmt_execute($resultado_servicio_borrar);
     
              
     /////////////////////////////////BORRAR SERVICIOS EN TMP CIERRO
     

     /////////////////////////////////BORRAR PRODUCTOS EN TMP
  
  mysqli_set_charset($connection, "utf8");
    $sql_producto_borrar="DELETE FROM tmp_productos_individuales WHERE session_id=? ";
    $resultado_producto_borrar=mysqli_prepare($connection, $sql_producto_borrar);
    mysqli_stmt_bind_param($resultado_producto_borrar, "s", $session_id);
    mysqli_stmt_execute($resultado_producto_borrar);
     
              
     /////////////////////////////////BORRAR PRODUCTOS EN TMP CIERRO
     
      
                
        
mysqli_close($connection);
                  ?>