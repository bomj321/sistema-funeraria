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
                        <form method="POST"  class="col s12" action="nuevo_plan_action.php" enctype="multipart/form-data">

                          <div class="row">                            
                            <div class="input-field col s12 m3">
                              <input  name="nombre" id="name" type="text" class="validate" required="true">
                              <label for="name">Nombre del Plan</label>
                            </div>

                            <div class="input-field col s12 m3">
                              <input onkeypress="return solonumeros(event)" onpaste="false" name="costo" id="costo" type="text" class="validate" required="true">
                              <label for="costo">Costo del Plan</label>
                              <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_costo"></p>
                            </div>

                            <div class="input-field col s12 m3">
                              <input name="descripcion" id="descripcion" type="text" class="validate" required="true">
                              <label for="descripcion">Descripcion</label>
                            </div> 

                            <div class="input-field col s12 m3">
                              <input  onkeypress="return solonumeros2(event)" onpaste="false" name="cuota" id="cuota" type="number" class="validate" required="true">
                              <label for="cuota">Cuotas</label>
                              <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_costos"></p>
                            </div> 

                            </div>

                            <div class="row">
                                 <div class="file-field input-field col s12 m6">
                                     <div class="btn">
                                    <span>File</span>
                                    <input type="file" name="image">
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
                                  <select multiple name="servicios[]">
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
                           <button class="btn waves-effect waves-light  green darken-3" type="submit" name="action">Registrar
                              <i class="material-icons right">send</i>
                          </button>
                        </form>
                      </div>

                      <div id="servicio" class="row">
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