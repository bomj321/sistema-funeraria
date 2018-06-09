<?php
session_start();
require_once('../connect.php');
$id_unico_contrato_editar=$_SESSION["unicoid_contrato"];
$id_normal_contrato_editar=$_SESSION["usuarioid_contrato"];

/////////////////////////////////////////DESCUENTO//////////////////////////////////
$sql_contrato_descuento = "SELECT descuento FROM User WHERE idUser=$id_normal_contrato_editar AND idUser_user=$id_unico_contrato_editar";
$resultado_contrato_descuento= mysqli_query($connection, $sql_contrato_descuento);
$row_contrato_descuento = mysqli_fetch_assoc($resultado_contrato_descuento);
$sum_descuento = $row_contrato_descuento['descuento'];

                /////////////////////////////////////////DESCUENTO//////////////////////////////////

////////////////////ELIMINAR PLANES
if (isset($_GET['id_eliminar_contrato_plan']))//codigo elimina un elemento del array
{
      
       $id_contrato_plan=intval($_GET['id_eliminar_contrato_plan']);
       $id_contrato_limpio= mysqli_escape_string($connection,$id_contrato_plan);
/////////////////////////SELECCIONO PRECIO DEL PLAN/////////////////////////////////
       $sql_planes_contrato="SELECT * FROM User_has_planes WHERE id_actualizar_editar='".$id_contrato_limpio."'";
       $sql_planes_contrato_resultado= mysqli_query($connection, $sql_planes_contrato); 
       $array_resultado=mysqli_fetch_array($sql_planes_contrato_resultado);
       $sql_resultado=$array_resultado['precio_total']*$sum_descuento;
/////////////////////////SELECCIONO PRECIO DEL PLAN CIERRO/////////////////////////////////

/////////////////////////SELECCIONO PAGOS DEL CONTRATO CIERRO/////////////////////////////////
 
          $sql_total_pagos ="SELECT pago FROM Pagos WHERE id_pagos_user=$id_unico_contrato_editar AND User_id=$id_normal_contrato_editar";
          $resultado_total_pagos= mysqli_query($connection, $sql_total_pagos);
          $row_contrato_pagos = mysqli_fetch_assoc($resultado_total_pagos);
          $sum_total_pagos = $row_contrato_pagos['pago'];
          $filas_afectadas= mysqli_affected_rows($connection);
          $sql_resultado_parcial=$sql_resultado/$filas_afectadas;
          $costo_nuevo=$sum_total_pagos-$sql_resultado_parcial;
 /////////////////////////SELECCIONO PAGOS DEL CONTRATO CIERRO/////////////////////////////////

  
 /////////////////////////ACTUALIZAR PAGOS DEL CONTRATO/////////////////////////////////
 
$sql = "SELECT pago FROM Pagos WHERE id_pagos_user=$id_unico_contrato_editar AND User_id=$id_normal_contrato_editar";
$resultado = mysqli_query($connection, $sql);
while ($row=mysqli_fetch_array($resultado)){
$nuevo_precio=$costo_nuevo;
mysqli_set_charset($connection, "utf8");
$sql_actualizar="UPDATE Pagos SET pago= ? WHERE id_pagos_user=? AND User_id=?";
$resultado_actualizar=mysqli_prepare($connection, $sql_actualizar);
mysqli_stmt_bind_param($resultado_actualizar, "iii",$nuevo_precio,$id_unico_contrato_editar,$id_normal_contrato_editar);
mysqli_stmt_execute($resultado_actualizar);
}
 /////////////////////////ACTUALIZAR PAGOS DEL CONTRATO CIERRO/////////////////////////////////
 
 
////BORRAR PLAN 
mysqli_set_charset($connection, "utf8");
$sql="DELETE FROM User_has_planes WHERE id_actualizar_editar=? ";
$resultado=mysqli_prepare($connection, $sql);
mysqli_stmt_bind_param($resultado, "i", $id_contrato_limpio);
$ok=mysqli_stmt_execute($resultado);
 
}
 ///ELIMINAR PLAN CIERRO



////////////////////ELIMINAR SERVICIOS ADICIONALES
if (isset($_GET['id_eliminar_contrato_servicio']))//codigo elimina un elemento del array
{
 
 
 
 
       $id_contrato_servicio=intval($_GET['id_eliminar_contrato_servicio']);
       $id_contrato_limpio_servicio= mysqli_escape_string($connection,$id_contrato_servicio);
/////////////////////////SELECCIONO PRECIO DEL PLAN/////////////////////////////////
       $sql_planes_servicio="SELECT * FROM User_has_Servicios_Adicionales WHERE id_actualizar='".$id_contrato_limpio_servicio."'";
       $sql_planes_servicio_resultado= mysqli_query($connection, $sql_planes_servicio); 
       $array_resultado=mysqli_fetch_array($sql_planes_servicio_resultado);
       $sql_resultado=$array_resultado['costo']*$sum_descuento;
/////////////////////////SELECCIONO PRECIO DEL PLAN CIERRO/////////////////////////////////

/////////////////////////SELECCIONO PAGOS DEL CONTRATO CIERRO/////////////////////////////////
 
          $sql_total_pagos ="SELECT pago FROM Pagos WHERE id_pagos_user=$id_unico_contrato_editar AND User_id=$id_normal_contrato_editar";
          $resultado_total_pagos= mysqli_query($connection, $sql_total_pagos);
          $row_contrato_pagos = mysqli_fetch_assoc($resultado_total_pagos);
          $sum_total_pagos = $row_contrato_pagos['pago'];
          $filas_afectadas= mysqli_affected_rows($connection);
          $sql_resultado_parcial=$sql_resultado/$filas_afectadas;
          $costo_nuevo=$sum_total_pagos-$sql_resultado_parcial;
 /////////////////////////SELECCIONO PAGOS DEL CONTRATO CIERRO/////////////////////////////////

  
 /////////////////////////ACTUALIZAR PAGOS DEL CONTRATO/////////////////////////////////
 
$sql = "SELECT pago FROM Pagos WHERE id_pagos_user=$id_unico_contrato_editar AND User_id=$id_normal_contrato_editar";
$resultado = mysqli_query($connection, $sql);
while ($row=mysqli_fetch_array($resultado)){
$nuevo_precio=$costo_nuevo;
mysqli_set_charset($connection, "utf8");
$sql_actualizar="UPDATE Pagos SET pago= ? WHERE id_pagos_user=? AND User_id=?";
$resultado_actualizar=mysqli_prepare($connection, $sql_actualizar);
mysqli_stmt_bind_param($resultado_actualizar, "iii",$nuevo_precio,$id_unico_contrato_editar,$id_normal_contrato_editar);
mysqli_stmt_execute($resultado_actualizar);
}
 /////////////////////////ACTUALIZAR PAGOS DEL CONTRATO CIERRO/////////////////////////////////
 
 
////BORRAR PLAN 
mysqli_set_charset($connection, "utf8");
$sql="DELETE FROM User_has_Servicios_Adicionales WHERE id_actualizar=? ";
$resultado=mysqli_prepare($connection, $sql);
mysqli_stmt_bind_param($resultado, "i", $id_contrato_limpio_servicio);
$ok=mysqli_stmt_execute($resultado);
 
}
 ///ELIMINAR SERVICIOS ADICIONALES CIERRO



                /////////////////////////////////////////COST PLANES//////////////////////////////////

                    $sql_total_planes ="SELECT SUM(precio_total) AS value_planes FROM User_has_planes WHERE User_idUser=$id_normal_contrato_editar AND id_user_plan=$id_unico_contrato_editar";
                    $resultado_total_planes= mysqli_query($connection, $sql_total_planes);
                    $row_contrato_planes = mysqli_fetch_assoc($resultado_total_planes);
                    $sum_total_planes = $row_contrato_planes['value_planes'];
                /////////////////////////////////////////COST PLANES CIERR//////////////////////////////////
                
                
                /////////////////////////////////////////COST PLANES CIERRO//////////////////////////////////

                    $sql_total_servicio ="SELECT * FROM User_has_Servicios_Adicionales WHERE User_idUser=$id_normal_contrato_editar AND id_user_servicio=$id_unico_contrato_editar";
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

                    $sql_total_contrato ="SELECT SUM(costo_adicional) AS value_sum FROM User_family_independent WHERE User_idUser= $id_normal_contrato_editar AND id_User_family_indepen=$id_unico_contrato_editar";
                    $resultado_total_contrato= mysqli_query($connection, $sql_total_contrato);
                    $row_contrato_familiares = mysqli_fetch_assoc($resultado_total_contrato);
                    $sum_total_familiares = $row_contrato_familiares['value_sum'];
                    $sum = ceil(($sum_total + $sum_total_familiares+$sum_total_planes+$sumador_total_servicios)- (($sum_total_planes+$sum_total + $sum_total_familiares+$sumador_total_servicios) * ($sum_descuento/100)));
                /////////////////////////////////////////DESCUENTO//////////////////////////////////

/////////////////////////SELECCIONO PAGOS DEL CONTRATO MOSTRAR /////////////////////////////////
 
          $sql_total_pagos_mostrar ="SELECT pago FROM Pagos WHERE id_pagos_user=$id_unico_contrato_editar AND User_id=$id_normal_contrato_editar";
          $resultado_total_pagos_mostrar= mysqli_query($connection, $sql_total_pagos_mostrar);
          $row_contrato_pagos_mostrar = mysqli_fetch_assoc($resultado_total_pagos_mostrar);
          $sum_total_pagos_mostrar = $row_contrato_pagos_mostrar['pago'];
          $filas_afectadas_mostrar= mysqli_affected_rows($connection);
          
 /////////////////////////SELECCIONO PAGOS DEL CONTRATO MOSTRAR CIERRO/////////////////////////////////


$tabla_planes='';

$tabla_planes.='
       <div class="col s12 m12">
         <p style="color: black; font-size: 2rem;">El contrato tiene un monto de: '.$sum.'RD$ el cual tiene un descuento de '.$sum_descuento.' %</p>
         <p style="color: black; font-size: 2rem;">Posee '.$filas_afectadas_mostrar.' cuotas, cada una de '.$sum_total_pagos_mostrar.'RD$</p>         
       </div>
        ';

$sql_planes_editar="SELECT * FROM planes INNER JOIN User_has_planes ON User_has_planes.planes_id_planes = planes.id_planes && User_has_planes.User_idUser= $id_normal_contrato_editar AND User_has_planes.id_user_plan=$id_unico_contrato_editar";
$resultado_planes_editar= mysqli_query($connection, $sql_planes_editar);

if (mysqli_num_rows($resultado_planes_editar)==0)
{
 $tabla_planes.='
    	<div class="col s12 m12">
         <p style="color: #ff6f00;">No se encontraros planes registrados.</p>         
       </div>
 
 ';


}else
{ //ELSE DE LOS PLANES
	while($fila_planes_editar=mysqli_fetch_array($resultado_planes_editar)){ //WHILE DE LOS PLANES
     $planes_id=$fila_planes_editar['planes_id_planes'];
      $tabla_planes.='
       <div class="col s12 m12">
         <p style="color: #ff6f00;">Nombre del Plan: '.$fila_planes_editar['nombre'].'</p>
         <p style="color: #ff6f00;">Descripcion del Plan: '.$fila_planes_editar['descripcion'].'</p>
         <p style="color: #ff6f00;">Precio del plan: '.$fila_planes_editar['precio_plan'].'$</p>
         <a type="button" class="btn waves-effect waves-light" onclick="eliminar_editar_plan_contrato('.$fila_planes_editar["id_actualizar_editar"].')">Eliminar Plan</a>
       </div>
        ';
     
/////////////////////SERVICIOS DEL PLAN////////////////////////////////////////     
       $sql_servicios = "SELECT * FROM Servicios INNER JOIN planes_has_services_delivered ON planes_has_services_delivered.servicio_id_servicios = Servicios.id_servicios && planes_has_services_delivered.idUser_services= $id_normal_contrato_editar AND planes_has_services_delivered.id_user_delivered=$id_unico_contrato_editar AND planes_has_services_delivered.planes_id_planes=$planes_id";
       $resultado_servicios= mysqli_query($connection, $sql_servicios);
         if (mysqli_num_rows($resultado_servicios)==0) {
              $tabla_planes.='
               <div class="col s12 m12">
                <p style="color: black;">No existe servicios registrados.</p>         
              </div>';
          
         }else{ //ELSE DE LOS SERVICIOS
          
          $tabla_planes.='
               <div class="col s12 m12">
                  <p style="color: black;">Servicios del Plan</p>         
              </div>';
          $tabla_planes.='
        <div class="col s12 m12">  
          <table class="responsive-table tablaeditar">
                  <thead>
                    <tr>
                        <th>Nombre del servicio</th>
                        <th>Costo del servicio</th>                      
                    </tr>
                  </thead>

                  <tbody>';

                          while($fila_servicios =mysqli_fetch_array($resultado_servicios)){ //WHILE DE LOS SERVICIOS DEL PLAN

                 $tabla_planes.=' 	
                    <tr>
                      <td>'.$fila_servicios['descripcion_servicio'].'</td>
                      <td>'.$fila_servicios['costo']*$fila_servicios['cantidad_servicio'].'RD$</td>
                     </tr>';

                            }  //CIERRE DEL WHILE DE LOS SERVICIOS DEL PLAN


                $tabla_planes.='    
                  </tbody>
                </table>
             </div> 
              ';
          
          
         }  //CIERRE DEL ELSE DE LOS SERVICIOS   
/////////////////////SERVICIOS DEL PLAN CIERRE////////////////////////////////////////     
     
     /////////////////////PRODUCTOS DEL PLAN////////////////////////////////////////     
       $sql_producto = "SELECT * FROM stock INNER JOIN planes_has_products_delivered ON planes_has_products_delivered.products_id_products_products = stock.id && planes_has_products_delivered.idUser_products= $id_normal_contrato_editar AND planes_has_products_delivered.id_user_delivered=$id_unico_contrato_editar AND planes_has_products_delivered.planes_id_planes=$planes_id";
       $resultado_productos= mysqli_query($connection, $sql_producto);
         if (mysqli_num_rows($resultado_productos)==0) {
              $tabla_planes.='
               <div class="col s12 m12">
                <p style="color: black;">No existe productos registrados.</p>         
              </div>';
          
         }else{ //ELSE DE LOS PRODUCTOS
          
          $tabla_planes.='
               <div class="col s12 m12">
                  <p style="color: black;">Productos del Plan</p>         
              </div>';
          $tabla_planes.='
        <div class="col s12 m12">  
          <table class="responsive-table tablaeditar">
                  <thead>
                    <tr>
                        <th>Nombre del Producto</th>
                        <th>Costo del Producto</th>                      
                    </tr>
                  </thead>

                  <tbody>';

                          while($fila_producto =mysqli_fetch_array($resultado_productos)){ //WHILE DE LOS SERVICIOS DEL PLAN

                 $tabla_planes.=' 	
                    <tr>
                      <td>'.$fila_producto['objeto'].'</td>
                      <td>'.$fila_producto['precio']*$fila_producto['cantidad_producto'].'RD$</td>
                     </tr>';

                            }  //CIERRE DEL WHILE DE LOS SERVICIOS DEL PLAN


                $tabla_planes.='    
                  </tbody>
                </table>
             </div> 
              ';
          
          
         }  //CIERRE DEL ELSE DE LOS PRODUCTOS   
/////////////////////PRODUCTOS DEL PLAN CIERRE////////////////////////////////////////
	}	//CIERRE DE LOS WHILE DE LOS PLANES
} //CIERRE DEL ELSE DE LOS PLANES

/////////////////////SERVICIOS ADICIONALES DEL CONTRATO////////////////////////////////////////     
       $sql_servicio_adicionales= "SELECT * FROM Servicios INNER JOIN User_has_Servicios_Adicionales ON User_has_Servicios_Adicionales.Servicios_Adicionales_id = Servicios.id_servicios && User_has_Servicios_Adicionales.User_idUser= $id_normal_contrato_editar AND User_has_Servicios_Adicionales.id_user_servicio=$id_unico_contrato_editar";
       $resultado_servicios_adicionales= mysqli_query($connection, $sql_servicio_adicionales);
         if (mysqli_num_rows($resultado_servicios_adicionales)==0) {
              $tabla_planes.='
               <div class="col s12 m12">
                <p style="color: black;">No existe servicios adicionales agregados.</p>         
              </div>';
          
         }else{ //ELSE DE LOS SERVICIOS ADICIONALES
          
          $tabla_planes.='
               <div class="col s12 m12">
                  <p style="color: black;">Servicios  Adicionales del Contrato</p>         
              </div>';
          $tabla_planes.='
        <div class="col s12 m12">  
          <table class="responsive-table tablaeditar">
                  <thead>
                    <tr>
                        <th>Nombre del Producto</th>
                        <th>Costo del Producto</th>
                        <th>Acciones</th>
                    </tr>
                  </thead>

                  <tbody>';

                          while($fila_servicio_adicional =mysqli_fetch_array($resultado_servicios_adicionales)){ //WHILE DE LOS SERVICIOS DEL PLAN
                 $tabla_planes.=' 	
                    <tr>
                      <td>'.$fila_servicio_adicional['descripcion_servicio'].'</td>
                      <td>'.$fila_servicio_adicional['costo']*$fila_servicio_adicional['cantidad_servicios'].'RD$</td>
                      <td>
                       <a type="button" class="btn waves-effect waves-light" onclick="eliminar_editar_servicio_contrato('.$fila_servicio_adicional["id_actualizar"].')">Eliminar Servicio</a> 
                      </td>
                     </tr>';

                            }  //CIERRE DEL WHILE DE LOS SERVICIOS ADICIONALES 

                $tabla_planes.='    
                  </tbody>
                </table>
             </div> 
              ';
          
          
         }  //ELSE DE LOS SERVICIOS ADICIONALES CIERRE 
/////////////////////SERVICIOS ADICIONALES DEL CONTRATO CIERRE//////////////////////////////////////// 



/////////////////////FAMILIARES INDEPENDIENTES DEL CONTRATO////////////////////////////////////////     
       $sql_familiares_independientes= "SELECT * FROM User_family_independent WHERE User_idUser=$id_normal_contrato_editar AND id_User_family_indepen=$id_unico_contrato_editar";
       $resultado_familiares_independientes= mysqli_query($connection, $sql_familiares_independientes);
         if (mysqli_num_rows($resultado_familiares_independientes)==0) {
              $tabla_planes.='
               <div class="col s12 m12">
                <p style="color: black;">No existe familiares independientes agregados.</p>         
              </div>';
          
         }else{ //ELSE DE LOS FAMILIARES INDEPENDIENTES
          
          $tabla_planes.='
               <div class="col s12 m12">
                  <p style="color: black; font-size: 2rem;">Familiares independientes del Contrato</p>         
              </div>';
          $tabla_planes.='
        <div class="col s12 m12">  
          <table class="responsive-table tablaeditar">
                  <thead>
                    <tr>
                        <th>Nombre del Familiar</th>
                        <th>Edad</th>
                        <th>Parentezco</th>
                        <th>Costo Adicional</th>
                        <th>Acciones</th>
                    </tr>
                  </thead>

                  <tbody>';

                          while($fila_familiarin_adicional =mysqli_fetch_array($resultado_familiares_independientes)){ //WHILE DE LOS SERVICIOS DEL PLAN
                 $tabla_planes.=' 	
                    <tr>
                      <td>'.$fila_familiarin_adicional['nombre'].'</td>
                      <td>'.$fila_familiarin_adicional['edad'].'</td>
                      <td>'.$fila_familiarin_adicional['Parentezco'].'</td>
                      <td>'.$fila_familiarin_adicional['costo_adicional'].'RD$</td>
                      <td>
                       <a type="button" class="btn waves-effect waves-light" onclick="eliminar_editar_familiarin_contrato('.$fila_familiarin_adicional["id_actualizar_familyin"].')">Eliminar Familiar</a> 
                      </td>
                     </tr>';

                            }  //CIERRE DEL WHILE DE LOS SERVICIOS ADICIONALES 

                $tabla_planes.='    
                  </tbody>
                </table>
             </div> 
              ';
          
          
         }  //ELSE DE LOS FAMILIARES INDEPENDIENTES CIERRE
/////////////////////FAMILIARES INDEPENDIENTES DEL CONTRATO CIERRE//////////////////////////////////////// 
	echo $tabla_planes;
       


?>


