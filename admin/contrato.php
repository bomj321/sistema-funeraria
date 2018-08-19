<?php
include('header.php');
?>
<main>
  <div class="container">
        <div class="row">
          <!--MODALES-->
              <?php 
                include("modales/buscar_todo_contrato.php");
               ?>
              <!--MODALES-->
                  <div class="col s12 m2" >
                            <?php
                              include('aside.php');
                            ?>
                </div>

                 <div class="col s12 m10">
                           <?php 
                                include('advertencias.php');
                            ?>
                      <div class="row" id="spin_ajax">
                        <h4>Registro de Contratos</h4>
                        <form method="POST" enctype="multipart/form-data" id="venta_contrato_ventas" action="" onsubmit="ventaDeContratos(); return false" class="col s12 m12">
                          <div class="row">
                                                     
                           <div class="input-field col s12 m6 l6">
                              <input name="dni_contrato" onkeypress="return solonumeros(event)" id="dni_contrato" type="text" class="validate" required="true">
                              <label for="dni_contrato">Documento de Identidad</label>
                              <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_costo"></p>
                            </div>
                            
                            <input name="id_cliente_contrato" id="id_cliente_contrato" type="hidden">
                            
                            

                            <div class="input-field col s12 m6 l6">
                              <input  readonly name="civil_contrato" onkeypress="return sololetras2(event)" id="civil_contrato" type="text" class="validate" required="true">
                              <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_letra2"></p>
                            </div>

                            <div class="input-field col s12 m6 l6">
                              <input  readonly name="edad_contrato" id="edad_contrato" type="text" class="validate" required="true">
                            </div>
                            
                            <div class="input-field col s12 m6 l6">
                              <input  readonly name="genero_contrato" id="genero_contrato" type="text" class="validate" required="true">
                            </div>
                            
                          </div>
                          
                          <div class="row">                           
                           <div class="input-field col s12 m4">
                              <input  readonly name="nombre_contrato" onkeypress="return sololetras(event)" id="nombre_contrato" type="text" class="validate" required="true">
                              <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_letra"></p>
                            </div>
                            
                            
                            <div class="input-field col s12 m4">
                              <input  readonly name="numero_contrato" onkeypress="return solonumeros3(event)" id="numero_contrato" type="text" class="validate" required="true">
                              <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_costos3"></p>
                            </div>

                            <div class="input-field col s12 m4">
                              <input  readonly name="email_contrato" id="email_contrato" type="email" class="validate" required="true">
                            </div>
                            
                          </div>
                          
                          <div class="row">
                            <div class="input-field col s12 m6 l6">
                              <input  readonly name="direccion_contrato" id="direccion_contrato" type="text" class="validate" required="true">
                              
                            </div>
                            
                            <div class="input-field col s12 m6 l6">
                              <input  readonly name="familiar_contrato" onkeypress="return sololetras(event)" id="familiar_contrato" type="text" class="validate" required="true">
                              
                            </div>

                            <div class="input-field col s12 m6 l6">
                              <input  readonly name="telefono_familiar_contrato" onkeypress="return solonumerosolo(event)" id="telefono_familiar_contrato" type="text" class="validate" required="true">
                            </div>

                           <div class="input-field col s12 m6 l6">
                              <select required name="tipo_contrato" onchange="tipocontrato(this.value);">
                                <option value="" disabled selected>Tipo de Contrato</option>
                                <option value="1">Contrato tipo 1</option>
                                <option value="2">Contrato tipo 2</option>
                              </select>
                              <label>Tipo de Contrato</label>
                           </div>
<!--AJAX CONTRATO-->

                          <div class="row" id="resultado_tipo_contrato">
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