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

$sql_limite = "SELECT * FROM planes";
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
              <th>Servicio</th>
              <th>Cantidad</th>
              <th>Costo</th>
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
            <td><?php echo $fila['servicio'];?></td>
            <td><?php echo $fila['cantidad'];?></td>
            <td><?php echo $fila['costo'];?></td>
            <td><?php echo $fila['comentario'];?></td>
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