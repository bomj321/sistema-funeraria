<?php 
session_start();
include('connect.php');
				$id= $_POST['id'];
                $obj= $_POST['objeto'];
                $can= $_POST['cantidad'];
                $com= $_POST['comentario'];               
               
mysqli_set_charset($connection, "utf8");
		$sql="UPDATE stock SET objeto=?, cantidad=?, comentario=? WHERE id=?";
		$resultado=mysqli_prepare($connection, $sql);
		$ok=mysqli_stmt_bind_param($resultado, "sisi", $obj, $can, $com, $id);
		$ok=mysqli_stmt_execute($resultado);

       
mysqli_stmt_close($resultado);       

?>