 <?php 
session_start();
include('connect.php');
                $obj= $_POST['objeto'];
                $can= $_POST['cantidad'];
                $pre= $_POST['precio'];
                $com= $_POST['comentario'];  




        mysqli_set_charset($connection, "utf8");
        $sql="INSERT INTO stock (objeto,cantidad,precio,comentario) VALUES (?,?,?,?)";
        $resultado=mysqli_prepare($connection, $sql);
        $ok=mysqli_stmt_bind_param($resultado, "siis", $obj, $can,$pre,$com);
        $ok=mysqli_stmt_execute($resultado);
         include('stock_tabla.php');
?>