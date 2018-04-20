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
                      
                             <?php 
                                  include('advertencias.php');
                              ?>
                     
                        <div class="divider pink"></div>
                        <div class="row">                      
                              <form name="buscar_recibo" class=" col s12 m12">
                                  <div class="row">  
                                      <div class=" input-field col s12 m8">                              
                                          <input id="buscar" type="text" class="validate" required="">
                                          <label for="buscar">Ingrese nombre o DNI</label>
                                      </div>
                                  
                                  <div class=" col s12 m4" style="margin-top: 1.8rem;">
                                      <button type="submit" class="btn waves-effect waves-light">
                                          Buscar Recibo
                                          <i class="material-icons right">send</i>
                                      </button>
                                  </div>

                                   </div>                          
                              </form>
                          </div>

                <div class="row">
                  <h4>Venta de Servicios</h4>
                    <form method="POST"  enctype="multipart/form-data" id="venta_servicio_ventas" name="venta_servicio_ventas" class="col s12 m12" action="" onsubmit="ventaDeServicios(); return false" style="margin-bottom: 3rem;">
                           
                          <div class="row">
                            <div class="input-field col s12 m4">
                              <input onkeypress="return sololetras(event)" name="nombre_usuario" id="nombre_usuario_venta" type="text" class="validate" required="true">
                              <label for="nombre_usuario_venta">Nombre Completo</label>
                              <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_letra"></p>
                            </div>

                            <div class="input-field col s12 m4">
                              <input onkeypress="return solonumeros2(event)" onpaste="false" name="edad_usuario" id="edad_usuario_venta" type="text" class="validate" required="true">
                              <label for="edad_usuario_venta">Edad del Usuario</label>
                              <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_costos"></p>
                            </div>

                            <div class="input-field col s12 m4">
                              <input onkeypress="return sololetras2(event)" onpaste="false" name="civil_usuario" id="civil_usuario_venta" type="text" class="validate" required="true">
                              <label for="civil_usuario_venta">Estado civil</label>
                              <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_letra2"></p>
                            </div> 
                          </div>

                          <div class="row"> 
                            <div class="input-field col s12 m4">
                              <input onkeypress="return solonumeros(event)" onpaste="false" name="dni_usuario" id="dni_usuario_venta" type="text" class="validate" required="true">
                              <label for="dni_usuario_venta">DNI</label>
                              <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_costo"></p>
                            </div>

                            <div class="input-field col s12 m4">
                              <input onkeypress="return sololetras3(event)" onpaste="false" name="comentario_usuario" id="comentario_usuario_venta" type="text" class="validate" required="true">
                              <label for="comentario_usuario_venta">Comentario</label>
                              <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_letra3"></p>
                            </div>
                            <!--CONSULTA PARA EL SELECT-->
                                <?php 
                                include('connect.php');
                                $sql = "SELECT * FROM Servicios WHERE servicio_activo ='1'";
                                $resultado= mysqli_query($connection, $sql);
                                 ?>


                                <!--CONSULTA PARA EL SELECT-->

                          <div class="input-field col s12 m4" >
                              <select multiple name="servicios_venta_venta[]" id="servicios_venta_venta">
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
                            

 
                           <button class="btn waves-effect waves-light  green darken-3" type="submit" name="action">Registrar Venta
                              <i class="material-icons right">send</i>
                          </button>
        
                    </form>
                  </div>

                    <div id="servicio" class="row">
                          <div class="col s12 m12">
                                <?php include('venta_servicios_tabla.php');?>
                          </div>
                    </div> 
              </div>
        </div>
  </div>  
</main>
<?php
include('footer.php');
?>