<?php 
include('connect.php');
function peticion_ajax(){
        return isset($_SERVER['HTTP_x_REQUESTED_WITH']) && $_SERVER['HTTP_x_REQUESTED_WITH'] == 'XMLHttpRequest';
}
$usuario= $_POST['usuario'];
$password= $_POST['password'];
$perfil= $_POST['perfil'];
$pass_cifrado=password_hash($password, PASSWORD_DEFAULT, array("cost"=>12));

$sql="INSERT INTO usuario_admin (usuario,pass,perfil) VALUES (?,?,?)";
$resultado=mysqli_prepare($connection, $sql);
$ok=mysqli_stmt_bind_param($resultado, "sss", $usuario, $pass_cifrado,$perfil);
$ok=mysqli_stmt_execute($resultado);
mysqli_stmt_close($resultado);
?>