<?php
$resultado_servicio="Administracion > control contratos > Editar Contrato";
include('header.php');
include('connect.php');
$id=$_GET['id'];
$idunico=$_GET['idunico'];
$id_limpio= mysqli_escape_string($connection,$id);
$idunico_limpio= mysqli_escape_string($connection,$idunico);


$_SESSION["unicoid_contrato"]=$idunico_limpio;
$_SESSION["usuarioid_contrato"]=$id_limpio;
$id_unico_contrato_editar=$_SESSION["unicoid_contrato"];
$id_normal_contrato_editar=$_SESSION["usuarioid_contrato"];



$sql = "SELECT * FROM user WHERE idUser=$id_limpio AND idUser_user=$idunico_limpio";
$resultado= mysqli_query($connection, $sql); 
$fila=mysqli_fetch_array($resultado);
?>
  <main>
    <div class="row">
     <!--MODALES-->
              <div class="col s12 m12">
                <?php 
                include("modales/comentario_editar.php"); 
                 ?> 
              </div>
              <!--MODALES-->
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
              <div class="divider"></div>
            </div>

            <div class="row">
              <h4>Edicion del Contrato(No se puede editar °N de cuotas y descuento)</h4>

                  <form name="editar_servicio" class="col s12 m12" action="" enctype="multipart/form-data" id="edicion_contrato" onsubmit="actualizarDatosContrato(); return false" style="margin-bottom: 3rem;">

                    <div class="row">
                        <input name="editar_id" id="id_servicio" type="hidden" class="validate" required="true" value="<?php echo $fila['idUser_user']; ?>">

                        <div class="input-field col s12 m6 l6">
                          <input name="editar_nombre" id="editar_nombre" type="text" class="validate" required="true" value="<?php echo $fila['nombre'];?>">
                          <label for="editar_nombre">Nombre del Cliente</label>
                        </div>

                        <div class="input-field col s12  m6 l6">
                          <input  onpaste="false" name="editar_nacimiento" id="editar_nacimiento" type="text" class="validate" required="true" value="<?php echo date('Y-m-d',strtotime($fila["nacimiento"]))?>">
                          <label for="editar_nacimiento">Fecha de Nacimiento </label>
                        </div>
                        
                        <div class="input-field col s12  m6 l6">
                          <input  onpaste="false" name="editar_dni" id="editar_dni" type="text" class="validate" required="true" value="<?php echo $fila['dni'];?>">
                          <label for="editar_dni">Dni del Cliente</label>
                        </div>
                        
                         <div class="input-field col s12  m6 l6">
                          <input  onpaste="false" name="genero_editar" id="genero_editar" type="text" class="validate" required="true" value="<?php echo $fila['sexo'];?>">
                          <label for="genero_editar">Genero del cliente</label>
                        </div>
                        
                    </div>
                     
                     
                     <div class="row">                        

                        <div class="input-field col s12  m4 l4">
                          <input name="editar_numero" id="editar_numero" type="text" class="validate" required="true" value="<?php echo $fila['numero'];?>">
                          <label for="editar_numero">Numero del Cliente</label>
                        </div>

                        <div class="input-field col s12  m4 l4">
                          <input  onpaste="false" name="editar_email" id="editar_email" type="text" class="validate" required="true" value="<?php echo $fila['email'];?>">
                          <label for="editar_email">Email del Cliente</label>
                        </div>
                        
                        <div class="input-field col s12  m4 l4">
                          <input  onpaste="false" name="editar_direccion" id="editar_direccion" type="text" class="validate" required="true" value="<?php echo $fila['direccion'];?>">
                          <label for="editar_direccion">Direccion del Cliente</label>
                        </div>
                    </div>
                     
                     
                     <div class="row">
                       <div class="input-field col s12  m4 l4">
                          <input  onpaste="false" name="estado_editar" id="estado_editar" type="text" class="validate" required="true" value="<?php echo $fila['estado'];?>">
                          <label for="estado_editar">Estado Civil</label>
                        </div>
                        
                        <div class="input-field col s12  m4 l4">
                          <input name="nombre_familiar_editar" id="nombre_familiar_editar" type="text" class="validate" required="true" value="<?php echo $fila['nombre_familiar'];?>">
                          <label for="nombre_familiar_editar">Nombre del Familiar</label>
                        </div>

                        <div class="input-field col s12  m4 l4">
                          <input  onpaste="false" name="numero_familiar_editar" id="numero_familiar_editar" type="text" class="validate" required="true" value="<?php echo $fila['numero_familiar'];?>">
                          <label for="numero_familiar_editar">Numero del Familiar</label>
                        </div>                        
                        
                    </div>
                    
<!--AJAX EDITAR CONTRATO-->                         
                          

                          <div class="row">

                          <?php 
                            if ($fila['tipo_contrato']==1) { 
                              include("modales/buscar_todo_contrato_editar.php");   
                           ?>
                              <div class="col s12 m6 l6">
                                <a class="waves-effect waves-light btn modal-trigger botones" href="#modal_contrato_editar"><i class="material-icons right">add_circle</i>Editar Contrato</a>
                              </div>

                          <?php 
                             }else{
                              include("modales/buscar_todo_contrato_editar_2.php"); 
                           ?>
                           <div class="col s12 m6 l6">
                                <a class="waves-effect waves-light btn modal-trigger botones" href="#modal_contrato_editar_2"><i class="material-icons right">add_circle</i>Editar Contrato</a>
                            </div>
                           <?php  
                            }

                            ?>    
                              
                          <div class="col s12 m6 l6 ">
                                <a class="waves-effect waves-light btn modal-trigger botones" href="#modal_comentario_editar"><i class="material-icons right">add_circle</i>Agregar Comentario</a>
                              </div>    

                              
                          </div>                         

                          <div class="row" id="resultados_editar_contrato">

                          </div>


                          
<!--AJAX EDITAR CONTRATO-->
                     
                      <button class="btn waves-effect waves-light" type="submit" name="action">Actualizar-Contrato
                                <i class="material-icons right">send</i>
                        </button>
                  </form>
                  
              </div>
      </div>
      </div>
</main>

  <?php
include('footer.php');
?>

 <!--MEDIA QUERYS-->
<style>
  @media only screen and (max-width: 600px) {
   .botones{
    margin-top: 20px;    
   }


}
</style>
 <!--MEDIA QUERYS-->