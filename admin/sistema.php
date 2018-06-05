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
                      <div class="divider"></div>
               </div>

                 <div class="row">             
                   <h5 >SISTEMA INTERNO DE LA FUNERARIA SAN JOSE</h5>
                    <div class="carousel">
                          <a class="carousel-item" href="#one!"><img src="img/AlericioXD.jpg"></a>
                          <a class="carousel-item" href="#two!"><img src="img/Captura de pantalla de 2017-12-12 23-56-40.png"></a>
                          <a class="carousel-item" href="#three!"><img src="img/alericio2.jpg"></a>
                    </div>
                    <h4 style="margin-top: -5rem;">Proximamente</h4>
                    
                         
              </div>
          </div>  
  </div>
  </div>
</main>

<?php
include('footer.php');
?>