<?php 
session_start();
include('connect.php');
				$id= $_POST['id'];
                $obj= $_POST['objeto'];
                $can= $_POST['cantidad'];
                $com= $_POST['comentario'];
                $pre= $_POST['precio'];               
               
mysqli_set_charset($connection, "utf8");
		$sql="UPDATE stock SET objeto=?, cantidad=?, precio=?, comentario=? WHERE id=?";
		$resultado=mysqli_prepare($connection, $sql);
		$ok=mysqli_stmt_bind_param($resultado, "siisi", $obj, $can,$pre,$com, $id);
		$ok=mysqli_stmt_execute($resultado);

       
mysqli_stmt_close($resultado);       

?>