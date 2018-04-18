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
                        <h4>Registro de Almacenaje</h4>
                        <form name="nuevo_servicio" class="col s12" action="" onsubmit="enviarDatosStock(); return false" style="margin-bottom: 3rem;">

                          <div class="row">
                            <div class="input-field col s4">
                              <input name="objeto" id="objeto" type="text" class="validate" required="true">
                              <label for="objeto">Item</label>
                            </div>

                            <div class="input-field col s4">
                              <input onkeypress="return solonumeros(event)" onpaste="false" name="cantidad" id="cantidad" type="text" class="validate" required="true">
                              <label for="cantidad">Cantidad Existente</label>
                              <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_costo"></p>
                            </div>                           

                            <div class="input-field col s4">
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