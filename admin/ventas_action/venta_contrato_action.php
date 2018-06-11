<?php 
session_start();
$session_id= session_id();
require_once('../connect.php');
                $dni= $_POST['dni_contrato'];
                $estado_civil= $_POST['civil_contrato'];              
                $edad= $_POST['edad_contrato'].' 00:00:00.000000';
				$usu= $_POST['nombre_contrato'];
                $numero= $_POST['numero_contrato'];                   
                $email= $_POST['email_contrato'];
                $direccion_contrato= $_POST['direccion_contrato'];
				$familiar_contrato= $_POST['familiar_contrato'];
				$telefono_familiar_contrato= $_POST['telefono_familiar_contrato'];
				$email= $_POST['email_contrato'];
                $activo = 0; 
                $revisado = 0; 
                $idUser=$_POST['id_cliente_contrato'];
//////////////////////////////////SELECCIONAR COSTO, DESCUENTO Y CUOTAS///////////////////////////////////
          $sql_costo_descuento="SELECT * FROM tmp_costo_descuento_contratp WHERE session_id='".$session_id."'";
          $resultado_costo_descuento= mysqli_query($connection, $sql_costo_descuento);
          $row_costo_descuento=mysqli_fetch_array($resultado_costo_descuento);
          $descuento_contrato=$row_costo_descuento['descuento_contrato'];
          $cuotas_contrato=$row_costo_descuento['cuotas'];

          if(empty($descuento_contrato)){
           $descuento_contrato=0;
          }

    if(empty($cuotas_contrato)){
               $cuotas_contrato=0;
              }
//////////////////////////////////SELECCIONAR COSTO, DESCUENTO Y CUOTAS CIERRO////////////////////////////
                
                //////////////////////INSERT USUARIO
            mysqli_set_charset($connection, "utf8");
            $sql_user="INSERT INTO User ( 	idUser,activo,revisado,nombre,estado,nacimiento,dni,numero,email,direccion,nombre_familiar,numero_familiar,cuotas,descuento) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $resultado_user=mysqli_prepare($connection, $sql_user);
           	mysqli_stmt_bind_param($resultado_user, "iiisssssssssii",$idUser,$activo,$revisado,$usu,$estado_civil,$edad,$dni,$numero,$email,$direccion_contrato,$familiar_contrato,$telefono_familiar_contrato,$cuotas_contrato,$descuento_contrato );
            $ok=mysqli_stmt_execute($resultado_user);
            $idgenerado =$idUser;
            $idautogenerado = mysqli_insert_id($connection);
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
          $sql_servicio_contrato="SELECT * FROM tmp_servicios_contratos ";
          $resultado_servicio_contrato= mysqli_query($connection, $sql_servicio_contrato);
          $sumador_total_servicio=0;
          while($row_servicio_contrato=mysqli_fetch_array($resultado_servicio_contrato)){
          $id_servicio=$row_servicio_contrato['id_servicio_contrato'];
          $cantidad_servicio=$row_servicio_contrato['cantidad_tmp_contrato'];
          $precio_servicio=$row_servicio_contrato['precio_tmp_contrato'];
          $total_servicio=$precio_servicio*$cantidad_servicio;
          $sumador_total_servicio+=$total_servicio;
//////////////////////////////////SELECCIONAR ID SERVICIO CIERRO///////////////////////////////////// 
                $entregado = 0;
                mysqli_set_charset($connection, "utf8");
                $sql2="INSERT INTO User_has_Servicios_Adicionales (id_user_servicio,User_idUser,Servicios_Adicionales_id,  cantidad_servicios,costo,entregado) VALUES (?,?,?,?,?,?)";
                $resultado2=mysqli_prepare($connection, $sql2);
                mysqli_stmt_bind_param($resultado2, "iiiiii",$idautogenerado,$idgenerado, $id_servicio,$cantidad_servicio,$precio_servicio,$entregado);
                $ok2=mysqli_stmt_execute($resultado2);
                mysqli_stmt_close($resultado2);
           
           if (!$ok2) {
               echo "
             <script>

              alert('Error en la insercion de datos de Usuario');
             </script>

               ";
              }
           
              
}              

/////////////////////////////////INSERT PARA LOS SERVICIOS CIERRO//////////////////////////////////////////////

////////////////////////////////////INSERT PARA LOS PLANES//////////////////////////////////////////////////     
          
            
 //////////////////////////////////SELECCIONAR ID PLANES/////////////////////////////////////
          $sql_planes_contrato="SELECT * FROM tmp_planes_contrato WHERE session_id='".$session_id."'";
          $resultado_planes_contrato= mysqli_query($connection, $sql_planes_contrato);
          $sumador_total_planes=0;
          while($row_planes_contrato=mysqli_fetch_array($resultado_planes_contrato)){
          $id_planes_contrato=$row_planes_contrato['id_plan_contrato'];
          $costo_planes_contrato=$row_planes_contrato['precio_plan_contrato'];
          $sumador_total_planes+=$costo_planes_contrato;
//////////////////////////////////SELECCIONAR ID PLANES CIERRO/////////////////////////////////////    

                mysqli_set_charset($connection, "utf8");
                $sql2="INSERT INTO User_has_planes (id_user_plan,User_idUser, planes_id_planes,precio_total) VALUES (?,?,?,?)";
                $resultado2=mysqli_prepare($connection, $sql2);
                mysqli_stmt_bind_param($resultado2, "iiii",$idautogenerado,$idgenerado, $id_planes_contrato,$costo_planes_contrato);
                $ok2=mysqli_stmt_execute($resultado2);
                mysqli_stmt_close($resultado2);
///////////////////////////////////INSERTAR SERVICIOS DEL PLAN/////////////////////////////////////////////////7
                $sql_servicios = "SELECT * FROM Servicios INNER JOIN planes_has_services ON planes_has_services.servicio_id_servicios = Servicios.id_servicios && planes_has_services.planes_id_planes=$id_planes_contrato";
                  $resultado_servicios= mysqli_query($connection, $sql_servicios);
                  while($fila_servicio =mysqli_fetch_array($resultado_servicios)){              
                    $id_servicios = $fila_servicio['id_servicios'];
                    $cantidad_servicios = $fila_servicio['cantidad_servicios_planes'];
                    $entregado = 0;

                    $sql_planes_servicios="INSERT INTO planes_has_services_delivered (id_user_delivered,idUser_services, planes_id_planes,servicio_id_servicios,entregado,cantidad_servicio) VALUES (?,?,?,?,?,?)";
                    $resultado_planes_servicios=mysqli_prepare($connection, $sql_planes_servicios);
                    mysqli_stmt_bind_param($resultado_planes_servicios, "iiiiii",$idautogenerado,$idgenerado, $id_planes_contrato,$id_servicios,$entregado,$cantidad_servicios);
                    $ok_planes_servicios=mysqli_stmt_execute($resultado_planes_servicios);
                    mysqli_stmt_close($resultado_planes_servicios);

                   }
                   ///////////////////////////////////INSERTAR SERVICIOS DEL PLAN CIERRO/////////////////////////
          
          //////////////////////////////////INSERTAR PRODUCTOS DEL PLAN////////////////////////////////////////
                $sql_products = "SELECT * FROM stock INNER JOIN planes_has_products ON planes_has_products.products_id_products = stock.id && planes_has_products.planes_id_planes_products=$id_planes_contrato ";
                    $resultado_products= mysqli_query($connection, $sql_products);

                    while ($fila_products =mysqli_fetch_array($resultado_products)){              
                    $id_product = $fila_products['id'];
                    $cantidad_productos = $fila_products['cantidad_comprada'];
                    $entregado = 0;

                    $sql_planes_product="INSERT INTO planes_has_products_delivered (id_user_delivered,idUser_products, planes_id_planes,products_id_products_products,entregado_product,cantidad_producto) VALUES (?,?,?,?,?,?)";
                    $resultado_planes_product=mysqli_prepare($connection, $sql_planes_product);
                    mysqli_stmt_bind_param($resultado_planes_product, "iiiiii",$idautogenerado,$idgenerado, $id_planes_contrato,$id_product,$entregado,$cantidad_productos);
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


            $sql_familiardi="INSERT INTO User_family (id_User_family,User_idUser, Parentezco,nombre,edad) VALUES (?,?,?,?,?)";
            $resultado_familiardi=mysqli_prepare($connection, $sql_familiardi);
            mysqli_stmt_bind_param($resultado_familiardi, "iissi",$idautogenerado,$idgenerado, $parentezco_familiares_directo,$nombre_familiares_directo,$edad_familiares_directo);
            $ok_familiardi=mysqli_stmt_execute($resultado_familiardi);
            mysqli_stmt_close($resultado_familiardi);




        
}
/////////////////////////////////////INSERT PARA LOS FAMILIARES DIRECTOS CIERRO///////////////////////////////



//////////////////////////////////SELECCIONAR FAMILIARES INDIRECTOS/////////////////////////////////////////////
          $sql_familiares_indirecto="SELECT * FROM tmp_familiaredin_contrato WHERE session_id='".$session_id."'";
          $resultado_familiares_indirecto= mysqli_query($connection, $sql_familiares_indirecto);
          $sumador_familiares_indirecto=0;
          while($row_familiares_indirecto=mysqli_fetch_array($resultado_familiares_indirecto)){
          $parentezco_familiares_indirecto=$row_familiares_indirecto['parentezcoin'];
          $nombre_familiares_indirecto=$row_familiares_indirecto['nombrein'];
          $edad_familiares_indirecto=$row_familiares_indirecto['edadin'];
          $costo_familiares_indirecto=$row_familiares_indirecto['costo_adicional'];
          $sumador_familiares_indirecto+=$costo_familiares_indirecto;
//////////////////////////////////SELECCIONAR  FAMILIARES INDIRECTOS CIERRO/////////////////////////////////////


/////////////////////////////////////INSERT PARA LOS FAMILIARES INDIRECTOS/////////////////////////////

            $sql_familiarin="INSERT INTO User_family_independent (id_User_family_indepen,User_idUser,Parentezco,nombre,edad,costo_adicional) VALUES (?,?,?,?,?,?)";
                    $resultado_familiarin=mysqli_prepare($connection, $sql_familiarin);   mysqli_stmt_bind_param($resultado_familiarin,"iissii",$idautogenerado,$idgenerado,$parentezco_familiares_indirecto,$nombre_familiares_indirecto,$edad_familiares_indirecto,$costo_familiares_indirecto);
                    $ok_familiarin=mysqli_stmt_execute($resultado_familiarin);
                    mysqli_stmt_close($resultado_familiarin);

}
/////////////////////////////////////INSERT PARA LOS FAMILIARES INDIRECTOS CIERRO//////////////////////////////////
///
///
 $sql_total_costo ="SELECT SUM(costo_adicional) AS value_sum FROM User_family_independent WHERE User_idUser= $idgenerado AND id_User_family_indepen=$idautogenerado" ;
                    $resultado_total_costo= mysqli_query($connection, $sql_total_costo);
                    $row_costo = mysqli_fetch_assoc($resultado_total_costo);
                    $sum_costo = $row_costo['value_sum'] ;
                    $sum_costo_total = ($sumador_familiares_indirecto+$sumador_total_planes+$sumador_total_servicio) - (($sumador_familiares_indirecto+$sumador_total_planes+$sumador_total_servicio)*($descuento_contrato/100));          if(empty($cuotas_contrato)){
                     $cuotas_contrato=1;
                    }          
                    $costo_cuota_redondear = ceil($sum_costo_total/$cuotas_contrato);
                    $costo_cuota= $costo_cuota_redondear;

                    //SUMO A LA FECHA 30 DIAS
      
 
////////////////////////////////////////////////INSERT PAGO////////////////////////////////////////////////////////
      $numero_cuota = 0;
      $hoy = date('d-m-Y');
      for($i=1;$i<=$cuotas_contrato; $i++){
        $pagado = 0;
        
       $numero_cuota++;
       $mas_1D = date("d-m-Y",strtotime($hoy."+ 30 days"));  
            $sql_pagos="INSERT INTO Pagos (id_pagos_user,User_id, pago,fecha,pagado,numero_cuota) VALUES (?,?,?,?,?,?)";
                    $resultado_pagos=mysqli_prepare($connection, $sql_pagos);
                    mysqli_stmt_bind_param($resultado_pagos, "iiisii",$idautogenerado,$idgenerado, $costo_cuota,$mas_1D,$pagado,$numero_cuota);
                    $ok_pagos=mysqli_stmt_execute($resultado_pagos);
                    mysqli_stmt_close($resultado_pagos);

              $hoy = $mas_1D;



                if (!$ok_pagos) {
                   echo "ERROR" .'</br>';
                  
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
