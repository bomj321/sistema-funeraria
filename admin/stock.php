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
                      
                        <div class="row">
                           <?php 
                                include('advertencias.php');
                            ?>
                        </div>                          
                          <div class="row">
                                <div class="row">
                                   <h4>Registro de Almacenaje</h4>
                                </div>
                                    <form id="nuevo_producto" name="nuevo_servicio" class="col s12" action="" onsubmit="enviarDatosStock(); return false" enctype="multipart/form-data" method="POST" style="margin-bottom: 3rem;"> 
                                    <div class="row">
                                    <div class="input-field col s12 m3">
                                      <input name="objeto" id="objeto" type="text" class="validate" required="true">
                                      <label for="objeto">Item</label>
                                    </div>

                                    <div class="input-field col s12 m3">
                                      <input onkeypress="return solonumeros(event)" onpaste="false" name="cantidad" id="cantidad" type="text" class="validate" required="true">
                                      <label for="cantidad">Cantidad Existente</label>
                                      <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_costo"></p>
                                    </div> 

                                    <div class="input-field col s12 m3">
                                      <input onkeypress="return solonumeros2(event)" onpaste="false" name="precio" id="precio" type="text" class="validate" required="true">
                                      <label for="precio">Precio Unitario</label>
                                      <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_costos"></p>
                                    </div>                          

                                    <div class="input-field col s12 m3">
                                      <input name="comentario" id="comentario" type="text" class="validate" required="true">
                                      <label for="comentario">Comentario</label>
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

                                    
                                   <button class="btn waves-effect waves-light  green darken-3" type="submit" name="action">Registrar-Stock
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