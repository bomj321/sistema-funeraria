<?php
$resultado_servicio="Administracion > control servicios > Editar servicio";
include('header.php');
include('connect.php');
$id=$_GET['id_servicio'];
$id_limpio= mysqli_escape_string($connection,$id);
$sql = "SELECT * FROM servicios WHERE id_servicios='$id_limpio'";
$resultado= mysqli_query($connection, $sql); 
$fila=mysqli_fetch_array($resultado);
?>
<main>  
        <div class="row">
                            <?php
                              include('aside.php');
                            ?>

                 <div class="col s12 m9">
                           <?php 
                                include('advertencias.php');
                            ?>

                      <div class="row">
                            <h4>Actualizacion del Almacenaje</h4>
                            <form name="editar_servicio" class="col s12" action=" " onsubmit="actualizarDatosServicio(); return false" style="margin-bottom: 3rem;">
                              <div class="row">
                                    <input name="id_servicio" id="id_servicio" type="hidden" class="validate" required="true" value="<?php echo $fila['id_servicios']; ?>">

                                      <div class="input-field col s12 m6">
                                        <input name="descripcion_servicio" id="descripcion_servicio" type="text" class="validate" required="true" value="<?php echo $fila['descripcion_servicio'];?>">
                                        <label for="descripcion_servicio">Descripcion del Servicio</label>
                                      </div>

                                      <div class="input-field col s12 m6">
                                        <input onkeypress="return solonumeros(event)" onpaste="false" name="costo_servicio" id="costo_servicio" type="text" class="validate" required="true" value="<?php echo $fila['costo'];?>">
                                        <label for="costo_servicio">Costo del Servicio</label>
                                        <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_costo"></p>
                                      </div>                      

                                     <button class="btn waves-effect waves-light" type="submit" name="action">Actualizar-Stock
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>   
                             </form>                             
                         </div>                        
                </div>
          </div>
</main>
<?php
include('footer.php');
?>