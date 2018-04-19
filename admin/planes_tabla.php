<?php 
include('connect.php');

 //--------------------if--------------------

        if(isset($_GET["pagina"])){

                if($_GET["pagina"]==1){

                    echo " 
                    <script>
                    window.location.href='nuevoplan.php';           
                    </script>            
                ";

                }else{

                  $pagina= $_GET["pagina"];

                }


        }else{
          $pagina=1;
        }


//Cuantos registro se muestran por paginas
        $tamaño_paginas=4;
        $empezar_desde=($pagina-1)* $tamaño_paginas;
        //-------------------Fin if ---------------------

$sql_limite = "SELECT * FROM planes";
$resultado_limite= mysqli_query($connection, $sql_limite); 
mysqli_fetch_array($resultado_limite);
 $num_filas = mysqli_num_rows($resultado_limite);
$total_paginas=ceil($num_filas/$tamaño_paginas);




//$sql_servicios = "SELECT * FROM ((Orders INNER JOIN Customers ON Orders.CustomerID = Customers.CustomerID)
//INNER JOIN Shippers ON Orders.ShipperID = Shippers.ShipperID) LIMIT $empezar_desde, $tamaño_paginas";

//$sql_servicios ="SELECT * FROM planes_has_services INNER JOIN servicios ON planes_has_services.planes_id_planes = planes.id_planes
//LIMIT $empezar_desde, $tamaño_paginas";


//$resultado_servicios= mysqli_query($connection, $sql_servicios); 

$sql = "SELECT * FROM planes ORDER BY  id_planes desc LIMIT $empezar_desde, $tamaño_paginas ";
$resultado= mysqli_query($connection, $sql); 

 ?>


<table class="responsive-table" >
        <thead>
          <tr>
              <th>Id</th>
              <th>Nombre</th>
              <th>Descripcion</th>
              <th>Precio</th>
              <th>Cuotas</th>              
              <th>Imagen</th>
              <th>Servicios a ofrecer</th>              
              <th >Acciones</th>
          </tr>
        </thead>

        <tbody>
        	<?php 
        		while($fila =mysqli_fetch_array($resultado))
                      {
            // Variable del Boton
            //$planestado =$fila['plan_activo'];
            $planid =$fila['id_planes'];
        	 ?>
          <tr>
            <td><?php echo $fila['id_planes'];?></td>
            <td><?php echo $fila['nombre'];?></td>
            <td><?php echo $fila['descripcion'];?></td>
            <td><?php echo $fila['precio_plan'];?>$</td>
            <td><?php echo $fila['cuotas'];?></td>
            <td><img style="width: 3rem; height: 3rem;" src="img/<?php echo $fila['image'];?>"></td>


            <td>
                <?php 
                    $sql_servicios = "SELECT * FROM Servicios INNER JOIN planes_has_services ON planes_has_services.servicio_id_servicios = Servicios.id_servicios && planes_has_services.planes_id_planes= $planid ";
                    $resultado_servicios= mysqli_query($connection, $sql_servicios);

                    while ( $fila_servicio =mysqli_fetch_array($resultado_servicios)){              
                ?> 
                  <li style="font-size: 0.8rem;"><?php echo $fila_servicio['descripcion_servicio'];?></li>
                <?php 
                   }
                 ?>
                   

            </td>
            <td><a href="eliminar_plan_action.php?id=<?php echo $fila['id_planes'];?>"><i class="material-icons desactivar">do_not_disturb_alt</i></a>                
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
    <?php  }
    ?>   
  </ul>

      
<?php 
mysqli_close($connection);
 ?>
