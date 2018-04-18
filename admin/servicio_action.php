 <?php 
session_start();
include('connect.php');
                $descs= $_POST['descripcion'];
                $costs= $_POST['costo'];
                              
               

        $sql = "INSERT INTO Servicios (descripcion_servicio,servicio_activo,costo) VALUES ('$descs', '1','$costs')";
                $servicio= mysqli_query($connection, $sql);

                include('servicio_tabla.php');
?>