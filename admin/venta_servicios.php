<?php
include('header.php');
?>
<main>
  <div class="container">
        <div class="row">
          <!--MODALES-->
          <div class="col s12 m12">
            <?php 
              include("modales/buscar_servicios.php");
              include("modales/buscar_productos.php");
             ?> 
          </div>
            <!--MODALES-->

                 <div class="col s3" >
                            <?php
                              include('aside.php');
                            ?>
                </div>

            <div class="col s9">
                      
                             <?php 
                                  include('advertencias.php');
                              ?>
                <div class="row">
                  <h4>Venta de Servicios</h4>                  
                    <form method="POST"  enctype="multipart/form-data" id="venta_servicio_ventas" name="venta_servicio_ventas"   class="col s12 m12" action="" onsubmit="ventaDeServicios(); return false" style="margin-bottom: 3rem;">
                           
                          <div class="row">
                            <div class="input-field col s12 m4">
                              <input onkeypress="return sololetras(event)" name="nombre_usuario" id="nombre_usuario_venta" type="text" class="validate" required="true">
                              <label for="nombre_usuario_venta">Nombre Completo</label>
                              <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_letra"></p>
                            </div>

                            <div class="input-field col s12 m4">
                              <input onkeypress="return solonumeros2(event)" onpaste="false" name="edad_usuario" id="edad_usuario_venta" type="text" class="validate">
                              <label for="edad_usuario_venta">Edad del Usuario</label>
                              <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_costos"></p>
                            </div>

                            <div class="input-field col s12 m4">
                              <input onkeypress="return sololetras2(event)" onpaste="false" name="civil_usuario" id="direccion_usuario" type="text" class="validate">
                              <label for="direccion_usuario">Dirección</label>
                              <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_letra2"></p>
                            </div> 
                          </div>

                          <div class="row"> 
                            <div class="input-field col s12 m4">
                              <input onkeypress="return solonumeros(event)" onpaste="false" name="dni_usuario" id="dni_usuario_venta" type="text" class="validate">
                              <label for="dni_usuario_venta">Cedula de Identidad</label>
                              <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_costo"></p>
                            </div>

                            <div class="input-field col s12 m4">
                              <input onkeypress="return sololetras3(event)" onpaste="false" name="comentario_usuario" id="comentario_usuario_venta" type="text" class="validate">
                              <label for="comentario_usuario_venta">Comentario</label>
                              <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_letra3"></p>
                            </div>

                            <div class="input-field col s12 m4">
                              <input onkeypress="return solonumeros4(event)" onpaste="false" name="numero" id="numero" type="text" class="validate">
                              <label for="numero">Numero Telefonico</label>
                              <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_costos4"></p>
                            </div>
                          </div>






<!--AJAX RECIBOS-->



                          <div class="row">
                              <div class="col s12 m4">
                                <a class="waves-effect waves-light btn modal-trigger" href="#modal1"><i class="material-icons right">add_circle</i>Agregar Servicios</a>
                              </div>

                              <div class="col s12 m4">
                                <a class="waves-effect waves-light btn modal-trigger" href="#modal2"><i class="material-icons right">add_circle</i>Agregar Productos</a>
                              </div>


                          </div> 

                            
                             <div class="row" id="resultados">

                             </div>

<!--AJAX RECIBOS-->
                           <button class="btn waves-effect waves-light  green darken-3" type="submit" name="action">Registrar Venta
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