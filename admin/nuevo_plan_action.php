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
                $flo= $_POST['flores'];
                $ata= $_POST['ataud'];
                $ref= $_POST['refrigerio'];
                $hab= $_POST['habitacion'];
                $tran= $_POST['transporte'];

        $sql = "INSERT INTO planes (nombre,costo,cuotas,ataud,comida,habitacion,transporte,flores,imagen) VALUES ('$nom', '$cost', '$cuo', '$ata', '$ref', '$hab', '$tran', '$flo', '$nombre_imagen')";
                $generalidades= mysqli_query($connection, $sql);
                mysqli_close($connection);
                
?>





