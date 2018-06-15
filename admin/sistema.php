<?php
$resultado_stock="Administracion > Sistema Interno";
include('header.php');
?>

<main>
 <div class="container"> 
        <div class="row">
            <div class="col s3 m3" >
                            <?php
                              include('aside.php');
                            ?>
             </div>

             <div class="col s9 m9">

                <div class="row">
                       <?php 
                            include('advertencias.php');
                        ?>
               </div>

                 <div class="row">             
                   <h5 >SISTEMA INTERNO DE LA FUNERARIA SAN JOSE</h5>
              </div>
              <div class="row">
                     <div class="celda">
                        <img src="img/logo.png" alt="Funeraria San Jose"> 
                      </div>              
              </div>
          </div>  
  </div>
  </div>
</main>

<?php
include('footer.php');
?>