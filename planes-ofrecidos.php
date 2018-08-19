<?php include_once'funciones/templates/header.php';?>
<?php include_once'funciones/connect.php';
    
$sql = "SELECT * FROM planes ORDER BY  id_planes desc ";   
$resultado= mysqli_query($connection, $sql);
$row_cnt = mysqli_num_rows($resultado);
;?>


<main>
            <div class="container">
               <div class="row">
                       <div class="col s12 m12" style="text-align:center;">
                           <h4>Planes Ofrecidos</h4>
                       </div>
               </div>
                <div class="row">
                <?php
                    if ($row_cnt > 0)
                    {
                        while($fila =mysqli_fetch_array($resultado)){ //WHILE
                            $planid =$fila['id_planes'];
                            
                    $sql_servicios = "SELECT * FROM servicios INNER JOIN planes_has_services ON planes_has_services.servicio_id_servicios = servicios.id_servicios && planes_has_services.planes_id_planes= $planid ";
                    $resultado_servicios= mysqli_query($connection, $sql_servicios);
                    $fila_servicio_consulta= mysqli_num_rows($resultado_servicios); 
                            
                    $sql_products = "SELECT * FROM stock INNER JOIN planes_has_products ON planes_has_products.products_id_products = stock.id && planes_has_products.planes_id_planes_products= $planid ";
                    $resultado_products= mysqli_query($connection, $sql_products);
                    $fila_producto_consulta= mysqli_num_rows($resultado_products);        
                    ?>   
                    <div class="col s12 m6 l4">
                          <div class="card blue-grey lighten-2 carta" style="margin-bottom:100px;">
                            <div class="card-image">
                              <img style="widht:50px; height:300px;" src="admin/img/<?php echo $fila['image']?>" >
                            </div>
                            <div class="card-content" style="font-weight: bold; font-size: 18px;">
                                 <hr>
                                  <h4 style="text-align:center;"><?php echo $fila['nombre']?></h4>
                                  <p><?php echo $fila['descripcion']?></p>
                                  <p>Costo del plan: <?php echo $fila['precio_plan']?>RD$</p>
                                  <!--DESCUENTO-->
                                   <?php
                                    if($fila['descuento_plan']==0){ 
                                ?>
                                        <p style="color:#f50057; font-weight: bold;" >Este plan no posee descuento</p>
                                        
                
                                       
                                  <?php                                              
                                  }else{   //ELSE PLANES 
                                        
                                ?>
                                <p style="color:#1b5e20; font-weight: bold;">Este plan posee <?php echo $fila['descuento_plan']?>% de descuento</p>
                                <?php
                                    } //CIERRE ELSE
                                ?>
                                <!--DESCUENTO-->

                                <!--SERVICIOS OFRECIDOS-->
  
                                  <?php
                                    if($fila_servicio_consulta>0){ 
                                ?>
                                        <p style="font-weight: bold; color:#1b5e20;" >Servicios Ofrecidos</p>
                                        <?php
                                            while ($fila_servicio =mysqli_fetch_array($resultado_servicios)){ //WHILE INTERNO
                                        ?>
                                         <p><?php echo $fila_servicio['descripcion_servicio'];?>(<?php echo $fila_servicio['cantidad_servicios_planes'];?>)</p>             
                
                                       
                                  <?php
                                                }  //CIERRE DEL WHILE INTERNO
                                  }else{   //ELSE PLANES 
                                        
                                ?>
                                <p style="color:#f50057; font-weight: bold;">Este plan no tiene servicios</p>
                                <?php
                                    } //CIERRE ELSE
                                ?>
                                <!--SERVICIOS OFRECIDOS-->
                                
                                
                                <!--PRODUCTOS OFRECIDOS-->
                                  <?php
                                    if($fila_producto_consulta>0){ 
                                ?>
                                        <p style="font-weight: bold; color:#1b5e20;" >Productos Ofrecidos</p>
                                        <?php
                                            while ($fila_producto =mysqli_fetch_array($resultado_products)){ //WHILE INTERNO
                                        ?>
                                         <p><?php echo $fila_producto['objeto'];?>(<?php echo $fila_producto['cantidad_comprada'];?>)</p>             
                
                                       
                                  <?php
                                                }  //CIERRE DEL WHILE INTERNO
                                  }else{   //ELSE PLANES 
                                        
                                ?>
                                <p style="color:#f50057; font-weight: bold;">Este plan no tiene productos</p>
                                <?php
                                    } //CIERRE ELSE
                                ?> 
                               <!--PRODUCTOS OFRECIDOS-->     
                            </div>                            
                          </div>
                </div>
            <?php
                        } //CIERRE WHILE
                    }
                        
                        else{
                 ?>
                         <h4>No hay planes por ofrecer por favor vuelve mas tarde</h4>
                
                <?php
                    }
                    ?>                                                      
                </div>
            </div>
</main>
<!--MEDIA QUERYS-->
<style>

@media only screen and (min-width: 600px) {
    .carta{
      height:70rem
    }


@media only screen and (min-width: 740px) {
    .carta{
      height:60rem
    }

@media only screen and (min-width: 1000px) {
    .carta{
      height:59rem
    }

}
</style>
 <!--MEDIA QUERYS-->            
<?php include_once'funciones/templates/footer.php';?>