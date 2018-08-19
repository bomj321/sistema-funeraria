<?php
$resultado_servicio="Administracion > control de los clientes > Editar cliente";
include('header.php');
include('connect.php');
$id=$_GET['id_cliente'];
$id_limpio= mysqli_escape_string($connection,$id);
$sql = "SELECT * FROM clientes WHERE id_cliente='$id_limpio'";
$resultado= mysqli_query($connection, $sql); 
$fila=mysqli_fetch_array($resultado);
?>
<main>  
        <div class="row">
                  <div class="col s12 m3" >
                            <?php
                              include('aside.php');
                            ?>
                </div>

                 <div class="col s12 m9">
                           <?php 
                                include('advertencias.php');
                            ?>

                      <div class="row">
                            <h4>Actualizacion de los Clientes</h4>
                            <form name="editar_servicio" class="col s12" action="" onsubmit="actualizarDatosCliente(); return false" style="margin-bottom: 3rem;" id="formularioactualizarcliente" enctype="multipart/form-data">
                              <div class="row">
                                <input name="actualizar_id" id="actualizar_id" type="hidden" class="validate" required="true" value="<?php echo $fila['id_cliente']; ?>">

                                <div class="input-field col s12 m6 l6">
                                  <input name="actualizar_nombre" id="actualizar_nombre" type="text" class="validate" required="true" value="<?php echo $fila['nombre'];?>">
                                  <label for="editar_nombre">Nombre del Cliente</label>
                                </div>

                                <div class="input-field col s12  m6 l6">
                                  <input  onpaste="false" name="actualizar_nacimiento" id="actualizar_nacimiento" type="text" class="validate" required="true" value="<?php echo date('Y-m-d',strtotime($fila["nacimiento"]))?>">
                                  <label for="editar_nacimiento">Fecha de Nacimiento </label>
                                </div>

                                <div class="input-field col s12  m6 l6">
                                  <input  onpaste="false" name="actualizar_dni" id="actualizar_dni" type="text" class="validate" required="true" value="<?php echo $fila['dni'];?>">
                                  <label for="editar_dni">Dni del Cliente</label>
                                </div>

                                 <div class="input-field col s12  m6 l6">
                                  <input  onpaste="false" name="genero_actualizar" id="genero_actualizar" type="text" class="validate" required="true" value="<?php echo $fila['sexo'];?>">
                                  <label for="genero_editar">Genero del cliente</label>
                                </div>                        
                            </div>
                     
                     
                                 <div class="row">                        

                                    <div class="input-field col s12  m4 l4">
                                      <input name="actualizar_numero" id="actualizar_numero" type="text" class="validate" required="true" value="<?php echo $fila['numero'];?>">
                                      <label for="editar_numero">Numero del Cliente</label>
                                    </div>

                                    <div class="input-field col s12  m4 l4">
                                      <input  onpaste="false" name="actualizar_email" id="actualizar_email" type="text" class="validate" required="true" value="<?php echo $fila['email'];?>">
                                      <label for="editar_email">Email del Cliente</label>
                                    </div>

                                    <div class="input-field col s12  m4 l4">
                                      <input  onpaste="false" name="actualizar_direccion" id="actualizar_direccion" type="text" class="validate" required="true" value="<?php echo $fila['direccion'];?>">
                                      <label for="editar_direccion">Direccion del Cliente</label>
                                    </div>
                                </div>


                                 <div class="row">
                                   <div class="input-field col s12  m4 l4">
                                      <input  onpaste="false" name="estado_actualizar" id="estado_actualizar" type="text" class="validate" required="true" value="<?php echo $fila['estado'];?>">
                                      <label for="estado_editar">Estado Civil</label>
                                    </div>

                                    <div class="input-field col s12  m4 l4">
                                      <input name="nombre_familiar_actualizar" id="nombre_familiar_actualizar" type="text" class="validate" required="true" value="<?php echo $fila['nombre_familiar'];?>">
                                      <label for="nombre_familiar_editar">Nombre del Familiar</label>
                                    </div>

                                    <div class="input-field col s12  m4 l4">
                                      <input  onpaste="false" name="numero_familiar_actualizar" id="numero_familiar_actualizar" type="text" class="validate" required="true" value="<?php echo $fila['numero_familiar'];?>">
                                      <label for="numero_familiar_editar">Numero del Familiar</label>
                                    </div> 
                                </div>
                                
                                <button class="btn waves-effect waves-light" type="submit" name="action">Editar Cliente
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