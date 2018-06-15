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
                  <div class="row" style="margin-top: 50px;"> 
                        <div class="row">
                              <h4>Busqueda de ventas de Servicios</h4>
                            </div>                                         
                                <div class=" input-field col s12 m12">                              
                                   <input name="buscar_recibo_input" id="buscar_recibo_input" type="text" class="validate" required="">
                                   <label for="buscar_recibo_input">Ingrese nombre o DNI</label>
                               </div>
                    </div>

                    <div id="servicio_venta" class="row col s12 m12">
                          
                    </div> 
              </div>
        </div>
  </div>  
</main>
<?php
include('footer.php');
?>