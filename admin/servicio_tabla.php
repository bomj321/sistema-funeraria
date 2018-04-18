<?php 
include('connect.php');
//--------------------if--------------------

        if(isset($_GET["pagina"])){

                if($_GET["pagina"]==1){

                    echo " 
                    <script>
                    window.location.href='stock.php';           
                    </script>            
                ";

                }else{

                  $pagina= $_GET["pagina"];

                }


        }else{
          $pagina=1;
        }


//Cuantos registro se muestran por paginas
        $tamaño_paginas=9;
        $empezar_desde=($pagina-1)* $tamaño_paginas;
        //-------------------Fin if ---------------------

$sql_limite = "SELECT * FROM Servicios";
$resultado_limite= mysqli_query($connection, $sql_limite); 
mysqli_fetch_array($resultado_limite);
 $num_filas = mysqli_num_rows($resultado_limite);
$total_paginas=ceil($num_filas/$tamaño_paginas);





$sql = "SELECT * FROM Servicios LIMIT $empezar_desde, $tamaño_paginas";
$resultado= mysqli_query($connection, $sql);  
 ?>


<table class="responsive-table" >
        <thead>
          <tr>
              <th>Id</th>
              <th>Descripcion</th>
              <th>Costo</th>              
              <th colspan="2" >Acciones</th>
          </tr>
        </thead>

        <tbody>
        	<?php 
        		while($fila =mysqli_fetch_array($resultado))
                      {
                      	$serviciosestado =$fila['servicio_activo'];
        	 ?>
          <tr>
            <td><?php echo $fila['id_servicios'];?></td>
            <td><?php echo $fila['descripcion_servicio'];?></td>
            <td><?php echo $fila['costo'];?>$</td>            
            <td><a href="editar_servicio.php?id_servicio=<?php echo $fila['id_servicios'];?>"><i class="material-icons">border_color</i></a>
					<?php 
                  if($serviciosestado =='1'){
                 ?>
                    <a href="desactivar_servicio_action.php?estado=0&id=<?php echo $fila['id_servicios'];?>"><i class="material-icons desactivar">do_not_disturb_alt</i></a>

                 <?php 
                  }else{
                  ?>
                    <a href="desactivar_servicio_action.php?estado=1&id=<?php echo $fila['id_servicios'];?>"><i class="material-icons activar">check</i></a>

                  <?php 
                    }
                   ?>
            </td>
        	</tr>
            <?php
                  }
             ?>
          
          
        </tbody>
      </table>
      <ul class="pagination">
          <?php for($i=1; $i<=$total_paginas; $i++){ ?>
          <li class="active"><a href="?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
          <?php
            }
          ?>   
    </ul>
<?php 
mysqli_close($connection);
 ?>