			<form class="form-signin" method="POST" action="signin/registrar">
					<div class="form-header">
						<h2 align="center"> Crear cuenta</h2>
					</div>
					<div class="form-group">
				        <div class="input-group">
				        	<span class="input-group-addon">
				        	  <i class="fa fa-user" aria-hidden="true"></i>
				        	</span> 
				        	<input class="form-control" placeholder="ejemplo@correo.com" type="email" id="usuario" name="txtCorreo" required autofocus>
				        </div>
					</div>
						
					<div class="form-group">
				        <div class="input-group">
				        	<span class="input-group-addon">
				        	  <i class="fa fa-lock" aria-hidden="true"></i>
				        	</span> 
				        	 <input class="form-control" type="password" name="txtPassword" id="password"  placeholder="Contraseña" required>
				        </div>
					</div>

					<div class="form-group">
				        <div class="input-group">
				        	<span class="input-group-addon">
				        	  <i class="fa fa-lock" aria-hidden="true"></i>
				        	</span> 
				        	 <input class="form-control"  type="password" name="txtPassword2" id="txtPassword2" placeholder="Confirmar contraseña" required>
				        </div>
					</div>

					<div class="form-group">	
			        	<input class="btn btn-lg btn-warning btn-block" type="submit" name="btnRegistrar" value="Registrarme"/>
					</div>
					<p style="padding-top: 5px;">¡Ya tengo una cuenta!<a href="<?php echo site_url('login'); ?>"> Iniciar sesión</a></p>
			</form>
		</div>
	</div>
</div> <!-- /container -->

	
	
		
	
