 <?php 
session_start();
require_once('../connect.php');
$id_user_unico=$_SESSION["unicoid"];
$id_user_session=$_SESSION["usuarioid"];
////////////////////ENTREGAR SERVICIO
if (isset($_GET['id_servicio_entregar']) AND isset($_GET['actualizar_servicio']))//codigo elimina un elemento del array
{
    $id_servicio=intval($_GET['id_servicio_entregar']);
    $id_plan=intval($_GET['actualizar_servicio']);
    $sql="UPDATE planes_has_services_delivered SET entregado ='1' WHERE id_actualizar_servicio= ? ";
        $resultado=mysqli_prepare($connection, $sql);
        mysqli_stmt_bind_param($resultado, "i", $id_servicio);
        mysqli_stmt_execute($resultado);  
}
////////////////////ENTREGAR SERVICIO CIERRO


 ?>
 <h4 style="text-align: center;">Servicios del Plan </h4>
              <?php
                    $sql_servicios = "SELECT * FROM Servicios INNER JOIN planes_has_services_delivered ON planes_has_services_delivered.servicio_id_servicios = Servicios.id_servicios && planes_has_services_delivered.idUser_services= $id_user_session 
                    AND planes_has_services_delivered.id_user_delivered=$id_user_unico 
                    AND planes_has_services_delivered.planes_id_planes=$id_plan";
                           $resultado_servicios= mysqli_query($connection, $sql_servicios);

                            
                              ?>

                    <table class="responsive-table" >
                    <thead>
                      <tr>              
                          <th>Nombre del Servicio</th>
                          <th>Costo Unitario</th>
                          <th >Entregado</th>
                      </tr>
                    </thead>

                    <tbody>
                          <?php 
                              while ( $fila_servicio =mysqli_fetch_array($resultado_servicios)){
                           ?>
                      <tr>            
                        <td><?php echo $fila_servicio['descripcion_servicio'];?></td>            
                        <td><?php echo $fila_servicio['costo'];?>$</td>            
                        <td >
                          <?php 
                          if ($fila_servicio['entregado']==0) { 
                           ?>
                            <a onclick="entregarservicioplan(<?php echo $fila_servicio['id_actualizar_servicio'];?>);"><i class="material-icons noentregado">thumb_down</i></a>

                          <?php 
                             }else{ 
                           ?>
                           <i class="material-icons entregado">thumb_up</i>


                           <?php 
                            }
                            ?>
                        </td>
                        <input type="hidden" value="<?php echo $id_plan?>" id="servicio_plan<?php echo $fila_servicio['id_actualizar_servicio'];?>">
                      </tr>
                      <?php 
                          } //CIERRO WHILE INTERNO DE LOS SERVICIOS
                       ?>
                    </tbody>
                  </table>