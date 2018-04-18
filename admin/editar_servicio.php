<?php
include('header.php');
include('connect.php');
$id=$_GET['id_servicio'];
$sql = "SELECT * FROM Servicios WHERE id_servicios='$id'";
$resultado= mysqli_query($connection, $sql); 
$fila=mysqli_fetch_array($resultado);
?>
<main>
  
        <div class="row">
                 <div class="col s3" >
                            <?php
                              include('aside.php');
                            ?>
                </div>

                 <div class="col s9">
                    <div class="row">
                           <?php 
                                include('advertencias.php');
                            ?>
                        <div class="divider"></div>
                    </div>  

                      <div class="row">
                        <h4>Actualizacion del Almacenaje</h4>
                        <form name="editar_servicio" class="col s12" action="" onsubmit="actualizarDatosServicio(); return false" style="margin-bottom: 3rem;">

                          <div class="row">
                          <input name="id_servicio" id="id_servicio" type="hidden" class="validate" required="true" value="<?php echo $fila['id_servicios']; ?>">

                            <div class="input-field col s6">
                              <input name="descripcion_servicio" id="descripcion_servicio" type="text" class="validate" required="true" value="<?php echo $fila['descripcion_servicio'];?>">
                              <label for="descripcion_servicio">Descripcion del Servicio</label>
                            </div>

                            <div class="input-field col s6">
                              <input name="costo_servicio" id="costo_servicio" type="text" class="validate" required="true" value="<?php echo $fila['costo'];?>">
                              <label for="costo_servicio">Costo del Servicio</label>
                            </div>                      
 
                           <button class="btn waves-effect waves-light" type="submit" name="action">Actualizar-Stock
                              <i class="material-icons right">send</i>
                          </button>
        
                        </form>                       
				
						 
                      </div>

                      
        
                   
                </div>
    </div>
</main>
<?php
include('footer.php');
?>