<?php
$resultado3="Administracion > control contratos > Detalles del Contrato";
include('header.php');
  $unicoid= $connection->real_escape_string($_GET['idunico']);
  $usuarioid= $connection->real_escape_string($_GET['id']);
  $_SESSION["unicoid"]=$unicoid;
  $_SESSION["usuarioid"]=$usuarioid;
  $id_user_unico=$_SESSION["unicoid"];
  $id_user_session=$_SESSION["usuarioid"];
 //--------------------if--------------------
 ?>

  <div class="container">
    <div class="row">
      <!--MODALES-->
              <div class="col s12 m12">
                <?php 
                  include("modales/agregar_comentario.php");                  
                 ?> 
              </div>
              <!--MODALES-->
       <div class="col s12 m12">
          <h4 style="text-align: center;">Datos del Usuario</h4>
<!--CONSULTA PARA LOS DATOS DEL USUARIO-->
      <?php 
          $sql = "SELECT * FROM User WHERE idUser = '$id_user_session' AND idUser_user='$id_user_unico'";
            $resultado= mysqli_query($connection, $sql); 
            $fila =mysqli_fetch_array($resultado);

/////////////////CONSULTA PARA LOS DATOS DEL USUARIO CIERRO

/////////////////////////////////////////DESCUENTO//////////////////////////////////
                    $sql_contrato = "SELECT descuento FROM User WHERE idUser=$id_user_session AND idUser_user=$id_user_unico";
                    $resultado_contrato= mysqli_query($connection, $sql_contrato);
                    $row_contrato = mysqli_fetch_assoc($resultado_contrato);
                    $sum_total = 0;
                    $sum_descuento = $row_contrato['descuento'];

                /////////////////////////////////////////DESCUENTO//////////////////////////////////

                /////////////////////////////////////////COST PLANES//////////////////////////////////

                    $sql_total_planes ="SELECT SUM(precio_total) AS value_planes FROM User_has_planes WHERE User_idUser=$id_user_session AND id_user_plan=$id_user_unico";
                    $resultado_total_planes= mysqli_query($connection, $sql_total_planes);
                    $row_contrato_planes = mysqli_fetch_assoc($resultado_total_planes);
                    $sum_total_planes = $row_contrato_planes['value_planes'];
                /////////////////////////////////////////COST PLANES CIERR//////////////////////////////////
                
                
                /////////////////////////////////////////COST PLANES CIERRO//////////////////////////////////

                    $sql_total_servicio ="SELECT * FROM User_has_Servicios_Adicionales WHERE User_idUser=$id_user_session AND id_user_servicio=$id_user_unico";
                    $resultado_total_servicio= mysqli_query($connection, $sql_total_servicio);
                    $sumador_total_servicios=0;
                    while ($row_contrato_servicio = mysqli_fetch_array($resultado_total_servicio)) {
                      $cantidad_servicio=$row_contrato_servicio['cantidad_servicios'];
                      $costo_servicio=$row_contrato_servicio['costo'];
                      $total_servicio=$costo_servicio*$cantidad_servicio;
                      $sumador_total_servicios+=$total_servicio; 
                    }
                    
                    
                /////////////////////////////////////////DESCUENTO//////////////////////////////////
                
                
                /////////////////////////////////////////DESCUENTO//////////////////////////////////

                    $sql_total_contrato ="SELECT SUM(costo_adicional) AS value_sum FROM User_family_independent WHERE User_idUser= $id_user_session AND id_User_family_indepen=$id_user_unico";
                    $resultado_total_contrato= mysqli_query($connection, $sql_total_contrato);
                    $row_contrato_familiares = mysqli_fetch_assoc($resultado_total_contrato);
                    $sum_total_familiares = $row_contrato_familiares['value_sum'];
                    $sum = ceil(($sum_total + $sum_total_familiares+$sum_total_planes+$sumador_total_servicios)- (($sum_total_planes+$sum_total + $sum_total_familiares+$sumador_total_servicios) * ($sum_descuento/100)));
                /////////////////////////////////////////DESCUENTO//////////////////////////////////
$generar_hoy= date('Y-m-d H:i:s');
$hoy = new DateTime($generar_hoy);        
$nacimiento= $fila['nacimiento'];         
$nacimiento= new DateTime($nacimiento);          
$interval = date_diff($nacimiento, $hoy);   
         ?>
         <a href="control_contratos.php"><button class="btn waves-effect waves-light">Volver Atras</button></a>
        
      <p>Nombre del Usuario: <?php echo $fila['nombre']; ?></p>
      <p>Edad del Usuario: <?php echo $interval->format('%y años'); ?></p>
      <p>Estado Civil del Usuario: <?php echo $fila['estado']; ?></p>
      <p>DNI del Usuario: <?php echo $fila['dni']; ?></p>
      <p>Genero del Usuario: <?php echo $fila['sexo']; ?></p>
      <p>Numero Telefonico del Usuario: <?php echo $fila['numero']; ?></p>
      <p>Email del Usuario: <?php echo $fila['email'];?></p>
      <p>Direccion del Cliente: <?php echo $fila['direccion'];?></p>
      <p>Familiar de Contacto: <?php echo $fila['nombre_familiar'];?></p>
      <p>Numero de Familiar de Contacto: <?php echo $fila['numero_familiar'];?></p>
      <p>Descuento por Contrato: <?php echo $fila['descuento'];?>%</p>
      <p>Total a Pagar: <?php echo $sum;?>$</p>      
       </div>
    </div>

<?php 
if ($fila['tipo_contrato']==1) {
 ?>
    <div class="row">
       <div class="col s12 m12">
          <h4 style="text-align: center;">FAMILIARES DEPENDIENTES</h4>
<!--CONSULTA PARA LOS FAMILIARES DEL USUARIO-->
      <?php 
          $sql_familiaresde = "SELECT * FROM User_family WHERE User_idUser = $id_user_session AND id_User_family=$id_user_unico";
            $resultado_familiaresde= mysqli_query($connection, $sql_familiaresde);
            if (mysqli_num_rows($resultado_familiaresde)==0) {
?>    
                    <p style="color: red;">NO HAY FAMILIARES DEPENDIENTES AGREGADOS</p>


  <?php             
             }else{               
                ?>

              <table class="responsive-table" >
                <thead>
                  <tr>
                      <th>Nombre</th>
                      <th>Parentezco</th>
                      <th>Edad</th>                
                  </tr>
                </thead>

                <tbody>
                <?php 
                   while ($fila_familiaresde =mysqli_fetch_array($resultado_familiaresde)){                     
                     $fecha_nacimiento= $fila_familiaresde['edad'];
                     $edad= new DateTime($fecha_nacimiento);          
                     $interval_fecha = date_diff($edad, $hoy);  
                 ?>                  
                  <tr>            
                    <td><?php echo $fila_familiaresde['nombre'];?></td>
                    <td><?php echo $fila_familiaresde['Parentezco'];?></td>
                    <td><?php echo $interval_fecha->format('%y años'); ?></td>
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
    </div>

    <div class="row">
       <div class="col s12 m12">
          <h4 style="text-align: center;">FAMILIARES INDEPENDIENTES</h4>
<!--CONSULTA PARA LOS FAMILIARES DEL USUARIO-->
      <?php 
          $sql_familiaresin = "SELECT * FROM User_family_independent WHERE User_idUser=$id_user_session AND id_User_family_indepen=$id_user_unico";
            $resultado_familiaresin= mysqli_query($connection, $sql_familiaresin);
            if (mysqli_num_rows($resultado_familiaresin)==0) {
?>
              <p style="color: red;">NO HAY FAMILIARES INDEPENDIENTES AGREGADOS</p>


  <?php             
             }else{
                              
                ?>

        <table class="responsive-table" >
          <thead>
            <tr>
                <th>Nombre</th>
                <th>Parentezco</th>
                <th>Edad</th>
                <th>Costo Adicional</th>
            </tr>
          </thead>
                
          <tbody>
            <?php 
              while ($fila_familiaresin =mysqli_fetch_array($resultado_familiaresin)){
                     $fecha_nacimiento= $fila_familiaresin['edad'];
                     $edad= new DateTime($fecha_nacimiento);          
                     $interval_fecha = date_diff($edad, $hoy);  
             ?>
            <tr>            
              <td><?php echo $fila_familiaresin['nombre'];?></td>
              <td><?php echo $fila_familiaresin['Parentezco'];?></td>
              <td><?php echo $interval_fecha->format('%y años'); ?></td>
              <td><?php echo $fila_familiaresin['costo_adicional'];?>$</td>
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
    </div>

    <div class="col s12 m12">
          <h4 style="text-align: center;">Productos y Servicios Adquiridos</h4>
    </div>
<!--CONSULTA PARA LOS PLANES-->
<div class="row" >
        <?php 
            $sql_planes = "SELECT * FROM planes INNER JOIN User_has_planes ON User_has_planes.planes_id_planes = planes.id_planes && User_has_planes.User_idUser= $id_user_session AND User_has_planes.id_user_plan=$id_user_unico";
              $resultado_planes= mysqli_query($connection, $sql_planes);

              if (mysqli_num_rows($resultado_planes)==0) {                  
  ?>
                <div class="col s12 m12">
                   <p style="color: red;">NO HAY PLANES REGISTRADOS</p>
  				</div>  

    <?php             
               }else{
                 while ($fila_planes =mysqli_fetch_array($resultado_planes)){
                  $id_user_session=$_SESSION["usuarioid"];
                  ?>    
<div style="border: 1px solid; margin-top:10px;" >   
    
                  <table class="responsive-table tablaeditar" >
                  <thead>
                    <tr>
                        <th>Id del plan</th>
                        <th>Nombre del Plan</th>
                        <th>Precio del Plan</th>
                    </tr>
                  </thead>

                  <tbody>
                    
                    <tr>
                      <td><?php echo $fila_planes['id_planes'];?></td>            
                      <td><?php echo $fila_planes['nombre'];?></td>
                      <td><?php echo $fila_planes['precio_plan'];?>$</td>
                      </tr>
                  </tbody>
              </table>
  
  
  
  <div class="row">
        <div id="contrato_todo<?php echo $fila_planes['id_planes'];?>" class="col s12 m12"> 
            <h4 style="text-align: center;">Servicios del Plan </h4>
              <?php
                    $planes_id= $fila_planes['planes_id_planes'];
                    $_SESSION["planesid"]=$planes_id;
                    $planesid_planes=$_SESSION["planesid"];

                    $sql_servicios = "SELECT * FROM Servicios INNER JOIN planes_has_services_delivered ON planes_has_services_delivered.servicio_id_servicios = Servicios.id_servicios && planes_has_services_delivered.idUser_services= $id_user_session 
                    AND planes_has_services_delivered.id_user_delivered=$id_user_unico 
                    AND planes_has_services_delivered.planes_id_planes=$planes_id";
                           $resultado_servicios= mysqli_query($connection, $sql_servicios);
                           if (mysqli_num_rows($resultado_servicios)==0) {                          
                              ?>
                            <div class="col s12 m12"> 
                          		<p style="color: red; text-align:center;">NO HAY SERVICIOS AGREGADOS</p>   
							</div> 
                   
                         
                          
                          <?php
                        }else{
                          ?>
                           <table class="responsive-table tablaeditar" >
                            <thead>
                              <tr>              
                                  <th>Nombre del Servicio</th>
                                  <th>Costo Total</th>
                                  <th>Entregado</th>
                              </tr>
                            </thead>

                            <tbody>
                      <?php
                              while ( $fila_servicio =mysqli_fetch_array($resultado_servicios)){
                           ?>
                      <tr>
                        <td>(<?php echo $fila_servicio['cantidad_servicio'];?>)<?php echo $fila_servicio['descripcion_servicio'];?></td>            
                        <td><?php echo $fila_servicio['costo']*$fila_servicio['cantidad_servicio'];?>$</td>            
                        <td >
                          <?php 
                          if ($fila_servicio['entregado']==0) { 
                           ?>
                            <a onclick="entregarservicioplan(<?php echo $fila_servicio['id_actualizar_servicio'];?>)"><i class="material-icons noentregado">thumb_down</i></a>

                          <?php 
                             }else{ 
                           ?>
                           <i class="material-icons entregado">thumb_up</i>


                           <?php 
                            }
                            ?>
                        </td>
                        <input type="hidden" value="<?php echo $planesid_planes?>" id="servicio_plan<?php echo $fila_servicio['id_actualizar_servicio'];?>">          

                      </tr>
                      <?php 
                          } //CIERRO WHILE INTERNO DE LOS SERVICIOS
                        }
                       ?>
                    </tbody>
                  </table>
       </div>
    </div>

    <div class="row"> 
      <div id="plan_producto_todo<?php echo $fila_planes['id_planes'];?>" class="col s12 m12">
              <h4 style="text-align: center;">Productos del Plan</h4>

        <?php
                        

             $sql_productos = "SELECT * FROM stock INNER JOIN planes_has_products_delivered ON planes_has_products_delivered.products_id_products_products = stock.id && planes_has_products_delivered.idUser_products= $id_user_session 
             AND planes_has_products_delivered.id_user_delivered=$id_user_unico
             AND planes_has_products_delivered.planes_id_planes=$planes_id";
                $resultado_productos= mysqli_query($connection, $sql_productos);
                if (mysqli_num_rows($resultado_productos)==0) {                    
                          ?>
                          
                       <div class="col s12 m12">  
                			 <p style="color: red; text-align:center;">NO HAY PRODUCTOS AGREGADOS</p> 
                  	  </div> 
                                                         
                    <?php
                        }else{
                    ?>
                <table class="responsive-table tablaeditar" >
                <thead>
                  <tr>
                      
                      <th>Nombre del Producto</th>
                      <th></th>
                      <th></th>
                      <th >Costo Total</th>
                      <th >Entregado</th>
                  </tr>
                </thead>

                <tbody>
                  <?php 
                     while ($fila_producto =mysqli_fetch_array($resultado_productos)){
                   ?>
                  <tr> 

                    <td>(<?php echo $fila_producto['cantidad_producto'];?>)<?php echo $fila_producto['objeto'];?></td>
                    <td></td>
                    <td></td>            
                    <td ><?php echo $fila_producto['precio']*$fila_producto['cantidad_producto'];?>$</td>            
                    <td >
                      <?php 
                      if ($fila_producto['entregado_product']==0) { 
                       ?>

                        <a onclick="entregarproductoplan(<?php echo $fila_producto['id_actualizar_producto'];?>)"><i class="material-icons noentregado ">thumb_down</i></a>

                      <?php 
                         }else{ 
                       ?>
                       <i class="material-icons entregado">thumb_up</i>


                       <?php 
                        }
                        ?>
                    </td>
                    <input type="hidden" value="<?php echo $planesid_planes?>" id="producto_plan<?php echo $fila_producto['id_actualizar_producto'];?>">                    
                  </tr>
                    <?php 
                      } // CIERRO WHILE INTERNO DE LOS PRODUCTOS
                    }
                     ?>
                </tbody>
              </table>

             
       </div>
    </div>
  </div> <!--BORDER RADIUS-->          
  <?php

                    
                    } //CIERRO WHILE DE PLANES
                         } // CIERRO ELSE
                 ?>           
 <?php 
}// IF DEL TIPO DE CONTRATO
     ?>
    <div class="row">
       <div class="col s12 m12" id="servicios_adicionales_contrato">
          <?php 
        if ($fila['tipo_contrato']==1) {
         ?>
          <h4 style="text-align: center;">SERVICIOS ADICIONALES</h4>
         <?php 
        }else{
          ?>
            <h4 style="text-align: center;">SERVICIOS</h4>

        <?php 
          }
         ?>
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
              <th>Costo Total</th>
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
       </div>
    </div>

   
   
   
    <div class="row">
       <div class="col s12 m12" id="pagos_entregar_contrato">
          <h4 style="text-align: center;">Pagos del Contrato</h4>
<!--CONSULTA PARA LOS FAMILIARES DEL USUARIO-->
               
        <table class="responsive-table" >
          <thead>
            <tr>
              <th>Monto del Pago</th>
              <th>Fecha</th>
              <th colspan="2" >Pagado</th>
            </tr>
          </thead>


          <tbody>
             <?php 
          $sql_pagos = "SELECT * FROM Pagos WHERE User_id= $id_user_session AND id_pagos_user=$id_user_unico";
            $resultado_pagos= mysqli_query($connection, $sql_pagos);

               while ($fila_pago =mysqli_fetch_array($resultado_pagos)){
                ?>  
            
            <tr>            
              <td><?php echo $fila_pago['pago'];?>$</td>            
            <td><?php echo $fila_pago['fecha'];?></td>            
            <td>
              <?php 
              if ($fila_pago['pagado']==0) { 
               ?>

                <a onclick="entregarpagos(<?php echo $fila_pago['id_pagos'];?>)"><i class="material-icons noentregado">thumb_down</i></a>

              <?php 
                 }else{ 
               ?>
               <i class="material-icons entregado">thumb_up</i>


               <?php 
                }
                ?>
                
              <?php 
              if ($fila_pago['pagado']==1) { 
               ?>
                <a title="Imprimir en Ticketera" href="acciones/fpdf_plantilla_cuotas.php?id_cuota=<?php echo $fila_pago['id_pagos'];?>&id_user=<?php echo $id_user_session;?>">
                <i class="material-icons desactivar">print</i></a>
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
       </div>
    </div>  

    <div class="row" id="resultados_comentario">
       <div class="col s12 m12">
          <h4 style="text-align: center;">Comentarios</h4>

          <div class="col s12 m4 ">
          <a class="waves-effect waves-light btn modal-trigger" href="#modal_comentario"><i class="material-icons right">add_circle</i>Agregar Comentario</a>
          </div>
<!--CONSULTA PARA LOS FAMILIARES DEL USUARIO-->
      <?php 
          $sql_comentario = "SELECT * FROM comentario_contrato WHERE id_user = $id_user_session AND id_user_user=$id_user_unico";
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
    </div>
</div>
</div>
<?php
include('footer.php');

mysqli_close($connection);
 ?>