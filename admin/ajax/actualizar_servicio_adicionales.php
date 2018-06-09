 <?php 
session_start();
require_once('../connect.php');
$id_user_unico=$_SESSION["unicoid"];
$id_user_session=$_SESSION["usuarioid"];
////////////////////ENTREGAR SERVICIO
if (isset($_GET['id_servicio_adicionales']))//codigo elimina un elemento del array
{
    $id_servicio_adicionales=intval($_GET['id_servicio_adicionales']);
    $sql="UPDATE User_has_Servicios_Adicionales SET entregado ='1' WHERE id_actualizar= ? ";
        $resultado=mysqli_prepare($connection, $sql);
        mysqli_stmt_bind_param($resultado, "i", $id_servicio_adicionales);
        mysqli_stmt_execute($resultado);  
}
////////////////////ENTREGAR SERVICIO CIERRO


 ?>
 <h4 style="text-align: center;">SERVICIOS ADICIONALES</h4>
<!--CONSULTA PARA LOS FAMILIARES DEL USUARIO-->
      <?php 
          $sql_servicios_adicionales = "SELECT * FROM Servicios INNER JOIN User_has_Servicios_Adicionales ON User_has_Servicios_Adicionales.Servicios_Adicionales_id = Servicios.id_servicios && User_has_Servicios_Adicionales.User_idUser= $id_user_session AND User_has_Servicios_Adicionales.id_user_servicio=$id_user_unico";
            $resultado_servicios_adicionales= mysqli_query($connection, $sql_servicios_adicionales);
            if (mysqli_num_rows($resultado_servicios_adicionales)==0) {
?>
              <p style="color: red;">NO HAY SERVICIOS ADICIONALES</p>
        <?php             
             }else{
               
                ?>

        <table class="responsive-table" >
          <thead>
            <tr>
                
              <th>Nombre del Servicio</th>
              <th>Costo Unitario</th>
              <th colspan="2" >Entregado</th>
            </tr>
          </thead>

          <tbody>
            <?php 
            while ($fila_servicios_adicionales =mysqli_fetch_array($resultado_servicios_adicionales)){
             ?>
            <tr>            
              <td>(<?php echo $fila_servicios_adicionales['cantidad_servicios'];?>)<?php echo $fila_servicios_adicionales['descripcion_servicio'];?></td>            
            <td><?php echo $fila_servicios_adicionales['costo']*$fila_servicios_adicionales['cantidad_servicios'];?>$</td>            
            <td>
              <?php 
              if ($fila_servicios_adicionales['entregado']==0) { 
               ?>
                <a onclick="entregarserviciosadicionales(<?php echo $fila_servicios_adicionales['id_actualizar'];?>)"><i class="material-icons noentregado">thumb_down</i></a>

              <?php 
                 }else{ 
               ?>
               <i class="material-icons entregado">thumb_up</i>


               <?php 
                }
                ?>
            </td>
          </tr>
          <?php 
              }
           ?>
          </tbody>
      </table>
  		 <?php 
              } 
         ?>