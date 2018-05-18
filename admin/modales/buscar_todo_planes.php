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
      <table class="responsive-table">
      	<thead>
      		 <th>Id</th>
              <th>Producto</th>
              <th>Cantidad Exist.</th>
              <th class="text-center">Cantidad a Ofrecer</th>
              <th>Costo en Inventario</th>              
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
           <input disabled type="text" class="form-control sinborde text-left "  id="cantidad_stock_producto_planes<?php echo $id_producto; ?>" value="<?php echo $fila['cantidad'];?>">
             </div></td>
            <td ><div >
           <input  type="text" class="form-control sinborde text-center" id="cantidad_producto_planes<?php echo $id_producto; ?>"  value="1">
             </div></td>

             <td><div>
           <input  disabled type="text" class="form-control sinborde text-left"  id="precio_venta_producto_planes<?php echo $id_producto; ?>" value="<?php echo $fila['precio'];?>">
             </div></td>

            <td class="text-right"><a class='btn btn-info green' onclick="agregar_productos_planes('<?php echo $id_producto ?>')">
  			<i class="material-icons ">add_circle</i>
            </a></td>            
        	</tr>
            <?php
                  }
             ?>



      	</tbody>      	
      </table>
    <h4>Agregar Servicios</h4>
      <table class="responsive-table">
      	<thead>
      		 <th>Id</th>
              <th>Servicio</th>
              <th class="text-center">Cantidad a Ofrecer</th>
              <th>Costo en Inventario</th>              
              <th colspan="2">Agregar</th>
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

            <td><div>
           <input  disabled type="text" class="form-control sinborde text-left" id="nombre_planes_servicio_<?php echo $id_servicio; ?>"  value="<?php echo $fila['descripcion_servicio'];?>">
             </div></td>

            <td><div>
           <input  type="text" class="form-control sinborde text-center" id="cantidad_planes_servicio<?php echo $id_servicio; ?>"  value="1">
             </div></td>

             <td><div>
           <input  disabled type="text" class="form-control sinborde text-left"  id="precio_venta_planes_servicio<?php echo $id_servicio; ?>" value="<?php echo $fila['costo'];?>">
             </div></td>

            <td class="text-left"><a class='btn btn-info green' onclick="agregar_planes_servicios('<?php echo $id_servicio ?>')">
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