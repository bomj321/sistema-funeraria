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
                        <form method="POST" action="venta_contrato_action.php" class="col s12">
                          <div class="row">
                            <div class="input-field col s12 m3">
                              <input  name="nombre_contrato" onkeypress="return sololetras(event)" id="name" type="text" class="validate" required="true">
                              <label for="name">Nombre </label>
                              <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_letra"></p>
                            </div>

                            <div class="input-field col s12 m3">
                              <input name="civil_contrato" onkeypress="return sololetras2(event)" id="estado" type="text" class="validate" required="true">
                              <label for="estado">Estado Civil</label>
                              <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_letra2"></p>
                            </div>

                            <div class="input-field col s12 m3">
                              <input name="edad_contrato" onkeypress="return solonumeros2(event)" id="edad" type="text" class="validate" required="true">
                              <label for="edad">Edad</label>
                              <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_costos"></p>
                            </div>

                            <div class="input-field col s12 m3">
                              <input name="costo_contrato" onkeypress="return solonumeros5(event)" id="costo" type="text" class="validate" required="true">
                              <label for="costo">Costo del Contrato</label>
                              <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_costos5"></p>
                            </div>
                          </div>
                          
                          <div class="row">
                            <div class="input-field col s12 m3">
                              <input name="dni_contrato" onkeypress="return solonumeros(event)" id="dni" type="text" class="validate" required="true">
                              <label for="dni">DNI</label>
                              <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_costo"></p>
                            </div>
                            
                            <div class="input-field col s12 m3">
                              <input name="numero_usuario" onkeypress="return solonumeros3(event)" id="numero" type="text" class="validate" required="true">
                              <label for="numero">Numero Telefonico</label>
                              <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_costos3"></p>
                            </div>

                            <div class="input-field col s12 m3">
                              <input name="email_contrato" id="email" type="email" class="validate" required="true">
                              <label for="email">Email</label>
                            </div>

                            <div class="input-field col s12 m3">
                              <input name="cuotas_contrato" onkeypress="return solonumeros4(event)" id="cuotas" type="text" class="validate" required="true">
                              <label for="cuotas">Cuotas a Pagar</label>
                              <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_costos4"></p>
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
                              <select multiple name="servicios_venta_contrato[]" id="servicios_venta_contrato">
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
                              <select multiple name="planes_venta_contrato[]" id="planes_venta_contrato">
                                    <?php 
                                     while($fila_planes =mysqli_fetch_array($resultado_planes))
                                        {
            
                                    ?>

                                    <option value="<?php echo $fila_planes['id_planes']?>"><?php echo $fila_planes['nombre']?> - <?php echo $fila_planes['precio_plan']?>$ </option>

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