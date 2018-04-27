<?php 
include('connect.php');

 //--------------------if--------------------

        if(isset($_GET["pagina"])){

                if($_GET["pagina"]==1){

                    echo " 
                    <script>
                    window.location.href='control_venta_servicios.php';           
                    </script>            
                ";

                }else{

                  $pagina= $_GET["pagina"];

                }


        }else{
          $pagina=1;
        }


//Cuantos registro se muestran por paginas
        $tamaño_paginas=10;
        $empezar_desde=($pagina-1)* $tamaño_paginas;
        //-------------------Fin if ---------------------

$sql_limite = "SELECT * FROM User_servicios_individuales";
$resultado_limite= mysqli_query($connection, $sql_limite); 
mysqli_fetch_array($resultado_limite);
 $num_filas = mysqli_num_rows($resultado_limite);
$total_paginas=ceil($num_filas/$tamaño_paginas);

 

$sql = "SELECT * FROM User_servicios_individuales ORDER BY  idUser desc LIMIT $empezar_desde, $tamaño_paginas";
$resultado= mysqli_query($connection, $sql); 

 ?>


<table class="responsive-table" >
        <thead>
          <tr>
              <th>Id</th>
              <th>Nombre</th>
              <th>Comentario</th>
              <th>DNI</th>                                          
              <th>Servicios</th>  
              <th>Total</th>
              <th>Acciones</th>
          </tr>
        </thead>

        <tbody>
        	<?php 
        		while($fila =mysqli_fetch_array($resultado))                      {
            
            $planid =$fila['idUser'];
        	 ?>
          <tr>
            <td><?php echo $fila['idUser'];?></td>
            <td><?php echo $fila['nombre'];?></td>
            <td><?php echo $fila['comentario'];?></td>
            <td><?php echo $fila['dni'];?></td>         




            <td>
                <?php 
                    $sql_servicios = "SELECT * FROM Servicios INNER JOIN user_has_services ON user_has_services.servicio_id_servicios = Servicios.id_servicios && user_has_services.servicios_id_user= $planid ";
                    $resultado_servicios= mysqli_query($connection, $sql_servicios);



                    $sql_total_servicios ="SELECT SUM(costo) AS value_sum FROM Servicios INNER JOIN user_has_services ON user_has_services.servicio_id_servicios = Servicios.id_servicios && user_has_services.servicios_id_user= $planid";
                    $resultado_total_servicios= mysqli_query($connection, $sql_total_servicios);
                    $row = mysqli_fetch_assoc($resultado_total_servicios);
                    $sum = $row['value_sum'];   

                    while ( $fila_servicio =mysqli_fetch_array($resultado_servicios)){              
                ?> 
                  <li style="font-size: 0.8rem;"><?php echo $fila_servicio['descripcion_servicio'];?></li>
                <?php 
                   }
                 ?>
                   
            </td>

            <td><?php echo $sum;?>$</td>

            <td><a href="pdf_servicios.php?id=<?php echo $fila['idUser'];?>"><i class="material-icons pdf">picture_as_pdf</i></a>

            <a href="word_servicios.php?id=<?php echo $fila['idUser'];?>"><i class="material-icons word">insert_drive_file</i></a>

            <a href="imprimir_servicios.php?id=<?php echo $fila['idUser'];?>"><i class="material-icons desactivar">assignment_returned</i></a> 

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
