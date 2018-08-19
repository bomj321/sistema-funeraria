<?php 
session_start();
require_once('../connect.php');
//RUTA IMAGEN
  $nombre_imagen_1 = $_FILES['imagen']['name'];
  $tipo_imagen_1 = $_FILES['imagen']['type'];
  $tamaño_imagen_1 = $_FILES['imagen']['size'];


  //SLIDER
  $nombre_imagen_2 = $_FILES['imagenslider1']['name'];
  $tipo_imagen2 = $_FILES['imagenslider1']['type'];
  $tamaño_imagen_2 = $_FILES['imagenslider1']['size'];

  $nombre_imagen_3 = $_FILES['imagenslider2']['name'];
  $tipo_imagen3 = $_FILES['imagenslider2']['type'];
  $tamaño_imagen_3 = $_FILES['imagenslider2']['size'];  

  $nombre_imagen_4 = $_FILES['imagenslider3']['name'];
  $tipo_imagen4 = $_FILES['imagenslider3']['type'];
  $tamaño_imagen_4 = $_FILES['imagenslider3']['size']; 

  //SOMOS NOSOTROS
  $nombre_imagen_5 = $_FILES['imagennosotros']['name'];
  $tipo_imagen5 = $_FILES['imagennosotros']['type'];
  $tamaño_imagen_5 = $_FILES['imagennosotros']['size']; 


  //TEXTAREAS
  $quienes_somos = $_POST['quienes_somos'];
  $que_hacemos = $_POST['que_hacemos'];
  $frase_celebre = $_POST['frase_celebre'];



if ($tamaño_imagen_1<=10000000  || $tamaño_imagen_2<=10000000  || $tamaño_imagen_3<=10000000  || $tamaño_imagen_4<=10000000  || $tamaño_imagen_5<=10000000) {
    if ($tipo_imagen_1=="image/gif" || $tipo_imagen_1=="image/jpg" || $tipo_imagen_1=="image/png" || $tipo_imagen_1=="image/jpeg" || $tipo_imagen_2=="image/gif" || $tipo_imagen_2=="image/jpg" || $tipo_imagen_2=="image/png" || $tipo_imagen_2=="image/jpeg" || $tipo_imagen_3=="image/gif" || $tipo_imagen_3=="image/jpg" || $tipo_imagen_3=="image/png" || $tipo_imagen_3=="image/jpeg" || $tipo_imagen_4=="image/gif" || $tipo_imagen_4=="image/jpg" || $tipo_imagen_4=="image/png" || $tipo_imagen_4=="image/jpeg" || $tipo_imagen_5=="image/gif" || $tipo_imagen_5=="image/jpg" || $tipo_imagen_5=="image/png" || $tipo_imagen_5=="image/jpeg"){
      // ruta del destino del servidor
        $carpeta = $_SERVER['DOCUMENT_ROOT']. "/sistema-funeraria/admin/img/";
        //mover imagen a directorio temporal
        move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta.$nombre_imagen_1);
        move_uploaded_file($_FILES['imagenslider1']['tmp_name'],$carpeta.$nombre_imagen_2);
        move_uploaded_file($_FILES['imagenslider2']['tmp_name'],$carpeta.$nombre_imagen_3);
        move_uploaded_file($_FILES['imagenslider3']['tmp_name'],$carpeta.$nombre_imagen_4);
        move_uploaded_file($_FILES['imagennosotros']['tmp_name'],$carpeta.$nombre_imagen_5);

      }

  }

    
//IMAGEN FRENTE
    
 if(empty($nombre_imagen_1)){
 		mysqli_set_charset($connection, "utf8");
		$sql="UPDATE contenido SET quienessomos=?,quehacemos=?,frase=? WHERE id=1";
		$resultado=mysqli_prepare($connection, $sql);
		mysqli_stmt_bind_param($resultado, "sss",$quienes_somos,$que_hacemos,$frase_celebre);
		mysqli_stmt_execute($resultado);       
        mysqli_stmt_close($resultado);



}else{


mysqli_set_charset($connection, "utf8");
		$sql="UPDATE contenido SET imagen_frente=?,quienessomos=?,quehacemos=?,frase=? WHERE id=1";
		$resultado=mysqli_prepare($connection, $sql);
		mysqli_stmt_bind_param($resultado, "ssss", $nombre_imagen_1,$quienes_somos,$que_hacemos,$frase_celebre);
		mysqli_stmt_execute($resultado);       
        mysqli_stmt_close($resultado);
 

} 

//IMAGEN FRENTE


//SLIDER 1

 if(empty($nombre_imagen_2)){
 		mysqli_set_charset($connection, "utf8");
		$sql="UPDATE contenido SET quienessomos=?,quehacemos=?,frase=? WHERE id=1";
		$resultado=mysqli_prepare($connection, $sql);
		mysqli_stmt_bind_param($resultado, "sss",$quienes_somos,$que_hacemos,$frase_celebre);
		mysqli_stmt_execute($resultado);       
        mysqli_stmt_close($resultado);



}else{


mysqli_set_charset($connection, "utf8");
		$sql="UPDATE contenido SET imagen1=?,quienessomos=?,quehacemos=?,frase=? WHERE id=1";
		$resultado=mysqli_prepare($connection, $sql);
		mysqli_stmt_bind_param($resultado, "ssss", $nombre_imagen_2,$quienes_somos,$que_hacemos,$frase_celebre);
		mysqli_stmt_execute($resultado);       
        mysqli_stmt_close($resultado);
 

}  

//SLIDER 1


//SLIDER 2

 if(empty($nombre_imagen_3)){
 		mysqli_set_charset($connection, "utf8");
		$sql="UPDATE contenido SET quienessomos=?,quehacemos=?,frase=? WHERE id=1";
		$resultado=mysqli_prepare($connection, $sql);
		mysqli_stmt_bind_param($resultado, "sss",$quienes_somos,$que_hacemos,$frase_celebre);
		mysqli_stmt_execute($resultado);       
        mysqli_stmt_close($resultado);



}else{


mysqli_set_charset($connection, "utf8");
		$sql="UPDATE contenido SET imagen2=?,quienessomos=?,quehacemos=?,frase=? WHERE id=1";
		$resultado=mysqli_prepare($connection, $sql);
		mysqli_stmt_bind_param($resultado, "ssss",$nombre_imagen_3,$quienes_somos,$que_hacemos,$frase_celebre);
		mysqli_stmt_execute($resultado);       
        mysqli_stmt_close($resultado);
 

}  

//SLIDER 2


//SLIDER 3

 if(empty($nombre_imagen_4)){
 		mysqli_set_charset($connection, "utf8");
		$sql="UPDATE contenido SET quienessomos=?,quehacemos=?,frase=? WHERE id=1";
		$resultado=mysqli_prepare($connection, $sql);
		mysqli_stmt_bind_param($resultado, "sss",$quienes_somos,$que_hacemos,$frase_celebre);
		mysqli_stmt_execute($resultado);       
        mysqli_stmt_close($resultado);



}else{


mysqli_set_charset($connection, "utf8");
		$sql="UPDATE contenido SET imagen3=?,quienessomos=?,quehacemos=?,frase=? WHERE id=1";
		$resultado=mysqli_prepare($connection, $sql);
		mysqli_stmt_bind_param($resultado, "ssss",$nombre_imagen_4,$quienes_somos,$que_hacemos,$frase_celebre);
		mysqli_stmt_execute($resultado);       
        mysqli_stmt_close($resultado);
 

}  

//SLIDER 3


//QUIENES SOMOS

 if(empty($nombre_imagen_5)){
 		mysqli_set_charset($connection, "utf8");
		$sql="UPDATE contenido SET quienessomos=?,quehacemos=?,frase=? WHERE id=1";
		$resultado=mysqli_prepare($connection, $sql);
		mysqli_stmt_bind_param($resultado, "sss",$quienes_somos,$que_hacemos,$frase_celebre);
		mysqli_stmt_execute($resultado);       
        mysqli_stmt_close($resultado);



}else{


mysqli_set_charset($connection, "utf8");
		$sql="UPDATE contenido SET imagennosotros=?,quienessomos=?,quehacemos=?,frase=? WHERE id=1";
		$resultado=mysqli_prepare($connection, $sql);
		mysqli_stmt_bind_param($resultado, "ssss",$nombre_imagen_5,$quienes_somos,$que_hacemos,$frase_celebre);
		mysqli_stmt_execute($resultado);       
        mysqli_stmt_close($resultado);
 

}  

//QUIENES SOMOS


    
              
mysqli_close($connection);
                  ?>
                    
                    




