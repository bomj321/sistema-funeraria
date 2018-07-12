<?php
$resultado_servicio="Administracion > Registrar Cliente de Contratos";

include('header.php');
?>
<main>
  <div class="container">
        <div class="row">
          <!--MODALES-->
              <div class="col s12 m12">
                <?php 
                  include("modales/buscar_todo_contrato.php");                  
                 ?> 
              </div>
              <!--MODALES-->
                 <div class="col s3" >
                            <?php
                              include('aside.php');
                            ?>
                </div>

                 <div class="col s9">
                    
                           <?php 
                                include('advertencias.php');
                            ?>                    
                      <div class="row" id="spin_ajax">
                        <h4>Registro de Clientes</h4>
                        <form method="POST" enctype="multipart/form-data" onsubmit="registroclientes(); return false" id="registro_clientes_sistema" action=""  class="col s12">
                          <div class="row">
                            <div class="input-field col s12 m4">
                              <input  name="nombre_cliente" onkeypress="return sololetras(event)" id="nombre_cliente" type="text" class="validate" required="true">
                              <label for="nombre_cliente">Nombre </label>
                              <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_letra"></p>
                            </div>

                            <div class="input-field col s12 m4">
                              <input name="civil_cliente" onkeypress="return sololetras2(event)" id="civil_cliente" type="text" class="validate" required="true">
                              <label for="civil_cliente">Estado Civil</label>
                              <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_letra2"></p>
                            </div>

                            <div class="input-field col s12 m4">
                              <input name="edad_cliente" id="edad_cliente" type="date" class="validate" required="true">
                              <label for="edad_cliente">Fecha de Nacimiento</label>                              
                            </div>
                          </div>
                          
                          <div class="row">
                            <div class="input-field col s12 m4">
                              <input name="dni_cliente" onkeypress="return solonumeros(event)" id="dni_cliente" type="text" class="validate" required="true">
                              <label for="dni_cliente">Numero de Identidad</label>
                              <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_costo"></p>
                            </div>
                            
                            <div class="input-field col s12 m4">
                              <input name="numero_cliente" onkeypress="return solonumeros3(event)" id="numero_cliente" type="text" class="validate" required="true">
                              <label for="numero_cliente">Numero Telefonico</label>
                              <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_costos3"></p>
                            </div>

                            <div class="input-field col s12 m4">
                              <input name="email_cliente" id="email_cliente" type="email" class="validate" required="true">
                              <label for="email_cliente">Email</label>
                            </div>
                            
                          </div>
                          
                          <div class="row">
                            <div class="input-field col s12 m3">
                              <input name="direccion_cliente" id="direccion_cliente" type="text" class="validate" required="true">
                              <label for="direccion_cliente">Direccion del cliente</label>                              
                            </div>
                            
                            <div class="input-field col s12 m3">
                              <input name="genero_cliente" onkeypress="return sololetras2(event)" id="genero_cliente" type="text" class="validate" required="true">
                              <label for="genero_cliente">Genero del Cliente</label>
                            </div>
                            
                            <div class="input-field col s12 m3">
                              <input name="familiar_cliente" onkeypress="return sololetras(event)" id="familiar_cliente" type="text" class="validate" required="true">
                              <label for="familiar_cliente">Familiar de Contacto</label>
                              
                            </div>

                            <div class="input-field col s12 m3">
                              <input name="telefono_familiar_cliente" onkeypress="return solonumerosolo(event)" id="telefono_familiar_cliente" type="text" class="validate" required="true">
                              <label for="telefono_familiar_cliente">Telefono del Familiar</label>
                            </div>
                            
                             
                            
                          </div>

                     
                             <button class="btn waves-effect waves-light green darken-3" type="submit" name="action">Registrar Cliente
                                <i class="material-icons right">send</i>
                            </button>
                      
                        </form>
                      </div>
                </div>
      </div>
  </div>    
</main>
<?php
mysqli_close($connection);
include('footer.php');
?>