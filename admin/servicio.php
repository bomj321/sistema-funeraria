<?php
include('header.php');
?>
<main>
  <div class="container">
        <div class="row">
                  <div class="col s12 m2" >
                            <?php
                              include('aside.php');
                            ?>
                </div>

                 <div class="col s12 m10">
                           <?php 
                                include('advertencias.php');
                            ?>

                      <div class="row">
                        <h4>Registro de Servicios</h4>
                        <form name="nuevo_servicio" class="col s12" action="" onsubmit="enviarDatosServicio(); return false" style="margin-bottom: 3rem;">

                          <div class="row">
                            <div class="input-field col s6">
                              <input data-length="40" maxlength="40" name="descripcion_servicio" id="descripcion_servicio" type="text" class="validate" required="true">
                              <label for="descripcion_servicio">Descripcion del Servicio</label>
                            </div>

                            <div class="input-field col s6">
                              <input onkeypress="return solonumeros(event)" onpaste="false" name="costo_servicio" id="costo_servicio" type="text" class="validate" required="true">
                              <label for="costo_servicio">Costo del Servicio</label>
                              <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_costo"></p>
                            </div>                           

                            
                          </div>                     
 
                           <button class="btn waves-effect waves-light  green darken-3" type="submit" name="action">Registrar-Servicio
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