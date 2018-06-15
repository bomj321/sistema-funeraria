 <?php 
session_start();
require_once('../connect.php');
$id_user_unico=$_SESSION["unicoid"];
$id_user_session=$_SESSION["usuarioid"];
////////////////////ENTREGAR SERVICIO
if (isset($_GET['id_producto_entregar']) AND isset($_GET['actualizar_producto']))//codigo elimina un elemento del array
{
    $id_producto=intval($_GET['id_producto_entregar']);
    $id_plan=intval($_GET['actualizar_producto']);
    $sql="UPDATE planes_has_products_delivered SET entregado_product ='1' WHERE id_actualizar_producto= ? ";
        $resultado=mysqli_prepare($connection, $sql);
        mysqli_stmt_bind_param($resultado, "i", $id_producto);
        mysqli_stmt_execute($resultado);
  /********************************************SELECCIONA PRODUCTO ID****************************************************/
   $sql_producto = "SELECT * FROM planes_has_products_delivered WHERE id_actualizar_producto= $id_producto";
   $resultado_producto= mysqli_query($connection, $sql_producto);
   $producto =mysqli_fetch_array($resultado_producto);
   $productoid= $producto['products_id_products_products'];
   $producto_cantidad=$producto['cantidad_producto'];
  /********************************************SELECCIONA PRODUCTO ID CIERRO**********************************************/

  
  
/********************************************SELECCIONA PRODUCTO STOCK****************************************************/
  
$sql_productos="SELECT * FROM stock WHERE id=$productoid";
$resultado_productos= mysqli_query($connection, $sql_productos);
$stock_resultado =mysqli_fetch_array($resultado_productos);  
$stock_cantidad= $stock_resultado['cantidad'];
/********************************************SELECCIONA PRODUCTO STOCK CIERRO**********************************************/

  
/********************************************ACTUALIZA PRODUCTO STOCK************************************************/
  
$resta= $stock_cantidad-$producto_cantidad; 
 mysqli_set_charset($connection, "utf8");
$sql_update="UPDATE stock SET  cantidad=? WHERE id=?";
$resultado_update=mysqli_prepare($connection, $sql_update);
mysqli_stmt_bind_param($resultado_update, "ii", $resta,$productoid);
$ok5=mysqli_stmt_execute($resultado_update);
mysqli_stmt_close($resultado_update);    
/********************************************ACTUALIZA PRODUCTO STOCK CIERRO***********************************************/
               
}
////////////////////ENTREGAR SERVICIO CIERRO


 ?>
 <h4 style="text-align: center;">Productos del Plan</h4>

        <?php
                        

             $sql_productos = "SELECT * FROM stock INNER JOIN planes_has_products_delivered ON planes_has_products_delivered.products_id_products_products = stock.id && planes_has_products_delivered.idUser_products= $id_user_session 
             AND planes_has_products_delivered.id_user_delivered=$id_user_unico
             AND planes_has_products_delivered.planes_id_planes=$id_plan";
                $resultado_productos= mysqli_query($connection, $sql_productos);

                  
                          ?>

                <table class="responsive-table" >
                <thead>
                  <tr>
                      
                      <th>Nombre del Producto</th>
                      <th></th>
                      <th></th>
                      <th >Costo Unitario</th>
                      <th >Entregado</th>
                  </tr>
                </thead>

                <tbody>
                  <?php 
                     while ($fila_producto =mysqli_fetch_array($resultado_productos)){
                   ?>
                  <tr> 

                    <td><?php echo $fila_producto['objeto'];?></td>
                    <td></td>
                    <td></td>            
                    <td ><?php echo $fila_producto['precio'];?>$</td>            
                    <td >
                      <?php 
                      if ($fila_producto['entregado_product']==0) { 
                       ?>

                        <a onclick="entregarproductoplan(<?php echo $fila_producto['id_actualizar_producto'];?>)"><i class="material-icons noentregado ">thumb_down</i></a>
                        <input type="hidden" value="<?php echo $id_plan?>" id="producto_plan<?php echo $fila_producto['id_actualizar_producto'];?>">

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
                      } // CIERRO WHILE INTERNO DE LOS PRODUCTOS
                     ?>
                </tbody>
              </table>

             