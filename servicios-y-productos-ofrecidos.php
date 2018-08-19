<?php include_once'funciones/templates/header.php';?>
<?php include_once'funciones/connect.php';

$sql = "SELECT * FROM stock ORDER BY id desc "; 
$resultado= mysqli_query($connection, $sql);
$row_cnt = mysqli_num_rows($resultado);   

$sql_servicios = "SELECT * FROM servicios WHERE servicio_activo='1' ORDER BY id_servicios desc "; 
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
                    <div class="col s12 m6 l4">
                          <div class="card blue-grey lighten-2" style="margin-bottom:100px; height:40rem;">
                            <div class="card-image">
                              <img style="widht:50px; height:200px;" src="admin/img/<?php echo $fila['image']?>" >
                            </div>
                            <div class="card-content" style="font-weight: bold; font-size: 18px;">
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
                              <div class="col s12 m12 l12">
                               <h4 style="text-align:center; color: white;">Servicios Ofrecidos</h4>
                                <ul class="collapsible" >
                            <?php 
                            if ($row_cnt_servicio > 0){       
                                    $i=1;                         
                                    while($fila_servicio =mysqli_fetch_array($resultado_servicios)){ //WHILE                           
                            ?> 

                                <li>
                                  <div class="collapsible-header blue-grey lighten-4" style="font-weight: bold; font-size: 20px;"><i class="material-icons">chevron_right</i>Servicio #<?php echo $i ?></div>
                                  <div class="collapsible-body light-blue"><span style="color: white; font-size: bold; font-size:20px;"><?php echo $fila_servicio['descripcion_servicio'];?> aun precio de <?php echo $fila_servicio['costo'];?> RD$.</span></div>
                                </li> 
                                   
                               <?php
                               $i++;
                                } //CIERRE WHILE
                            ?>
                                </ul>
                            </div>
                            <?php
                            }else{
                            ?>
                            <div class="col s12 m6 l6 push-m3 push-l3">
                             <ul class="collapsible">
                                <li>
                                  <div class="collapsible-header"><i class="material-icons">chevron_right</i>clear</div>
                                  <div class="collapsible-body"><span>No hay servicios que ofrecer, por favor vuelve mas tarde.</span></div>
                                </li>
                              </ul>  
                            </div>  

                        <?php
                            }
                            ?> 


                        </div>
                <!--SECCION DE LOS SERVICIOS--> 
  
            </div>
</main>            
<?php include_once'funciones/templates/footer.php';?>