<?php
include('header.php');
include('connect.php');
$id=$_GET['id'];
$sql = "SELECT * FROM stock WHERE id='$id'";
$resultado= mysqli_query($connection, $sql); 
$fila=mysqli_fetch_array($resultado);
?>
<main>
  <div class="container">
  
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
                            <div class="col s12">
                                <h4>Actualizacion del Almacenaje</h4>
                            </div>
                          <form name="nuevo_servicio" class="col s12" action="" onsubmit="actualizarDatosStock(); return false" style="margin-bottom: 3rem;">

                            <div class="row">
                            <input name="id" id="id" type="hidden" class="validate" required="true" value="<?php echo $fila['id']; ?>">

                              <div class="input-field col s3">
                                <input name="objeto" id="objeto" type="text" class="validate" required="true" value="<?php echo $fila['objeto'];?>">
                                <label for="objeto">Objeto</label>
                              </div>

                              <div class="input-field col s3">
                                <input onkeypress="return solonumeros(event)" name="cantidad" id="cantidad" type="text" class="validate" required="true" value="<?php echo $fila['cantidad'];?>">
                                <label for="cantidad">Cantidad Existente</label>
                                <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_costo"></p>
                              </div>  

                              <div class="input-field col s12 m3">
                                <input onkeypress="return solonumeros2(event)" onpaste="false" name="precio" id="precio" type="text" class="validate" required="true" value="<?php echo $fila['precio'];?>">
                                <label for="precio">Precio Unitario</label>
                                <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_costos"></p>
                              </div>                          

                              <div class="input-field col s3">
                                <input name="comentario" id="comentario" type="text" class="validate" required="true" value="<?php echo $fila['comentario']; ?>">
                                <label for="comentario">Comentario</label>
                              </div>
                            </div>                     
   
                             <button class="btn waves-effect waves-light" type="submit" name="action">Actualizar-Stock
                                <i class="material-icons right">send</i>
                            </button>
          
                          </form> 
                      </div> 
                </div>
          </div>
    </div>  
</main>
<?php
include('footer.php');
?>