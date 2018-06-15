<?php 
session_start();
require_once('../connect.php');

 //--------------------if--------------------
////////////////////DESACTIVAR CONTRATO
if (isset($_GET['id_contrato_desactivar']))//codigo elimina un elemento del array
{
    $id_user=intval($_GET['id_contrato_desactivar']);
    $sql="UPDATE User SET activo='0' WHERE idUser_user= ? ";
        $resultado=mysqli_prepare($connection, $sql);
        $ok=mysqli_stmt_bind_param($resultado, "i", $id_user);
        $ok=mysqli_stmt_execute($resultado);  
}
////////////////////DESACTIVAR CONTRATO CIERRO 

////////////////////ACTIVAR CONTRATO
if (isset($_GET['id_contrato_activar']))//codigo elimina un elemento del array
{
    $id_user=intval($_GET['id_contrato_activar']);
    $sql_activar="UPDATE User SET activo='1' WHERE idUser_user= ? ";
        $resultado=mysqli_prepare($connection, $sql_activar);
        $ok=mysqli_stmt_bind_param($resultado, "i", $id_user);
        $ok=mysqli_stmt_execute($resultado);  
}
////////////////////ACTIVAR CONTRATO CIERRO

////////////////////REVISAR CONTRATO
if (isset($_GET['id_contrato_revisar']))//codigo elimina un elemento del array
{
    $id_user=intval($_GET['id_contrato_revisar']);
    $sql_revisar="UPDATE User SET revisado='1' WHERE idUser_user= ? ";
        $resultado=mysqli_prepare($connection, $sql_revisar);
        $ok=mysqli_stmt_bind_param($resultado, "i", $id_user);
        $ok=mysqli_stmt_execute($resultado);  
}
////////////////////REVISAR CONTRATO CIERRO  
       

 
$tabla="";

if($_SESSION['perfil']=='admin'){ //IF      

$sql = "SELECT * FROM User ORDER BY  idUser desc ";

}else{//CIERRE IF
   $sql = "SELECT * FROM User WHERE revisado='1' ORDER BY  idUser desc "; 
}
///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['ventas']))
{
    
 if($_SESSION['perfil']=='admin'){ //IF      

$buscar=$connection->real_escape_string($_POST['ventas']);
	$sql="SELECT * FROM User WHERE name LIKE '%".$buscar."%' OR dni LIKE '%".$buscar."%' OR idUser LIKE '%".$buscar."%' ORDER BY   	idUser_user desc  ";
    

}else{//CIERRE IF
   $buscar=$connection->real_escape_string($_POST['ventas']);
	$sql="SELECT * FROM User WHERE name LIKE '%".$buscar."%' OR dni LIKE '%".$buscar."%' OR idUser LIKE '%".$buscar."%' WHERE revisado='1' ORDER BY   	idUser_user desc  ";
    
}   
 
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
            $contratoid_unico=$fila['idUser_user'];
            $contratoid =$fila['idUser'];
       $tabla.=' 	
          <tr>
            <td>'.$fila['idUser_user'].'</td>
            <td>'.$fila['nombre'].'</td>            
            <td>'.$fila['dni'].'</td>';

           
                /////////////////////////////////////////DESCUENTO//////////////////////////////////
                    $sql_contrato = "SELECT descuento FROM User WHERE idUser=$contratoid AND idUser_user=$contratoid_unico ";
                    $resultado_contrato= mysqli_query($connection, $sql_contrato);
                    $row_contrato = mysqli_fetch_assoc($resultado_contrato);
                    $sum_total = 0;
                    $sum_descuento = $row_contrato['descuento'];

                /////////////////////////////////////////DESCUENTO//////////////////////////////////

                /////////////////////////////////////////COST PLANES//////////////////////////////////

                    $sql_total_planes ="SELECT SUM(precio_total) AS value_planes FROM User_has_planes WHERE User_idUser=$contratoid AND id_user_plan=$contratoid_unico ";
                    $resultado_total_planes= mysqli_query($connection, $sql_total_planes);
                    $row_contrato_planes = mysqli_fetch_assoc($resultado_total_planes);
                    $sum_total_planes = $row_contrato_planes['value_planes'];
                /////////////////////////////////////////COST PLANES CIERRO//////////////////////////////////
                
                
                /////////////////////////////////////////SERVICIOS ADICIONALES//////////////////////////////////

                    $sql_total_servicio ="SELECT * FROM User_has_Servicios_Adicionales WHERE User_idUser=$contratoid AND id_user_servicio=$contratoid_unico";
                    $resultado_total_servicio= mysqli_query($connection, $sql_total_servicio);
                    $sumador_total_servicios=0;
                    while ($row_contrato_servicio = mysqli_fetch_array($resultado_total_servicio)) {
                      $cantidad_servicio=$row_contrato_servicio['cantidad_servicios'];
                      $costo_servicio=$row_contrato_servicio['costo'];
                      $total_servicio=$costo_servicio*$cantidad_servicio;
                      $sumador_total_servicios+=$total_servicio; 
                    }
                    
                    
                /////////////////////////////////////////SERVICIOS ADICIONALES CIERRO//////////////////////////////////
                
                
                /////////////////////////////////////////FAMILIARES INDEPENDIENTE//////////////////////////////////

                    $sql_total_contrato ="SELECT SUM(costo_adicional) AS value_sum FROM User_family_independent WHERE User_idUser= $contratoid AND id_User_family_indepen=$contratoid_unico";
                    $resultado_total_contrato= mysqli_query($connection, $sql_total_contrato);
                    $row_contrato_familiares = mysqli_fetch_assoc($resultado_total_contrato);
                    $sum_total_familiares = $row_contrato_familiares['value_sum'];
                    $sum = ($sum_total + $sum_total_familiares+$sum_total_planes+$sumador_total_servicios)- (($sum_total_planes+$sum_total + $sum_total_familiares+$sumador_total_servicios) * ($sum_descuento/100));
                /////////////////////////////////////////FAMILIARES INDEPENDIENTE CIERRO//////////////////////////////////

                   
                
           $tabla.='

            <td>'.$sum.'$</td>

            <td>

            <a title="Ver Contrato" href="./ver_contrato.php?idunico='.$fila['idUser_user'].'&id='.$fila['idUser'].'"><i class="material-icons ">remove_red_eye</i></a>

            <a title="Exportar a PDF" href="./acciones/fpdf_contrato.php?idunico='.$fila['idUser_user'].'&id='.$fila['idUser'].'"><i class="material-icons pdf">picture_as_pdf</i></a>';
 if($_SESSION['perfil']=='admin'){ //IF            
        $tabla.='    
            <a title="Editar Contrato" href="./editar_contrato.php?idunico='.$fila['idUser_user'].'&id='.$fila['idUser'].'"><i class="material-icons word">border_color</i></a>';
} //CIERRE DE IF  
            
$tabla.='
            <a title="Imprimir Contrato" href="./acciones/imprimir_contrato.php?idunico='.$fila['idUser_user'].'&id='.$fila['idUser'].'"><i class="material-icons desactivar">print</i></a>';
                    
if ($fila['activo'] ==1) {
	

    
if($_SESSION['perfil']=='admin'){ //IF      
    
    

			$tabla.='
      <a title="Desactivar Contrato" onclick="desactivar_contrato('.$fila["idUser_user"].')"><i class="material-icons pagar">sentiment_very_satisfied</i></a> ';
    
    
} //CIERRE DE IF     
    
    
    
    
    
    
}else{
    

        if($_SESSION['perfil']=='admin'){ //IF   
$tabla.='	
            <a title="Activar Contrato" onclick="activar_contrato('.$fila["idUser_user"].')"><i class="material-icons negro">sentiment_very_dissatisfied</i></a> ';
            } //CIERRE DE IF  
    

}
                    
if ($fila['revisado'] ==0) {
	
            if($_SESSION['perfil']=='admin'){ //IF      


			$tabla.='
      <a title="Contrato no revisado" onclick="revisar_contrato('.$fila["idUser_user"].')"><i class="material-icons pdf">find_in_page</i></a> ';
    
            } //CIERRE DE IF     
   
    
}else{
            if($_SESSION['perfil']=='admin'){ //IF      

$tabla.='	
            <a title="Contrato Revisado"><i class="material-icons word">find_in_page</i></a> ';

            } //CIERRE DE IF     

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
