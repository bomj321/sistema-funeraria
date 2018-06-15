<?php
include('connect.php');
$sql_total ="SELECT * FROM User WHERE revisado='0'";
$resultado_total= mysqli_query($connection, $sql_total);
$filas_afectadas= mysqli_num_rows($resultado_total);


$sql_total_suspendidos ="SELECT * FROM User WHERE activo='0'";
$resultado_total_suspendidos= mysqli_query($connection, $sql_total_suspendidos);
$filas_afectadas_suspendidos= mysqli_num_rows($resultado_total_suspendidos);

$sql_clientes_suspendidos = "SELECT * FROM Clientes WHERE activo='0'";
$resultado_clientes_suspendidos= mysqli_query($connection, $sql_clientes_suspendidos);
$filas_clientes_suspendidos= mysqli_num_rows($resultado_clientes_suspendidos);
?>
    
               
    <div class="col s4 m4">
         <?php
           if ($filas_afectadas==0){
         ?>      
                <p style="color:black;">Contratos Revisados</p>
            <?php
           }else{ 
          ?>
          
              <a href="control_contratos.php"><p style="color:#f50057; font-weight: bold;">Existen contratos sin revisar(<?php echo $filas_afectadas; ?>)</p></a>
             
          <?php
          }
          ?>
                      
    </div>
     <div class="col s4 m4">
                <?php
           if ($filas_afectadas_suspendidos==0){
         ?>      
                <p style="color:black;">Todos los contratos estan activos</p>
            <?php
           }else{ 
          ?>
          
              <a href="control_contratos.php"><p style="color:#f50057; font-weight: bold;">Existen contratos inactivos(<?php echo $filas_afectadas_suspendidos; ?>)</p></a>
             
          <?php
          }
          ?>
     </div>
                       
     <div class="col s4 m4">
                <?php
           if ($filas_clientes_suspendidos==0){
         ?>      
                <p style="color:black;">Ningun cliente ha sido suspendido</p>
            <?php
           }else{ 
          ?>
          
              <a href="control_contratos.php"><p style="color:#f50057; font-weight: bold;">Existen clientes suspendidos(<?php echo $filas_clientes_suspendidos; ?>)</p></a>
             
          <?php
          }
          ?>
     </div>                  
                        
