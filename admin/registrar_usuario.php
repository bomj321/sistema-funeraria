<?php
include('header.php');
?>
<main>
    <div class="container">        
            <div class="row" id="main">
                <form name="nuevo_usuario" class="col s6 offset-s3" id="form_inicio" action="" onsubmit="registrarNuevoUsuario(); return false">
                <div class="row">
                    <div class="input-field col s12">
                      <input name="usuario"   id="usuario" type="text" class="validate" required="true">
                      <label for="usuario">Nombre de Usuario</label>                      
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input name="password" id="password" type="password" class="validate password" required="true">
                        <label for="password">Password</label>                         
                    </div>
                </div> 

                      <button class="btn waves-effect waves-light  indigo lighten-2" type="submit" name="action">Registrar Usuario
                    <i class="material-icons right"></i>
                     </button>
                     
                </form>
            </div>        
    </div>

</main>
<?php
include('footer.php');
?>