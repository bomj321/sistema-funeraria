<?php 
session_start();
$session_id= session_id();
require_once('../connect.php');

				$usu= $_POST['nombre_cliente'];
				$estado_civil= $_POST['civil_cliente'];
                $edad= $_POST['edad_cliente'];
                $dni= $_POST['dni_cliente'];
                $numero= $_POST['numero_cliente'];                   
                $email= $_POST['email_cliente'];
                $direccion= $_POST['direccion_cliente'];
                $genero= $_POST['genero_cliente'];
                $familiar_contacto= $_POST['familiar_cliente'];
     			$telefono_familiar= $_POST['telefono_familiar_cliente'];
                $activo=0;

                //////////////////////INSERT USUARIO
            mysqli_set_charset($connection, "utf8");
            $sql_user="INSERT INTO clientes (activo,nombre,estado,nacimiento,dni,numero,email,direccion,nombre_familiar,numero_familiar,sexo) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
            $resultado_user=mysqli_prepare($connection, $sql_user);
           	mysqli_stmt_bind_param($resultado_user, "issssssssss",$activo,$usu,$estado_civil,$edad,$dni,$numero,$email,$direccion,$familiar_contacto,$telefono_familiar,$genero);
            $ok=mysqli_stmt_execute($resultado_user);
            $idgenerado =mysqli_insert_id($connection);
            mysqli_stmt_close($resultado_user);
             if (!$ok) {
               echo "
             <script>

              alert('Error en la insercion de datos de Usuario');
             </script>

               ";
              }

//////////////////////INSERT USUARIO CIERRO
mysqli_close($connection)
?>