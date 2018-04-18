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
        $tamaño_paginas=5;
        $empezar_desde=($pagina-1)* $tamaño_paginas;
        //-------------------Fin if ---------------------

$sql_limite = "SELECT * FROM stock";
$resultado_limite= mysqli_query($connection, $sql_limite); 
mysqli_fetch_array($resultado_limite);
$num_filas = mysqli_num_rows($resultado_limite);
$total_paginas=ceil($num_filas/$tamaño_paginas);





$sql = "SELECT * FROM stock LIMIT $empezar_desde, $tamaño_paginas";
$resultado= mysqli_query($connection, $sql);  
 ?>


<table class="responsive-table" >
        <thead>
          <tr>
              <th>Id</th>
              <th>Item</th>
              <th>Cantidad</th>
              <th>Comentario</th>
              <th colspan="2" >Acciones</th>
          </tr>
        </thead>

        <tbody>
        	<?php 
        		while($fila =mysqli_fetch_array($resultado))
                      {
        	 ?>
          <tr>
            <td><?php echo $fila['id'];?></td>
            <td><?php echo $fila['objeto'];?></td>
            <td><?php echo $fila['cantidad'];?></td>
            <td><?php echo $fila['comentario'];?></td>
            <td><a href="editar_stock.php?id=<?php echo $fila['id'];?>"><i class="material-icons">border_color</i></a></td></tr>
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