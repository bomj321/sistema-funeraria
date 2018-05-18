<?php 
session_start();
$session_id= session_id();
require_once('../connect.php');

				        $usu= $_POST['nombre_contrato'];
				        $estado_civil= $_POST['civil_contrato'];
                $edad= $_POST['edad_contrato'];
                $numero= $_POST['numero_usuario'];
                $dni= $_POST['dni_contrato'];   
                $email= $_POST['email_contrato'];
                $activo = 0;               
                
//////////////////////////////////SELECCIONAR COSTO, DESCUENTO Y CUOTAS///////////////////////////////////
          $sql_costo_descuento="SELECT * FROM tmp_costo_descuento_contratp WHERE session_id='".$session_id."'";
          $resultado_costo_descuento= mysqli_query($connection, $sql_costo_descuento);
          $row_costo_descuento=mysqli_fetch_array($resultado_costo_descuento);
          $costo_contrato=$row_costo_descuento['costo_contrato'];
          $descuento_contrato=$row_costo_descuento['descuento_contrato'];
          $cuotas_contrato=$row_costo_descuento['cuotas'];
//////////////////////////////////SELECCIONAR COSTO, DESCUENTO Y CUOTAS CIERRO////////////////////////////
                
                //////////////////////INSERT USUARIO
            mysqli_set_charset($connection, "utf8");
            $sql_user="INSERT INTO User (activo,name,edad,estado_civil,cuotas,total,numero,email,dni,descuento) VALUES (?,?,?,?,?,?,?,?,?,?)";
            $resultado_user=mysqli_prepare($connection, $sql_user);
           	mysqli_stmt_bind_param($resultado_user, "isisiissii",$activo,$usu,$edad,$estado_civil,$cuotas_contrato,$costo_contrato,$numero,$email,$dni,$descuento_contrato );
            $ok=mysqli_stmt_execute($resultado_user);
            $idgenerado =mysqli_insert_id($connection);
            mysqli_stmt_close($resultado_user);
             if (!$ok) {
               echo "
             <script>

              alert('Error en la insercion de datos de Usuario');
             </script>

               ";
              }

//////////////////////INSERT USUARIO CIERRO

 
  /////////////////////////////////INSERT PARA LOS SERVICIOS//////////////////////////////// 
  
      
  //////////////////////////////////SELECCIONAR ID SERVICIO/////////////////////////////////////
          $sql_servicio_contrato="SELECT * FROM tmp_servicios_contratos WHERE session_id_contrato='".$session_id."'";
          $resultado_servicio_contrato= mysqli_query($connection, $sql_servicio_contrato);
          while($row_servicio_contrato=mysqli_fetch_array($resultado_servicio_contrato)){
          $id_servicio=$row_servicio_contrato['id_servicio_contrato'];
          $cantidad_servicio=$row_servicio_contrato['cantidad_tmp_contrato'];
          $precio_servicio=$row_servicio_contrato['precio_tmp_contrato'];
//////////////////////////////////SELECCIONAR ID SERVICIO CIERRO///////////////////////////////////// 
                $entregado = 0;
                mysqli_set_charset($connection, "utf8");
                $sql2="INSERT INTO User_has_Servicios_Adicionales (User_idUser,Servicios_Adicionales_id,  cantidad_servicios,costo,entregado) VALUES (?,?,?,?,?)";
                $resultado2=mysqli_prepare($connection, $sql2);
                mysqli_stmt_bind_param($resultado2, "iiiii", $idgenerado, $id_servicio,$cantidad_servicio,$precio_servicio,$entregado);
                $ok2=mysqli_stmt_execute($resultado2);
                mysqli_stmt_close($resultado2);
              
}              

/////////////////////////////////INSERT PARA LOS SERVICIOS CIERRO//////////////////////////////////////////////

////////////////////////////////////INSERT PARA LOS PLANES//////////////////////////////////////////////////     
          
            
 //////////////////////////////////SELECCIONAR ID PLANES/////////////////////////////////////
          $sql_planes_contrato="SELECT * FROM tmp_planes_contrato WHERE session_id='".$session_id."'";
          $resultado_planes_contrato= mysqli_query($connection, $sql_planes_contrato);
          while($row_planes_contrato=mysqli_fetch_array($resultado_planes_contrato)){
          $id_planes_contrato=$row_planes_contrato['id_plan_contrato'];
          $costo_planes_contrato=$row_planes_contrato['precio_plan_contrato'];
//////////////////////////////////SELECCIONAR ID PLANES CIERRO/////////////////////////////////////    

                mysqli_set_charset($connection, "utf8");
                $sql2="INSERT INTO User_has_planes (User_idUser, planes_id_planes,precio_total) VALUES (?,?,?)";
                $resultado2=mysqli_prepare($connection, $sql2);
                mysqli_stmt_bind_param($resultado2, "iii", $idgenerado, $id_planes_contrato,$costo_planes_contrato);
                $ok2=mysqli_stmt_execute($resultado2);
                mysqli_stmt_close($resultado2);
///////////////////////////////////INSERTAR SERVICIOS DEL PLAN/////////////////////////////////////////////////7
                $sql_servicios = "SELECT * FROM Servicios INNER JOIN planes_has_services ON planes_has_services.servicio_id_servicios = Servicios.id_servicios && planes_has_services.planes_id_planes=$id_planes_contrato";
                  $resultado_servicios= mysqli_query($connection, $sql_servicios);
                  while($fila_servicio =mysqli_fetch_array($resultado_servicios)){              
                    $id_servicios = $fila_servicio['id_servicios'];
                    $entregado = 0;

                    $sql_planes_servicios="INSERT INTO planes_has_services_delivered (idUser_services, planes_id_planes,servicio_id_servicios,entregado) VALUES (?,?,?,?)";
                    $resultado_planes_servicios=mysqli_prepare($connection, $sql_planes_servicios);
                    mysqli_stmt_bind_param($resultado_planes_servicios, "iiii", $idgenerado, $id_planes_contrato,$id_servicios,$entregado);
                    $ok_planes_servicios=mysqli_stmt_execute($resultado_planes_servicios);
                    mysqli_stmt_close($resultado_planes_servicios);

                   }
                   ///////////////////////////////////INSERTAR SERVICIOS DEL PLAN CIERRO/////////////////////////
          
          //////////////////////////////////INSERTAR PRODUCTOS DEL PLAN////////////////////////////////////////
                $sql_products = "SELECT * FROM stock INNER JOIN planes_has_products ON planes_has_products.products_id_products = stock.id && planes_has_products.planes_id_planes_products=$id_planes_contrato ";
                    $resultado_products= mysqli_query($connection, $sql_products);

                    while ($fila_products =mysqli_fetch_array($resultado_products)){              
                    $id_product = $fila_products['id'];
                    $entregado = 0;

                    $sql_planes_product="INSERT INTO planes_has_products_delivered (idUser_products, planes_id_planes,products_id_products_products,entregado_product) VALUES (?,?,?,?)";
                    $resultado_planes_product=mysqli_prepare($connection, $sql_planes_product);
                    mysqli_stmt_bind_param($resultado_planes_product, "iiii", $idgenerado, $id_planes_contrato,$id_product,$entregado);
                    $ok_planes_product=mysqli_stmt_execute($resultado_planes_product);
                    mysqli_stmt_close($resultado_planes_product);

                   }
                   ///////////////////////////////////INSERTAR PRODUCTOS DEL PLAN CIERRO////////////////////////////
}                   

  
/////////////////////////////////INSERT PARA LOS PLANES CIERRO//////////////////////////////////////////////////


//////////////////////////////////SELECCIONAR FAMILIARES DIRECTOS/////////////////////////////////////////////
          $sql_familiares_directo="SELECT * FROM tmp_familiaresdi_contrato WHERE session_id='".$session_id."'";
          $resultado_familiares_directo= mysqli_query($connection, $sql_familiares_directo);
          while($row_familiares_directo=mysqli_fetch_array($resultado_familiares_directo)){
          $parentezco_familiares_directo=$row_familiares_directo['parentezco'];
          $nombre_familiares_directo=$row_familiares_directo['nombre'];
          $edad_familiares_directo=$row_familiares_directo['edad'];
//////////////////////////////////SELECCIONAR  FAMILIARES DIRECTOS CIERRO/////////////////////////////////////

/////////////////////////////////////INSERT PARA LOS FAMILIARES DIRECTOS///////////////////////////////////


            $sql_familiardi="INSERT INTO User_family (User_idUser, Parentezco,nombre,edad) VALUES (?,?,?,?)";
            $resultado_familiardi=mysqli_prepare($connection, $sql_familiardi);
            mysqli_stmt_bind_param($resultado_familiardi, "issi", $idgenerado, $parentezco_familiares_directo,$nombre_familiares_directo,$edad_familiares_directo);
            $ok_familiardi=mysqli_stmt_execute($resultado_familiardi);
            mysqli_stmt_close($resultado_familiardi);




        
}
/////////////////////////////////////INSERT PARA LOS FAMILIARES DIRECTOS CIERRO///////////////////////////////



//////////////////////////////////SELECCIONAR FAMILIARES INDIRECTOS/////////////////////////////////////////////
          $sql_familiares_indirecto="SELECT * FROM tmp_familiaredin_contrato WHERE session_id='".$session_id."'";
          $resultado_familiares_indirecto= mysqli_query($connection, $sql_familiares_indirecto);
          while($row_familiares_indirecto=mysqli_fetch_array($resultado_familiares_indirecto)){
          $parentezco_familiares_indirecto=$row_familiares_indirecto['parentezcoin'];
          $nombre_familiares_indirecto=$row_familiares_indirecto['nombrein'];
          $edad_familiares_indirecto=$row_familiares_indirecto['edadin'];
          $costo_familiares_indirecto=$row_familiares_indirecto['costo_adicional'];
//////////////////////////////////SELECCIONAR  FAMILIARES INDIRECTOS CIERRO/////////////////////////////////////


/////////////////////////////////////INSERT PARA LOS FAMILIARES INDIRECTOS/////////////////////////////

            $sql_familiarin="INSERT INTO User_family_independent (User_idUser, Parentezco,nombre,edad,costo_adicional) VALUES (?,?,?,?,?)";
                    $resultado_familiarin=mysqli_prepare($connection, $sql_familiarin);
                    mysqli_stmt_bind_param($resultado_familiarin, "issii", $idgenerado,$parentezco_familiares_indirecto,$nombre_familiares_indirecto,$edad_familiares_indirecto,$costo_familiares_indirecto);
                    $ok_familiarin=mysqli_stmt_execute($resultado_familiarin);
                    mysqli_stmt_close($resultado_familiarin);

}
/////////////////////////////////////INSERT PARA LOS FAMILIARES INDIRECTOS CIERRO//////////////////////////////////
///
///
 $sql_total_costo ="SELECT SUM(costo_adicional) AS value_sum FROM User_family_independent WHERE User_idUser= $idgenerado";
                    $resultado_total_costo= mysqli_query($connection, $sql_total_costo);
                    $row_costo = mysqli_fetch_assoc($resultado_total_costo);
                    $sum_costo = $row_costo['value_sum'] ;
                    $sum_costo_total = ($costo_contrato+$sum_costo) - ( ($descuento_contrato/100) * ($costo_contrato+$sum_costo));                    
                    $costo_cuota_sinredondear = $sum_costo_total/$cuotas_contrato;
                    $costo_cuota= ceil($costo_cuota_sinredondear);

                    //SUMO A LA FECHA 30 DIAS
      
 
////////////////////////////////////////////////INSERT PAGO////////////////////////////////////////////////////////        
      $hoy = date('d-m-Y');
      for($i=1;$i<=$cuotas_contrato; $i++){
        $pagado = 0;
        
       
       $mas_1D = date("d-m-Y",strtotime($hoy."+ 30 days"));  
            $sql_pagos="INSERT INTO Pagos (User_id, pago,fecha,pagado) VALUES (?,?,?,?)";
                    $resultado_pagos=mysqli_prepare($connection, $sql_pagos);
                    mysqli_stmt_bind_param($resultado_pagos, "iisi", $idgenerado, $costo_cuota,$mas_1D,$pagado);
                    $ok_pagos=mysqli_stmt_execute($resultado_pagos);
                    mysqli_stmt_close($resultado_pagos);

              $hoy = $mas_1D;



                if (!$ok_pagos) {
                   echo "ERROR" .'</br>';
                  
                 }else{
                   echo $descuento_contrato .'</br>';
                   echo $idgenerado .'</br>';
                   echo $costo_cuota .'</br>';
                   echo $mas_1D .'</br>';
                   echo $cuotas_contrato .'</br>';
                 } 
                }
////////////////////////////////////////////////INSERT PAGO////////////////////////////////////////////////////////        



/////////////////////////////////BORRAR DESCUENTO Y COSTO EN TMP/////////////////////////////////////////////////////
  
    mysqli_set_charset($connection, "utf8");
    $sql_descuento_costo_borrar="DELETE FROM tmp_costo_descuento_contratp WHERE session_id=? ";
    $resultado_descuento_costo_borrar=mysqli_prepare($connection, $sql_descuento_costo_borrar);
    mysqli_stmt_bind_param($resultado_descuento_costo_borrar, "s", $session_id);
    mysqli_stmt_execute($resultado_descuento_costo_borrar);
     
              
     /////////////////////////////////BORRAR DESCUENTO Y COSTO EN TMP CIERRO//////////////////////////////////////////////
     

     /////////////////////////////////BORRAR FAMILIARES INDIRECTO EN TMP///////////////////////////////////////////////
  
    mysqli_set_charset($connection, "utf8");
    $sql_familiaresin_borrar="DELETE FROM tmp_familiaredin_contrato WHERE session_id=? ";
    $resultado_familiaresin_borrar=mysqli_prepare($connection, $sql_familiaresin_borrar);
    mysqli_stmt_bind_param($resultado_familiaresin_borrar, "s", $session_id);
    mysqli_stmt_execute($resultado_familiaresin_borrar);
     
              
     ///////////////////////////BORRAR FAMILIARES INDIRECTO EN TMP CIERRO///////////////////////////////////////
     
     /////////////////////////////////BORRAR FAMILIARES DIRECTOS EN TMP///////////////////////////////////////////////
  
    mysqli_set_charset($connection, "utf8");
    $sql_familiaresdi_borrar="DELETE FROM tmp_familiaresdi_contrato WHERE session_id=? ";
    $resultado_familiaresdi_borrar=mysqli_prepare($connection, $sql_familiaresdi_borrar);
    mysqli_stmt_bind_param($resultado_familiaresdi_borrar, "s", $session_id);
    mysqli_stmt_execute($resultado_familiaresdi_borrar);
     
              
     ///////////////////////////BORRAR FAMILIARES DIRECTOS EN TMP CIERRO///////////////////////////////////////
     
     /////////////////////////////////BORRAR PLANES EN TMP///////////////////////////////////////////////
  
    mysqli_set_charset($connection, "utf8");
    $sql_planes_borrar="DELETE FROM tmp_planes_contrato WHERE session_id=? ";
    $resultado_planes_borrar=mysqli_prepare($connection, $sql_planes_borrar);
    mysqli_stmt_bind_param($resultado_planes_borrar, "s", $session_id);
    mysqli_stmt_execute($resultado_planes_borrar);
     
              
     ///////////////////////////BORRAR PLANES EN TMP CIERRO///////////////////////////////////////
     
     /////////////////////////////////BORRAR SERVICIOS EN TMP///////////////////////////////////////////////
  
    mysqli_set_charset($connection, "utf8");
    $sql_servicios_borrar="DELETE FROM tmp_servicios_contratos WHERE session_id_contrato=? ";
    $resultado_servicios_borrar=mysqli_prepare($connection, $sql_servicios_borrar);
    mysqli_stmt_bind_param($resultado_servicios_borrar, "s", $session_id);
    mysqli_stmt_execute($resultado_servicios_borrar);
     
              
     ///////////////////////////BORRAR SERVICIOS EN TMP CIERRO///////////////////////////////////////
                
























mysqli_close($connection)
?>