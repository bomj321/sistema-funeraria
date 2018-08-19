<?php
include('header.php');
include('connect.php');
        $sql_contenido="SELECT * FROM contenido";
        $resultado_contenido= mysqli_query($connection, $sql_contenido);
        $row_contenido=mysqli_fetch_array($resultado_contenido)
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

                      <div class="row">
                            <div class="row">
                              <h4>Manejo del Contenido</h4>
                            </div>

                        <form id="form_manejo_contenido" name="nuevo_plan" method="POST" enctype="multipart/form-data"  class="col s12" action="" onsubmit="manejocontenido(); return false">
                        	<!-- <form id="form_manejo_contenido" name="nuevo_plan" method="POST" enctype="multipart/form-data"  class="col s12" action="acciones/contenido_registrar.php" >-->

                          

                            <div class="row">

	                                 <div class="file-field input-field col s12 m12">
	                                 	<h5 style="text-align: left; color: black;">Imagen de Inicio</h5>
	                                     <div class="btn">
	                                    <span>Imagen de Inicio</span>
	                                    <input id="file" type="file" name="imagen">
	                                  </div>
	                                    <div class="file-path-wrapper">
	                                      <input placeholder="<?php echo $row_contenido['imagen_frente'] ?>" class="file-path validate" type="text">
	                                    </div>
	                                  </div>

	                                   <div class="file-field input-field col s12 m12">
		                                 	<h5 style="text-align: left; color: black;">Imagenes del Slider (3)</h5>

		                                     <div class="btn">
		                                    <span>Primera Imagen</span>
		                                    <input id="file_1" type="file" name="imagenslider1">
		                                  </div>
		                                    <div class="file-path-wrapper">
		                                      <input placeholder="<?php echo $row_contenido['imagen1'] ?>" class="file-path validate" type="text">
		                                    </div>
	                                    </div>

									<div class="file-field input-field col s12 m12">
	                                    <div class="btn">
	                                    <span>Segunda Imagen</span>
	                                    <input id="file_2" type="file" name="imagenslider2">
	                                  </div>
	                                    <div class="file-path-wrapper">
	                                      <input placeholder="<?php echo $row_contenido['imagen2'] ?>" class="file-path validate" type="text">
	                                    </div>
									</div>

									<div class="file-field input-field col s12 m12">
	                                    <div class="btn">
	                                    <span>Tercera Imagen</span>
	                                    <input id="file_3" type="file" name="imagenslider3">
	                                  </div>
	                                    <div class="file-path-wrapper">
	                                      <input placeholder="<?php echo $row_contenido['imagen3'] ?>" class="file-path validate" type="text">
	                                    </div>
									</div>


								<div class="file-field input-field col s12 m12">
		                                 	<h5 style="text-align: left; color: black;">Sobre Nosotros</h5>

		                                     <div class="btn">
		                                    <span>Imagen</span>
		                                    <input id="file_4" type="file" name="imagennosotros">
		                                  </div>
		                                    <div class="file-path-wrapper">
		                                      <input placeholder="<?php echo $row_contenido['imagennosotros'] ?>" value="" class="file-path validate" type="text">
		                                    </div>
	                            </div>

						        <div class="input-field col s12 m12">
						          <i class="material-icons prefix">mode_edit</i>
						          <textarea id="quienessomos" class="materialize-textarea" name="quienes_somos" data-length="350" maxlength="350"><?php echo $row_contenido['quienessomos'] ?></textarea>
						          <label for="quienessomos">Quienes Somos</label>
						        </div>

						        <div class="input-field col s12 m12">
						          <i class="material-icons prefix">mode_edit</i>
						          <textarea id="quehacemos" class="materialize-textarea" name="que_hacemos" data-length="350" maxlength="350"><?php echo $row_contenido['quehacemos'] ?></textarea>
						          <label for="quehacemos">Que Hacemos</label>
						        </div>

						        <div class="input-field col s12 m12">
						          <i class="material-icons prefix">mode_edit</i>
						          <textarea id="frasecelebre" class="materialize-textarea" name="frase_celebre" data-length="350" maxlength="350"><?php echo $row_contenido['frase'] ?></textarea>
						          <label for="frasecelebre">Frase C&eacute;lebre</label>
						        </div>
     	
	                                  
                            </div>
                          
                           <button class="btn waves-effect waves-light  green darken-3" type="submit" name="action">Editar Contenido
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