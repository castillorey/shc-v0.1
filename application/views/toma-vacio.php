        <div class="panel-body">
          <div class="toma-box">
	          	<div class="superior">
	          		<h3><?php echo $ubicacion;?></h3>
	          	</div>
	          	<!-- Dispositivos-->
	          	<ul>
	          		<!-- Dispositivo 1-->
	          		<li>
	          			<button class="btn btn-link" data-toggle="modal" data-target="#<?php echo $ubicacion.'ModalDisp1';?>">
							<img id="imagen1" width="60px" src="<?php echo base_url('img/socket.svg'); ?>" alt="Dispositivo1" >
						</button>
	          			<br>
	          			<span>Agregar</span>
	          		</li>

	          		<!-- Dispositivo 2-->
	          		<li>
	          			<button class="btn btn-link" data-toggle="modal" data-target="#<?php echo $ubicacion.'ModalDisp2';?>">
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



