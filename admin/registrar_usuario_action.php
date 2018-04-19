<?php 
session_start();
include('connect.php');
                $usuario= $_POST['usuario'];
                $password= $_POST['password'];
                              
         mysqli_set_charset($connection, "utf8");
        $sql="INSERT INTO usuario_admin (usuario,pass) VALUES (?,?)";
        $resultado=mysqli_prepare($connection, $sql);
        $ok=mysqli_stmt_bind_param($resultado, "ss", $usuario, $password);
        $ok=mysqli_stmt_execute($resultado);
        mysqli_stmt_close($resultado);

?>