<?php
session_start();?>
<?php  
include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
  <title>Document</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="css/materialize.css" media="screen">
  <link rel="stylesheet" href="css/toastr.css">
  <link rel="stylesheet" href="css/app.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
</head>
<body>
  <header>
   <?php
                  $url= $_SERVER["REQUEST_URI"];
                  $url_formateada_1 = str_replace('/',' > ', $url);
                  $url_formateada_2 = str_replace('.php','', $url_formateada_1);
                  $url_formateada_3 = str_replace('?id=','', $url_formateada_2);
                  $numbers = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
                  $url_formateada_4 = str_replace($numbers,'', $url_formateada_3);
                  $url_formateada_5 = str_replace('_',' ', $url_formateada_4);
                  $url_formateada_6 = str_replace('?id',' ', $url_formateada_5);
                  $url_formateada_7 = str_replace('=',' ', $url_formateada_6);
                  $url_formateada_8 = str_replace('admin','Administracion', $url_formateada_7);
                  $resultado = substr($url_formateada_8, 22);
                  if(isset($resultado2)){
                              $resultado= $resultado2;                    
                            }
    
                  if(isset($resultado3)){
                              $resultado= $resultado3;  
                  }
    
                  if(isset($resultado_stock)){
                              $resultado= $resultado_stock;  
                  }
                  if(isset($resultado_servicio)){
                              $resultado= $resultado_servicio;  
                  }
    
    
                            ?>
                                             
    <div class="row">                
              
                      <nav>
                        <div class="nav-wrapper">
                         <span id="url"><?php echo $resultado ?></span>
                          <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                          <ul class="right hide-on-med-and-down">
                            <li><a href="sass.html">Volver a la Pagina</a></li>
                            <li><a href="../">Salir del Sistema</a></li>                      
                          </ul>
                        </div>
                      </nav>

                          <ul class="sidenav" id="mobile-demo">
                            <li><a href="sass.html">Sass</a></li>
                            <li><a href="badges.html">Components</a></li>
                            <li><a href="collapsible.html">Javascript</a></li>
                            <li><a href="mobile.html">Mobile</a></li>
                          </ul>         
           </div>
  </header>
  

