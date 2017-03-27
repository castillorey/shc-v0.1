    <form class="form-signin" method="POST" action="login/ingresar">

      <div class="form-header">
          <h2 align="center" >Iniciar sesión</h2>
      </div>
      <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-user" aria-hidden="true"></i>
              </span> 
              <input class="form-control" placeholder="ejemplo@correo.com" type="email" name="txtCorreo" required autofocus>
            </div>
      </div>

      <div class="form-group">
        <div class="input-group">
          <span class="input-group-addon">
            <i class="fa fa-lock" aria-hidden="true"></i>
          </span>
          <input class="form-control" placeholder="Contraseña" type="password" name="txtPassword" required>
        </div>
      </div>
      

      <div class="form-group">  
          <input class="btn btn-lg btn-primary btn-block" type="submit" name="btnEntrar" value="Iniciar"  />
          <p style="padding-top: 5px;">¿Aún no tienes cuenta? <a href="<?php echo site_url('signin'); ?>"> Registrate</a></p>
      </div>      
    </form>
  </div>
</div> <!-- /container -->