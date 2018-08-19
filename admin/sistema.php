<?php
$resultado_stock="Administracion > Sistema Interno";
include('header.php');
include('connect.php');
    $contenido_sql="SELECT * FROM contenido ";
    $resultado_contenido= mysqli_query($connection, $contenido_sql);
    $row_contenido=mysqli_fetch_array($resultado_contenido);          
?>

<main>
 <div class="container"> 
        <div class="row">
             <div class="col s12 m3" >
                            <?php
                              include('aside.php');
                            ?>
                </div>

                 <div class="col s12 m9">

                       <?php 
                            include('advertencias.php');
                        ?>

                 <div class="row">             
                   <h5 >SISTEMA INTERNO DE LA FUNERARIA SAN JOSE</h5>
              </div>
              <div class="row">
                     <div class="celda">
                        <img src="img/<?php echo $row_contenido['imagen_frente']; ?>" alt="Funeraria San Jose"> 
                      </div>              
              </div>
          </div>  
  </div>
  </div>
</main>

<?php
include('footer.php');
?>