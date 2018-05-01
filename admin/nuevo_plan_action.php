<?php 
session_start();
include('connect.php');
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
                $cost= $_POST['costo'];                
                $des= $_POST['descripcion'];
                $activo = 1;


        mysqli_set_charset($connection, "utf8");
        $sql="INSERT INTO planes (nombre,descripcion,precio_plan,plan_activo,image) VALUES (?,?,?,?,?)";
        $resultado=mysqli_prepare($connection, $sql);
        $ok=mysqli_stmt_bind_param($resultado, "ssiis", $nom,$des,$cost,$activo,$nombre_imagen);
        $ok=mysqli_stmt_execute($resultado);        
                
        $idgenerado =mysqli_insert_id($connection);
        mysqli_stmt_close($resultado);




$servicios= $_POST['servicios'];
  /////////////////////////////////INSERT PARA LOS SERVICIOS     
  ///         
            
            foreach($servicios as $serviciostotal){

                mysqli_set_charset($connection, "utf8");
                $sql2="INSERT INTO planes_has_services (planes_id_planes, servicio_id_servicios) VALUES (?,?)";
                $resultado2=mysqli_prepare($connection, $sql2);
                $ok2=mysqli_stmt_bind_param($resultado2, "is", $idgenerado, $serviciostotal);
                $ok2=mysqli_stmt_execute($resultado2);
                mysqli_stmt_close($resultado2);
              
              }

 $productos= $_POST['producto'];               
/////////////////////////////////INSERT PARA LOS PRODUCTOS     
  ////////////////////////////////SEGUNDO FOREACH
                foreach ($productos as $productostotales) {

                $sql5="SELECT objeto,cantidad FROM stock WHERE id= ? ";
                  $resultado5=mysqli_prepare($connection, $sql5);
                  mysqli_stmt_bind_param($resultado5, "i", $productostotales['id']);    
                  $ok5=mysqli_stmt_execute($resultado5);
                  mysqli_stmt_bind_result($resultado5, $nombre, $cantidad);
                  mysqli_stmt_store_result($resultado5);
                  $fila5= mysqli_stmt_num_rows($resultado5);



            if (!empty($productostotales['cantidad'])) {
                  mysqli_set_charset($connection, "utf8");
                $sql3 = "INSERT INTO planes_has_products(planes_id_planes_products, products_id_products,cantidad_comprada) VALUES (?,?,?)";
                $resultado3=mysqli_prepare($connection, $sql3);
                mysqli_stmt_bind_param($resultado3, "iii", $idgenerado,$productostotales['id'], $productostotales['cantidad']);
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
               
        include('planes_tabla.php');

                  ?>
                    
                    




