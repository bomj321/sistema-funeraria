<?php
include('header.php');
?>
<main>
    <div class="container">        
          <div class="row" id="main">
              <form name="registro_sistema" class="col s6 offset-s3" id="form_inicio" action="" onsubmit="enviarRegistroSistema(); return false">
                <div class="row">
                    <div class="input-field col s12 m12">
                      <input name="usuario" v-on:keyup="escribir(email)" v-model="email.input" id="email" type="text" class="validate email">
                      <label for="email">Ingrese su Usuario</label>
                      <template v-if="email.mensaje">
                          <p   v-text="email.mensaje"></p>
                      </template>
                    </div>
                </div>
                <div class="row">
                      <div class="input-field col s12 m12">
                          <input name="password" v-on:keyup="escribir(password)" v-model="password.input" id="password" type="password" class="validate password">
                          <label for="password">Password</label>
                           <template v-if="password.mensaje">
                            <p v-text="password.mensaje"></p>
                        </template>
                      </div>
                </div> 

                   <div class="row"> 
                        <div class=" col s6 m5 offset-m1">              
                            <button class="btn waves-effect waves-light" type="submit" name="action">Entrar al Sistema
                          <i class="material-icons right"></i>
                        </div>
                        <div class=" col s6 m6">   
                           </button>
                           <a  href="registrar_usuario.php" class="btn waves-effect waves-light green darken-2">Registrar Usuario</a>
                       </div>
                  </div>                
              </form>
        </div>        
    </div>
</main>
<?php
include('footer.php');
?>