<?php 
include('connect.php');

 //--------------------if--------------------

       

 
$tabla="";
$sql = "SELECT * FROM User_servicios_individuales ORDER BY  idUser desc ";


///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['ventas']))
{
	$buscar=$connection->real_escape_string($_POST['ventas']);
	$sql="SELECT * FROM User_servicios_individuales WHERE nombre LIKE '%".$buscar."%' OR dni LIKE '%".$buscar."%' ORDER BY  idUser desc  ";
} 
$resultado= mysqli_query($connection, $sql);
$row_cnt = mysqli_num_rows($resultado);

if ($row_cnt > 0)
{
$tabla.='
<table class="responsive-table" >
        <thead>
          <tr>
              <th>Nombre</th>
              <th>Telefono</th>
              <th>Comentario</th>
              <th>DNI</th>                                          
              <th>Servicios</th>
              <th>Productos</th>  
              <th>Total</th>
              <th>Acciones</th>
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
                
                    $sql_servicios = "SELECT * FROM Servicios INNER JOIN user_has_services ON user_has_services.servicio_id_servicios = Servicios.id_servicios && user_has_services.servicios_id_user= $planid ";
                    $resultado_servicios= mysqli_query($connection, $sql_servicios);
                    $fila_servicio_consulta= mysqli_num_rows($resultado_servicios);


                    $sql_total_servicios ="SELECT SUM(precio_total) AS value_sum FROM user_has_services INNER JOIN Servicios ON user_has_services.servicio_id_servicios = Servicios.id_servicios && user_has_services.servicios_id_user= $planid";
                    $resultado_total_servicios= mysqli_query($connection, $sql_total_servicios);
                    $row_servicio = mysqli_fetch_assoc($resultado_total_servicios);
                    $sum_servicio = $row_servicio['value_sum'];
                    if ($fila_servicio_consulta==0) {
                            $tabla.='<p class="text-center">N/A</p>';
                       }else{   

                    while ($fila_servicio =mysqli_fetch_array($resultado_servicios)){              
                 $tabla.='
                  <li style="font-size: 0.8rem; text-align:center;">'.$fila_servicio['descripcion_servicio'].'</li>';
                
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

            <td><a href="pdf_servicios.php?id='.$fila['idUser'].'"><i class="material-icons pdf">picture_as_pdf</i></a>

            <a href="word_servicios.php?id='.$fila['idUser'].'"><i class="material-icons word">insert_drive_file</i></a>

            <a href="imprimir_servicios.php?id='.$fila['idUser'].'"><i class="material-icons desactivar">assignment_returned</i></a>';
if ($fila['pagado'] ==1) {
	


			$tabla.='	
            <a href="actualizar_venta_servicio.php?id='.$fila['idUser'].'&pagado=0"><i class="material-icons pagar">local_atm</i></a> ';

}else{

$tabla.='	
            <a href="actualizar_venta_servicio.php?id='.$fila['idUser'].'&pagado=1"><i class="material-icons nopagar">local_atm</i></a> ';


}



       $tabla.='
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
