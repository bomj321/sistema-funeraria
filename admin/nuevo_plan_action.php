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
                echo"alert('Tipo de Imagen Erronea');
                window.location.href='nuevoplan.php';
        ";
     }

    }else{

        echo "
                alert('Tamaño Demasiado Grande');
                window.location.href='nuevoplan.php';
        ";
    }
    //RUTA IMAGEN
                $nom= $_POST['nombre'];
                $cost= $_POST['costo'];
                $cuo= $_POST['cuota'];
                $des= $_POST['descripcion'];
                $servicios= $_POST['servicios'];               
                
        $sql = "INSERT INTO planes (nombre,plan_activo,descripcion,precio_plan,cuotas,image) VALUES ('$nom','1','$des','$cost', '$cuo', '$nombre_imagen')";
                $generalidades= mysqli_query($connection, $sql);
                
                  $idgenerado =mysqli_insert_id($connection);
                

            foreach($servicios as $serviciostotal){
              $sql2 ="INSERT INTO planes_has_services (planes_id_planes, servicio_id_servicios) VALUES ( '$idgenerado','$serviciostotal')"; 
                  $servicios_mysql= mysqli_query($connection, $sql2);
              }
                if (!$servicios_mysql){

  echo "
                      <script>
                    alert('Servicios no subidos');
                    </script>

                  ";

}

else{

  echo "
                      <script>
                    alert('Servicios  subidos');
                    </script>

                  ";

}

                if (!$generalidades) {
                  echo "
                      <script>
                    alert('Error en el registro, contacta al administrador');
                    window.location.href='nuevoplan.php';           
                    </script>

                  ";
                }else{
                  echo "
                       <script>
                    alert('Registrado Correctamente');
                    window.location.href='nuevoplan.php';           
                    </script>

                  ";

                }
                mysqli_close($connection);
                
?>





