<div id="modal_planes" class="modal">
    <div class="modal-content">
      <h4>Agregar Costo y Descuento</h4>
      <table class="responsive-table">
        <thead>
              <th>Costo del plan</th>           
              <th>Descuento</th>
              <th colspan="2" class="text-right">Agregar</th>
        </thead>
        <tbody>          
          <tr>           

            <td>
              <div>
           <input  type="text" class="form-control " id="costo_planes">
             </div>
           </td>

            <td>
              <div>
           <input  type="text" class="form-control "  id="descuento_planes">
             </div>
           </td>
                     
            
            <td class="text-right">
              <a class='btn btn-info green' type="button" onclick="agregar_costo_descuento_planes()">
            <i class="material-icons ">add_circle</i>
            </a>
            </td> 

          </tr>
            


        </tbody>        
      </table>	
      <h4>Agregar Productos</h4>
      
    <div class="input-field col s12 m12" onkeyup="load_productos_planes(1)">
            <input name="planes_productos" id="planes_productos" type="text" >
            <label for="planes_productos">Buscar Productos</label>
   </div>  
       <div id="id_contenido_productos_plan">  
              
      </div>     
      
    <h4>Agregar Servicios</h4>
     <div class="input-field col s12 m12" onkeyup="load_servicio_planes(1)">
            <input name="planes_servicios" id="planes_servicios" type="text" >
            <label for="planes_servicios">Buscar Servicios</label>
      </div>
      <div id="id_contenido_servicio_plan">  
          <!--RESULTADO AJAX-->
    </div>       
</div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
    </div>
  </div>