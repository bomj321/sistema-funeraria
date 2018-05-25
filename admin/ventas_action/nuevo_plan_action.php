<?php 
session_start();
$session_id= session_id();
require_once('../connect.php');
//RUTA IMAGEN
  $nombre_imagen = $_FILES['image']['name'];
  $tipo_imagen = $_FILES['image']['type'];
  $tamaño_imagen = $_FILES['image']['size'];   

if ($tamaño_imagen<=1000000) {
    if ($tipo_imagen=="image/gif" || $tipo_imagen=="image/jpg" || $tipo_imagen=="image/png" || $tipo_imagen=="image/jpeg"){
      // ruta del destino del servidor
        $carpeta = $_SERVER['DOCUMENT_ROOT']. "/sistema-funeraria/admin/img/";
        //mover imagen a directorio temporal
        move_uploaded_file($_FILES['image']['tmp_name'],$carpeta.$nombre_imagen);

      }else{
                echo"
                     <script>
                    alert('Error en el tipo de imagen');
                    window.location.href='nuevoplan.php';           
                    </script>
        ";
     }

    }else{

        echo "
                  <script>
                alert('Tamaño Demasiado Grande');
                window.location.href='nuevoplan.php';
                </script>
        ";
    }
    //RUTA IMAGEN
    
    
                $nom= $_POST['nombre'];
                $des= $_POST['descripcion'];
                $activo = 1;
//////////////////////////////////SELECCIONAR COSTO, DESCUENTO Y CUOTAS///////////////////////////////////
          $sql_costo_descuento="SELECT * FROM tmp_costo_descuento_plan WHERE session_id='".$session_id."'";
          $resultado_costo_descuento= mysqli_query($connection, $sql_costo_descuento);
          $row_costo_descuento=mysqli_fetch_array($resultado_costo_descuento);          
          $descuento_plan=$row_costo_descuento['descuento_planes'];
          $costo_plan=$row_costo_descuento['costo_planes'];
          $costo_total= $costo_plan-($costo_plan*($descuento_plan/100));//COSTO CON DESCUENTO
//////////////////////////////////SELECCIONAR COSTO, DESCUENTO Y CUOTAS CIERRO////////////////////////////

        mysqli_set_charset($connection, "utf8");
        $sql="INSERT INTO planes (nombre,descripcion,precio_plan,descuento_plan,plan_activo,image) VALUES (?,?,?,?,?,?)";
        $resultado=mysqli_prepare($connection, $sql);
        mysqli_stmt_bind_param($resultado, "ssiiis", $nom,$des,$costo_total,$descuento_plan,$activo,$nombre_imagen);
        mysqli_stmt_execute($resultado);        
                
        $idgenerado =mysqli_insert_id($connection);
        mysqli_stmt_close($resultado);





//////////////////////////////////SELECCIONAR ID SERVICIO/////////////////////////////////////
          $sql_servicio_planes="SELECT * FROM tmp_servicios_planes WHERE session_id='".$session_id."'";
          $resultado_servicio_planes= mysqli_query($connection, $sql_servicio_planes);
          while($row_servicio_planes=mysqli_fetch_array($resultado_servicio_planes)){
          $id_servicio=$row_servicio_planes['id_servicio_planes'];
          $cantidad_servicio=$row_servicio_planes['cantidad_tmp_planes'];
          
  /////////////////////////////////INSERT PARA LOS SERVICIOS 
                mysqli_set_charset($connection, "utf8");
                $sql2="INSERT INTO planes_has_services (planes_id_planes,servicio_id_servicios,cantidad_servicios_planes) VALUES (?,?,?)";
                $resultado2=mysqli_prepare($connection, $sql2);
                mysqli_stmt_bind_param($resultado2, "iii", $idgenerado,$id_servicio,$cantidad_servicio);
                $ok78=mysqli_stmt_execute($resultado2);
                mysqli_stmt_close($resultado2);
               if (!$ok78) {
                echo "

                <script>

               alert('Error en la insercion de Servicios vendidos');
              </script>";               
                
              }
 
}
  /////////////////////////////////INSERT PARA LOS SERVICIOS CIERRO    






/////////////////////////////////INSERT PARA LOS PRODUCTOS///////////////////////////////////////////////////
     
//////////////////////////////////SELECCIONAR PRODUCTOS////////////////////////////////////
          $sql_producto_planes="SELECT * FROM tmp_producto_plan WHERE session_id='".$session_id."'";
          $resultado_producto_planes= mysqli_query($connection, $sql_producto_planes);
          while($row_producto_planes=mysqli_fetch_array($resultado_producto_planes)){
          $id_producto=$row_producto_planes['id_producto'];
          $cantidad_producto=$row_producto_planes['cantidad_tmp_producto'];
//////////////////////////////////SELECCIONAR PRODUCTOS CIERRO////////////////////////////////////
          
                  mysqli_set_charset($connection, "utf8");
                $sql3 = "INSERT INTO planes_has_products(planes_id_planes_products, products_id_products,cantidad_comprada) VALUES (?,?,?)";
                $resultado3=mysqli_prepare($connection, $sql3);
                mysqli_stmt_bind_param($resultado3, "iii", $idgenerado,$id_producto,$cantidad_producto);
                $ok3=mysqli_stmt_execute($resultado3);
                mysqli_stmt_close($resultado3);

                 if (!$ok3) {
                echo "

                <script>

               alert('Error en la insercion de Productos vendidos');
              </script>";               
                
              }
                

                }
/////////////////////////////////INSERT PARA LOS PRODUCTOS///////////////////////////////////////////////////


/////////////////////////////////BORRAR DESCUENTO Y COSTO EN TMP/////////////////////////////////////////////////////
  
    mysqli_set_charset($connection, "utf8");
    $sql_descuento_costo_borrar="DELETE FROM tmp_costo_descuento_plan WHERE session_id=? ";
    $resultado_descuento_costo_borrar=mysqli_prepare($connection, $sql_descuento_costo_borrar);
    mysqli_stmt_bind_param($resultado_descuento_costo_borrar, "s", $session_id);
    mysqli_stmt_execute($resultado_descuento_costo_borrar);
     
              
     /////////////////////////////////BORRAR DESCUENTO Y COSTO EN TMP CIERRO//////////////////////////////////////////////
     
     /////////////////////////////////BORRAR PRODUCTOS EN TMP/////////////////////////////////////////////////////
  
    mysqli_set_charset($connection, "utf8");
    $sql_descuento_costo_borrar="DELETE FROM tmp_producto_plan WHERE session_id=? ";
    $resultado_descuento_costo_borrar=mysqli_prepare($connection, $sql_descuento_costo_borrar);
    mysqli_stmt_bind_param($resultado_descuento_costo_borrar, "s", $session_id);
    mysqli_stmt_execute($resultado_descuento_costo_borrar);
     
              
     /////////////////////////////////BORRAR PRODUCTOS EN TMP CIERRO//////////////////////////////////////////////
     
     /////////////////////////////////BORRAR SERVICIOS EN TMP/////////////////////////////////////////////////////
  
    mysqli_set_charset($connection, "utf8");
    $sql_descuento_costo_borrar="DELETE FROM tmp_servicios_planes WHERE session_id=? ";
    $resultado_descuento_costo_borrar=mysqli_prepare($connection, $sql_descuento_costo_borrar);
    mysqli_stmt_bind_param($resultado_descuento_costo_borrar, "s", $session_id);
    mysqli_stmt_execute($resultado_descuento_costo_borrar);
     
              
     /////////////////////////////////BORRAR SERVICIOS EN TMP CIERRO////////////////////////////////////////////
     

     
              
mysqli_close($connection);
                  ?>
                    
                    




