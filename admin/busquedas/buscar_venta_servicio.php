<?php 
require_once('../connect.php');

 //--------------------if--------------------
////////////////////PAGAR SERVICIOS
if (isset($_GET['id_pagar']))//codigo elimina un elemento del array
{   
    $id_usuario= $_GET['id_pagar'];
    $pagado_usuario=1;
    mysqli_set_charset($connection, "utf8");
    $sql="UPDATE user_servicios_individuales SET pagado= ? WHERE idUser= ?";
    $resultado=mysqli_prepare($connection, $sql);
    $ok=mysqli_stmt_bind_param($resultado, "ii", $pagado_usuario, $id_usuario);
    $ok=mysqli_stmt_execute($resultado); 
}
////////////////////PAGAR SERVICIOS CIERRO 

////////////////////NOPAGAR SERVICIOS
if (isset($_GET['id_nopagar']))//codigo elimina un elemento del array
{
    $id_usuario= $_GET['id_nopagar'];
    $pagado_usuario=0;
    mysqli_set_charset($connection, "utf8");
    $sql="UPDATE user_servicios_individuales SET pagado= ? WHERE idUser= ?";
    $resultado=mysqli_prepare($connection, $sql);
    $ok=mysqli_stmt_bind_param($resultado, "ii", $pagado_usuario, $id_usuario);
    $ok=mysqli_stmt_execute($resultado);  
}
////////////////////NOPAGAR SERVICIOS CIERRO
       

 
$tabla="";
$sql = "SELECT * FROM user_servicios_individuales ORDER BY  idUser desc ";


///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['ventas']))
{
  $buscar=$connection->real_escape_string($_POST['ventas']);
  $sql="SELECT * FROM user_servicios_individuales WHERE nombre LIKE '%".$buscar."%' OR dni LIKE '%".$buscar."%' ORDER BY  idUser desc  ";
} 
$resultado= mysqli_query($connection, $sql);
$row_cnt = mysqli_num_rows($resultado);

if ($row_cnt > 0)
{
$tabla.= '
<table class="responsive-table" >
        <thead>
          <tr>
              <th>Nombre</th>
              <th>Telefono</th>
              <th>Comentario</th>
              <th>#N de Identificacion</th>                                          
              <th>Servicios</th>
              <th>Productos</th>  
              <th>Total</th>
              <th>Direccion</th>
              <th id="acciones">Acciones a Realizar</th>
          </tr>
        </thead>

        <tbody>';
          
            while($fila =mysqli_fetch_array($resultado))                      {
            
            $planid =$fila['idUser'];
       $tabla.='  
          <tr>
            <td>'.$fila['nombre'].'</td>
            <td>'.$fila['numero_telefonico'].'</td>
            <td>'.$fila['comentario'].'</td>
            <td>'.$fila['dni'].'</td>
            <td>';
                
                    $sql_servicios = "SELECT * FROM servicios INNER JOIN user_has_services ON user_has_services.servicio_id_servicios = servicios.id_servicios && user_has_services.servicios_id_user= $planid ";
                    $resultado_servicios= mysqli_query($connection, $sql_servicios);
                    $fila_servicio_consulta= mysqli_num_rows($resultado_servicios);


                    $sql_total_servicios ="SELECT SUM(precio_total) AS value_sum FROM user_has_services INNER JOIN servicios ON user_has_services.servicio_id_servicios = Servicios.id_servicios && user_has_services.servicios_id_user= $planid";
                    $resultado_total_servicios= mysqli_query($connection, $sql_total_servicios);
                    $row_servicio = mysqli_fetch_assoc($resultado_total_servicios);
                    $sum_servicio = $row_servicio['value_sum'];
                    if ($fila_servicio_consulta==0) {
                            $tabla.='<p class="text-center">N/A</p>';
                       }else{   

                    while ($fila_servicio =mysqli_fetch_array($resultado_servicios)){              
                 $tabla.='
                  <li style="font-size: 0.8rem; text-align:center;">'.$fila_servicio['descripcion_servicio'].'('.$fila_servicio['cantidad_servicio'].')</li>';
                
                   }
                }
                
           $tabla.='        
            </td>

            <td>';
                
                    $sql_productos = "SELECT * FROM stock INNER JOIN user_has_products ON user_has_products.stock_id_stock = stock.id && user_has_products.products_id_user= $planid ";
                    $resultado_productos= mysqli_query($connection, $sql_productos);
                    $fila_producto_consulta= mysqli_num_rows($resultado_productos);


                    $sql_total_productos ="SELECT SUM(precio_total) AS value_sum FROM user_has_products INNER JOIN stock ON user_has_products.stock_id_stock = stock.id && user_has_products.products_id_user= $planid";
                    $resultado_total_productos= mysqli_query($connection, $sql_total_productos);
                    $row_producto = mysqli_fetch_assoc($resultado_total_productos);
                    $sum_producto = $row_producto['value_sum'];
                    $sum = $sum_servicio + $sum_producto;   
                    if ($fila_producto_consulta==0) {
                            $tabla.='<p class="text-center">N/A</p>';
                       }else{

                    while ( $fila_producto =mysqli_fetch_array($resultado_productos)){              
                 $tabla.='
                  <li style="font-size: 0.8rem; text-align:center;">'.$fila_producto['objeto'].'('.$fila_producto['cantidad_comprada'].')</li>';
                
                   }
                }
           $tabla.='        
            </td>

    
            <td>'.$sum.'$</td>
            <td>' . $fila['direccion'] . '</td>

            <td><a title="Exportar a PDF" href="./acciones/fpdf_servicios.php?id='.$fila['idUser'].'"><i class="material-icons pdf">picture_as_pdf</i></a>            

            <a title="Imprimir en Ticketera" href="acciones/imprimir_servicios.php?id='.$fila['idUser'].'"><i class="material-icons desactivar">print</i></a>';
if ($fila['pagado'] ==1) {
  


      $tabla.=' 
            <a title="Marcar como no pago" onclick="nopagar_servicio('.$fila["idUser"].')"><i class="material-icons pagar">local_atm</i></a> ';

}else{

$tabla.=' 
            <a title="Marcar como pagado" onclick="pagar_servicio('.$fila["idUser"].')"><i class="material-icons nopagar">local_atm</i></a> ';


}



       $tabla.= '
            </td> 
               

          </tr>';
            
                  }
            
          
      $tabla.='    
        </tbody>
      </table>';
    
}else
  {
    $tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
  }
  echo $tabla;


  mysqli_close($connection);    
 ?>

 <!--MEDIA QUERYS-->
<style>
  @media only screen and (max-width: 990px) {
    th{
        padding-top: 24px;
    }
    td{
      padding-top: 24px;
    }
    #acciones{
      padding-top: 55px;
    }


}
</style>
 <!--MEDIA QUERYS-->
