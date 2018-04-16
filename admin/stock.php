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
                        <form name="nuevo_servicio" class="col s12" action="" onsubmit="enviarDatosStock(); return false" style="margin-bottom: 3rem;">

                          <div class="row">
                            <div class="input-field col s3">
                              <input name="servicio" id="servicio" type="text" class="validate" required="true">
                              <label for="servicio">Servicio</label>
                            </div>

                            <div class="input-field col s3">
                              <input name="cantidad" id="cantidad" type="text" class="validate" required="true">
                              <label for="cantidad">Cantidad Existente</label>
                            </div>

                            <div class="input-field col s3">
                              <input name="costo" id="costo" type="text" class="validate" required="true">
                              <label for="costo">Costo</label>
                            </div>

                            <div class="input-field col s3">
                              <input name="comentario" id="comentario" type="text" class="validate" required="true">
                              <label for="comentario">Comentario</label>
                            </div>
                          </div>                     
 
                           <button class="btn waves-effect waves-light" type="submit" name="action">Registrar-Stock
                              <i class="material-icons right">send</i>
                          </button>
        
                        </form>
                        
				<div id="resultado"><?php include('stock_tabla.php');?></div>
						 
                      </div>

                      
        
                   
                </div>
    </div>
</main>
<?php
include('footer.php');
?>