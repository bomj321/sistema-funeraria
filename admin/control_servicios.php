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
                              <h4>Busqueda de los Servicios</h4>
                            </div>                                          
                                <div class=" input-field col s12 m12">                              
                                   <input name="buscar_servicios_input" id="buscar_servicios_input" type="text" class="validate" required="">
                                   <label for="buscar_servicios_input">Ingrese nombre</label>
                               </div>
                    </div>

                    <div id="servicios_buscar" class="row col s12 m12">
                          
                    </div> 
              </div>
        </div>
  </div>  
</main>
<?php
include('footer.php');
?>














