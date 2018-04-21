<?php
        $usuario= $_POST['usuario'];
        $password= $_POST['password'];
        try {
        require_once('connect.php');
        $stmt = $connection->prepare("SELECT * FROM `usuario_admin` WHERE `usuario` = ?;");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $stmt->bind_result($id, $usuario, $password_usuario);
        $stmt->fetch(); 
        if ( password_verify($password, $password_usuario) ) { //no esta funcionando password_verify
                echo "bien";
                echo $password_usuario;

        }else{
                echo "contraseñas incorrectas";
                $verificar = password_verify($password, $password_usuario);
                echo $verificar;
                
        }
        $stmt->close();
        $connection->close();
        }
        catch (Exception $e)
        { echo"Error:" . $e->getMessage();} 
?>

