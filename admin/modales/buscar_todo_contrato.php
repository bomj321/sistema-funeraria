<div id="modal_contrato_servicio" class="modal">
    <div class="modal-content">
      <h4>Agregar Costo y Descuento</h4>
      <table class="responsive-table">
        <thead>
              <th>Costo base del Contrato</th>           
              <th >Descuento</th>                            
              <th colspan="2" class="text-right">Agregar</th>
        </thead>
        <tbody>          
          <tr>           

            <td>
              <div>
           <input  type="text" class="form-control " id="costo_contrato">
             </div>
           </td>

            <td>
              <div>
           <input  type="text" class="form-control "  id="descuento_contrato">
             </div>
           </td>           
            
            <td class="text-right">
              <a class='btn btn-info green' href="#" onclick="agregar_costo_descuento()">
            <i class="material-icons ">add_circle</i>
            </a>
            </td> 

          </tr>
            


        </tbody>        
      </table>


      
       <?php 
          $sql_planes = "SELECT * FROM planes ";
      $resultado_planes= mysqli_query($connection, $sql_planes);
       $fila_planes_consulta= mysqli_num_rows($resultado_planes);
       if ($fila_planes_consulta==0) {
        ?>
              <h4 style="color: red;">No Hay Planes Registrados</h4>
              <div class="divider"></div>

             <?php
              }else{
              ?>
        <h4>Agregar Planes</h4>
      <table class="responsive-table">
        <thead>
           <th>Id</th>
              <th>Plan</th>
              <th>Costo</th>              
              <th colspan="2" class="text-right" >Agregar</th>
        </thead>
        <tbody>
          <?php
            while($fila_planes=mysqli_fetch_array($resultado_planes))              
                      {
                        $id_planes=$fila_planes['id_planes']; 
           ?>
          <tr>
            
            <td>
            <input  type="text" class="form-control sinborde text-left"  id="id_venta_planes<?php echo $id_planes; ?>" value="<?php echo $fila_planes['id_planes'];?>">
             </td>

             <td>
            <input  type="text" class="form-control sinborde text-left"  id="nombre_venta_planes<?php echo $id_planes; ?>" value="<?php echo $fila_planes['nombre'];?>">
             </td>            

            
             <td>
              <div>
           <input  type="text" class="form-control sinborde text-left"  id="precio_venta_planes<?php echo $id_planes; ?>" value="<?php echo $fila_planes['precio_plan'];?>">
             </div>
           </td>

            <td class="text-right">
            <a class='btn btn-info green' href="#" onclick="agregar_contrato_planes('<?php echo $id_planes?>')">
             <i class="material-icons ">add_circle</i>
            </a>
          </td>            
          </tr>
            <?php
                  }
                                  }
             ?>



        </tbody>        
      </table>

        <?php 
          $sql_servicio = "SELECT * FROM Servicios WHERE servicio_activo=1 ";
          $resultado_servicio= mysqli_query($connection, $sql_servicio);
            $fila_servicio_consulta= mysqli_num_rows($resultado_servicio);
         if ($fila_servicio_consulta==0) {
        ?>
              <h4 style="color: red;">No Hay Servicios Registrados</h4>
              <div class="divider"></div>

             <?php
              }else{
              ?>

      <h4>Agregar Servicios Adicionales</h4>
      <table class="responsive-table">
        <thead>
           <th>Id</th>
              <th>Servicio</th>
              <th>Cantidad</th>
              <th>Costo Unitario</th>              
              <th colspan="2" >Agregar</th>
        </thead>
        <tbody>          <?php 
          
          
            while($fila=mysqli_fetch_array($resultado_servicio))              
                      {
                        $id_servicio=$fila['id_servicios']; 
                        $serviciosestado =$fila['servicio_activo'];
           ?>
          <tr>
            
            <td><?php echo $fila['id_servicios'];?></td>

            <td><div>
           <input  type="text" class="form-control sinborde text-left" id="nombre_servicio_contrato<?php echo $id_servicio; ?>"  value="<?php echo $fila['descripcion_servicio'];?>">
             </div></td>

            <td><div>
           <input  type="text" class="form-control sinborde text-left" id="cantidad_servicio_contrato<?php echo $id_servicio; ?>"  value="1">
             </div></td>

             <td><div>
           <input  type="text" class="form-control sinborde text-left"  id="precio_servicio_venta_contrato<?php echo $id_servicio; ?>" value="<?php echo $fila['costo'];?>">
             </div></td>


            <td><a class='btn btn-info green' href="#" onclick="agregar_contrato_servicio('<?php echo $id_servicio ?>')">
        <i class="material-icons ">add_circle</i>
            </a></td>            
          </tr>
            <?php
                  }
                }
             ?>



        </tbody>        
      </table>

      <h4>Agregar Familiares Directos</h4>
      <table class="responsive-table">
        <thead>           
              <th class="text-center">Parentezco</th>
              <th class="text-center">Nombre</th>
              <th class="text-center">Edad</th>              
              <th colspan="2" >Agregar</th>
        </thead>
        <tbody>          
          <tr>
            
            <td>
              <div>
           <input  type="text" class="form-control" id="familiaresdi_parentezco_contrato">
             </div>
           </td>

            <td>
              <div>
           <input  type="text" class="form-control" id="familiaresdi_nombre_contrato"  >
             </div>
           </td>

             <td>
              <div>
           <input  type="text" class="form-control"  id="familiaresdi_edad_contrato" ">
             </div>
           </td>

             
           <td class="text-right">
            <a class='btn btn-info green' href="#" onclick="agregar_contrato_familiaresdi()">
        <i class="material-icons ">add_circle</i>
            </a>
          </td>

          </tr>         

        </tbody>         
      </table>

      <h4>Agregar Familiares Indirectos</h4>
      <table class="responsive-table">
        <thead>           
              <th class="text-center">Parentezco</th>
              <th class="text-center">Nombre</th>
              <th class="text-center">Edad</th>
              <th class="text-center">Costo Adicional</th>              
              <th class="text-center" colspan="2" >Agregar</th>
        </thead>
        <tbody>
          
          <tr>
            
            <td>
              <div>
           <input  type="text" class="form-control" id="familiaresin_parentezco_contrato">
             </div>
           </td>

            <td>
              <div>
           <input  type="text" class="form-control" id="familiaresin_nombre_contrato"  >
             </div>
           </td>

             <td>
              <div>
           <input  type="text" class="form-control"  id="familiaresin_edad_contrato" ">
             </div>
           </td>

             <td>
              <div>
           <input  type="text" class="form-control"  id="familiaresin_costo_contrato">
             </div>
           </td>

           <td class="text-right">
            <a class='btn btn-info green' href="#" onclick="agregar_contrato_familiaresin()">
        <i class="material-icons ">add_circle</i>
            </a>
          </td> 
          </tr>         

        </tbody>        
      </table>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
    </div>
  </div>
