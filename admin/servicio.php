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
                        <h4>Registro de Servicios</h4>
                        <form name="nuevo_servicio" class="col s12" action="" onsubmit="enviarDatosServicio(); return false" style="margin-bottom: 3rem;">

                          <div class="row">
                            <div class="input-field col s6">
                              <input name="descripcion_servicio" id="descripcion_servicio" type="text" class="validate" required="true">
                              <label for="descripcion_servicio">Descripcion del Servicio</label>
                            </div>

                            <div class="input-field col s6">
                              <input name="costo_servicio" id="costo_servicio" type="text" class="validate" required="true">
                              <label for="costo_servicio">Costo del Servicio</label>
                            </div>                           

                            
                          </div>                     
 
                           <button class="btn waves-effect waves-light" type="submit" name="action">Registrar-Servicio
                              <i class="material-icons right">send</i>
                          </button>
        
                        </form>
                        
				<div id="servicio"><?php include('servicio_tabla.php');?></div>
						 
                      </div>

                      
        
                   
                </div>
    </div>
</main>
<?php
include('footer.php');
?>