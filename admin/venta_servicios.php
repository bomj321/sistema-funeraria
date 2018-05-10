<?php
include('header.php');
?>
<main>
  <div class="container">
        <div class="row">
          <!--MODALES-->
          <div class="col s12 m12">
            <?php 
              include("modales/buscar_servicios.php");
             ?>
            

          </div>
                    <!--MODALES-->

                 <div class="col s3" >
                            <?php
                              include('aside.php');
                            ?>
                </div>

                 <div class="col s9">
                      
                             <?php 
                                  include('advertencias.php');
                              ?>
                     
                        <div class="divider pink"></div>                        

                <div class="row">
                  <h4>Venta de Servicios</h4>                  
                    <form method="POST"  enctype="multipart/form-data" id="venta_servicio_ventas" name="venta_servicio_ventas"  onsubmit="ventaDeServicios(); return false" class="col s12 m12" action="" style="margin-bottom: 3rem;">
                           
                          <div class="row">
                            <div class="input-field col s12 m4">
                              <input onkeypress="return sololetras(event)" name="nombre_usuario" id="nombre_usuario_venta" type="text" class="validate" required="true">
                              <label for="nombre_usuario_venta">Nombre Completo</label>
                              <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_letra"></p>
                            </div>

                            <div class="input-field col s12 m4">
                              <input onkeypress="return solonumeros2(event)" onpaste="false" name="edad_usuario" id="edad_usuario_venta" type="text" class="validate" required="true">
                              <label for="edad_usuario_venta">Edad del Usuario</label>
                              <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_costos"></p>
                            </div>

                            <div class="input-field col s12 m4">
                              <input onkeypress="return sololetras2(event)" onpaste="false" name="civil_usuario" id="civil_usuario_venta" type="text" class="validate" required="true">
                              <label for="civil_usuario_venta">Estado civil</label>
                              <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_letra2"></p>
                            </div> 
                          </div>

                          <div class="row"> 
                            <div class="input-field col s12 m4">
                              <input onkeypress="return solonumeros(event)" onpaste="false" name="dni_usuario" id="dni_usuario_venta" type="text" class="validate" required="true">
                              <label for="dni_usuario_venta">DNI</label>
                              <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_costo"></p>
                            </div>

                            <div class="input-field col s12 m4">
                              <input onkeypress="return sololetras3(event)" onpaste="false" name="comentario_usuario" id="comentario_usuario_venta" type="text" class="validate" required="true">
                              <label for="comentario_usuario_venta">Comentario</label>
                              <p style="color: red; font-size: 1rem; margin-bottom: -1rem;" id="mensaje_letra3"></p>
                            </div>
                            <!--CONSULTA PARA EL SELECT-->
                                <?php 
                                include('connect.php');
                                $sql = "SELECT * FROM Servicios WHERE servicio_activo ='1'";
                                $resultado= mysqli_query($connection, $sql);
                                 ?>


                                <!--CONSULTA PARA EL SELECT-->

                          <div class="input-field col s12 m4" >
                              <select multiple name="servicios_venta_venta[]" id="servicios_venta_venta">
                                    <?php 
                                     while($fila =mysqli_fetch_array($resultado))
                                        {
            
                                    ?>

                                    <option value="<?php echo $fila['id_servicios']?>"><?php echo $fila['descripcion_servicio']?>-<?php echo $fila['costo']?>$</option>

                                    <?php 
                                      }
                                     ?>

                                  </select>
                                  <label>Selecciona los Servicios</label>
                                </div>
                          </div>










                          <div class="row">
                              <div class="col s12 m4">
                                <a class="waves-effect waves-light btn modal-trigger" href="#modal1"><i class="material-icons right">add_circle</i>Agregar Servicios</a>
                              </div>


                          </div> 

                            
                             <div class="row" id="resultados">

                             </div>         












<!--CONSULTA PARA LOS PRODUCTOS-->
                                <?php 
                                $sql_producto = "SELECT * FROM stock WHERE cantidad > 0";
                                $resultado_producto= mysqli_query($connection, $sql_producto);
                                 ?>


                                <!--CONSULTA PARA LOS PRODUCTOS-->
                          <div class="row">
                            <div class="col s12 m12" >
                              <h4>Selecciona los Productos</h4>
                            </div>
                          </div>                           


              <div class="row">
                <table class="responsive-table">
                  <thead>
                      <tr>
                          <th>Id</th>
                          <th>Productos</th>
                          <th>Precio Unitario</th>
                          <th>Cantidad Existente</th>                                          
                          <th>Cantidad a Vender</th>
                      </tr>
                </thead> 
                <tbody>
                    
                       <?php 
                                     for($i=1;$i<=mysqli_num_rows($resultado_producto); $i++)
                                      {
                                      $fila_producto =mysqli_fetch_array($resultado_producto)           
                        ?>
                  <tr>
                      <td>
                        <input  value="<?php echo $fila_producto['id']?>" readonly="readonly" id="first_id<?= $i ?>" type="text" class="validate" name="producto[<?= $i ?>][id]">
                      </td>

                      <td>
                        <input  value="<?php echo $fila_producto['objeto']?>" readonly="readonly" id="first_name<?= $i ?>" type="text" class="validate" name="producto[<?= $i ?>][nombre]">
                      </td>

                      <td>
                        <input  value="<?php echo $fila_producto['precio']?>$" readonly="readonly" id="first_name<?= $i ?>" type="text" class="validate" name="producto[<?= $i ?>][precio]">
                      </td>

                      <td>
                       <input  id="first_cantidad_stock<?= $i ?>" value="<?php echo $fila_producto['cantidad']?>" type="text" class="validate" readonly="readonly" name="producto[<?= $i ?>][cantidad_stock]">
                     </td>

                      <td>
                        <input onkeypress="return solonumerosolo(event)"  id="first_cantidad_vender<?= $i ?>" type="text" class="validate" name="producto[<?= $i ?>][cantidad]">
                      </td>

                  </tr>
                        <?php 
                               
                                  }
                        ?>
                </tbody>
            </table>
        </div>

                         
                             

 
                           <button class="btn waves-effect waves-light  green darken-3" type="submit" name="action">Registrar Venta
                              <i class="material-icons right">send</i>
                          </button>
        
                    </form>
                  </div>                 
              </div>
        </div>
  </div>  
</main>
<?php
include('footer.php');
?>