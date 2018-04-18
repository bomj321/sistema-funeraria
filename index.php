<?php include_once'funciones/templates/header.php';?>

    <div class="container">        
        <div class="carousel carousel-slider center">
            <div class="carousel-item red white-text" href="#one!">
                <h2>First Panel</h2>
                <p class="white-text">This is your first panel</p>
            </div>
            <div class="carousel-item amber white-text" href="#two!">
                <h2>Second Panel</h2>
                <p class="white-text">This is your second panel</p>
            </div>
            <div class="carousel-item green white-text" href="#three!">
                <h2>Third Panel</h2>
                <p class="white-text">This is your third panel</p>
            </div>
            <div class="carousel-item blue white-text" href="#four!">
                <h2>Fourth Panel</h2>
                <p class="white-text">This is your fourth panel</p>
            </div>
        </div>
    </div>


    <!--about us -->
    <div class="container">
        <div class="section">
            <div class="row">
                <h3 class="center brown-text">Sobre Nosotros</h3>            
            <div>
            <div class="row">
                <div class="col s4 m4">
                    <div class="icon-block">
                        <h2 class="center brown-text"><i class="material-icons"></i></h2>
                        <img class="materialboxed responsive-img" src="images/background1.jpg">                   
                    </div>
                </div>
                <div class="col s4 m4">
                    <div class="icon-block">
                        <h2 class="center brown-text"><i class="material-icons">group</i></h2>
                        <h5 class="center">Quienes somos</h5>
                        <p class="light">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque tempora hic assumenda aperiam veritatis velit adipisci facilis ducimus repellat, aliquid ut recusandae, nulla libero, deleniti tenetur corrupti cum? Eveniet, delectus.</p>
                    </div>
                </div>
                <div class="col s4 m4">
                    <div class="icon-block">
                        <h2 class="center brown-text"><i class="material-icons">settings</i></h2>
                        <h5 class="center">Que hacemos</h5>
                        <p class="light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti officiis suscipit nemo. Facilis vero optio odit veritatis magni soluta debitis aspernatur beatae, vitae minus voluptatem necessitatibus rerum nesciunt, magnam consectetur.</p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    </div>

    <!--our services -->

    <div class="parallax-container valign-wrapper">
        <div class="container">
            <div class="row">
                <h3 class="col s12 m12 center white-text">Nuestros Servicios</h3>
            </div>
            <div class="row">
                <div class="col s4 m4">
                    <div class="icon-block">
                        <h2 class="center white-text"><i class="material-icons">directions_car</i></h2>
                        <h5 class="white-text">Lorem ipsum dolor sit</h5>
                        <p class="white-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque tempora hic assumenda aperiam veritatis velit adipisci facilis ducimus repellat, aliquid ut recusandae, nulla libero, deleniti tenetur corrupti cum? Eveniet, delectus.</p>
                    </div>
                </div>
                <div class="col s4 m4">
                    <div class="icon-block">
                        <h2 class="center white-text"><i class="material-icons">person</i></h2>
                        <h5 class="white-text">Lorem ipsum dolor sit</h5>
                        <p class="white-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti officiis suscipit nemo. Facilis vero optio odit veritatis magni soluta debitis aspernatur beatae, vitae minus voluptatem necessitatibus rerum nesciunt, magnam consectetur.</p>
                    </div>
                </div>
                <div class="col s4 m4">
                    <div class="icon-block">
                        <h2 class="center white-text"><i class="material-icons">thumb_up</i></h2>
                        <h5 class="white-text">Lorem ipsum dolor sit</h5>
                        <p class="white-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti officiis suscipit nemo. Facilis vero optio odit veritatis magni soluta debitis aspernatur beatae, vitae minus voluptatem necessitatibus rerum nesciunt, magnam consectetur.</p>
                    </div>
                </div>                
            </div>
        </div>
        <div class="parallax">
            <img src="images/background2.jpg" alt="Unsplashed background img 2">
        </div>
    </div>

    <!--Planes y servicios-->

    <div class="container">
        <div class="row">
            <h3 class="center brown-text">Nosotros Ofrecemos</h3>       
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s6"><a href="#test1">Planes</a></li>
                    <li class="tab col s6"><a class="active" href="#test2">Servicios</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div id="test1" class="col s12">Planes</div>
            <div id="test2" class="col s12">Servicios</div>
        </div>
    </div>
<?php include_once'funciones/templates/contactanos.php';?>
<?php include_once'funciones/templates/footer.php';?>