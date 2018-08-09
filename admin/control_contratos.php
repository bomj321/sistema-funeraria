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
                  <div class="row" style="margin-top: 50px;">                                   
                                <div class=" input-field col s12 m12">                              
                                   <input name="buscar_contrato_input" id="buscar_contrato_input" type="text" class="validate" required="">
                                   <label for="buscar_contrato_input">Ingrese nombre,DNI o Numero de Contrato</label>
                               </div>
                    </div>

                    <div id="contrato_venta" class="row col s12 m12">
                          
                    </div> 
              </div>
        </div>
  </div>  
</main>
<?php
include('footer.php');
?>














