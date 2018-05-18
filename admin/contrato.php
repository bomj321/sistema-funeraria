<?php
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
                        <div class="divider"></div>
                   

                    
                      <div class="row">
                        <h4>Registro de Usuario/Contratos</h4>
                        <form method="POST" enctype="multipart/form-data" id="venta_contrato_ventas" action="" onsubmit="ventaDeContratos(); return false" class="col s12">
                          <div class="row">
                            <div class="input-field col s12 m4">
                              <input  name="nombre_contrato" onkeypress="return sololetras(event)" id="name" type="text" class="validate" required="true">
                              <label for="name">Nombre </label>
                              <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_letra"></p>
                            </div>

                            <div class="input-field col s12 m4">
                              <input name="civil_contrato" onkeypress="return sololetras2(event)" id="estado" type="text" class="validate" required="true">
                              <label for="estado">Estado Civil</label>
                              <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_letra2"></p>
                            </div>

                            <div class="input-field col s12 m4">
                              <input name="edad_contrato" onkeypress="return solonumeros2(event)" id="edad" type="text" class="validate" required="true">
                              <label for="edad">Edad</label>
                              <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_costos"></p>
                            </div>
                          </div>
                          
                          <div class="row">
                            <div class="input-field col s12 m4">
                              <input name="dni_contrato" onkeypress="return solonumeros(event)" id="dni" type="text" class="validate" required="true">
                              <label for="dni">DNI</label>
                              <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_costo"></p>
                            </div>
                            
                            <div class="input-field col s12 m4">
                              <input name="numero_usuario" onkeypress="return solonumeros3(event)" id="numero" type="text" class="validate" required="true">
                              <label for="numero">Numero Telefonico</label>
                              <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_costos3"></p>
                            </div>

                            <div class="input-field col s12 m4">
                              <input name="email_contrato" id="email" type="email" class="validate" required="true">
                              <label for="email">Email</label>
                            </div>
                            
                          </div>
<!--AJAX CONTRATO-->

                          <div class="row">
                              <div class="col s12 m4 ">
                                <a class="waves-effect waves-light btn modal-trigger" href="#modal_contrato_servicio"><i class="material-icons right">add_circle</i>Diseñar Contrato</a>
                              </div>

                              
                          </div>                         

                          <div class="row" id="resultados_contrato">

                          </div>


                          
<!--AJAX CONTRATO-->
                     
                             <button class="btn waves-effect waves-light green darken-3" type="submit" name="action">Registrar Contrato
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