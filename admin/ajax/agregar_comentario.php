<?php 
session_start();
require_once('../connect.php');
$id_user=$_SESSION["usuarioid"];
////////////////////////////////VERIFICAR OBSERVACIONES////////////////////////////////////////////
if (isset($_POST['actividad']) AND isset($_POST['observaciones']) AND isset($_POST['id_user'])) {
	   $actividad=$_POST['actividad'];
	   $observaciones=$_POST['observaciones'];
	   $id_user=$_POST['id_user'];	  
}
/////////////////////VERIFICAR VARIABLES OBSERVACIONES CIERRO

//////////////INSERTAR COMENTARIO
if (isset($actividad) AND isset($observaciones) AND isset($id_user)) {
				$hoy = date('d-m-Y H:i:s');
	  			 mysqli_set_charset($connection, "utf8");
            $sql_tmp_comentario="INSERT INTO comentario_contrato(id_user,actividad,observaciones,fecha) VALUES (?,?,?,?)";
            $resultado_tmp_comentario=mysqli_prepare($connection, $sql_tmp_comentario);
            mysqli_stmt_bind_param($resultado_tmp_comentario, "isss", $id_user,$actividad,$observaciones,$hoy);
            mysqli_stmt_execute($resultado_tmp_comentario);
            mysqli_stmt_close($resultado_tmp_comentario);
}
///////////////INSERTAR COMENTARIO CIERRO

////////////////////ELIMINAR COSTO Y DESCUENTO
if (isset($_GET['id_comentario']))//codigo elimina un elemento del array
{
		$id_comentario=$_GET['id_comentario'];
		mysqli_set_charset($connection, "utf8");
		$sql_comentario_eliminar="DELETE FROM comentario_contrato WHERE id=? ";
		$resultado_comentario_eliminar=mysqli_prepare($connection, $sql_comentario_eliminar);
		mysqli_stmt_bind_param($resultado_comentario_eliminar, "i", $id_comentario);
		mysqli_stmt_execute($resultado_comentario_eliminar);	
}
////////////////////ELIMINAR COSTO Y DESCUENTO CIERRO


 ?>
<div class="col s12 m12">
          <h4 style="text-align: center;">Comentarios</h4>

          <div class="col s12 m4 ">
          <a class="waves-effect waves-light btn modal-trigger" href="#modal_comentario"><i class="material-icons right">add_circle</i>Agregar Comentario</a>
          </div>
<!--CONSULTA PARA LOS FAMILIARES DEL USUARIO-->
      <?php 
          $sql_comentario = "SELECT * FROM comentario_contrato WHERE id_user = $id_user";
            $resultado_comentario= mysqli_query($connection, $sql_comentario);
            if (mysqli_num_rows($resultado_comentario)==0) {
?>
              <p style="color: red;">NO HAY COMENTARIOS AGREGADOS</p>


  <?php             
             }else{
              
                ?>

              <table class="responsive-table" >
                <thead>
                  <tr>
                      <th>Actividad</th>
                      <th>Observaciones</th>
                      <th>Fecha</th>
                      <th>Acciones</th>                
                  </tr>
                </thead>

                <tbody>
                <?php 
                   while ($fila_comentario =mysqli_fetch_array($resultado_comentario)){
                 ?>                  
                  <tr>            
                    <td><?php echo $fila_comentario['actividad'];?></td>
                    <td><?php echo $fila_comentario['observaciones'];?></td>
                    <td><?php echo $fila_comentario['fecha'];?></td>
                    <td><a onclick="eliminar_comentario(<?php echo $fila_comentario['id'];?>)"><i class="material-icons desactivar">delete</i></a></td>
                  </tr>
                  <?php 
                    }
                   ?>
                </tbody>
            </table>
  <?php

            
                 } 
         ?>
      
       </div>