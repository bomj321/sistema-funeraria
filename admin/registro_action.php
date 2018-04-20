<?php
session_start();
include('connect.php');
       

        $usuario = mysqli_real_escape_string($connection,$_POST['usuario']);
        $password = mysqli_real_escape_string($connection,$_POST['password']);
        $_SESSION['usuario']=$usuario;
        $_SESSION['password']=$password;

        $comprobar = "SELECT * FROM usuario_admin WHERE usuario= '$usuario' AND pass= '$password'";
        $comprobacion = $connection->query($comprobar);
        $row=$comprobacion->fetch_assoc();
       


        if(mysqli_num_rows($comprobacion)==0) {
              echo "
                        <script>
                        alert('Error en el Usuario');
                                window.location.href='index.php';
                        </script>

              ";
        }else{

                echo "
                        <script>
                        alert('Registro Completo');
                                window.location.href='sistema.php';
                        </script>

              ";
        }
               mysqli_connect($connection);

?>
