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
                              <div class="row">
                                    <h4>Busqueda de Clientes</h4>
                              </div>                                          
                              <div class=" input-field col s12 m12">                              
                                         <input name="buscar_clientes_input" id="buscar_clientes_input" type="text" class="validate" required="">
                                         <label for="buscar_clientes_input">Ingrese nombre DNI o Nombre del Cliente</label>
                              </div>
                          </div>

                          <div id="clientes_venta" class="row col s12 m12">                        
                                    <!--RESULTADO DEL AJAX-->                             
                                   
                          </div> 
              </div>
        </div>
  </div>  
</main>
<?php
include('footer.php');
?>














