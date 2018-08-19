<?php
if (isset($_GET['term'])){
session_start();
require_once('../connect.php');
$variables = $_GET['term'];	
$limpia_variable= mysqli_escape_string($connection,$variables);	
$return_arr = array();
/* If connection to database, run sql statement. */
if ($connection)
{
$busqueda= "SELECT * FROM clientes WHERE dni LIKE '%".$limpia_variable."%'";
$resultado_busqueda= mysqli_query($connection, $busqueda);
			  
	
	/* Retrieve and store in array the results of the query.*/
	while ($row = mysqli_fetch_array($resultado_busqueda)) {
		$row_array['value'] = $row['dni'];
		$row_array['id_cliente_contrato'] = $row['id_cliente'];
		$row_array['nombre_contrato'] = $row['nombre'];		
		$row_array['civil_contrato']=$row['estado'];
		$row_array['edad_contrato']=date('Y-m-d',strtotime($row["nacimiento"]));
		$row_array['dni_contrato']=$row['dni'];
		$row_array['sexo_contrato']=$row['sexo'];
		$row_array['numero_contrato']=$row['numero'];
		$row_array['email_contrato']=$row['email'];
		$row_array['direccion_contrato']=$row['direccion'];
		$row_array['familiar_contrato']=$row['nombre_familiar'];
		$row_array['telefono_familiar_contrato']=$row['numero_familiar'];
		array_push($return_arr,$row_array);
    }
	
}

/* Free connection resources. */
mysqli_close($connection);

/* Toss back results as json encoded array. */
echo json_encode($return_arr);

}
?>