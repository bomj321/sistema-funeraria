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
$sql_corroborar = "SELECT * FROM Servicios WHERE descripcion_servicio  LIKE '%".$buscador_limpio."%' AND servicio_activo=1 ";
$resultado_corroborar= mysqli_query($connection, $sql_corroborar);
$filas= mysqli_num_rows($resultado_corroborar);  
if($filas >0){
?>      
    <table class="responsive-table">
            <thead>
                 <th>Id</th>
                  <th>Servicio</th>
                  <th class="text-center">Cantidad a Ofrecer</th>
                  <th>Costo en Inventario</th>              
                  <th colspan="2">Agregar</th>
            </thead>
            <tbody>
                <?php 
                $sql = "SELECT * FROM Servicios WHERE descripcion_servicio  LIKE '%".$buscador_limpio."%' AND servicio_activo=1 ";
                $resultado= mysqli_query($connection, $sql);
                 ?>
                <?php 
                    while($fila=mysqli_fetch_array($resultado))        			 
                          {
                            $id_servicio=$fila['id_servicios']; 
                            $serviciosestado =$fila['servicio_activo'];
                 ?>
              <tr>

                <td><?php echo $fila['id_servicios'];?></td>

                <td><div>
               <input  disabled type="text" class="form-control sinborde text-left" id="nombre_planes_servicio_<?php echo $id_servicio; ?>"  value="<?php echo $fila['descripcion_servicio'];?>">
                 </div></td>

                <td><div>
               <input  type="text" class="form-control sinborde text-center" id="cantidad_planes_servicio<?php echo $id_servicio; ?>"  value="1">
                 </div></td>

                 <td><div>
               <input  disabled type="text" class="form-control sinborde text-left"  id="precio_venta_planes_servicio<?php echo $id_servicio; ?>" value="<?php echo $fila['costo'];?>">
                 </div></td>

                <td class="text-left"><a class='btn btn-info green' onclick="agregar_planes_servicios('<?php echo $id_servicio ?>')">
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