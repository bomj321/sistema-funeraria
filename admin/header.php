<?php
session_start();
include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
  <title>Document</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="css/materialize.css">
  <link rel="stylesheet" href="css/toastr.css">
  <link rel="stylesheet" href="css/app.css">
</head>
<body>
  <header>
    <div class="row">                
              
                      <nav>
                        <div class="nav-wrapper">
                          <a href="#!" class="brand-logo">Logo</a>
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
  

