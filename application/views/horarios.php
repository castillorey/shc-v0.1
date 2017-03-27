
<table class="table table-striped table-bordered">
  <thead>
  <tr>
  	<th>Día</th>
  	<th>Hora inicio</th>
  	<th>Hora fín</th>
  	<th>Ubicacion SHC</th>
  	<th>Acción</th>
  </tr>
  	
  </thead>

  <tbody>
  	
     <?php foreach ($horarios as $horario) { ?>
	  		<tr>
		  		<th><?echo $horario["dia"]; ?></th>
		  		<th><?echo $horario["hora_encendido"];?></th>
		  		<th><?echo $horario["hora_apagado"];?></th>
		  		<th><?echo $horario["ubicacionCajadetomas"];?></th>
		  		<th> <a class='delete' type='button' href= "<? echo site_url('horarios/eliminar/'.$horario['idhorario'].'')?>" title='Eliminar SHC'><i class='fa fa-trash-o'></i></a>
		  		</th>
	  		</tr>
	  	
	 <?php }?>
  	
  </tbody>
</table>
			