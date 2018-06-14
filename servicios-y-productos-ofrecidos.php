<?php include_once'funciones/templates/header.php';?>
<?php include_once'funciones/connect.php';
    
$sql = "SELECT * FROM stock ORDER BY id desc "; 
$resultado= mysqli_query($connection, $sql);
$row_cnt = mysqli_num_rows($resultado);   

$sql_servicios = "SELECT * FROM Servicios WHERE servicio_activo='1' ORDER BY id_servicios desc "; 
$resultado_servicios= mysqli_query($connection, $sql_servicios);
$row_cnt_servicio = mysqli_num_rows($resultado_servicios);   

;?>


<main>
            <div class="container">
               <div class="row">
                       <div class="col s12 m12" style="text-align:center;">
                           <h4>Productos Ofrecidos</h4>
                       </div>
               </div>
                <div class="row">
                <?php
                    if ($row_cnt > 0)
                    {
                        while($fila =mysqli_fetch_array($resultado)){ //WHILE                           
                    ?>   
                    <div class="col s12 m4">
                          <div class="card " style="margin-bottom:100px; height:30rem;">
                            <div class="card-image">
                              <img style="widht:50px; height:200px;" src="admin/img/<?php echo $fila['image']?>" >
                            </div>
                            <div class="card-content">
                                 <hr>
                                  <h4 style="text-align:center;"><?php echo $fila['objeto']?></h4>
                                  <p><?php echo $fila['comentario']?></p>
                                  <p>Costo del producto: <?php echo $fila['precio']?>RD$</p>
                                 
                            </div>                            
                          </div>
                    </div>
            <?php
                        } //CIERRE WHILE
                    }
                        
                        else{
                 ?>
                             <h4>No hay productos que ofrecer, por favor vuelve mas tarde</h4>
                
                <?php
                    }
                    ?>                                                      
                </div>
                
                
  <!--SECCION DE LOS SERVICIOS--> 
                            
                        
                        <div class="row">
                              <div class="col s12 m6 push-m3">
                                <ul class="collection with-header">
                                        <li class="collection-header"><h4 style="color:black; text-align:center;">Servicios Ofrecidos</h4></li>
                        <?php
                            if ($row_cnt_servicio > 0)
                                {                                
                                    while($fila_servicio =mysqli_fetch_array($resultado_servicios)){ //WHILE                           
                            ?> 
                                    <li class="collection-item"><?php echo $fila_servicio['descripcion_servicio'];?> aun precio de <?php echo $fila_servicio['costo'];?> RD$</li>
                    <?php
                                } //CIERRE WHILE
                            ?>
                                </ul>
                            </div>
                            <?php
                            }

                                else{
                            ?>
                                     <h4>No hay servicios que ofrecer, por favor vuelve mas tarde</h4>

                        <?php
                            }
                            ?>                                                      
                        </div>
                <!--SECCION DE LOS SERVICIOS--> 
  
            </div>
</main>            
<?php include_once'funciones/templates/footer.php';?>