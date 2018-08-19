<?php
$resultado2='Administracion > Sistema Interno';
$variable_de_inicio= 1;
include('header.php');
?>
<main>
    <div class="container">        
          <div class="row" id="main" style="margin-top: 100px;">
              <form method="POST" class="col s6 offset-s3"  action="registro_action.php">
                  <div class="row">
                      <div class="input-field col s12 m12 l12">
                        <input name="usuario"   id="usuario" type="text" class="validate email">
                        <label for="usuario">Ingrese su Usuario</label>                      
                      </div>
                  </div>
                  <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <input name="password"   id="password" type="password" class="validate password">
                            <label for="password">Password</label>
                        </div>
                  </div> 

                       <div class="row"> 
                            <div class="col s12 m6">              
                                <button class="btn waves-effect waves-light" type="submit" name="action">Entrar al Sistema
                              <i class="material-icons right"></i>
                              </button>
                            </div>                            
                      </div> 
              </form>
        </div>        
    </div>
</main>
<?php
include('footer.php');
?>