<?php
include('connect.php');
$sql_total ="SELECT * FROM user WHERE revisado='0'";
$resultado_total= mysqli_query($connection, $sql_total);
$filas_afectadas= mysqli_num_rows($resultado_total);


$sql_total_suspendidos ="SELECT * FROM user WHERE activo='0'";
$resultado_total_suspendidos= mysqli_query($connection, $sql_total_suspendidos);
$filas_afectadas_suspendidos= mysqli_num_rows($resultado_total_suspendidos);

$sql_clientes_suspendidos = "SELECT * FROM clientes WHERE activo='0'";
$resultado_clientes_suspendidos= mysqli_query($connection, $sql_clientes_suspendidos);
$filas_clientes_suspendidos= mysqli_num_rows($resultado_clientes_suspendidos);

$sql_servicios_suspendidos = "SELECT * FROM servicios WHERE servicio_activo='0'";
$resultado_servicios_suspendidos= mysqli_query($connection, $sql_servicios_suspendidos);
$filas_servicios_suspendidos= mysqli_num_rows($resultado_servicios_suspendidos);
if($_SESSION['perfil']=='admin'){ //IF
?>
    
 <div class="row" style="margin-bottom: 15px;">             
    <div class="col s12 m3">
         <?php
           if ($filas_afectadas==0){
         ?>      
                <p style="color:black;">Contratos Revisados</p>
            <?php
           }else{ 
          ?>
          
              <a href="control_contratos.php"><p style="color:#f50057; font-weight: bold;">Contratos sin revisar(<?php echo $filas_afectadas; ?>)</p></a>
             
          <?php
          }
          ?>
                      
    </div>
     <div class="col s12 m3">
                <?php
           if ($filas_afectadas_suspendidos==0){
         ?>      
                <p style="color:black;">Contratos activos</p>
            <?php
           }else{ 
          ?>
          
              <a href="control_contratos.php"><p style="color:#f50057; font-weight: bold;">Contratos inactivos(<?php echo $filas_afectadas_suspendidos; ?>)</p></a>
             
          <?php
          }
          ?>
     </div>
                       
     <div class="col s12 m3">
                <?php
           if ($filas_clientes_suspendidos==0){
         ?>      
                <p style="color:black;">Sin Clientes Suspendidos</p>
            <?php
           }else{ 
          ?>
          
              <a href="control_contratos.php"><p style="color:#f50057; font-weight: bold;">Clientes suspendidos(<?php echo $filas_clientes_suspendidos; ?>)</p></a>
             
          <?php
          }
          ?>
     </div>
     
     <div class="col s12 m3">
         <?php
           if ($filas_servicios_suspendidos==0){
         ?>      
                <p style="color:black;">Servicios Activos</p>
            <?php
           }else{ 
          ?>
          
              <a href="control_servicios.php"><p style="color:#f50057; font-weight: bold;">Servicios Inactivos(<?php echo $filas_servicios_suspendidos; ?>)</p></a>
             
          <?php
          }
          ?>
                      
    </div>
 </div>       
                                         
 <?php
}
?>                       
