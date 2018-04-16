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
                        <form method="POST"  class="col s12" action="nuevo_plan_action.php" enctype="multipart/form-data">

                          <div class="row">                            
                            <div class="input-field col s3">
                              <input  name="nombre" id="name" type="text" class="validate" required="true">
                              <label for="name">Nombre del Plan</label>
                            </div>

                            <div class="input-field col s3">
                              <input name="costo" id="costo" type="text" class="validate" required="true">
                              <label for="costo">Costo del Plan</label>
                            </div>

                            <div class="input-field col s3">
                              <input name="cuota" id="cuota" type="text" class="validate" required="true">
                              <label for="cuota">Cuotas</label>
                            </div>

                            <div class="input-field col s3">
                              <input name="flores" id="flores" type="text" class="validate" required="true">
                              <label for="flores">Arreglos Florales</label>
                            </div>
                          </div>
                          
                          <div class="row">
                                <div class="input-field col s3">
                                  <input name="ataud" id="ataud" type="text" class="validate" required="true">
                                  <label for="ataud">Ataud</label>
                                </div>

                            
                                <div class="input-field col s3">
                                  <input name="refrigerio" id="refrigerio" type="text" class="validate" required="true">
                                  <label for="refrigerio">Refrigerio</label>
                                </div>

                                <div class="input-field col s3">
                                  <input name="habitacion" id="habitacion" type="text" class="validate" required="true">
                                  <label for="habitacion">Habitacion</label>
                                </div>

                                <div class="input-field col s3">
                                  <input name="transporte" id="transporte" type="text" class="validate" required="true">
                                  <label for="transporte"> Transporte</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s6">
                                  <input name="image" id="image" type="file" class="validate" required="true">
                                </div>
                            </div> 
                           <button class="btn waves-effect waves-light" type="submit" name="action">Registrar
                              <i class="material-icons right">send</i>
                          </button>



                        <?php 
                            include('planes_tabla.php');
                         ?>

                         
                        </form>

                      </div>
        
                   
                </div>
    </div>
</main>
<?php
include('footer.php');
?>