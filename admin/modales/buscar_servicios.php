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
      		$sql = "SELECT * FROM Servicios ";
			$resultado= mysqli_query($connection, $sql);
      		 ?>
			<?php 
        		while($fila=mysqli_fetch_array($resultado))        			 
                      {
                      	$id_producto=$fila['id_servicios']; 
                      	$serviciosestado =$fila['servicio_activo'];
        	 ?>
          <tr>
          	
            <td><?php echo $fila['id_servicios'];?></td>
            <td><?php echo $fila['descripcion_servicio'];?></td>

            <td><div>
           <input  type="text" class="form-control col s1 sinborde" id="cantidad_<?php echo $id_producto; ?>"  value="1">
             </div></td>

             <td><div>
           <input  type="text" class="form-control col s2 sinborde"  id="precio_venta_<?php echo $id_producto; ?>" value="<?php echo $fila['costo'];?>">
             </div></td>

            <td><a class='btn btn-info green' href="#" onclick="agregar('<?php echo $id_producto ?>')">
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