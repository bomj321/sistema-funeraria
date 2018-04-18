<?php 
session_start();
include('connect.php');
				$id= $_POST['id'];
                $obj= $_POST['objeto'];
                $can= $_POST['cantidad'];
                $com= $_POST['comentario'];               
               

       $sql = "UPDATE stock SET objeto='$obj', cantidad='$can', comentario='$com' WHERE id='$id'";
		mysqli_query($connection, $sql);
            mysqli_close($connection);

?>