<!-- Modal dispositivo1-->
<div class="modal fade" id="<?php echo $ubicacion."ModalEditarDisp1";?>" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<!-- Header-->
			<div class="modal-header modal-blue" align="center">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Editar Dispositivo 1</h4>
			</div>

			<!--body-->
			<div class="modal-body" align="center">											
				<form class="form-inline" method="POST" action="dispositivos/editar">
					<div class="form-group">
						<input type="text" name="txtUbic" class="sr-only" value="<?php echo $ubicacion;?>">
						<input type="text" name="txtTipoD" class="sr-only" value="dispositivo1">
						<select id="combo" name="selTipoDisp" class="form-control" onchange="opcionOtro1(combo.value)">
							<option value="none">----</option>
							<option value="tv">TV</option>
							<option value="estereo">Estereo</option>
							<option value="lampara">Lampara</option>
							<option value="ventilador">Ventilador</option>
							<option value="lavadora">Lavadora</option>
							<option value="micro">Micro Ondas</option>
							<option value="videojuego">Videojuego</option>
							<option value="otro">Otro</option>
						</select>

						<input type="text" id="<?php echo $ubicacion;?>otroD1" name="txtAgregarOtro" class="form-control" placeholder="Nombre del dispositivo" style="display:none;">
						<input type="submit" name="btnagregarDisp" value="Agregar" class="btn btn-success">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function opcionOtro1(opcion){
		switch	(opcion){

				case "otro":
					document.getElementById("<?php echo $ubicacion;?>otroD1").style.display = "inline";
				break;

				default:
					document.getElementById("<?php echo $ubicacion;?>otroD1").style.display = "none";

			}
	}
</script>