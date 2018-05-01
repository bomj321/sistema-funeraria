<?php
include('header.php');
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
                            <div class="row">
                              <h4>Registro de Nuevo Plan</h4>
                            </div>
                        <form id="form_nuevo_plan" name="nuevo_plan" method="POST" enctype="multipart/form-data"  class="col s12" action="" onsubmit="enviarNuevoPlan(); return false">

                          <div class="row">                            
                            <div class="input-field col s12 m4">
                              <input  name="nombre" id="nombre" type="text" class="validate" required="true">
                              <label for="nombre">Nombre del Plan</label>
                            </div>

                            <div class="input-field col s12 m4">
                              <input onkeypress="return solonumeros(event)" onpaste="false" name="costo" id="costo" type="text" class="validate" required="true">
                              <label for="costo">Costo del Plan</label>
                              <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_costo"></p>
                            </div>

                            <div class="input-field col s12 m4">
                              <input name="descripcion" id="descripcion" type="text" class="validate" required="true">
                              <label for="descripcion">Descripcion</label>
                            </div> 

                             

                            </div>

                            <div class="row">
                                 <div class="file-field input-field col s12 m6">
                                     <div class="btn">
                                    <span>File</span>
                                    <input id="file" type="file" name="image">
                                  </div>
                                    <div class="file-path-wrapper">
                                      <input class="file-path validate" type="text">
                                    </div>
                                  </div>

                                <!--CONSULTA PARA EL SELECT-->
                                <?php 
                                include('connect.php');
                                $sql = "SELECT * FROM Servicios WHERE servicio_activo ='1'";
                                $resultado= mysqli_query($connection, $sql);
                                 ?>


                                <!---->

                                <div class="input-field col s12 m6">
                                  <select  id="select_multiple" multiple name="servicios[]">
                                    <?php 
                                     while($fila =mysqli_fetch_array($resultado))
                                        {
            
                                    ?>

                                    <option value="<?php echo $fila['id_servicios']?>"><?php echo $fila['descripcion_servicio']?></option>

                                    <?php 
                                      }
                                     ?>

                                  </select>
                                  <label>Selecciona los Servicios</label>
                                </div>
                            </div>

                            <div class="row">
                            <div class="col s12 m12" >
                              <h4>Selecciona los Productos a Vender en el plan</h4>
                            </div>
                          </div>                           


                          <div class="row">
                             <div class="col s1 m1" style="text-align: center;">
                              <p>Id</p>
                            </div>

                            <div class="col s3 m3" style="text-align: center;">
                              <p>Productos</p>
                            </div>

                            <div class="col s1 m2" style="text-align: center;">
                              <p>Precio Unitario</p>
                            </div>

                            <div class="col s4 m3" style="text-align: center;">
                              <p>Cantidad Existente</p>
                            </div>

                            <div class="col s3 m3" style="text-align: center;">
                              <p>Cantidad a Integrar</p>
                            </div>
                          </div>

                          <!--CONSULTA PARA LOS PRODUCTOS-->
                                <?php 
                                $sql_producto = "SELECT * FROM stock WHERE cantidad > 0";
                                $resultado_producto= mysqli_query($connection, $sql_producto);
                                 ?>


                                <!--CONSULTA PARA LOS PRODUCTOS-->

                          <div class="row">
                            <?php 
                                     for($i=1;$i<=mysqli_num_rows($resultado_producto); $i++)
                                      {
                                      $fila_producto =mysqli_fetch_array($resultado_producto)           
                                  ?>
                              <div class=" input-field col s1 m1">                                
                                <input  value="<?php echo $fila_producto['id']?>" readonly="readonly" id="first_id" type="text" class="validate" name="producto[<?= $i ?>][id]">
                              </div>

                              <div class=" input-field col s3 m3">                                
                                <input  value="<?php echo $fila_producto['objeto']?>" readonly="readonly" id="first_name" type="text" class="validate" name="producto[<?= $i ?>][nombre]">

                              </div>

                              <div class=" input-field col s1 m2">                                
                                <input  value="<?php echo $fila_producto['precio']?>$" readonly="readonly" id="first_name" type="text" class="validate" name="producto[<?= $i ?>][precio]">

                              </div>

                              <div class=" input-field col s4 m3" >
                                <input  id="first_cantidad_stock" value="<?php echo $fila_producto['cantidad']?>" type="text" class="validate" readonly="readonly" name="producto[<?= $i ?>][cantidad_stock]">
                              </div>

                              <div class=" input-field col s3 m3" >
                                <input  id="first_cantidad_vender" type="text" class="validate" name="producto[<?= $i ?>][cantidad]">
                              </div>
                               <?php 
                               
                                  }
                                ?>
                          </div> 
                           <button class="btn waves-effect waves-light  green darken-3" type="submit" name="action">Registrar
                              <i class="material-icons right">send</i>
                          </button>
                        </form>
                      </div>

                      <div class="col s12 m12" >
                              <h4>Planes Registrados</h4>
                            </div>

                      
                      <div id="planes" class="row">
                        <div class="col s12 m12">
                            <?php 
                                  include('planes_tabla.php');
                               ?>
                          </div>
                      </div>
        
                   
                </div>
        </div>
    </div>    
</main>
<?php
include('footer.php');
?>