<div id="modal_contrato_editar" class="modal">
    <div class="modal-content">
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
          <div class="input-field col s12 m12" onkeyup="load_planes_editar(1)">
            <input name="planes_contrato" id="planes_contrato_editar" type="text" >
            <label for="planes_contrato">Buscar Planes</label>
          </div>
    <div id="id_contenido_contrato_editar">        
          <!--RESULTADO AJAX-->
   
    </div>        
            <?php 
              }              
          ?> 
           
       

        <?php 
          $sql_servicio = "SELECT * FROM servicios WHERE servicio_activo=1 ";
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
    <div class="input-field col s12 m12" onkeyup="load_servicio_contrato_editar(1)">
            <input name="servicios_contrato" id="servicios_contrato_editar" type="text" >
            <label for="servicios_contrato">Buscar Servicios</label>
      </div>
  <div id="id_contenido_contrato_servicios_editar">     
          <!--RESULTADO AJAX-->
</div>        
    <?php
         }
      ?>    

      <h4>Agregar Familiares Dependientes</h4>
      <table class="responsive-table">
        <thead>
              <th class="text-center">Nombre</th>
              <th class="text-center">Parentezco</th>
              <th class="text-center">N° de Identificacion</th>
              <th class="text-center">Edad</th>              
              <th colspan="2" >Agregar</th>
        </thead>
        <tbody>          
          <tr>
               
            <td>
              <div>
           <input  type="text" class="form-control" id="familiaresdi_nombre_contrato_editar">
             </div>
           </td>
            
             <td>
              <div>
           <input  type="text" class="form-control" id="familiaresdi_parentezco_contrato_editar">
             </div>
           </td>
             
             <td>
              <div>
           <input  type="text" class="form-control" id="familiaresdi_numero_contrato_editar">
             </div>
           </td>

             <td>
              <div>
           <input  type="date" class="form-control"  id="familiaresdi_edad_contrato_editar">
             </div>
           </td>

             
           <td class="text-right">
            <a class='btn btn-info green' type="button" onclick="agregar_contrato_editar_familiaresdi()">
        <i class="material-icons ">add_circle</i>
            </a>
          </td>

          </tr>         

        </tbody>         
      </table>

      <h4>Agregar Familiares Independientes</h4>
      <table class="responsive-table">
        <thead>
              <th class="text-center">Nombre</th>
              <th class="text-center">Parentezco</th>
              <th class="text-center">N° de Identificacion</th>
              <th class="text-center">Edad</th>
              <th class="text-center">Costo Adicional</th>              
              <th class="text-center" colspan="2" >Agregar</th>
        </thead>
        <tbody>
          
          <tr> 
            <td>
              <div>
           <input  type="text" class="form-control" id="familiaresin_nombre_contrato_editar"  >
             </div>
           </td>
             
            <td>
              <div>
           <input  type="text" class="form-control" id="familiaresin_parentezco_contrato_editar">
             </div>
           </td> 
             
           <td>
              <div>
           <input  type="text" class="form-control" id="familiaresin_numero_contrato_editar">
             </div>
           </td>   

             <td>
              <div>
           <input  type="date" class="form-control"  id="familiaresin_edad_contrato_editar">
             </div>
           </td>

             <td>
              <div>
           <input  type="text" class="form-control"  id="familiaresin_costo_contrato_editar">
             </div>
           </td>

           <td class="text-right">
            <a class='btn btn-info green' type="button" onclick="agregar_contrato_editar_familiaresin()">
        <i class="material-icons ">add_circle</i>
            </a>
          </td> 
          </tr>         

        </tbody>        
      </table>
    </div>
    <div class="modal-footer">
      <a type="button" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
    </div>
  </div>
