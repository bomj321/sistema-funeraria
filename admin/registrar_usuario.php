<?php
include('header.php');
?>
<main>
    <div class="container"> 
        <div class="row">              
                       <div class="col s12 m3" >
                            <?php
                              include('aside.php');
                            ?>
                </div>

                 <div class="col s12 m9">
                             <?php 
                                include('advertencias.php');
                            ?>         
            <div class="row" id="main">
               <h4>Registrar Usuario</h4>
                <form name="nuevo_usuario" class="col s12 m12" id="form_inicio" action="" onsubmit="registrarNuevoUsuario(); return false">
                
                <div class="row">
                    <div class="input-field col s12 m12">
                      <input name="usuario"   id="usuario" type="text" class="validate" required="true">
                      <label for="usuario">Nombre de Usuario</label>                      
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12 m12">
                        <input name="password" id="password" type="password" class="validate password" required="true">
                        <label for="password">Password</label>                         
                    </div>
                </div> 
                      
                <div class="row">
                    <div class="input-field col s12 m12">
                        <select name="perfil">
                          <option value="" disabled selected>Selecciona el Perfil</option>
                          <option value="admin">Admin</option>
                          <option value="venta">Venta</option>
                        </select>
                        <label>Selecciona el Perfil</label>
                    </div>
                </div>      

                      <button class="btn waves-effect waves-light  indigo lighten-2" type="submit" name="action">Registrar Usuario
                    <i class="material-icons right"></i>
                     </button>
                     
                </form>
            </div>
        </div> 
      </div>               
    </div>
</main>
<?php
include('footer.php');
?>