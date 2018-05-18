<?php 
require_once('../connect.php');

 //--------------------if--------------------

       
////////////////////ELIMINAR PLAN
if (isset($_GET['id_eliminar']))//codigo elimina un elemento del array
{
		$id_plan=intval($_GET['id_eliminar']);
		mysqli_set_charset($connection, "utf8");
		$sql="DELETE FROM planes WHERE id_planes=? ";
		$resultado=mysqli_prepare($connection, $sql);
		$ok=mysqli_stmt_bind_param($resultado, "i", $id_plan);
		$ok=mysqli_stmt_execute($resultado);	
}
////////////////////ELIMINAR PLAN CIERRO 
 
$tabla="";
$sql = "SELECT * FROM planes ORDER BY  id_planes desc ";


///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['plan']))
{
	$buscar=$connection->real_escape_string($_POST['plan']);
	$sql="SELECT * FROM planes WHERE nombre LIKE '%".$buscar."%' OR descripcion  LIKE '%".$buscar."%' ORDER BY  id_planes desc  ";
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
              <th>Descuento</th>
              <th>Descripcion</th>
              <th>Precio</th>                            
              <th>Imagen</th>
              <th>Servicios a ofrecer</th>
              <th>Productos a ofrecer</th>              
              <th>Acciones</th>
          </tr>
        </thead>

        <tbody>';
        	
        		while($fila =mysqli_fetch_array($resultado)){
            
            $planid =$fila['id_planes'];
       $tabla.=' 	
          <tr>
            <td>'.$fila['nombre'].'</td>
            <td>'.$fila['descuento_plan'].'</td>
            <td>'.$fila['descripcion'].'</td>
            <td>'.$fila['precio_plan'].'</td>
            <td><img style="width: 3rem; height: 3rem;" src="img/'.$fila["image"].'"></td>
            <td>';
                
                    $sql_servicios = "SELECT * FROM Servicios INNER JOIN planes_has_services ON planes_has_services.servicio_id_servicios = Servicios.id_servicios && planes_has_services.planes_id_planes= $planid ";
                    $resultado_servicios= mysqli_query($connection, $sql_servicios);
                    $fila_servicio_consulta= mysqli_num_rows($resultado_servicios);


                    
                    if ($fila_servicio_consulta==0) {
                            $tabla.='<p class="text-center">N/A</p>';
                       }else{   

                    while ($fila_servicio =mysqli_fetch_array($resultado_servicios)){              
                 $tabla.='
                  <li style="font-size: 0.8rem; text-align:center;">'.$fila_servicio['descripcion_servicio'].'('.$fila_servicio['cantidad_servicios_planes'].')</li>';
                
                   }
                }
                
           $tabla.='        
            </td>

            <td>';
                
                    $sql_products = "SELECT * FROM stock INNER JOIN planes_has_products ON planes_has_products.products_id_products = stock.id && planes_has_products.planes_id_planes_products= $planid ";
                    $resultado_products= mysqli_query($connection, $sql_products);
                    $fila_producto_consulta= mysqli_num_rows($resultado_products);


                   
                    if ($fila_producto_consulta==0) {
                            $tabla.='<p class="text-center">N/A</p>';
                       }else{

                    while ($fila_producto =mysqli_fetch_array($resultado_products)){              
                 $tabla.='
                  <li style="font-size: 0.8rem; text-align:center;">'.$fila_producto['objeto'].'('.$fila_producto['cantidad_comprada'].')</li>';
                
                   }
                }
           $tabla.='        
            </td>            
            <td>
            <a onclick="eliminar_plan('.$fila["id_planes"].')"><i class="material-icons desactivar">delete</i></a>';




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
