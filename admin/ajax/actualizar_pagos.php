 <?php 
session_start();
require_once('../connect.php');
$id_user_session=$_SESSION["usuarioid"];
////////////////////ENTREGAR SERVICIO
if (isset($_GET['id_pagos']))//codigo elimina un elemento del array
{
    $id_pagos=intval($_GET['id_pagos']);
    $sql="UPDATE Pagos SET pagado='1' WHERE id_pagos= ? ";
        $resultado=mysqli_prepare($connection, $sql);
        mysqli_stmt_bind_param($resultado, "i", $id_pagos);
        mysqli_stmt_execute($resultado);  
}
////////////////////ENTREGAR SERVICIO CIERRO


 ?>
 <h4 style="text-align: center;">Pagos de los Contratos</h4>
<!--CONSULTA PARA LOS FAMILIARES DEL USUARIO-->
               
        <table class="responsive-table" >
          <thead>
            <tr>
              <th>Monto del Pago</th>
              <th>fecha</th>
              <th colspan="2" >Pagado</th>
            </tr>
          </thead>


          <tbody>
             <?php 
          $sql_pagos = "SELECT * FROM Pagos WHERE User_id= $id_user_session ";
            $resultado_pagos= mysqli_query($connection, $sql_pagos);

               while ($fila_pago =mysqli_fetch_array($resultado_pagos)){
                ?>  
            
            <tr>            
              <td><?php echo $fila_pago['pago'];?></td>            
            <td><?php echo $fila_pago['fecha'];?></td>            
            <td>
              <?php 
              if ($fila_pago['pagado']==0) { 
               ?>
                <a onclick="entregarpagos(<?php echo $fila_pago['id_pagos'];?>)"><i class="material-icons noentregado">thumb_down</i></a>

              <?php 
                 }else{ 
               ?>
               <i class="material-icons entregado">thumb_up</i>


               <?php 
                }
                ?>
            </td>
            </tr>
             <?php
            }
           
         ?>
          </tbody>
      </table>