<?php
include('header.php');
?>
<main>
    <div class="container">
        
            <div class="row">
                <form class="col s6 offset-s3">
                <div class="row">
                    <div class="input-field col s12">
                      <input id="password" type="password" class="validate">
                      <label for="password">Password</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                      <input id="email" type="email" class="validate">
                      <label for="email">Email</label>
                    </div>
                </div>                  
                      <button class="btn waves-effect waves-light" type="submit" name="action">Entrar al Sistema
                    <i class="material-icons right"></i>
                     </button>
                </form>
            </div>        
    </div>
</main>

<?php
include('footer.php');
?>