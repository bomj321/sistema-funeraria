<?php
include('connect.php');


        $usuario= $_POST['usuario'];
        $password= $_POST['password'];        
        
        

      
       

$sql="SELECT usuario,pass,perfil FROM usuario_admin WHERE usuario= ? ";
$resultado=mysqli_prepare($connection, $sql);
  mysqli_stmt_bind_param($resultado, "s", $usuario);    
  mysqli_stmt_execute($resultado);
  mysqli_stmt_store_result($resultado);
  $fila= mysqli_stmt_num_rows($resultado);

        if ($fila ==0){
                               echo "
                                 <script>
                                        alert('Usuario Incorrecto');
                                        window.location.href ='../index.php';
                                 </script>  
                            ";
                       }

  mysqli_stmt_bind_result($resultado, $usuario2, $pass_cifrado,$perfil);
        while (mysqli_stmt_fetch($resultado)) {  

              if (password_verify($password, $pass_cifrado)) {
                     session_start();
                     $_SESSION['perfil']=$perfil;
                     $_SESSION['usuario']=$usuario;
                     $_SESSION['password']=$password;
                            echo "
                                 <script>
                                        alert('Registro Completo');
                                        window.location.href ='sistema.php';
                                 </script>  
                            ";

                }else {
                     session_destroy();
                                 echo "
                                 <script>
                                        alert('Contraseña Incorrecta');
                                        window.location.href ='../index.php';
                                 </script>  
                            ";
                            
                       }
        }




mysqli_stmt_close($resultado);

?>