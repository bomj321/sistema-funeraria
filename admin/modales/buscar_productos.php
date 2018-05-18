<div id="modal2" class="modal">
    <div class="modal-content">
      <h4>Agregar Productos</h4>
      <table class="responsive-table">
      	<thead>
      		    <th>Id</th>
              <th>Producto</th>
              <th>Cantidad Exist.</th>
              <th>Cantidad a Vender</th>
              <th>Costo</th>              
              <th colspan="2" >Agregar</th>
      	</thead>
      	<tbody>
      		<?php 
      		$sql = "SELECT * FROM stock ";
			$resultado= mysqli_query($connection, $sql);
      		 ?>
			<?php 
        		while($fila=mysqli_fetch_array($resultado))        			 
                      {
                      	$id_producto=$fila['id']; 
        	 ?>
          <tr>
          	
            <td><?php echo $fila['id'];?></td>
            <td><?php echo $fila['objeto'];?></td>
			<td><div>
           <input  type="text" class="form-control sinborde text-left"  id="cantidad_stock_producto<?php echo $id_producto; ?>" value="<?php echo $fila['cantidad'];?>">
             </div></td>

            <td ><div >
           <input  type="text" class="form-control sinborde text-left" id="cantidad_producto<?php echo $id_producto; ?>"  value="1">
             </div></td>

             <td><div>
           <input  type="text" class="form-control sinborde text-left"  id="precio_venta_producto<?php echo $id_producto; ?>" value="<?php echo $fila['precio'];?>">
             </div></td>

            <td class="text-right"><a class='btn btn-info green' onclick="agregar_productos('<?php echo $id_producto ?>')">
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