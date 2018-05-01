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
                        <h4>Registro de Usuario/Contratos</h4>
                        <form class="col s12">
                          <div class="row">
                            <div class="input-field col s12 m3">
                              <input  id="name" type="text" class="validate">
                              <label for="name">Nombre </label>
                            </div>
                            <div class="input-field col s12 m3">
                              <input id="estado" type="text" class="validate">
                              <label for="estado">Estado Civil</label>
                            </div>
                            <div class="input-field col s12 m3">
                              <input id="edad" type="text" class="validate">
                              <label for="edad">Edad</label>
                            </div>

                            <div class="input-field col s12 m3">
                              <input id="costo" type="text" class="validate">
                              <label for="costo">Costo del Contrato</label>
                            </div>
                          </div>
                          
                          <div class="row">
                            <div class="input-field col s12 m3">
                              <input id="dni" type="text" class="validate">
                              <label for="dni">DNI</label>
                            </div>
                            
                            <div class="input-field col s12 m3">
                              <input id="numero" type="text" class="validate">
                              <label for="numero">Numero Telefonico</label>
                            </div>

                            <div class="input-field col s12 m3">
                              <input id="email" type="text" class="validate">
                              <label for="email">Email</label>
                            </div>

                            <div class="input-field col s12 m3">
                              <input id="cuotas" type="text" class="validate">
                              <label for="cuotas">Cuotas a Pagar</label>
                            </div>

                          </div>

                          <div class="row">

                            <!--CONSULTA PARA EL SELECT-->
                                <?php 
                                include('connect.php');
                                $sql = "SELECT * FROM Servicios WHERE servicio_activo ='1'";
                                $resultado= mysqli_query($connection, $sql);
                                 ?>


                                <!--CONSULTA PARA EL SELECT SERVICIOS-->
                              <div class="input-field col s12 m4" >
                              <select multiple name="servicios_venta_contrato[]" id="servicios_venta_venta">
                                    <?php 
                                     while($fila =mysqli_fetch_array($resultado))
                                        {
            
                                    ?>

                                    <option value="<?php echo $fila['id_servicios']?>"><?php echo $fila['descripcion_servicio']?> - <?php echo $fila['costo']?>$ </option>

                                    <?php 
                                      }
                                     ?>

                                  </select>
                                  <label>Servicios Adicionales</label>
                                </div>

                                <!--CONSULTA PARA EL SELECT PLANES-->
                                <?php 
                                include('connect.php');
                                $sql_planes = "SELECT * FROM planes ";
                                $resultado_planes= mysqli_query($connection, $sql_planes);
                                 ?>


                                <!--CONSULTA PARA EL SELECT-->
                              <div class="input-field col s12 m4" >
                              <select multiple name="servicios_venta_contrato[]" id="servicios_venta_venta">
                                    <?php 
                                     while($fila_planes =mysqli_fetch_array($resultado_planes))
                                        {
            
                                    ?>

                                    <option value="<?php echo $fila['id_servicios']?>"><?php echo $fila_planes['nombre']?> - <?php echo $fila_planes['precio_plan']?>$ </option>

                                    <?php 
                                      }
                                     ?>

                                  </select>
                                  <label>Planes</label>
                                </div>



                          </div> 
                          <div class="row">

                                <div class="col s12 m4">
                                  <p>Numero de familiares directos:</p>
                                </div>

                                <div class="col s12 m1">
                                  <input id="familiares_numero_directos" type="text" class="validate">
                                </div>
                          </div>  

                          <div id="familiares_contrato_directos" class="row">
                          
                          </div>

                          <div class="row">

                                <div class="col s12 m4">
                                  <p>Numero de familiares indirectos:</p>
                                </div>

                                <div class="col s12 m1">
                                  <input id="familiares_numero_indirectos" type="text" class="validate">
                                </div>
                          </div>  

                          <div id="familiares_contrato_indirectos" class="row">
                          
                          </div>

                      <div class="row">
                             <button class="btn waves-effect waves-light" type="submit" name="action">Registrar Contrato
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