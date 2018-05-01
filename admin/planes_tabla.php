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
              <th>Imagen</th>
              <th>Servicios a ofrecer</th>
              <th>Productos a ofrecer</th>              
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
            <td><img style="width: 3rem; height: 3rem;" src="img/<?php echo $fila['image'];?>"></td>


            <td>
                <?php 
                    $sql_servicios = "SELECT * FROM Servicios INNER JOIN planes_has_services ON planes_has_services.servicio_id_servicios = Servicios.id_servicios && planes_has_services.planes_id_planes= $planid ";
                    $resultado_servicios= mysqli_query($connection, $sql_servicios);

                    while ( $fila_servicio =mysqli_fetch_array($resultado_servicios)){              
                ?> 
                  <li style="font-size: 0.8rem; text-align: center;"><?php echo $fila_servicio['descripcion_servicio'];?></li>
                <?php 
                   }
                 ?>
                   

            </td>

            <td>
                <?php 
                    $sql_products = "SELECT * FROM stock INNER JOIN planes_has_products ON planes_has_products.products_id_products = stock.id && planes_has_products.planes_id_planes_products= $planid ";
                    $resultado_products= mysqli_query($connection, $sql_products);

                    while ( $fila_products =mysqli_fetch_array($resultado_products)){              
                ?> 
                  <li style="font-size: 0.8rem; text-align: center;"><?php echo $fila_products['objeto'];?>(<?php echo $fila_products['cantidad_comprada'];?>)</li>
                <?php 
                   }
                 ?>
                   

            </td>
            <td><a href="eliminar_plan_action.php?id=<?php echo $fila['id_planes'];?>"><i class="material-icons desactivar">delete</i></a>                
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
