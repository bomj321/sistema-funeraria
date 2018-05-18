<?php
include('header.php');
?>
<main>
  <div class="container">
        <div class="row">
          <!--MODALES-->
              <div class="col s12 m12">
                <?php 
                  include("modales/buscar_todo_planes.php");                  
                 ?> 
              </div>
              <!--MODALES-->
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
                            <div class="row">
                              <h4>Registro de Nuevo Plan</h4>
                            </div>
                        <form id="form_nuevo_plan" name="nuevo_plan" method="POST" enctype="multipart/form-data"  class="col s12" action="" onsubmit="enviarNuevoPlan(); return false">

                          <div class="row">                            
                              <div class="input-field col s12 m4">
                                <input  name="nombre" id="nombre" type="text" class="validate" required="true">
                                <label for="nombre">Nombre del Plan</label>
                              </div>

                              <div class="input-field col s12 m4">
                                <input onkeypress="return solonumeros(event)" onpaste="false" name="costo" id="costo" type="text" class="validate" required="true">
                                <label for="costo">Costo del Plan</label>
                                <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_costo"></p>
                              </div>

                              <div class="input-field col s12 m4">
                                <input name="descripcion" id="descripcion" type="text" class="validate" required="true">
                                <label for="descripcion">Descripcion</label>
                              </div>
                            </div>

                            <div class="row">
                                 <div class="file-field input-field col s12 m6">
                                     <div class="btn">
                                    <span>File</span>
                                    <input id="file" type="file" name="image">
                                  </div>
                                    <div class="file-path-wrapper">
                                      <input class="file-path validate" type="text">
                                    </div>
                                  </div>
                            </div>
                              
                            <div class="row">
                              <div class="col s12 m4 ">
                                <a class="waves-effect waves-light btn modal-trigger" href="#modal_planes"><i class="material-icons right">add_circle</i>Diseñar plan</a>
                              </div>
                          </div>                         

                          <div class="row" id="resultados_planes">

                          </div>
                            

                         

                          
                           <button class="btn waves-effect waves-light  green darken-3" type="submit" name="action">Registrar
                              <i class="material-icons right">send</i>
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