<?php
session_start();
include('connect.php');
        $usuario = $_POST['usuario'];
        $_SESSION['usuario']=$usuario;
        $password = $_POST['password'];
        $_SESSION['password']=$password;


        mysqli_set_charset($connection, "utf8");
        $sql="SELECT * FROM usuario_admin WHERE usuario= ? AND pass=?";
        $resultado=mysqli_prepare($connection, $sql);
        $ok=mysqli_stmt_bind_param($resultado, "ss", $usuario, $password);
        $ok=mysqli_stmt_execute($resultado);        
                



                if(!$ok) {
                echo " 
                    <script>
                    alert('Error en el login por Favor Intente de Nuevo');
                    window.location.href='index.php';           
                    </script>            
                ";
                 /* Cerrando conexion*/
                
            }else{
                echo "
                    <script>
                    alert('Registro Completo');
                    window.location.href='sistema.php';           
                    </script>
                ";
            }
        mysqli_stmt_close($resultado);
?>
