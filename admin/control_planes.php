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

                  <div class="row" style="margin-top: 50px;">
                        <div class="row">
                              <h4>Busqueda de los planes</h4>
                            </div>                                          
                                <div class=" input-field col s12 m12">                              
                                   <input name="buscar_planes_input" id="buscar_planes_input" type="text" class="validate" required="">
                                   <label for="buscar_planes_input">Ingrese nombre del Plan</label>
                               </div>
                    </div>

                    <div id="planes_venta" class="row col s12 m12">
                          
                    </div> 
              </div>
        </div>
  </div>  
</main>
<?php
include('footer.php');
?>














