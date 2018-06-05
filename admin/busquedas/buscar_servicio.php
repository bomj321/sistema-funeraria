<?php 
require_once('../connect.php');

 //--------------------if--------------------

 ////////////////////DESACTIVAR SERVICIOS
if (isset($_GET['id_servicio_desactivar']))//codigo elimina un elemento del array
{
		$id_servicio=intval($_GET['id_servicio_desactivar']);
		$sql="UPDATE Servicios SET servicio_activo='0' WHERE id_servicios= ? ";
        $resultado=mysqli_prepare($connection, $sql);
        $ok=mysqli_stmt_bind_param($resultado, "i", $id_servicio);
        $ok=mysqli_stmt_execute($resultado);	
}
////////////////////DESACTIVAR SERVICIOS CIERRO 

////////////////////ACTIVAR SERVICIOS
if (isset($_GET['id_servicio_activar']))//codigo elimina un elemento del array
{
		$id_servicio=intval($_GET['id_servicio_activar']);
		$sql_activar="UPDATE Servicios SET servicio_activo='1' WHERE id_servicios= ? ";
        $resultado=mysqli_prepare($connection, $sql_activar);
        $ok=mysqli_stmt_bind_param($resultado, "i", $id_servicio);
        $ok=mysqli_stmt_execute($resultado);	
}
////////////////////ACTIVAR SERVICIOS CIERRO     

 
$tabla="";
$sql = "SELECT * FROM Servicios ORDER BY id_servicios desc ";


///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['servicio']))
{
	$buscar=$connection->real_escape_string($_POST['servicio']);
	$sql="SELECT * FROM Servicios WHERE descripcion_servicio LIKE '%".$buscar."%' ORDER BY  id_servicios desc ";
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
              <th>Descripcion</th>
              <th>Costo</th>              
              <th colspan="2" >Acciones</th>
          </tr>
        </thead>

        <tbody>';
        	
        		while($fila =mysqli_fetch_array($resultado)){
        		$serviciosestado =$fila['servicio_activo'];
            $tabla.='
            <tr>
            <td>'.$fila['id_servicios'].'</td>
            <td>'.$fila['descripcion_servicio'].'</td>
            <td>'.$fila['costo'].'</td>            
            <td><a title="Editar Servicio" href="editar_servicio.php?id_servicio='.$fila["id_servicios"].'"><i class="material-icons">border_color</i></a>';
            if($serviciosestado =='1'){
            $tabla.='

            <a title="Desactivar Servicio" onclick="desactivar_servicio('.$fila["id_servicios"].')"><i class="material-icons desactivar">do_not_disturb_alt</i></a>';

            
        }else{

        $tabla.='
            <a title="Activar Servicio" onclick="activar_servicio('.$fila["id_servicios"].')"><i class="material-icons activar">check</i></a>';

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
