
<div class="fixed-action-btn">
  <a class="btn-floating btn-large red modal-trigger"  href="#modal1" >
    <i class="large material-icons">mode_edit</i>
  </a>
</div>

  <!-- Modal Structure -->
<div id="modal1" class="modal">
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"><i class="material-icons">close</i></a>
    </div>
    <div class="modal-content">
        <!-- Formulario -->
        <div class="row">
            <h3 class="center brown-text">Contáctanos</h3>       
        </div>
            <form class="col s12">
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="icon_prefix" type="text" class="validate">
                        <label for="icon_prefix">Nombre</label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="icon_apellido" type="tel" class="validate">
                        <label for="icon_apellido">Apellido</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">phone</i>
                        <input id="icon_telephone" type="tel" class="validate">
                        <label for="icon_telephone">Número Telefónico</label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">email</i>
                        <input id="icon_email" type="email" class="validate">
                        <label for="icon_email">Correo eléctronico</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">border_color</i>
                        <textarea id="textarea1" class="materialize-textarea"></textarea>
                        <label for="textarea1">Mensaje</label>
                    </div>
                <button class="btn waves-effect waves-light right" type="submit" name="action">Submit
                <i class="material-icons right">send</i>
                </button>
                </div>

            </form>     
    <!-- cierre del modal-content-->
    </div>

</div>