 <?php 
session_start();
include('connect.php');
                $obj= $_POST['objeto'];
                $can= $_POST['cantidad'];
                $com= $_POST['comentario'];               
               

        $sql = "INSERT INTO stock (objeto,cantidad,comentario) VALUES ('$obj', '$can','$com')";
                $servicio= mysqli_query($connection, $sql);

                include('stock_tabla.php');
?>