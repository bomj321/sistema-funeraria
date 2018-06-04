<?php
session_start();
require_once('../connect.php');
$buscador=$_GET['producto'];
/*LIMPIAR VARIABLES*/
$buscador_limpio= mysqli_escape_string($connection,$buscador);
if(!$buscador_limpio){ 
?>
<table class="responsive-table">
    <div class="col s12 col m12">
      <h4 class="ingresealgo">Ingrese Algo en el buscador</h4>
    </div>
</table>
 
<?php  
}else{
$sql_corroborar = "SELECT * FROM stock WHERE objeto LIKE '%".$buscador_limpio."%' ";
$resultado_corroborar= mysqli_query($connection, $sql_corroborar);
$filas= mysqli_num_rows($resultado_corroborar);  
if($filas >0){
  

?>  
    <table class="responsive-table">
          <thead>
                  <th>Id</th>
                <th>Producto</th>
                <th>Cantidad Exist.</th>
                <th>Cantidad a Vender</th>
                <th>Costo</th>              
                <th colspan="2" >Agregar</th>
          </thead>
          <tbody>
              <?php 
              $sql = "SELECT * FROM stock WHERE objeto LIKE '%".$buscador_limpio."%' ORDER BY id desc ";
              $resultado= mysqli_query($connection, $sql);
               ?>
              <?php 
                  while($fila=mysqli_fetch_array($resultado))        			 
                        {
                          $id_producto=$fila['id']; 
               ?>
            <tr>

              <td><?php echo $fila['id'];?></td>
              <td><?php echo $fila['objeto'];?></td>
              <td><div>
             <input  type="text" class="form-control sinborde text-left"  id="cantidad_stock_producto<?php echo $id_producto; ?>" value="<?php echo $fila['cantidad'];?>">
               </div></td>

              <td ><div >
             <input  type="text" class="form-control sinborde text-left" id="cantidad_producto<?php echo $id_producto; ?>"  value="1">
               </div></td>

               <td><div>
             <input  type="text" class="form-control sinborde text-left"  id="precio_venta_producto<?php echo $id_producto; ?>" value="<?php echo $fila['precio'];?>">
               </div></td>

              <td class="text-right"><a class='btn btn-info green' onclick="agregar_productos('<?php echo $id_producto ?>')">
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
             <h4 class="noexiste">No  hay productos con ese nombre</h4>
          </div>
      </table>        
          <?php
      }//cierra if del ROW
}
?> 
        