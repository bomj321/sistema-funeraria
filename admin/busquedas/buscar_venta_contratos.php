<?php 
require_once('../connect.php');

 //--------------------if--------------------

       

 
$tabla="";
$sql = "SELECT * FROM User ORDER BY  idUser desc ";


///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['ventas']))
{
	$buscar=$connection->real_escape_string($_POST['ventas']);
	$sql="SELECT * FROM User WHERE name LIKE '%".$buscar."%' OR dni LIKE '%".$buscar."%' OR idUser LIKE '%".$buscar."%' ORDER BY  idUser desc  ";
} 
$resultado= mysqli_query($connection, $sql);
$row_cnt = mysqli_num_rows($resultado);

if ($row_cnt > 0)
{
$tabla.='
<table class="responsive-table" >
        <thead>
          <tr>
              <th>Numero de Contrato</th>
              <th>Nombre</th>              
              <th>DNI</th>
              <th>Total</th>
              <th>Acciones</th>
          </tr>
        </thead>

        <tbody>';
        	
        		while($fila =mysqli_fetch_array($resultado))                      {
            
            $contratoid =$fila['idUser'];
       $tabla.=' 	
          <tr>
            <td>'.$fila['idUser'].'</td>
            <td>'.$fila['name'].'</td>            
            <td>'.$fila['dni'].'</td>';

           
                /////////////////////////////////////////DESCUENTO//////////////////////////////////
                    $sql_contrato = "SELECT total,descuento FROM User WHERE idUser=$contratoid ";
                    $resultado_contrato= mysqli_query($connection, $sql_contrato);
                    $row_contrato = mysqli_fetch_assoc($resultado_contrato);
                    $sum_total = $row_contrato['total'];
                    $sum_descuento = $row_contrato['descuento'];

                /////////////////////////////////////////DESCUENTO//////////////////////////////////

                /////////////////////////////////////////COST PLANES//////////////////////////////////

                    $sql_total_planes ="SELECT SUM(precio_total) AS value_planes FROM User_has_planes WHERE User_idUser=$contratoid";
                    $resultado_total_planes= mysqli_query($connection, $sql_total_planes);
                    $row_contrato_planes = mysqli_fetch_assoc($resultado_total_planes);
                    $sum_total_planes = $row_contrato_planes['value_planes'];
                /////////////////////////////////////////COST PLANES CIERR//////////////////////////////////
                
                
                /////////////////////////////////////////COST PLANES CIERRO//////////////////////////////////

                    $sql_total_servicio ="SELECT * FROM User_has_Servicios_Adicionales WHERE User_idUser=$contratoid";
                    $resultado_total_servicio= mysqli_query($connection, $sql_total_servicio);
                    $sumador_total_servicios=0;
                    while ($row_contrato_servicio = mysqli_fetch_array($resultado_total_servicio)) {
                      $cantidad_servicio=$row_contrato_servicio['cantidad_servicios'];
                      $costo_servicio=$row_contrato_servicio['costo'];
                      $total_servicio=$costo_servicio*$cantidad_servicio;
                      $sumador_total_servicios+=$total_servicio; 
                    }
                    
                    
                /////////////////////////////////////////DESCUENTO//////////////////////////////////
                
                
                /////////////////////////////////////////DESCUENTO//////////////////////////////////

                    $sql_total_contrato ="SELECT SUM(costo_adicional) AS value_sum FROM User_family_independent WHERE User_idUser= $contratoid";
                    $resultado_total_contrato= mysqli_query($connection, $sql_total_contrato);
                    $row_contrato_familiares = mysqli_fetch_assoc($resultado_total_contrato);
                    $sum_total_familiares = $row_contrato_familiares['value_sum'];
                    $sum = ($sum_total + $sum_total_familiares+$sum_total_planes+$sumador_total_servicios)- (($sum_total_planes+$sum_total + $sum_total_familiares+$sumador_total_servicios) * ($sum_descuento/100));
                /////////////////////////////////////////DESCUENTO//////////////////////////////////

                   
                
           $tabla.='

            <td>'.$sum.'$</td>

            <td>

            <a href="./ver_contrato.php?id='.$fila['idUser'].'"><i class="material-icons ">remove_red_eye</i></a>

            <a href="./acciones/pdf_contrato.php?id='.$fila['idUser'].'"><i class="material-icons pdf">picture_as_pdf</i></a>

            <a href="./acciones/word_contrato.php?id='.$fila['idUser'].'"><i class="material-icons word">insert_drive_file</i></a>

            <a href="./acciones/imprimir_contrato.php?id='.$fila['idUser'].'"><i class="material-icons desactivar">assignment_returned</i></a>';
if ($fila['activo'] ==1) {
	


			$tabla.='	
            <a href="actualizar_venta_contrato.php?id='.$fila['idUser'].'&activo=0"><i class="material-icons ">sentiment_very_satisfied</i></a> ';

}else{

$tabla.='	
            <a href="actualizar_venta_contrato.php?id='.$fila['idUser'].'&activo=1"><i class="material-icons ">sentiment_very_dissatisfied</i></a> ';


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
