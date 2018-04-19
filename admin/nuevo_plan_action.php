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
                $cuo= $_POST['cuota'];
                $des= $_POST['descripcion'];



        mysqli_set_charset($connection, "utf8");
        $sql="INSERT INTO planes (nombre,plan_activo,descripcion,precio_plan,cuotas,image) VALUES (?,'1',?,?,?,?)";
        $resultado=mysqli_prepare($connection, $sql);
        $ok=mysqli_stmt_bind_param($resultado, "ssiis", $nom, $des, $cost, $cuo, $nombre_imagen);
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
                

               
        include('planes_tabla.php');

                  ?>
                    
                    




