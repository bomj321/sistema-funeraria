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
              <th>Descripcion</th>
              <th>Precio</th>
              <th>Cuotas</th>              
              <th>Imagen</th>
              <th >Acciones</th>
          </tr>
        </thead>

        <tbody>
        	<?php 
        		while($fila =mysqli_fetch_array($resultado))
                      {
            // Variable del Boton
            $planestado =$fila['plan_activo'];
        	 ?>
          <tr>
            <td><?php echo $fila['id_planes'];?></td>
            <td><?php echo $fila['nombre'];?></td>
            <td><?php echo $fila['descripcion'];?></td>
            <td><?php echo $fila['precio_plan'];?>$</td>
            <td><?php echo $fila['cuotas'];?></td>            
            <td><img style="width: 80px; height: 80px;" src="img/<?php echo $fila['image'];?>"></td>
            <td>
              <a href=""><i class="material-icons">border_color</i></a>

                <?php 
                  if($planestado =='1'){
                 ?>
                    <a href=""><i class="material-icons desactivar">do_not_disturb_alt</i></a>

                 <?php 
                  }else{
                  ?>
                    <a href=""><i class="material-icons activar">check</i></a>

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
    <?php  }
    ?>   
  </ul>

      
<?php 
mysqli_close($connection);
 ?>
