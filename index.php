<?php
 include_once'funciones/templates/header.php';
 include_once'funciones/connect.php';
  $contenido_sql="SELECT * FROM contenido ";
    $resultado_contenido= mysqli_query($connection, $contenido_sql);
    $row_contenido=mysqli_fetch_array($resultado_contenido);       
?>

    <div class="container">
  <div class="carousel carousel-slider">
    <a class="carousel-item" ><img src="admin/img/<?php echo $row_contenido['imagen1']; ?>"></a>
    <a class="carousel-item" ><img src="admin/img/<?php echo $row_contenido['imagen2']; ?>"></a>
    <a class="carousel-item" ><img src="admin/img/<?php echo $row_contenido['imagen3']; ?>"></a>
  </div>
    </div>


    <!--about us -->
    <div class="container" >
        <div class="section">
            <div class="row" style="background-color: rgba(245, 251, 255, 0.3);">
                <h3 class="center" style="color: black;">Sobre Nosotros</h3>            
            <div>
            <div class="row">
                <div class="col s4 m4">
                    <div class="icon-block">
                        <h2 class="center brown-text"><i class="material-icons"></i></h2>
                        <img class="materialboxed responsive-img" src="admin/img/<?php echo $row_contenido['imagennosotros']; ?>">                   
                    </div>
                </div>
                <div class="col s4 m4">
                    <div class="icon-block">
                        <h2 class="center brown-text"><i class="material-icons">group</i></h2>
                        <h5 class="center" style="color: black; font-weight: bold; font-size:20px;">Quienes somos</h5>
                        <p class="light" style="color: black; font-weight: bold; font-size:20px;"><?php echo $row_contenido['quienessomos']; ?></p>
                    </div>
                </div>
                <div class="col s4 m4">
                    <div class="icon-block">
                        <h2 class="center brown-text"><i class="material-icons">settings</i></h2>
                        <h5 class="center" style="color: black; font-weight: bold; font-size:20px;">Que hacemos</h5>
                        <p class="light" style="color: black; font-weight: bold; font-size:20px;"><?php echo $row_contenido['quehacemos']; ?></p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    </div>

    <!--our services -->

    <div class="parallax-container valign-wrapper">
        
        <div class="parallax">
            <img src="images/funeraria5.jpg" alt="Unsplashed background img 2">
        </div>
        <div class="section row" style="text-align:center; background-color:rgba(84, 155, 246, 0.2)">
          <div class="row container">
            <p style="font-weight: bold; color:black; font-size:2rem;"><?php echo $row_contenido['frase']; ?></p>
          </div>
    </div>
    </div>
   
<?php include_once'funciones/templates/footer.php';?>