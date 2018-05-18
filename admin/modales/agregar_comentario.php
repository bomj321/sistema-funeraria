<div id="modal_comentario" class="modal">
    <div class="modal-content">
      <h4>Agregar Comentario</h4>
      <table class="responsive-table">
      	<thead>      		    
              <th>Actividad</th>
              <th>Observaciones</th>                            
              <th colspan="2" >Agregar</th>
      	</thead>
      	<tbody>
      		
          <tr>          	
            
			<td><div>
           <input  type="text" class="form-control"  id="comentario_actividad">
             </div></td>

            <td ><div >
           <input  type="text" class="form-control" id="comentario_observaciones"  >
            </div></td>             

            <td ><a class='btn btn-info green' onclick="agregar_comentario('<?php echo $usuarioid?>')">
  			<i class="material-icons ">add_circle</i>
            </a></td>            
        	</tr>
           


      	</tbody>      	
      </table>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
    </div>
  </div>