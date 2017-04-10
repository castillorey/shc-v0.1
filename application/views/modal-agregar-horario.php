<!-- Modal Horarios-->
<div class="modal fade agregarHorario"  tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

			<div class="modal-header modal-light-blue" align="center">

				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Agregar Horario</h4>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2" align="">
						<form method="POST" action="horarios/agregar">

							<div class="form-group">
								<input  class="sr-only" type="text" name="txtUbicacionTomas" value="<?php echo $ubicacion;?>">
							</div>

							<div class="form-group ">
								<label>Día</label>
								<select id="comboDias" name="cmbDias" class="form-control" required>
									<option value="none">------</option>
									<option value="domingo">Domingo</option>
									<option value="lunes">Lunes</option>
									<option value="martes">Martes</option>
									<option value="miercoles">Miércoles</option>
									<option value="jueves">Jueves</option>
									<option value="viernes">Viernes</option>
									<option value="sabado">Sábado</option>
								</select>
							</div>		
							<div class="form-group">
								<label>Hora Inicio: </label>
								<input type="time" name="txtHoraInicio" class="form-control" required>
							</div>

							<div class="form-group">
								<label>Hora Fin: </label>
								<input type="time" name="txtHoraFin" class="form-control" required>
							</div>				

								<input type="submit" name="btnAgregrHorario" value="Agregar" class="btn btn-success" >	
						</form>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>