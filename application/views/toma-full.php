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
	          			<a class="btn btn-link" href="<?php echo site_url('tomas/encender_apagar/'.$ubicacion.''); ?>" name="btnOnOff">
	          				<img id="imagen2" width="60px" src="<?php echo $imgD2;?>" alt="Dispositivo2" >
	          			</a>
	          			<br>
	          			<span ><?php echo $nombreD2;?></span>
	          		</li>
	          	</ul>
          </div>
        </div>
    </div>
	
</div>