<div class="col-md-4">
	<div class="panel panel-default">
		<div class="panel-heading">
          <!--Izquierda-->
          <div class="widget-icons pull-left">
            <a type="button" href="#" title="Agregar horario" data-toggle="modal" data-target=".agregarHorario"><i class="fa fa-calendar-plus-o"></i></a>
            &nbsp;
          </div>

           <!--Derecha-->
          <div class="widget-icons pull-right"> 
            
            <a class="delete" type="button" href="<?php echo site_url('tomas/eliminar/'.$ubicacion.''); ?>" title="Eliminar SHC"><i class="fa fa-trash-o"></i></a>
            &nbsp;
            <a type="button" href="<?php echo site_url('horarios/verificar/'.$ubicacion.''); ?>" title="Eliminar SHC"><i class="fa fa-check"></i></a>
          </div> 

          <div class="clearfix"></div>
        </div>