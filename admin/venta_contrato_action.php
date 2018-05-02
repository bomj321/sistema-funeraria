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
                $contrato = 'X-12912';
                

                //////////////////////INSERT USUARIO
            mysqli_set_charset($connection, "utf8");
            $sql_user="INSERT INTO User (activo,name,edad,estado_civil,cuotas,total,numero,email,numero_contrato,dni) VALUES (?,?,?,?,?,?,?,?,?,?)";
            $resultado_user=mysqli_prepare($connection, $sql_user);
           	mysqli_stmt_bind_param($resultado_user, "isisiisssi",$activo,$usu,$edad,$estado_civil,$cuota,$costo,$numero,$email,$contrato,$dni );
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

                mysqli_set_charset($connection, "utf8");
                $sql2="INSERT INTO User_has_Servicios_Adicionales (User_idUser, Servicios_Adicionales_id) VALUES (?,?)";
                $resultado2=mysqli_prepare($connection, $sql2);
                mysqli_stmt_bind_param($resultado2, "ii", $idgenerado, $serviciostotal);
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







mysqli_close($connection)
?>