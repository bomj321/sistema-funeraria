<?php
session_start();
require_once('../connect.php');
$id_unico_contrato_editar=$_SESSION["unicoid_contrato"];
$id_normal_contrato_editar=$_SESSION["usuarioid_contrato"];


/////////////////////////////////////////DESCUENTO//////////////////////////////////
$sql_contrato_descuento = "SELECT descuento,tipo_contrato FROM User WHERE idUser=$id_normal_contrato_editar AND idUser_user=$id_unico_contrato_editar";
$resultado_contrato_descuento= mysqli_query($connection, $sql_contrato_descuento);
$row_contrato_descuento = mysqli_fetch_assoc($resultado_contrato_descuento);
$sum_descuento = $row_contrato_descuento['descuento'];
$row_tipo_contrato = $row_contrato_descuento['tipo_contrato'];

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
       $sql_resultado=$array_resultado['precio_total']-($array_resultado['precio_total']*($sum_descuento/100));
/////////////////////////SELECCIONO PRECIO DEL PLAN CIERRO/////////////////////////////////

/////////////////////////SELECCIONO PAGOS DEL CONTRATO CIERRO/////////////////////////////////
 
          $sql_total_pagos ="SELECT pago FROM Pagos WHERE id_pagos_user=$id_unico_contrato_editar AND User_id=$id_normal_contrato_editar";
          $resultado_total_pagos= mysqli_query($connection, $sql_total_pagos);
          $row_contrato_pagos = mysqli_fetch_array($resultado_total_pagos);
          $sum_total_pagos = $row_contrato_pagos['pago'];
          $filas_afectadas= mysqli_num_rows($resultado_total_pagos);
          $sql_resultado_parcial=$sql_resultado/$filas_afectadas;
          $costo_nuevo=($sum_total_pagos-$sql_resultado_parcial);
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
       $sql_resultado=($array_resultado['costo']*$array_resultado['cantidad_servicios'])-(($array_resultado['costo']*$array_resultado['cantidad_servicios'])*($sum_descuento/100));
/////////////////////////SELECCIONO PRECIO DEL PLAN CIERRO/////////////////////////////////

/////////////////////////SELECCIONO PAGOS DEL CONTRATO CIERRO/////////////////////////////////
 
          $sql_total_pagos ="SELECT pago FROM Pagos WHERE id_pagos_user=$id_unico_contrato_editar AND User_id=$id_normal_contrato_editar";
          $resultado_total_pagos= mysqli_query($connection, $sql_total_pagos);
          $row_contrato_pagos = mysqli_fetch_array($resultado_total_pagos);
          $sum_total_pagos = $row_contrato_pagos['pago'];
          $filas_afectadas= mysqli_num_rows($resultado_total_pagos);
          $sql_resultado_parcial=$sql_resultado/$filas_afectadas;
          $costo_nuevo=($sum_total_pagos-$sql_resultado_parcial);
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




/////////////////////////////////////////////////////////////////////ELIMINAR FAMILIARES INDEPENDIENTES
if (isset($_GET['id_eliminar_contrato_familiarin']))//codigo elimina un elemento del array
{
 
 
 
 
       $id_contrato_familiarin=intval($_GET['id_eliminar_contrato_familiarin']);
       $id_contrato_limpio_familiarin= mysqli_escape_string($connection,$id_contrato_familiarin);
/////////////////////////SELECCIONO PRECIO DE LOS SERVICIOS ADICIONALES/////////////////////////////////
       $sql_familiarin="SELECT * FROM User_family_independent WHERE id_actualizar_familyin='".$id_contrato_limpio_familiarin."'";
       $sql_familiarin_resultado= mysqli_query($connection, $sql_familiarin); 
       $array_resultado_familiarin=mysqli_fetch_array($sql_familiarin_resultado);
       $sql_resultado=$array_resultado_familiarin['costo_adicional']-($array_resultado_familiarin['costo_adicional']*($sum_descuento/100));
/////////////////////////SELECCIONO PRECIO DE LOS SERVICIOS ADICIONALES CIERRO/////////////////////////////////

/////////////////////////SELECCIONO PAGOS DEL CONTRATO CIERRO/////////////////////////////////
 
          $sql_total_pagos ="SELECT pago FROM Pagos WHERE id_pagos_user=$id_unico_contrato_editar AND User_id=$id_normal_contrato_editar";
          $resultado_total_pagos= mysqli_query($connection, $sql_total_pagos);
          $row_contrato_pagos = mysqli_fetch_array($resultado_total_pagos);
          $sum_total_pagos = $row_contrato_pagos['pago'];
          $filas_afectadas= mysqli_num_rows($resultado_total_pagos);
          $sql_resultado_parcial=$sql_resultado/$filas_afectadas;
          $costo_nuevo=($sum_total_pagos-$sql_resultado_parcial); 
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
 
 
////BORRAR SERVICIO ADICIONAL 
mysqli_set_charset($connection, "utf8");
$sql="DELETE FROM User_family_independent WHERE id_actualizar_familyin=? ";
$resultado=mysqli_prepare($connection, $sql);
mysqli_stmt_bind_param($resultado, "i", $id_contrato_familiarin);
$ok=mysqli_stmt_execute($resultado);
 
}
 /////////////////////////////////////////////////////////////////////ELIMINAR FAMILIARES INDEPENDIENTES CIERRO

/////////////////////////////////////////////////////////////////////ELIMINAR FAMILIARES DEPENDIENTES
if (isset($_GET['id_eliminar_contrato_familiarde']))//codigo elimina un elemento del array
{
$id_contrato_familiarde=intval($_GET['id_eliminar_contrato_familiarde']); 
 
////BORRAR SERVICIO ADICIONAL 
mysqli_set_charset($connection, "utf8");
$sql="DELETE FROM User_family WHERE id_actualizar_family=? ";
$resultado=mysqli_prepare($connection, $sql);
mysqli_stmt_bind_param($resultado, "i", $id_contrato_familiarde);
$ok=mysqli_stmt_execute($resultado);
 
}
 /////////////////////////////////////////////////////////////////////ELIMINAR FAMILIARES DEPENDIENTES CIERRO

/////////////////////////////////////////////////////////////////////////////////////AGREGAR PLANES
if (isset($_GET['id_plan']) AND isset($_GET['precio_venta_planes']) )//codigo elimina un elemento del array
{
$id_contrato_planes=intval($_GET['id_plan']); 
$id_contrato_precio_planes=intval($_GET['precio_venta_planes']); 
 
//////////////////////////////////SELECCIONAR ID PLANES CIERRO/////////////////////////////////////    

                mysqli_set_charset($connection, "utf8");
                $sql2="INSERT INTO User_has_planes (id_user_plan,User_idUser, planes_id_planes,precio_total) VALUES (?,?,?,?)";
                $resultado2=mysqli_prepare($connection, $sql2);
                mysqli_stmt_bind_param($resultado2, "iiii",$id_unico_contrato_editar,$id_normal_contrato_editar, $id_contrato_planes,$id_contrato_precio_planes);
                $ok2=mysqli_stmt_execute($resultado2);
                mysqli_stmt_close($resultado2);
///////////////////////////////////INSERTAR SERVICIOS DEL PLAN/////////////////////////////////////////////////7
                $sql_servicios = "SELECT * FROM Servicios INNER JOIN planes_has_services ON planes_has_services.servicio_id_servicios = Servicios.id_servicios && planes_has_services.planes_id_planes=$id_contrato_planes";
                  $resultado_servicios= mysqli_query($connection, $sql_servicios);
                  while($fila_servicio =mysqli_fetch_array($resultado_servicios)){              
                    $id_servicios = $fila_servicio['id_servicios'];
                    $cantidad_servicios = $fila_servicio['cantidad_servicios_planes'];
                    $entregado = 0;

                    $sql_planes_servicios="INSERT INTO planes_has_services_delivered (id_user_delivered,idUser_services, planes_id_planes,servicio_id_servicios,entregado,cantidad_servicio) VALUES (?,?,?,?,?,?)";
                    $resultado_planes_servicios=mysqli_prepare($connection, $sql_planes_servicios);
                    mysqli_stmt_bind_param($resultado_planes_servicios, "iiiiii",$id_unico_contrato_editar,$id_normal_contrato_editar, $id_contrato_planes,$id_servicios,$entregado,$cantidad_servicios);
                    $ok_planes_servicios=mysqli_stmt_execute($resultado_planes_servicios);
                    mysqli_stmt_close($resultado_planes_servicios);

                   }
                   ///////////////////////////////////INSERTAR SERVICIOS DEL PLAN CIERRO/////////////////////////
          
          //////////////////////////////////INSERTAR PRODUCTOS DEL PLAN////////////////////////////////////////
                $sql_products = "SELECT * FROM stock INNER JOIN planes_has_products ON planes_has_products.products_id_products = stock.id && planes_has_products.planes_id_planes_products=$id_contrato_planes ";
                    $resultado_products= mysqli_query($connection, $sql_products);

                    while ($fila_products =mysqli_fetch_array($resultado_products)){              
                    $id_product = $fila_products['id'];
                    $cantidad_productos = $fila_products['cantidad_comprada'];
                    $entregado = 0;

                    $sql_planes_product="INSERT INTO planes_has_products_delivered (id_user_delivered,idUser_products, planes_id_planes,products_id_products_products,entregado_product,cantidad_producto) VALUES (?,?,?,?,?,?)";
                    $resultado_planes_product=mysqli_prepare($connection, $sql_planes_product);
                    mysqli_stmt_bind_param($resultado_planes_product, "iiiiii",$id_unico_contrato_editar,$id_normal_contrato_editar, $id_contrato_planes,$id_product,$entregado,$cantidad_productos);
                    $ok_planes_product=mysqli_stmt_execute($resultado_planes_product);
                    mysqli_stmt_close($resultado_planes_product);
                   }

$sql_total_pagos ="SELECT pago FROM Pagos WHERE id_pagos_user=$id_unico_contrato_editar AND User_id=$id_normal_contrato_editar";
$resultado_total_pagos= mysqli_query($connection, $sql_total_pagos);          
$filas_afectadas= mysqli_num_rows($resultado_total_pagos); 
 
 
 
$precio_descuento= ($id_contrato_precio_planes-($id_contrato_precio_planes*($sum_descuento/100)))/$filas_afectadas;
$sql = "SELECT pago FROM Pagos WHERE id_pagos_user=$id_unico_contrato_editar AND User_id=$id_normal_contrato_editar";
$resultado = mysqli_query($connection, $sql);
while ($row=mysqli_fetch_array($resultado)){
$precio_total=$row[0]+$precio_descuento; 
mysqli_set_charset($connection, "utf8");
$sql_actualizar="UPDATE Pagos SET pago= ? WHERE id_pagos_user=? AND User_id=?";
$resultado_actualizar=mysqli_prepare($connection, $sql_actualizar);
mysqli_stmt_bind_param($resultado_actualizar, "iii",$precio_total,$id_unico_contrato_editar,$id_normal_contrato_editar);
mysqli_stmt_execute($resultado_actualizar);
}
 
 
 
}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////AGREGAR SERVICIOS ADICIONALES 



if (isset($_GET['id_servicio']) AND isset($_GET['precio_venta']) AND isset($_GET['cantidad']) )//codigo elimina un elemento del array
{
$id_contrato_servicios=intval($_GET['id_servicio']); 
$id_contrato_servicio_cantidad=intval($_GET['cantidad']); 
$id_contrato_precio_servicio=intval($_GET['precio_venta']);  
 
//////////////////////////////////SELECCIONAR ID SERVICIO CIERRO///////////////////////////////////// 
                $entregado = 0;
                mysqli_set_charset($connection, "utf8");
                $sql2="INSERT INTO User_has_Servicios_Adicionales (id_user_servicio,User_idUser,Servicios_Adicionales_id,  cantidad_servicios,costo,entregado) VALUES (?,?,?,?,?,?)";
                $resultado2=mysqli_prepare($connection, $sql2);
                mysqli_stmt_bind_param($resultado2, "iiiiii",$id_unico_contrato_editar,$id_normal_contrato_editar, $id_contrato_servicios,$id_contrato_servicio_cantidad,$id_contrato_precio_servicio,$entregado);
                $ok2=mysqli_stmt_execute($resultado2);
                mysqli_stmt_close($resultado2);
 
$sql_total_pagos ="SELECT pago FROM Pagos WHERE id_pagos_user=$id_unico_contrato_editar AND User_id=$id_normal_contrato_editar";
$resultado_total_pagos= mysqli_query($connection, $sql_total_pagos);          
$filas_afectadas= mysqli_num_rows($resultado_total_pagos); 
 
$precio_descuento= (($id_contrato_precio_servicio*$id_contrato_servicio_cantidad)-(($id_contrato_precio_servicio*$id_contrato_servicio_cantidad)*($sum_descuento/100)))/$filas_afectadas;
 
$sql = "SELECT pago FROM Pagos WHERE id_pagos_user=$id_unico_contrato_editar AND User_id=$id_normal_contrato_editar";
$resultado = mysqli_query($connection, $sql);
while ($row=mysqli_fetch_array($resultado)){
$precio_total=$row[0]+$precio_descuento; 
mysqli_set_charset($connection, "utf8");
$sql_actualizar="UPDATE Pagos SET pago= ? WHERE id_pagos_user=? AND User_id=?";
$resultado_actualizar=mysqli_prepare($connection, $sql_actualizar);
mysqli_stmt_bind_param($resultado_actualizar, "iii",$precio_total,$id_unico_contrato_editar,$id_normal_contrato_editar);
mysqli_stmt_execute($resultado_actualizar);
}
}              

 /////////////////////////////////////////////////////////////////////////////////////////////////////////////AGREGAR SERVICIOS ADICIONALES CIERRO

/////////////////////////////////////////////////INSERTAR FAMILIARES INDIRECTOS//////////////////////////////////////
if (isset($_GET['parentezcoin_contrato']) AND isset($_GET['nombrein_contrato']) AND isset($_GET['edadin_contrato']) AND isset($_GET['costoin_contrato']) AND isset($_GET['numeroin_contrato'])) {
$id_edad_familiarin=$_GET['edadin_contrato'].' 00:00:00.000000'; 
$id_parentezco_familiarin=$_GET['parentezcoin_contrato']; 
$id_nombre_familiarin=$_GET['nombrein_contrato']; 
$id_costo_familiarin=intval($_GET['costoin_contrato']); 
$numeroin=$_GET['numeroin_contrato']; 
 
 $sql_familiarin="INSERT INTO User_family_independent (id_User_family_indepen,User_idUser,Parentezco,nombre,edad,costo_adicional,identificacion) VALUES (?,?,?,?,?,?,?)";
 $resultado_familiarin=mysqli_prepare($connection, $sql_familiarin);   mysqli_stmt_bind_param($resultado_familiarin,"iisssis",$id_unico_contrato_editar,$id_normal_contrato_editar,$id_parentezco_familiarin,$id_nombre_familiarin,$id_edad_familiarin,$id_costo_familiarin,$numeroin);
 $ok_familiarin=mysqli_stmt_execute($resultado_familiarin);
 mysqli_stmt_close($resultado_familiarin);
 
 $sql_total_pagos ="SELECT pago FROM Pagos WHERE id_pagos_user=$id_unico_contrato_editar AND User_id=$id_normal_contrato_editar";
$resultado_total_pagos= mysqli_query($connection, $sql_total_pagos);          
$filas_afectadas= mysqli_num_rows($resultado_total_pagos); 
 
$precio_descuento= (($id_costo_familiarin)-(($id_costo_familiarin)*($sum_descuento/100)))/$filas_afectadas;
 
$sql = "SELECT pago FROM Pagos WHERE id_pagos_user=$id_unico_contrato_editar AND User_id=$id_normal_contrato_editar";
$resultado = mysqli_query($connection, $sql);
while ($row=mysqli_fetch_array($resultado)){
$precio_total=$row[0]+$precio_descuento; 
mysqli_set_charset($connection, "utf8");
$sql_actualizar="UPDATE Pagos SET pago= ? WHERE id_pagos_user=? AND User_id=?";
$resultado_actualizar=mysqli_prepare($connection, $sql_actualizar);
mysqli_stmt_bind_param($resultado_actualizar, "iii",$precio_total,$id_unico_contrato_editar,$id_normal_contrato_editar);
mysqli_stmt_execute($resultado_actualizar);
} 
}

///////////////INSERTAR FAMILIARES INDIRECTOS///////////////////////////////////////////////


/////////////////////////////////////////////////INSERTAR FAMILIARES DIRECTOS//////////////////////////////////////
if (isset($_GET['parentezcodi_contrato']) AND isset($_GET['nombredi_contrato']) AND isset($_GET['edaddi_contrato']) AND isset($_GET['numerodi_contrato'])) {
$id_edad_familiardi=$_GET['edaddi_contrato'].' 00:00:00.000000'; 
$id_parentezco_familiardi=$_GET['parentezcodi_contrato']; 
$id_nombre_familiardi=$_GET['nombredi_contrato']; 
$numerodi=$_GET['numerodi_contrato']; 
 
 $sql_familiarin="INSERT INTO User_family (id_User_family,User_idUser,Parentezco,nombre,edad,identificacion) VALUES (?,?,?,?,?,?)";
 $resultado_familiarin=mysqli_prepare($connection, $sql_familiarin);   mysqli_stmt_bind_param($resultado_familiarin,"iissss",$id_unico_contrato_editar,$id_normal_contrato_editar,$id_parentezco_familiardi,$id_nombre_familiardi,$id_edad_familiardi,$numerodi);
 $ok_familiarin=mysqli_stmt_execute($resultado_familiarin);
 mysqli_stmt_close($resultado_familiarin);
 
 

}

///////////////INSERTAR FAMILIARES DIRECTOS CIERRO///////////////////////////////////////////////

                /////////////////////////////////////////COSTO PLANES//////////////////////////////////

                    $sql_total_planes ="SELECT SUM(precio_total) AS value_planes FROM User_has_planes WHERE User_idUser=$id_normal_contrato_editar AND id_user_plan=$id_unico_contrato_editar";
                    $resultado_total_planes= mysqli_query($connection, $sql_total_planes);
                    $row_contrato_planes = mysqli_fetch_assoc($resultado_total_planes);
                    $sum_total_planes = $row_contrato_planes['value_planes'];
    				$sum_total = 0;
                /////////////////////////////////////////COST PLANES CIERR//////////////////////////////////
                
                
                /////////////////////////////////////////COSTO PLANES CIERRO//////////////////////////////////

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
/*************************************************GENERAR FECHA****************************************************/
$generar_hoy= date('Y-m-d H:i:s');
$hoy = new DateTime($generar_hoy);    
/*************************************************GENERAR FECHA****************************************************/




/*************************************************************************COMENTARIO*****************************************************/
////////////////////////////////VERIFICAR COMENTARIOS////////////////////////////////////////////
if (isset($_POST['actividad_editar']) AND isset($_POST['observaciones_editar'])) {
	   $actividad_editar=$_POST['actividad_editar'];
	   $observaciones_editar=$_POST['observaciones_editar'];
 
            $hoy_comentario = date('d-m-Y H:i:s');
	  	    mysqli_set_charset($connection, "utf8");
            $sql_tmp_comentario="INSERT INTO comentario_contrato(id_user_user,id_user,actividad,observaciones,fecha) VALUES (?,?,?,?,?)";
            $resultado_tmp_comentario=mysqli_prepare($connection, $sql_tmp_comentario);
            mysqli_stmt_bind_param($resultado_tmp_comentario, "iisss",$id_unico_contrato_editar,$id_normal_contrato_editar,$actividad_editar,$observaciones_editar,$hoy_comentario);
            mysqli_stmt_execute($resultado_tmp_comentario);
            mysqli_stmt_close($resultado_tmp_comentario);
}
/////////////////////VERIFICAR VARIABLES COMENTARIOS CIERRO



////////////////////ELIMINAR COMENTARIO
if (isset($_GET['id_comentario_editar']))//codigo elimina un elemento del array
{
		$id_comentario_editar=$_GET['id_comentario_editar'];
		mysqli_set_charset($connection, "utf8");
		$sql_comentario_eliminar="DELETE FROM comentario_contrato WHERE id=? ";
		$resultado_comentario_eliminar=mysqli_prepare($connection, $sql_comentario_eliminar);
		mysqli_stmt_bind_param($resultado_comentario_eliminar, "i", $id_comentario_editar);
		mysqli_stmt_execute($resultado_comentario_eliminar);	
}
////////////////////ELIMINAR COMENTARIO CIERRO

/*****************************************************************************COMENTARIO CIERRO*************************************************/

$tabla_planes='';

$tabla_planes.='
       <div class="col s12 m12">
         <p style="color: black; font-size: 2rem;">El contrato tiene un monto de: '.$sum.'RD$ el cual tiene un descuento de '.$sum_descuento.' %</p>
         <p style="color: black; font-size: 2rem;">Posee '.$filas_afectadas_mostrar.' cuotas, cada una de '.$sum_total_pagos_mostrar.'RD$</p>         
       </div>
        ';
if ($row_tipo_contrato==1) {
$sql_planes_editar="SELECT * FROM planes INNER JOIN User_has_planes ON User_has_planes.planes_id_planes = planes.id_planes && User_has_planes.User_idUser= $id_normal_contrato_editar AND User_has_planes.id_user_plan=$id_unico_contrato_editar";
$resultado_planes_editar= mysqli_query($connection, $sql_planes_editar);

if (mysqli_num_rows($resultado_planes_editar)==0)
{
 $tabla_planes.='
    	<div class="col s12 m12">
         <p style="color: #c62828; font-size: 2rem;">No se encontraros planes registrados.</p>         
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
                <p style="color: #c62828; font-size: 2rem;">No existe servicios registrados.</p>         
              </div>';
          
         }else{ //ELSE DE LOS SERVICIOS
          
          $tabla_planes.='
               <div class="col s12 m12">
                  <h4 style="text-align:left;">Servicios del Plan</h4>         
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
                <p style="color: #c62828; font-size: 2rem;">No existe productos registrados.</p>         
              </div>';
          
         }else{ //ELSE DE LOS PRODUCTOS
          
          $tabla_planes.='
               <div class="col s12 m12">
                  <h4 style="text-align:left;">Servicios del Plan</h4>         
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
} //IF DEL TIPO DEL CONTRATO
/////////////////////SERVICIOS ADICIONALES DEL CONTRATO////////////////////////////////////////     
       $sql_servicio_adicionales= "SELECT * FROM Servicios INNER JOIN User_has_Servicios_Adicionales ON User_has_Servicios_Adicionales.Servicios_Adicionales_id = Servicios.id_servicios && User_has_Servicios_Adicionales.User_idUser= $id_normal_contrato_editar AND User_has_Servicios_Adicionales.id_user_servicio=$id_unico_contrato_editar";
       $resultado_servicios_adicionales= mysqli_query($connection, $sql_servicio_adicionales);
         if (mysqli_num_rows($resultado_servicios_adicionales)==0) {
              $tabla_planes.='
               <div class="col s12 m12">
                <p style="color: #c62828; font-size: 2rem;">No existe servicios adicionales agregados.</p>         
              </div>';
          
         }else{ //ELSE DE LOS SERVICIOS ADICIONALES
          
if ($row_tipo_contrato==1) {          
          $tabla_planes.='
               <div class="col s12 m12">
                  <h4 style="text-align:left;">Servicios adicionales del contrato</h4>         
              </div>';
}else{
  $tabla_planes.='
               <div class="col s12 m12">
                  <h4 style="text-align:left;">Servicios del contrato</h4>         
              </div>';
}

          $tabla_planes.='
        <div class="col s12 m12">  
          <table class="responsive-table tablaeditar">
                  <thead>
                    <tr>
                        <th>Nombre del Producto</th>
                        <th >Costo del Producto</th>
                        <th ></th>
                        <th >Acciones</th>
                    </tr>
                  </thead>

                  <tbody>';

                          while($fila_servicio_adicional =mysqli_fetch_array($resultado_servicios_adicionales)){ //WHILE DE LOS SERVICIOS DEL PLAN
                 $tabla_planes.=' 	
                    <tr>
                      <td>'.$fila_servicio_adicional['descripcion_servicio'].'</td>
                      <td>'.$fila_servicio_adicional['costo']*$fila_servicio_adicional['cantidad_servicios'].'RD$</td>
                      <td></td>
                      <td>
                       <a  type="button" class="btn waves-effect waves-light" onclick="eliminar_editar_servicio_contrato('.$fila_servicio_adicional["id_actualizar"].')">Eliminar Servicio</a> 
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
if ($row_tipo_contrato==1) {
 

/////////////////////FAMILIARES INDEPENDIENTES DEL CONTRATO////////////////////////////////////////     
       $sql_familiares_independientes= "SELECT * FROM User_family_independent WHERE User_idUser=$id_normal_contrato_editar AND id_User_family_indepen=$id_unico_contrato_editar";
       $resultado_familiares_independientes= mysqli_query($connection, $sql_familiares_independientes);
         if (mysqli_num_rows($resultado_familiares_independientes)==0) {
              $tabla_planes.='
               <div class="col s12 m12">
                <p style="color: #c62828; font-size: 2rem;">No existe familiares independientes agregados.</p>         
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
                        <th>N° de identificacion</th>
                        <th>Costo Adicional</th>
                        <th>Acciones</th>
                    </tr>
                  </thead>

                  <tbody>';

                          while($fila_familiarin_adicional =mysqli_fetch_array($resultado_familiares_independientes)){ //WHILE DE LOS FAMILIARES INDEPENDIENTES
                           $fecha_nacimiento= $fila_familiarin_adicional['edad'];
                           $edad= new DateTime($fecha_nacimiento);          
                           $interval_fecha = date_diff($edad, $hoy);  
                 $tabla_planes.=' 	
                    <tr>
                      <td>'.$fila_familiarin_adicional['nombre'].'</td>
                      <td>'.$interval_fecha->format('%y años').'</td>
                      <td>'.$fila_familiarin_adicional['Parentezco'].'</td>
                      <td>'.$fila_familiarin_adicional['identificacion'].'</td>
                      <td>'.$fila_familiarin_adicional['costo_adicional'].'RD$</td>
                      <td>
                       <a type="button" class="btn waves-effect waves-light" onclick="eliminar_editar_familiarin_contrato('.$fila_familiarin_adicional["id_actualizar_familyin"].')">Eliminar Familiar</a> 
                      </td>
                     </tr>';

                            }  //CIERRE DEL WHILE DE LOS FAMILIARES INDEPENDIENTES CIERRE

                $tabla_planes.='    
                  </tbody>
                </table>
             </div> 
              ';
          
          
         }  //ELSE DE LOS FAMILIARES INDEPENDIENTES CIERRE
/////////////////////FAMILIARES INDEPENDIENTES DEL CONTRATO CIERRE//////////////////////////////////////// 



/////////////////////FAMILIARES DEPENDIENTES DEL CONTRATO////////////////////////////////////////     
       $sql_familiares_dependientes= "SELECT * FROM User_family WHERE User_idUser = $id_normal_contrato_editar AND id_User_family=$id_unico_contrato_editar";
       $resultado_familiares_dependientes= mysqli_query($connection, $sql_familiares_dependientes);
         if (mysqli_num_rows($resultado_familiares_dependientes)==0) {
              $tabla_planes.='
               <div class="col s12 m12">
                <p style="color: #c62828; font-size: 2rem;">No existe familiares dependientes agregados.</p>         
              </div>';
          
         }else{ //ELSE DE LOS FAMILIARES DEPENDIENTES
          
          $tabla_planes.='
               <div class="col s12 m12">
                  <p style="color: black; font-size: 2rem;">Familiares dependientes del Contrato</p>         
              </div>';
          $tabla_planes.='
        <div class="col s12 m12">  
          <table class="responsive-table tablaeditar">
                  <thead>
                    <tr>
                        <th>Nombre del Familiar</th>
                        <th>Edad</th>
                        <th class="celda" >Parentezco</th>
                        <th>N° de identificacion</th>
                        <th class="celda">Acciones</th>
                    </tr>
                  </thead>

                  <tbody>';

                          while($fila_familiarde_adicional =mysqli_fetch_array($resultado_familiares_dependientes)){ //WHILE DE LOS FAMILIARES DEPENDIENTES CIERRO
                           $fecha_nacimientode= $fila_familiarde_adicional['edad'];
                           $edadde= new DateTime($fecha_nacimientode);          
                           $intervalde_fecha = date_diff($edadde, $hoy);
                 $tabla_planes.=' 	
                    <tr>
                      <td>'.$fila_familiarde_adicional['nombre'].'</td>
                      <td>'.$intervalde_fecha->format('%y años').'</td>
                      <td class="celda">'.$fila_familiarde_adicional['Parentezco'].'</td>
                      <td>'.$fila_familiarde_adicional['identificacion'].'</td>
                      <td class="celda">
                       <a type="button" class="btn waves-effect waves-light" onclick="eliminar_editar_familiarde_contrato('.$fila_familiarde_adicional["id_actualizar_family"].')">Eliminar Familiar</a> 
                      </td>
                     </tr>';

                            }  //CIERRE DEL WHILE DE LOS FAMILIARES DEPENDIENTES CIERRO

                $tabla_planes.='    
                  </tbody>
                </table>
             </div> 
              ';
          
          
         }  //ELSE DE LOS FAMILIARES DEPENDIENTES CIERRE
/////////////////////FAMILIARES DEPENDIENTES DEL CONTRATO CIERRE//////////////////////////////////////// 

}
/**********************************************COMENTARIOS******************************************************/
 $sql_comentarios= "SELECT * FROM comentario_contrato WHERE id_user=$id_normal_contrato_editar AND id_user_user=$id_unico_contrato_editar";
 $resultado_comentarios= mysqli_query($connection, $sql_comentarios);
if (mysqli_num_rows($resultado_comentarios)==0) {
    $tabla_planes.='
               <div class="col s12 m12">
                <p style="color: #c62828; font-size: 2rem;">No existen comentarios agregados.</p>         
              </div>';
}else{
 $tabla_planes.='
               <div class="col s12 m12">
                  <p style="color: black; font-size: 2rem;">Comentarios Agregados</p>         
              </div>';
  $tabla_planes.='
        <div class="col s12 m12">  
          <table class="responsive-table tablaeditar">
                  <thead>
                    <tr>
                        <th>Actividad</th>
                        <th>Observaciones</th>                        
                        <th>Fecha</th>
                        <th class="celda">Acciones</th>
                    </tr>
                  </thead>

                  <tbody>';

                          while($comentarios=mysqli_fetch_array($resultado_comentarios)){ //WHILE DE LOS  COMENTARIOS CIERRO                           
                 $tabla_planes.=' 	
                    <tr>
                      <td>'.$comentarios['actividad'].'</td> 
                      <td>'.$comentarios['observaciones'].'</td>
                      <td>'.$comentarios['fecha'].'</td> 
                      <td class="celda">
                       <a type="button" class="btn waves-effect waves-light" onclick="eliminar_comentario_editar('.$comentarios["id"].')">Eliminar Comentario</a> 
                      </td>
                     </tr>';

                            }  //CIERRE DEL WHILE DE LOS  COMENTARIOS CIERRO

                $tabla_planes.='    
                  </tbody>
                </table>
             </div> 
              ';
 
}

/**********************************************COMENTARIOS CIERRE******************************************************/

	echo $tabla_planes;
       


?>


