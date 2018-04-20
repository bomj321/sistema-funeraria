<?php 
include('connect.php');
function peticion_ajax(){
        return isset($_SERVER['HTTP_x_REQUESTED_WITH']) && $_SERVER['HTTP_x_REQUESTED_WITH'] == 'XMLHttpRequest';
}
$usuario= $_POST['usuario'];
$password= $_POST['password'];
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

mysqli_set_charset($connection, "utf8");

$sql="INSERT INTO usuario_admin (usuario,pass) VALUES (?,?)";
$resultado=mysqli_prepare($connection, $sql);
$ok=mysqli_stmt_bind_param($resultado, "ss", $usuario, $hashed_password);
$ok=mysqli_stmt_execute($resultado);
mysqli_stmt_close($resultado);
?>