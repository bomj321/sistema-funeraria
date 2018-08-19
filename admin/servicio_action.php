 <?php 
session_start();
include('connect.php');
                $descs= $_POST['descripcion'];
                $costs= $_POST['costo'];
                              
              mysqli_set_charset($connection, "utf8");
        $sql="INSERT INTO servicios (descripcion_servicio,servicio_activo,costo) VALUES (?,'1',?)";
        $resultado=mysqli_prepare($connection, $sql);
        $ok=mysqli_stmt_bind_param($resultado, "si", $descs, $costs);
        $ok=mysqli_stmt_execute($resultado);        
                
       
?>