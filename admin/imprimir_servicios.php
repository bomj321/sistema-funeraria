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
             $row = mysqli_fetch_assoc($resultado_total_servicios);
              $sum = $row['value_sum'];   
           ?>
  <div style="text-align:center; margin-left: 600px;" id="servicios">
      <table width="40%"  cellspacing="0" cellpadding="0">
        <tr>
          <td>Nombre del usuario: <?php echo $fila['nombre'];?></td>
            
        </tr>

        <tr>
          <td>DNI del usuario: <?php echo $fila['dni'];?></td>            

        </tr>

        <tr>
          <td>Total de la factura: <?php echo $sum;?>$</td>
        </tr>


        <tr>
          <td style="margin-bottom:-10px;">Servicios Adquiridos:</td>       
        </tr>


                 <?php 
          while ( $fila_servicio =mysqli_fetch_array($resultado_servicios)){
         ?>
                 <tr >
                  <td style="margin-bottom: -10px;">- <?php echo $fila_servicio['descripcion_servicio'];?> <?php echo $fila_servicio['costo'];?>$</td>
                 </tr>
                 <?php 
                   }
                 ?>
      </table>
  </div>
  <script type="text/javascript">
  function printlayer(Imprimeme){
      var impresion=document.getElementById(Imprimeme).innerHTML;
      var winprint= window.open('','Impresion');

      winprint.document.open();
      
      winprint.document.write('<html><head><style type="text/css">');
      winprint.document.write('table{width:40%;  margin-left: 300px;}');
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