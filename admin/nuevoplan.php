<?php
include('header.php');
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
                        <h4>Registro de Nuevo Plan</h4>
                        <form method="POST"  class="col s12" action="nuevo_plan_action.php" enctype="multipart/form-data">

                          <div class="row">                            
                            <div class="input-field col s3">
                              <input  name="nombre" id="name" type="text" class="validate" required="true">
                              <label for="name">Nombre del Plan</label>
                            </div>

                            <div class="input-field col s3">
                              <input onkeypress="return solonumeros(event)" onpaste="false" name="costo" id="costo" type="text" class="validate" required="true">
                              <label for="costo">Costo del Plan</label>
                              <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_costo"></p>
                            </div>

                            <div class="input-field col s3">
                              <input name="descripcion" id="descripcion" type="text" class="validate" required="true">
                              <label for="descripcion">Descripcion</label>
                            </div> 

                            <div class="input-field col s3">
                              <input  onkeypress="return solonumeros2(event)" onpaste="false" name="cuota" id="cuota" type="number" class="validate" required="true">
                              <label for="cuota">Cuotas</label>
                              <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_costos"></p>
                            </div> 

                            </div>

                            <div class="row">
                                <div class="input-field col s6">
                                  <input name="image" id="image" type="file" class="validate" required="true">
                                </div>

                                <!--CONSULTA PARA EL SELECT-->
                                <?php 
                                include('connect.php');
                                $sql = "SELECT * FROM Servicios WHERE servicio_activo ='1'";
                                $resultado= mysqli_query($connection, $sql);
                                 ?>


                                <!---->

                                <div class="input-field col s6">
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
                           <button class="btn waves-effect waves-light" type="submit" name="action">Registrar
                              <i class="material-icons right">send</i>
                          </button>
                        </form>
                        <?php 
                            include('planes_tabla.php');
                         ?>

                      </div>
        
                   
                </div>
    </div>
</main>
<?php
include('footer.php');
?>