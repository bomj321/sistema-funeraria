<?php 
session_start();
include('connect.php');

				        $usu= $_POST['nombre_contrato'];
				        $estado_civil= $_POST['civil_contrato'];
                $edad= $_POST['edad_contrato'];
                $costo = $_POST['costo_contrato'];
                $numero= $_POST['numero_usuario'];
                $dni= $_POST['dni_contrato'];   
                $email= $_POST['email_contrato'];
                $cuota= $_POST['cuotas_contrato'];
                $activo = 0;               
                

                if (empty($_POST['descuento'])) {
                  $_POST['descuento'] = 0;
                  $descuento =  $_POST['descuento'];

                }else{

                  $descuento =  $_POST['descuento'];
                }

                
                //////////////////////INSERT USUARIO
            mysqli_set_charset($connection, "utf8");
            $sql_user="INSERT INTO User (activo,name,edad,estado_civil,cuotas,total,numero,email,dni,descuento) VALUES (?,?,?,?,?,?,?,?,?,?)";
            $resultado_user=mysqli_prepare($connection, $sql_user);
           	mysqli_stmt_bind_param($resultado_user, "isisiissii",$activo,$usu,$edad,$estado_civil,$cuota,$costo,$numero,$email,$dni,$descuento );
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
//$idgenerado =mysqli_insert_id($connection); 

//////////////////////INSERT USUARIO CIERRO

 if (!empty($_POST['servicios_venta_contrato'])) {
$servicios= $_POST['servicios_venta_contrato']; 
  /////////////////////////////////INSERT PARA LOS SERVICIOS     
  ///         
            
            foreach($servicios as $serviciostotal){
                $entregado = 0;
                mysqli_set_charset($connection, "utf8");
                $sql2="INSERT INTO User_has_Servicios_Adicionales (User_idUser, Servicios_Adicionales_id,entregado) VALUES (?,?,?)";
                $resultado2=mysqli_prepare($connection, $sql2);
                mysqli_stmt_bind_param($resultado2, "iii", $idgenerado, $serviciostotal, $entregado);
                $ok2=mysqli_stmt_execute($resultado2);
                mysqli_stmt_close($resultado2);
              
              }
}
/////////////////////////////////INSERT PARA LOS SERVICIOS CIERRO

////////////////////////////////////INSERT PARA LOS PLANES     
          
            
    if (!empty($_POST['planes_venta_contrato'])) {
      $planes= $_POST['planes_venta_contrato']; 
            
            foreach($planes as $planestotal){

                mysqli_set_charset($connection, "utf8");
                $sql2="INSERT INTO User_has_planes (User_idUser, planes_id_planes) VALUES (?,?)";
                $resultado2=mysqli_prepare($connection, $sql2);
                mysqli_stmt_bind_param($resultado2, "ii", $idgenerado, $planestotal);
                $ok2=mysqli_stmt_execute($resultado2);
                mysqli_stmt_close($resultado2);
///////////////////////////////////INSERTAR SERVICIOS DEL PLAN
                $sql_servicios = "SELECT * FROM Servicios INNER JOIN planes_has_services ON planes_has_services.servicio_id_servicios = Servicios.id_servicios && planes_has_services.planes_id_planes= $planestotal ";
                  $resultado_servicios= mysqli_query($connection, $sql_servicios);

                  while( $fila_servicio =mysqli_fetch_array($resultado_servicios)){              
                    $id_servicios = $fila_servicio['id_servicios'];
                    $entregado = 0;

                    $sql_planes_servicios="INSERT INTO planes_has_services_delivered (idUser_services, planes_id_planes,servicio_id_servicios,entregado) VALUES (?,?,?,?)";
                    $resultado_planes_servicios=mysqli_prepare($connection, $sql_planes_servicios);
                    mysqli_stmt_bind_param($resultado_planes_servicios, "iiii", $idgenerado, $planestotal,$id_servicios,$entregado);
                    $ok_planes_servicios=mysqli_stmt_execute($resultado_planes_servicios);
                    mysqli_stmt_close($resultado_planes_servicios);

                   }
                   ///////////////////////////////////INSERTAR SERVICIOS DEL PLAN CIERRO
          
          //////////////////////////////////INSERTAR PRODUCTOS DEL PLAN
                $sql_products = "SELECT * FROM stock INNER JOIN planes_has_products ON planes_has_products.products_id_products = stock.id && planes_has_products.planes_id_planes_products= $planestotal ";
                    $resultado_products= mysqli_query($connection, $sql_products);

                    while ( $fila_products =mysqli_fetch_array($resultado_products)){              
                    $id_product = $fila_products['id'];
                    $entregado = 0;

                    $sql_planes_product="INSERT INTO planes_has_products_delivered (idUser_products, planes_id_planes,products_id_products_products,entregado_product) VALUES (?,?,?,?)";
                    $resultado_planes_product=mysqli_prepare($connection, $sql_planes_product);
                    mysqli_stmt_bind_param($resultado_planes_product, "iiii", $idgenerado, $planestotal,$id_product,$entregado);
                    $ok_planes_product=mysqli_stmt_execute($resultado_planes_product);
                    mysqli_stmt_close($resultado_planes_product);

                   }
                   ///////////////////////////////////INSERTAR PRODUCTOS DEL PLAN CIERRO
                   

              
              }
}
/////////////////////////////////INSERT PARA LOS PLANES CIERRO



/////////////////////////////////////INSERT PARA LOS FAMILIARES DIRECTOS
if (!empty($_POST['familiar'])) {
$familiares= $_POST['familiar'];

        foreach($familiares as $familiaresdirectos){
            $sql_familiardi="INSERT INTO User_family (User_idUser, Parentezco,nombre,edad) VALUES (?,?,?,?)";
                    $resultado_familiardi=mysqli_prepare($connection, $sql_familiardi);
                    mysqli_stmt_bind_param($resultado_familiardi, "issi", $idgenerado, $familiaresdirectos['parentezco'],$familiaresdirectos['nombre'],$familiaresdirectos['edad']);
                    $ok_familiardi=mysqli_stmt_execute($resultado_familiardi);
                    mysqli_stmt_close($resultado_familiardi);




        }
}
/////////////////////////////////////INSERT PARA LOS FAMILIARES DIRECTOS CIERRO


/////////////////////////////////////INSERT PARA LOS FAMILIARES INDIRECTOS
if (!empty($_POST['familiarin'])) {
$familiaresin= $_POST['familiarin'];

        foreach($familiaresin as $familiaresindirectos){
            $sql_familiarin="INSERT INTO User_family_independent (User_idUser, Parentezco,nombre,edad,costo_adicional) VALUES (?,?,?,?,?)";
                    $resultado_familiarin=mysqli_prepare($connection, $sql_familiarin);
                    mysqli_stmt_bind_param($resultado_familiarin, "issii", $idgenerado, $familiaresindirectos['parentezco'],$familiaresindirectos['nombre'],$familiaresindirectos['edad'],$familiaresindirectos['costoadicional']);
                    $ok_familiarin=mysqli_stmt_execute($resultado_familiarin);
                    mysqli_stmt_close($resultado_familiarin);




        }

        
}
/////////////////////////////////////INSERT PARA LOS FAMILIARES INDIRECTOS CIERRO
 $sql_total_costo ="SELECT SUM(costo_adicional) AS value_sum FROM User_family_independent WHERE User_idUser= $idgenerado";
                    $resultado_total_costo= mysqli_query($connection, $sql_total_costo);
                    $row_costo = mysqli_fetch_assoc($resultado_total_costo);
                    $sum_costo = $row_costo['value_sum'] ;
                    $sum_costo_total = ($costo+$sum_costo) - ( ($descuento/100) * ($costo+$sum_costo));                    
                    $costo_cuota_sinredondear = $sum_costo_total/$cuota;
                    $costo_cuota= ceil($costo_cuota_sinredondear);

                    //SUMO A LA FECHA 30 DIAS
      
 
        
      $hoy = date('d-m-Y');
      for($i=1;$i<=$cuota; $i++){
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
                   echo $descuento .'</br>';
                   echo $idgenerado .'</br>';
                   echo $costo_cuota .'</br>';
                   echo $mas_1D .'</br>';
                   echo $cuota .'</br>';
                 } 
                }


//////////////////////////////////////////////INSERT PARA LOS PAGOS
           


           
         // for($i=1;$i<=$cuota; $i++){












       // }





/////////////////////////////////////////////INSERT PARA LOS PAGOS CIERRO





mysqli_close($connection)
?>