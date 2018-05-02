<?php 
session_start();
include('connect.php');

				

                //////////////////////INSERT USUARIO
            mysqli_set_charset($connection, "utf8");
            $sql5="SELECT idUser, numero_contrato FROM User";
           		$resultado5=mysqli_prepare($connection, $sql5);                     
                  $ok5=mysqli_stmt_execute($resultado5);
                  mysqli_stmt_bind_result($resultado5, $id, $numero);
                  mysqli_stmt_store_result($resultado5);
                  $fila5= mysqli_stmt_num_rows($resultado5);

//////////////////////INSERT USUARIO CIERRO


 while (mysqli_stmt_fetch($resultado5)) {
                echo $id. '</br>';
                echo $numero . '</br>';

                echo $id . $numero . '</br>';
                echo $numero . $id;             
          }






mysqli_close($connection)
?>