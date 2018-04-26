<?php 
include('connect.php');

 //--------------------if--------------------

       

 
$tabla="";
$sql = "SELECT * FROM User_servicios_indiduales ORDER BY  idUser desc ";


///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['ventas']))
{
	$buscar=$connection->real_escape_string($_POST['ventas']);
	$sql="SELECT * FROM User_servicios_indiduales WHERE nombre LIKE '%".$buscar."%' OR dni LIKE '%".$buscar."%' ORDER BY  idUser desc  ";
} 
$resultado= mysqli_query($connection, $sql);
$row_cnt = mysqli_num_rows($resultado);

if ($row_cnt > 0)
{
$tabla.='
<table class="responsive-table" >
        <thead>
          <tr>
              <th>Id</th>
              <th>Nombre</th>
              <th>Comentario</th>
              <th>DNI</th>                                          
              <th>Servicios</th>  
              <th>Total</th>
              <th>Acciones</th>
          </tr>
        </thead>

        <tbody>';
        	
        		while($fila =mysqli_fetch_array($resultado))                      {
            
            $planid =$fila['idUser'];
       $tabla.=' 	
          <tr>
            <td>'.$fila['idUser'].'</td>
            <td>'.$fila['nombre'].'</td>
            <td>'.$fila['comentario'].'</td>
            <td>'.$fila['dni'].'</td>
            <td>';
                
                    $sql_servicios = "SELECT * FROM Servicios INNER JOIN user_has_services ON user_has_services.servicio_id_servicios = Servicios.id_servicios && user_has_services.servicios_id_user= $planid ";
                    $resultado_servicios= mysqli_query($connection, $sql_servicios);



                    $sql_total_servicios ="SELECT SUM(costo) AS value_sum FROM Servicios INNER JOIN user_has_services ON user_has_services.servicio_id_servicios = Servicios.id_servicios && user_has_services.servicios_id_user= $planid";
                    $resultado_total_servicios= mysqli_query($connection, $sql_total_servicios);
                    $row = mysqli_fetch_assoc($resultado_total_servicios);
                    $sum = $row['value_sum'];   

                    while ( $fila_servicio =mysqli_fetch_array($resultado_servicios)){              
                 $tabla.='
                  <li style="font-size: 0.8rem;">'.$fila_servicio['descripcion_servicio'].'</li>';
                
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
