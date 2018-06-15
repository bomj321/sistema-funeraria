<?php 
session_start();
require_once('../connect.php');
mysqli_set_charset($connection,'utf8');  
 //--------------------if--------------------

       

 
$tabla="";
$sql = "SELECT * FROM stock ORDER BY id desc ";


///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['stock']))
{
	$buscar=$connection->real_escape_string($_POST['stock']);
	$sql="SELECT * FROM stock WHERE objeto LIKE '%".$buscar."%' ORDER BY  id desc ";
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
              <th>Item</th>
              <th>Cantidad</th>
              <th>Precio</th>
              <th>Comentario</th>
              <th>Imagen</th>';
 if($_SESSION['perfil']=='admin'){ //IF 
 $tabla.='
 
              <th colspan="2" >Acciones</th>';
  } //CIERRE DE IF               
  $tabla.='
             
          </tr>
        </thead>

        <tbody>';
        	
        		while($fila =mysqli_fetch_array($resultado)){
            $tabla.='
            <tr>
            <td>'.$fila['id'].'</td>
            <td>'.$fila['objeto'].'</td>
            <td>'.$fila['cantidad'].'</td>
            <td>'.$fila['precio'].'$</td>
            <td>'.$fila['comentario'].'</td>';
            
            
           
             $tabla.='
            <td><img style="width: 3rem; height: 3rem;" src="img/'.$fila["image"].'"></td>
            ';
                 
                 
           if($_SESSION['perfil']=='admin'){ //IF   
            $tabla.='
            <td><a title="Editar Producto" href="editar_stock.php?id='.$fila["id"].'"><i class="material-icons">border_color</i></a></td>';
             } //CIERRE DE IF
             $tabla.=' 
               </tr>  ';
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
