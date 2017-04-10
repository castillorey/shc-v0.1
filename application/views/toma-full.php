        <div class="panel-body">
          <div class="toma-box">
	          	<div class="superior">
	          		<h3><?php echo $ubicacion;?></h3>
	          	</div>
	          	<!-- Dispositivos-->
	          	<ul>
	          		<!-- Dispositivo 1-->
	          		<li>
	          			<div class="row prueba">
	          				<!--Editar-->
	          				<div class="widget-icons">
	          				  <a type="button" href="#" title="Editar Dispositivo 1" data-toggle="modal" data-target="#<?php echo $ubicacion.'ModalEditarDisp1';?>"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="right" title="Editar dispositivo 1"></i></a>
	          				  &nbsp;
	          				  <!--Eliminar-->
	          				  <a class="delete" type="button" href="<?php echo site_url('dispositivos/eliminar/dispositivo1/'.$nombreD1.'/'.$ubicacion); ?>" title="Eliminar Dispositivo 1"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="left" title="Eliminar Dispositivo 1"></i></a>
	          				</div>
	          			</div>

	          			<a class="btn btn-link" href="<?php echo site_url('tomas/encender_apagar/'.$ubicacion.''); ?>" name="btnOnOff">
	          				<img id="imagen1" width="60px" src="<?php echo $imgD1;?>" alt="Dispositivo1" >
	          			</a>
	          			<br>
	          			<span><?php echo $nombreD1;?></span>
	          		</li>

	          		<!-- Dispositivo 2-->
	          		<li>
	          			<div class="row">
	          				<!--Editar-->
	          				<div class="widget-icons">
	          				  <a type="button" href="#" title="Editar Dispositivo 2" data-toggle="modal" data-target="#<?php echo $ubicacion.'ModalEditarDisp2';?>"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="right" title="Editar dispositivo 2"></i></a>
	          				  &nbsp;
	          				  <!--Eliminar-->
	          				  <a class="delete" type="button" href="<?php echo site_url('dispositivos/eliminar/dispositivo2/'.$nombreD2.'/'.$ubicacion); ?>" title="Eliminar Dispositivo 2"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="left" title="Eliminar Dispositivo 2"></i></a>
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