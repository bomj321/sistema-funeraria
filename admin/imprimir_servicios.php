<?php
session_start();
include('connect.php');
$usuarioid = $_GET['id'];
 //--------------------if--------------------
      
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">

  <title>Document</title>  
</head> 
<body id="print" onload="javascript:printlayer('servicios')">

          <?php 
          $sql = "SELECT * FROM User_servicios_individuales WHERE idUser = '$usuarioid'";
      $resultado= mysqli_query($connection, $sql); 
            $fila =mysqli_fetch_array($resultado);
            
            $planid =$fila['idUser'];

            $sql_servicios = "SELECT * FROM Servicios INNER JOIN user_has_services ON user_has_services.servicio_id_servicios = Servicios.id_servicios && user_has_services.servicios_id_user= $planid ";
               $resultado_servicios= mysqli_query($connection, $sql_servicios);



             $sql_total_servicios ="SELECT SUM(costo) AS value_sum FROM Servicios INNER JOIN user_has_services ON user_has_services.servicio_id_servicios = Servicios.id_servicios && user_has_services.servicios_id_user= $planid";
                    $resultado_total_servicios= mysqli_query($connection, $sql_total_servicios);
                    $row_servicio = mysqli_fetch_assoc($resultado_total_servicios);
                    $sum_servicio = $row_servicio['value_sum'] ;

               $sql_productos = "SELECT * FROM stock INNER JOIN user_has_products ON user_has_products.stock_id_stock = stock.id && user_has_products.products_id_user= $planid ";
                    $resultado_productos= mysqli_query($connection, $sql_productos);


                    $sql_total_productos ="SELECT SUM(precio_total) AS value_sum FROM user_has_products INNER JOIN stock ON user_has_products.stock_id_stock = stock.id && user_has_products.products_id_user= $planid";
                    $resultado_total_productos= mysqli_query($connection, $sql_total_productos);
                    $row_producto = mysqli_fetch_assoc($resultado_total_productos);
                    $sum_producto = $row_producto['value_sum'] ;
                    $sum = $sum_servicio + $sum_producto ;   
           ?>
  <div  id="servicios">
      <table align="center" width="500" height="600" > 
                <tr> 

                    <td colspan="1"> 
                       Nombre del Usuario:
                    </td> 
                
                
                    <td style="text-align:center"> 
                       <?php echo $fila['nombre']; ?>
                    </td>
                     
                </tr>
                     
                <tr> 
                    
                    <td colspan="1"> 
                        DNI:
                    </td> 

                     

                    <td style="text-align:center"> 
                       <?php echo $fila['dni']; ?> 
                    </td> 
                    
                </tr>

                <tr > 
                    <td colspan="3" style="border-top:2px solid;"> 
                    <h4>Productos Adquiridos</h4>
                       
                    </td> 
                </tr>


    <?php  while ( $fila_producto =mysqli_fetch_array($resultado_productos)){
$precio_total_productos = $fila_producto['cantidad_comprada'] * $fila_producto['precio'];?>


                <tr> 
                    <td colspan="1"> 
                       <?php echo $fila_producto['objeto'];?> (<?php echo $fila_producto['cantidad_comprada'];?>)
                    </td>
                
                    <td style="text-align:center"> 
                       <?php echo $precio_total_productos; ?>$
                    </td>

                    
                </tr>
<?php  
}
?>
                <tr> 
                    <td colspan="3" style="border-top:2px solid;"> 
                       <h4>Servicios Adquiridos</h4>
                    </td> 
                </tr>

<?php 
    while ( $fila_servicio =mysqli_fetch_array($resultado_servicios)){
 ?>
                <tr> 
                    <td> 
                       <?php echo $fila_servicio['descripcion_servicio']; ?>
                    </td> 
               
                
                    <td style="text-align:center"> 
                       <?php echo $fila_servicio['costo']; ?>$
                    </td> 
                </tr>
                
<?php
 }

   ?>
                <tr > 
                    <td > 
                       Total:
                    </td> 
               
                
                    <td style="border-top:1px solid; text-align:center"> 
                       <?php echo $sum?>$
                    </td> 
                </tr>
               


</table>
  </div>














  <script type="text/javascript">
  function printlayer(Imprimeme){
      var impresion=document.getElementById(Imprimeme).innerHTML;
      var winprint= window.open('','Impresion');

      winprint.document.open();
      
      winprint.document.write('<html><head><style type="text/css">');
      winprint.document.write('#table{align:"center" width:"800" height:"600"}');
      winprint.document.write('</style></head><body onload="window.print();">');
      
      winprint.document.write(impresion);
      winprint.document.write('</body></html>');
      winprint.document.close();
      winprint.focus();
      winprint.print();
      winprint.close();




    }
    </script> 
</body>
</html>
<?php 
mysqli_close($connection);
 ?>