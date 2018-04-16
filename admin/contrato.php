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
                        <h4>Registro de Usuario/Contratos</h4>
                        <form class="col s12">
                          <div class="row">
                            <div class="input-field col s6">
                              <input  id="first_name" type="text" class="validate">
                              <label for="first_name">Nombre Completo</label>
                            </div>
                            <div class="input-field col s6">
                              <input id="last_name" type="text" class="validate">
                              <label for="last_name">Estado Civil</label>
                            </div>
                          </div>
                          
                          <div class="row">
                            <div class="input-field col s6">
                              <input id="edad" type="text" class="validate">
                              <label for="edad">Ingrese la Edad</label>
                            </div>
                            <div class="row">
                            <div class="input-field col s6">
                              <input id="email" type="email" class="validate">
                              <label for="email">Email</label>
                            </div>
                          </div> 
                     <button class="btn waves-effect waves-light" type="submit" name="action">Registrar
                        <i class="material-icons right">send</i>
                    </button>
        
                        </form>
                      </div>
        
                   
                </div>
    </div>
</main>
<?php
include('footer.php');
?>