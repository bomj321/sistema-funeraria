<?php
session_start();
include('connect.php');


        $usuario= $_POST['usuario'];
        $password= $_POST['password'];        
        $_SESSION['usuario']=$usuario;
        $_SESSION['password']=$password;
        

      
       

$sql="SELECT usuario,pass FROM usuario_admin WHERE usuario= ? ";
$resultado=mysqli_prepare($connection, $sql);
  mysqli_stmt_bind_param($resultado, "s", $usuario);    
  mysqli_stmt_execute($resultado);
  mysqli_stmt_bind_result($resultado, $usuario2, $pass_cifrado);

        while (mysqli_stmt_fetch($resultado)) {                 
                 if (password_verify($password, $pass_cifrado)) {
                            echo "
                                 <script>
                                        alert('Registro Completo');
                                        window.location.href ='sistema.php';
                                 </script>  
                            ";
                } else {
                                 echo "
                                 <script>
                                        alert('Usuario Incorrecto');
                                        window.location.href ='index.php';
                                 </script>  
                            ";
                       }
        }




mysqli_stmt_close($resultado);

?>