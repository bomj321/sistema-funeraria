<?php
include('header.php');
$usuarioid= $connection->real_escape_string($_GET['id']);
 //--------------------if--------------------
  
 ?>

  <div class="container">
    <div class="row">
       <div class="col s12 m12">
          <h4 style="text-align: center;">Datos del Usuario</h4>
<!--CONSULTA PARA LOS DATOS DEL USUARIO-->
      <?php 
          $sql = "SELECT * FROM User WHERE idUser = '$usuarioid'";
            $resultado= mysqli_query($connection, $sql); 
            $fila =mysqli_fetch_array($resultado);

/////////////////CONSULTA PARA LOS DATOS DEL USUARIO CIERRO

////////////////////CONSULTA PARA LOS DESCUENTO DEL USUARIO CIERRO

            $sql_contrato = "SELECT total,descuento FROM User WHERE idUser=$usuarioid ";
                    $resultado_contrato= mysqli_query($connection, $sql_contrato);
                    $row_contrato = mysqli_fetch_assoc($resultado_contrato);
                    $sum_total = $row_contrato['total'];
                    $sum_descuento = $row_contrato['descuento'];


                  $sql_total_contrato ="SELECT SUM(costo_adicional) AS value_sum FROM User_family_independent WHERE User_idUser= $usuarioid";
                  $resultado_total_contrato= mysqli_query($connection, $sql_total_contrato);
                  $row_contrato_familiares = mysqli_fetch_assoc($resultado_total_contrato);
                  $sum_total_familiares = $row_contrato_familiares['value_sum'];
                  $sum = ($sum_total + $sum_total_familiares)- (($sum_total + $sum_total_familiares) * $sum_descuento/100);
/////////////////CONSULTA PARA LOS DESCUENTO DEL USUARIO CIERRO

         ?>
         <a href="buscar_contratos.php"><button class="btn waves-effect waves-light">Volver Atras</button></a>
      <p>Nombre del Usuario: <?php echo $fila['name']; ?></p>
      <p>Edad del Usuario: <?php echo $fila['edad']; ?></p>
      <p>Estado Civil del Usuario: <?php echo $fila['estado_civil']; ?></p>
      <p>DNI del Usuario: <?php echo $fila['dni']; ?></p>
      <p>Numero Telefonico del Usuario: <?php echo $fila['numero']; ?></p>
      <p>Email del Usuario: <?php echo $fila['email']; ?></p>
      <p>Descuento por Contrato: <?php echo $fila['descuento'];?>%</p>
      <p>Total a Pagar: <?php echo $sum;?>$</p>
       </div>
    </div>


    <div class="row">
       <div class="col s12 m12">
          <h4 style="text-align: center;">FAMILIARES DEPENDIENTES</h4>
<!--CONSULTA PARA LOS FAMILIARES DEL USUARIO-->
      <?php 
          $sql_familiaresde = "SELECT * FROM User_family WHERE User_idUser = $usuarioid";
            $resultado_familiaresde= mysqli_query($connection, $sql_familiaresde);
            if (mysqli_num_rows($resultado_familiaresde)==0) {
?>
              <p style="color: red;">NO HAY FAMILIARES AGREGADOS</p>


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
                 ?>                  
                  <tr>            
                    <td><?php echo $fila_familiaresde['nombre'];?></td>
                    <td><?php echo $fila_familiaresde['Parentezco'];?></td>
                    <td><?php echo $fila_familiaresde['edad'];?></td>
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
          $sql_familiaresin = "SELECT * FROM User_family_independent WHERE User_idUser = $usuarioid";
            $resultado_familiaresin= mysqli_query($connection, $sql_familiaresin);
            if (mysqli_num_rows($resultado_familiaresin)==0) {
?>
              <p style="color: red;">NO HAY FAMILIARES AGREGADOS</p>


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
             ?>
            <tr>            
              <td><?php echo $fila_familiaresin['nombre'];?></td>
              <td><?php echo $fila_familiaresin['Parentezco'];?></td>
              <td><?php echo $fila_familiaresin['edad'];?></td>
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

    <div class="row">
          <div class="col s12 m12">
        <h4 style="text-align: center; color: #ff6f00;">Productos y Servicios Adquiridos</h4>
          </div>
       <div style="border: 1px solid " class="col s12 m12">          
<!--CONSULTA PARA LOS FAMILIARES DEL USUARIO-->
      <?php 
          $sql_planes = "SELECT * FROM planes INNER JOIN User_has_planes ON User_has_planes.planes_id_planes = planes.id_planes && User_has_planes.User_idUser= $usuarioid ";
            $resultado_planes= mysqli_query($connection, $sql_planes);

            if (mysqli_num_rows($resultado_planes)==0) {
?>
              <p style="color: #ff6f00;">NO HAY PLANES REGISTRADOS</p>


  <?php             
             }else{
               while ($fila_planes =mysqli_fetch_array($resultado_planes)){
                ?>

                <table class="responsive-table" >
                <thead>
                  <tr>
                      
                      <th>Nombre del Plan</th>
                      <th>Precio del Plan</th>
                  </tr>
                </thead>

                <tbody>
                  
                  <tr>            
                    <td><?php echo $fila_planes['nombre'];?></td>
                    <td><?php echo $fila_planes['precio_plan'];?>$</td>
                    </tr>
                </tbody>
            </table> 
<h4 style="text-align: center;">Servicios del Plan </h4>
  <?php
        $planes_id= $fila_planes['planes_id_planes'];
        $sql_servicios = "SELECT * FROM Servicios INNER JOIN planes_has_services_delivered ON planes_has_services_delivered.servicio_id_servicios = Servicios.id_servicios && planes_has_services_delivered.idUser_services= $usuarioid ";
               $resultado_servicios= mysqli_query($connection, $sql_servicios);

                
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
                  while ( $fila_servicio =mysqli_fetch_array($resultado_servicios)){
               ?>
          <tr>            
            <td><?php echo $fila_servicio['descripcion_servicio'];?></td>            
            <td><?php echo $fila_servicio['costo'];?>$</td>            
            <td>
              <?php 
              if ($fila_servicio['entregado']==0) { 
               ?>
                <a onclick="entregarservicio(); return false" href="entregado_servicio.php?id=<?php echo $fila_servicio['id_servicios']; ?>&entregado=1"><i class="material-icons noentregado">thumb_down</i></a>

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
              } //CIERRO WHILE INTERNO DE LOS SERVICIOS
           ?>
        </tbody>
      </table>
      <h4 style="text-align: center;">Productos del Plan</h4>

<?php
                

     $sql_productos = "SELECT * FROM stock INNER JOIN planes_has_products_delivered ON planes_has_products_delivered.products_id_products_products = stock.id && planes_has_products_delivered.idUser_products= $usuarioid ";
        $resultado_productos= mysqli_query($connection, $sql_productos);

          
                  ?>

        <table class="responsive-table" >
        <thead>
          <tr>
              
              <th>Nombre del Producto</th>
              <th>Costo Unitario</th>
              <th colspan="2" >Entregado</th>
          </tr>
        </thead>

        <tbody>
          <?php 
             while ( $fila_producto =mysqli_fetch_array($resultado_productos)){
           ?>
          <tr>            
            <td><?php echo $fila_producto['objeto'];?></td>            
            <td><?php echo $fila_producto['precio'];?>$</td>            
            <td>
              <?php 
              if ($fila_producto['entregado_product']==0) { 
               ?>
                <a href="entregado_producto.php?id=<?php echo $fila_producto['id']?>&entregado=1"><i class="material-icons noentregado ">thumb_down</i></a>

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
              } // CIERRO WHILE INTERNO DE LOS PRODUCTOS
             ?>
        </tbody>
      </table>

      <?php

            
            } //CIERRO WHILE DE PLANES
                 } // CIERRO ELSE
         ?>
      
       </div>
    </div>

    <div class="row">
       <div class="col s12 m12">
          <h4 style="text-align: center;">SERVICIOS ADICIONALES</h4>
<!--CONSULTA PARA LOS FAMILIARES DEL USUARIO-->
      <?php 
          $sql_servicios_adicionales = "SELECT * FROM Servicios INNER JOIN User_has_Servicios_Adicionales ON User_has_Servicios_Adicionales.Servicios_Adicionales_id = Servicios.id_servicios && User_has_Servicios_Adicionales.User_idUser= $usuarioid ";
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
              <td><?php echo $fila_servicios_adicionales['descripcion_servicio'];?></td>            
            <td><?php echo $fila_servicios_adicionales['costo'];?>$</td>            
            <td>
              <?php 
              if ($fila_servicios_adicionales['entregado']==0) { 
               ?>
                <a href="entregado_servicio_adicional.php?id=<?php echo $fila_servicios_adicionales['id_servicios']; ?>&entregado=1"><i class="material-icons noentregado">thumb_down</i></a>

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
       <div class="col s12 m12">
          <h4 style="text-align: center;">Pagos de los Contratos</h4>
<!--CONSULTA PARA LOS FAMILIARES DEL USUARIO-->
               
        <table class="responsive-table" >
          <thead>
            <tr>
              <th>Monto del Pago</th>
              <th>fecha</th>
              <th colspan="2" >Pagado</th>
            </tr>
          </thead>


          <tbody>
             <?php 
          $sql_pagos = "SELECT * FROM Pagos WHERE User_id= $usuarioid ";
            $resultado_pagos= mysqli_query($connection, $sql_pagos);

               while ($fila_pago =mysqli_fetch_array($resultado_pagos)){
                ?>  
            
            <tr>            
              <td><?php echo $fila_pago['pago'];?></td>            
            <td><?php echo $fila_pago['fecha'];?></td>            
            <td>
              <?php 
              if ($fila_pago['pagado']==0) { 
               ?>
                <a href="pagado_cuotas.php?id=<?php echo $fila_pago['id_pagos']; ?>&pagado=1"><i class="material-icons noentregado">thumb_down</i></a>

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
              


 
      
       </div>
    </div>  

</div>
<?php
include('footer.php');

mysqli_close($connection);
 ?>