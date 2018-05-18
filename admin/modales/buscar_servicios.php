<div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Agregar Servicios</h4>
      <table class="responsive-table">
      	<thead>
      		 <th>Id</th>
              <th>Servicio</th>
              <th>Cantidad</th>
              <th>Costo</th>              
              <th colspan="2" >Agregar</th>
      	</thead>
      	<tbody>
      		<?php 
      		$sql = "SELECT * FROM Servicios WHERE servicio_activo=1 ";
			$resultado= mysqli_query($connection, $sql);
      		 ?>
			<?php 
        		while($fila=mysqli_fetch_array($resultado))        			 
                      {
                      	$id_servicio=$fila['id_servicios']; 
                      	$serviciosestado =$fila['servicio_activo'];
        	 ?>
          <tr>
          	
            <td><?php echo $fila['id_servicios'];?></td>
            <td><?php echo $fila['descripcion_servicio'];?></td>

            <td><div>
           <input  type="text" class="form-control sinborde text-left" id="cantidad_<?php echo $id_servicio; ?>"  value="1">
             </div></td>

             <td><div>
           <input  type="text" class="form-control sinborde text-left"  id="precio_venta_<?php echo $id_servicio; ?>" value="<?php echo $fila['costo'];?>">
             </div></td>

            <td class="text-left"><a class='btn btn-info green ' onclick="agregar('<?php echo $id_servicio ?>')">
  			<i class="material-icons ">add_circle</i>
            </a></td>            
        	</tr>
            <?php
                  }
             ?>



      	</tbody>      	
      </table>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
    </div>
  </div>