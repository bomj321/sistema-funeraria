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
        $tamaño_paginas=5;
        $empezar_desde=($pagina-1)* $tamaño_paginas;
        //-------------------Fin if ---------------------

$sql_limite = "SELECT * FROM planes";
$resultado_limite= mysqli_query($connection, $sql_limite); 
mysqli_fetch_array($resultado_limite);
 $num_filas = mysqli_num_rows($resultado_limite);
$total_paginas=ceil($num_filas/$tamaño_paginas);









$sql = "SELECT * FROM planes LIMIT $empezar_desde, $tamaño_paginas";
$resultado= mysqli_query($connection, $sql); 

 ?>


<table class="responsive-table" >
        <thead>
          <tr>
              <th>Id</th>
              <th>Nombre</th>
              <th>Costo</th>
              <th>Cuotas</th>
              <th>Ataud</th>
              <th>Comida</th>
              <th>Habitacion</th>
              <th>Transporte</th>
              <th>Flores</th>
              <th>Imagen</th>
              <th>Acciones</th>
          </tr>
        </thead>

        <tbody>
        	<?php 
        		while($fila =mysqli_fetch_array($resultado))
                      {
        	 ?>
          <tr>
            <td><?php echo $fila['idPlanes'];?></td>
            <td><?php echo $fila['nombre'];?></td>
            <td><?php echo $fila['costo'];?></td>
            <td><?php echo $fila['cuotas'];?></td>
            <td><?php echo $fila['ataud'];?></td>
            <td><?php echo $fila['comida'];?></td>
            <td><?php echo $fila['habitacion'];?></td>
            <td><?php echo $fila['transporte'];?></td>
            <td><?php echo $fila['flores'];?></td>
            <td><img style="width: 50px; height: 50px;" src="img/<?php echo $fila['imagen'];?>"></td>
            <td><button>Editar</button></td></tr>
            <?php
                  }
             ?>
          
          
        </tbody>
      </table>

<ul class="pagination">
    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
    <?php for($i=1; $i<=$total_paginas; $i++){ ?>
    <li class="active"><a href="?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
    <?php  }
    ?>   
    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
  </ul>

      
<?php 
mysqli_close($connection);
 ?>
