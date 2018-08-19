<?php
session_start();
require_once('../connect.php');
$buscador=$_GET['servicios'];
/*LIMPIAR VARIABLES*/
$buscador_limpio= mysqli_escape_string($connection,$buscador);
if(!$buscador_limpio){ 
?>
<table class="responsive-table">
    <div class="col s12 col m12">
      <h4 class="ingresealgo">Ingrese Algo en el buscador de servicios</h4>
      <hr>
    </div>
</table>
<?php  
}else{
$sql_corroborar = "SELECT * FROM servicios WHERE descripcion_servicio  LIKE '%".$buscador_limpio."%' AND servicio_activo=1 ";
$resultado_corroborar= mysqli_query($connection, $sql_corroborar);
$filas= mysqli_num_rows($resultado_corroborar);  
if($filas >0){
?>      
<table class="responsive-table">
            <thead>
               <th>Id</th>
                  <th>Servicio</th>
                  <th>Cantidad</th>
                  <th>Costo Unitario</th>              
                  <th colspan="2" >Agregar</th>
            </thead>
            <tbody>          <?php 

                $sql_servicio = "SELECT * FROM servicios WHERE descripcion_servicio  LIKE '%".$buscador_limpio."%' AND servicio_activo=1 ";
                  $resultado_servicio= mysqli_query($connection, $sql_servicio);
                while($fila=mysqli_fetch_array($resultado_servicio))              
                          {
                            $id_servicio=$fila['id_servicios']; 
                            $serviciosestado =$fila['servicio_activo'];
               ?>
              <tr>

                <td><?php echo $fila['id_servicios'];?></td>

                <td><div>
               <input disabled type="text" class="form-control sinborde text-left" id="nombre_servicio_contrato<?php echo $id_servicio; ?>"  value="<?php echo $fila['descripcion_servicio'];?>">
                 </div></td>

                <td><div>
               <input  type="text" class="form-control sinborde text-left" id="cantidad_servicio_contrato<?php echo $id_servicio; ?>"  value="1">
                 </div></td>

                 <td><div>
               <input disabled type="text" class="form-control sinborde text-left"  id="precio_servicio_venta_contrato<?php echo $id_servicio; ?>" value="<?php echo $fila['costo'];?>">
                 </div></td>


                <td><a class='btn btn-info green' type="button" onclick="agregar_contrato_servicio('<?php echo $id_servicio ?>')">
            <i class="material-icons ">add_circle</i>
                </a></td>            
              </tr>
                <?php
                      }

                 ?>
            </tbody>        
          </table>


<?php
mysqli_close($connection);
      }else{
        ?>
     <table class="responsive-table">        
          <div class="col s12 col m12 ">
             <h4 class="noexiste">No  hay servicios con ese nombre</h4>
             <hr>
          </div>
      </table>        
          <?php
      }//cierra if del ROW
}
?> 