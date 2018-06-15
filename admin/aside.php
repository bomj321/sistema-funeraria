 <ul id="slide-out" class="sidenav ">    
                      
                <li><a class="subheader">Sistema Funeraria</a></li>
                <?php
                  if($_SESSION['perfil']=='admin'){ //IF
              ?>
                <li><a class="waves-effect" href="registrar_usuario.php">Registro de Usuarios</a></li>
                <?php
                    } //CIERRE DE IF 
                ?>
                <li><a class="waves-effect" href="registrar_cliente.php">Registro de clientes</a></li>
                <li><a class="waves-effect" href="control_de_los_clientes.php">Control de Clientes</a></li>
                <li><a class="waves-effect" href="contrato.php">Nuevo Contrato</a></li>
                <li><a class="waves-effect" href="control_contratos.php">Control de los Contratos</a></li>
                <li><a class="waves-effect" href="venta_servicios.php">Venta de Servicios</a></li>
                <li><a class="waves-effect" href="control_venta_servicios.php">Control de Venta-Servicios</a></li>
                <li><a class="waves-effect" href="stock.php">Registro de Stock</a></li>
                <li><a class="waves-effect" href="control_stock.php">Control de Stock</a></li>
                <li><a class="waves-effect" href="servicio.php">Registrar Servicio</a></li>
                <li><a class="waves-effect" href="control_servicios.php">Control de Servicios</a></li>
                <li><a class="waves-effect" href="nuevoplan.php">Registrar Plan</a></li>
                <li><a class="waves-effect" href="control_planes.php">Control de los Planes</a></li>




</ul>
   <a href="#" data-target="slide-out" class="sidenav-trigger"><i class=" large material-icons">playlist_add</i></a>  
