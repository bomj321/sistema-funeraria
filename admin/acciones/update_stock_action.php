<?php 
session_start();
require_once('../connect.php');
//RUTA IMAGEN
  $nombre_imagen = $_FILES['image']['name'];
  $tipo_imagen = $_FILES['image']['type'];
  $tamaño_imagen = $_FILES['image']['size']; 

if(!empty($nombre_imagen)){
if ($tamaño_imagen<=1000000) {
    if ($tipo_imagen=="image/gif" || $tipo_imagen=="image/jpg" || $tipo_imagen=="image/png" || $tipo_imagen=="image/jpeg"){
      // ruta del destino del servidor
        $carpeta = $_SERVER['DOCUMENT_ROOT']. "/sistema-funeraria/admin/img_stock/";
        //mover imagen a directorio temporal
        move_uploaded_file($_FILES['image']['tmp_name'],$carpeta.$nombre_imagen);

      }else{
                echo"
                     <script>
                    alert('Error en el tipo de imagen');
                    window.location.href='./stock.php';           
                    </script>
        ";
     }

    }else{

        echo "
                  <script>
                alert('Tamaño Demasiado Grande');
                window.location.href='./stock.php';
                </script>
        ";
    }
}


    //RUTA IMAGEN
				$id= $_POST['id'];
                $obj= $_POST['objeto'];
                $can= $_POST['cantidad'];
                $com= $_POST['comentario'];
                $pre= $_POST['precio'];

if(empty($nombre_imagen)){
  mysqli_set_charset($connection, "utf8");
		$sql="UPDATE stock SET objeto=?, cantidad=?, precio=?, comentario=? WHERE id=?";
		$resultado=mysqli_prepare($connection, $sql);
		mysqli_stmt_bind_param($resultado, "siisi", $obj, $can,$pre,$com, $id);
		$ok=mysqli_stmt_execute($resultado);       
      mysqli_stmt_close($resultado);  
}else{
  mysqli_set_charset($connection, "utf8");
		$sql="UPDATE stock SET objeto=?, cantidad=?, precio=?, comentario=?,image=? WHERE id=?";
		$resultado=mysqli_prepare($connection, $sql);
		mysqli_stmt_bind_param($resultado, "siissi", $obj, $can,$pre,$com,$nombre_imagen,$id);
		$ok=mysqli_stmt_execute($resultado);       
        mysqli_stmt_close($resultado);  
}               
     

?>