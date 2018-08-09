<div id="modal_contrato_editar_2" class="modal">
    <div class="modal-content">
     
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
     
    </div>
    <div class="modal-footer">
      <a type="button" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
    </div>
  </div>
