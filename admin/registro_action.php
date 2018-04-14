<?php
session_start();
include('connect.php');
        $femail = $_POST['email'];
        $_SESSION['confemail']=$femail;
        $password = $_POST['password'];
        $_SESSION['password']=$password;         
                $sql = "SELECT * FROM usuarios WHERE email= '$femail' AND pass='$password'";
                    $resultado= mysqli_query($connection, $sql);
                        $row=mysqli_fetch_array($resultado);
            if(mysqli_num_rows($resultado) == 0) {
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
            mysqli_close($connection);
?>
