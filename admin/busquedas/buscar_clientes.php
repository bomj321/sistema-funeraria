<?php
session_start();
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

////////////////////ACTIVAR SERVICIOS
if (isset($_GET['id_activar']))//codigo elimina un elemento del array
{
		$id_activar=intval($_GET['id_activar']);
		$sql="UPDATE Clientes SET activo='1' WHERE id_cliente= ? ";
        $resultado=mysqli_prepare($connection, $sql);
        $ok=mysqli_stmt_bind_param($resultado, "i", $id_activar);
        $ok=mysqli_stmt_execute($resultado);	
}
////////////////////ACTIVAR SERVICIOS CIERRO 

////////////////////DESACTIVAR SERVICIOS
if (isset($_GET['id_desactivar']))//codigo elimina un elemento del array
{
		$id_desactivar=intval($_GET['id_desactivar']);
		$sql_activar="UPDATE Clientes SET activo='0' WHERE id_cliente= ? ";
        $resultado=mysqli_prepare($connection, $sql_activar);
        $ok=mysqli_stmt_bind_param($resultado, "i", $id_desactivar);
        $ok=mysqli_stmt_execute($resultado);	
}
////////////////////DESACTIVAR SERVICIOS CIERRO  


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
$generar_hoy= date('Y-m-d H:i:s');
$hoy = new DateTime($generar_hoy);        
  
if ($row_cnt > 0)
{
$tabla.='
<table class="responsive-table" style="font-size: 0.8rem;">
        <thead>
          <tr>
              <th>Nombre</th>
              <th>Estado Civil</th>
              <th>DNI</th>
              <th>Edad</th>
              <th>Genero</th>
              <th>Numero</th>                            
              <th>Email</th>
              <th>Direccion</th>
              <th>Telefono Auxiliar</th>              
              <th>Acciones</th>
          </tr>
        </thead>

        <tbody>';
        	
        		while($fila =mysqli_fetch_array($resultado)){
                 $nacimiento= $fila['nacimiento'];         
                 $nacimiento= new DateTime($nacimiento);          
                 $interval = date_diff($nacimiento, $hoy);
                 $estadocliente= $fila['activo'];
       $tabla.=' 	
          <tr>
            <td>'.$fila['nombre'].'</td>
            <td>'.$fila['estado'].'</td>
            <td>'.$fila['dni'].'</td>
            <td>'.$interval->format('%y años').'</td>
            <td>'.$fila['sexo'].'</td>
            <td>'.$fila['numero'].'</td>
            <td>'.$fila['email'].'</td>
            <td>'.$fila['direccion'].'</td>
            <td>'.$fila['numero_familiar'].'</td>
            <td>
             <a title="Editar Cliente" href="./editar_cliente.php?id_cliente='.$fila["id_cliente"].'"><i class="material-icons">border_color</i></a>'; 
                  
           if($_SESSION['perfil']=='admin'){ //IF  
              $tabla.='
            <a title="Eliminar Cliente" onclick="eliminar_cliente('.$fila["id_cliente"].')"><i class="material-icons desactivar">delete</i></a>';
          } //CIERRE DE IF        
                  
                  
            if($estadocliente =='1'){
            $tabla.='

            <a title="Desactivar Cliente" onclick="desactivar_cliente('.$fila["id_cliente"].')"><i class="material-icons desactivar">do_not_disturb_alt</i></a>';

            
        }else{

        $tabla.='
            <a title="Activar Cliente" onclick="activar_cliente('.$fila["id_cliente"].')"><i class="material-icons activar">check</i></a>';

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
