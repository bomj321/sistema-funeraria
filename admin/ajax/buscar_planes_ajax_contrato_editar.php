<?php
session_start();
require_once('../connect.php');
$buscador=$_GET['planes'];
/*LIMPIAR VARIABLES*/
$buscador_limpio= mysqli_escape_string($connection,$buscador);
if(!$buscador_limpio){ 
?>
<table class="responsive-table">
    <div class="col s12 col m12">
      <h4 class="ingresealgo">Ingrese Algo en el buscador de planes</h4>
      <hr>
    </div>
</table>
<?php  
}else{
$sql_corroborar = "SELECT * FROM planes WHERE nombre LIKE '%".$buscador_limpio."%' ";
$resultado_corroborar= mysqli_query($connection, $sql_corroborar);
$filas= mysqli_num_rows($resultado_corroborar);  
if($filas >0){
?>      
<table class="responsive-table">
            <thead>
               <th>Id</th>
                  <th>Plan</th>
                  <th>Costo</th>              
                  <th colspan="2" class="text-right" >Agregar</th>
            </thead>
            <tbody>
              <?php
                $sql_planes = "SELECT * FROM planes WHERE nombre LIKE '%".$buscador_limpio."%' ";
                $resultado_planes= mysqli_query($connection, $sql_planes);
                while($fila_planes=mysqli_fetch_array($resultado_planes))              
                          {
                            $id_planes=$fila_planes['id_planes']; 
               ?>
              <tr>

                <td>
                <input disabled type="text" class="form-control sinborde text-left"  id="id_venta_planes<?php echo $id_planes; ?>" value="<?php echo $fila_planes['id_planes'];?>">
                 </td>

                 <td>
                <input disabled type="text" class="form-control sinborde text-left"  id="nombre_venta_planes_editar<?php echo $id_planes; ?>" value="<?php echo $fila_planes['nombre'];?>">
                 </td>            


                 <td>
                  <div>
               <input disabled type="text" class="form-control sinborde text-left"  id="precio_venta_planes_editar<?php echo $id_planes; ?>" value="<?php echo $fila_planes['precio_plan'];?>">
                 </div>
               </td>

                <td class="text-right">
                <a class='btn btn-info green' type="button" onclick="agregar_contrato_planes_editar('<?php echo $id_planes?>')">
                 <i class="material-icons ">add_circle</i>
                </a>
              </td>            
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
             <h4 class="noexiste">No  hay planes con ese nombre</h4>
             <hr>
          </div>
      </table>        
          <?php
      }//cierra if del ROW
}
?> 