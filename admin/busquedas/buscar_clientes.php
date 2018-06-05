<?php 
require_once('../connect.php');
////////////////////ELIMINAR CLIENTE
if (isset($_GET['id_eliminar']))//codigo elimina un elemento del array
{
		$id_cliente=intval($_GET['id_eliminar']);
		mysqli_set_charset($connection, "utf8");
		$sql="DELETE FROM Clientes WHERE id_cliente=? ";
		$resultado=mysqli_prepare($connection, $sql);
		mysqli_stmt_bind_param($resultado, "i", $id_cliente);
		$ok=mysqli_stmt_execute($resultado);	
}
////////////////////ELIMINAR CLIENTE CIERRO 
 
$tabla="";
$sql = "SELECT * FROM Clientes ORDER BY  id_cliente desc";


///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['cliente']))
{
	$buscar=$connection->real_escape_string($_POST['cliente']);
	$sql="SELECT * FROM Clientes WHERE nombre LIKE '%".$buscar."%' OR dni LIKE '%".$buscar."%' ORDER BY id_cliente desc ";
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
              <th>Estado Civil</th>
              <th>DNI</th>
              <th>Numero</th>                            
              <th>Email</th>
              <th>Direccion</th>
              <th>Telefono Auxiliar</th>              
              <th>Acciones</th>
          </tr>
        </thead>

        <tbody>';
        	
        		while($fila =mysqli_fetch_array($resultado)){
            
            $planid =$fila['id_cliente'];
       $tabla.=' 	
          <tr>
            <td>'.$fila['nombre'].'</td>
            <td>'.$fila['estado'].'</td>
            <td>'.$fila['dni'].'</td>
            <td>'.$fila['numero'].'</td>
            <td>'.$fila['email'].'</td>
            <td>'.$fila['direccion'].'</td>
            <td>'.$fila['numero_familiar'].'</td>
            <td><a title="Eliminar Cliente" onclick="eliminar_cliente('.$fila["id_cliente"].')"><i class="material-icons desactivar">delete</i></a></td>
           ';
                
           $tabla.='
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
