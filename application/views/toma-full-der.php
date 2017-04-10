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
	          			<div class="row">
	          				<!--Editar-->
	          				<div class="widget-icons">
	          				  <a type="button" href="#" title="Editar Dispositivo 2" data-toggle="modal" data-target="#<?php echo $ubicacion.'ModalEditarDisp2';?>"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="right" title="Editar Dispositivo 2"></i></a>
	          				  &nbsp;
	          				  <!--Eliminar-->
	          				  <a class="delete" type="button" href="<?php echo site_url('dispositivos/eliminar/dispositivo2/'.$nombreD2.'/'.$ubicacion); ?>" title="Eliminar Dispositivo 2"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="left" title="Eliminar dispositivo 2"></i></a>
	          				</div>
	          			</div>
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

