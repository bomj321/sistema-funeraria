 <?php 
session_start();
include('connect.php');
                $ser= $_POST['servicio'];
                $can= $_POST['cantidad'];
                $cos= $_POST['costo'];
                $com= $_POST['comentario'];               
               

        $sql = "INSERT INTO stock (servicio,cantidad,costo,comentario) VALUES ('$ser', '$can', '$cos', '$com')";
                $servicio= mysqli_query($connection, $sql);

                include('stock_tabla.php');
mysqli_close($connection);
?>