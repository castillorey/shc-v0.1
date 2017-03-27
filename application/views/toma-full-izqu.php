        <div class="panel-body">
          <div class="toma-box">
	          	<div class="superior">
	          		<h3><?php echo $ubicacion;?></h3>
	          	</div>
	          	<!-- Dispositivos-->
	          	<ul>
	          		<!-- Dispositivo 1-->
	          		<li>
	          			<a class="btn btn-link" href="<?php echo site_url('tomas/encender_apagar/'.$ubicacion.''); ?>" name="btnOnOff">
	          				<img id="imagen1" width="60px" src="<?php echo $imgD1;?>" alt="Dispositivo1" >
	          			</a>
	          			<br>
	          			<span><?php echo $nombreD1;?></span>
	          		</li>

	          		<!-- Dispositivo 2-->
	          		<li>
	          			<button class="btn btn-link" data-toggle="modal" data-target=".agregarDisp2">
							<img id="imagen2" width="60px" src="<?php echo base_url('img/socket.svg'); ?>" alt="Dispositivo2" >
						</button>
	          			<br>
	          			<span >Agregar</span>
	          		</li>
	          	</ul>
          </div>
        </div>
    </div>
	
</div>

<!-- Modal dispositivo2-->
<div class="modal fade agregarDisp2" role="dialog">
	<div class="modal-dialog" role="modal">
		<div class="modal-content">
			<!-- Header-->
			<div class="modal-header modal-blue" align="center">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Agregar Dispositivo 2</h4>
			</div>

			<!--body-->
			<div class="modal-body" align="center">											
				<form class="form-inline" method="POST" action="dispositivos/agregar">
					<div class="form-group">
						<input type="text" name="txtUbic" class="sr-only" value="<?php echo $ubicacion;?>">
						<input type="text" name="txtTipoD" class="sr-only" value="dispositivo2">
						<select id="combo" name="selTipoDisp" class="form-control" onchange="opcionOtro2(combo.value)">
							<option value="none">----</option>
							<option value="tv">TV</option>
							<option value="stereo">Stereo</option>
							<option value="lamp">Lampara</option>
							<option value="cooler">Ventilador</option>
							<option value="lavadora">Lavadora</option>
							<option value="joystick">Videojuego</option>
							<option value="otro">Otro</option>
						</select>

						<input type="text" id="otroD2" name="txtAgregarOtro" class="form-control" placeholder="Nombre del dispositivo" style="display:none;">
						<input type="submit" name="btnagregarDisp" value="Agregar" class="btn btn-success">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>