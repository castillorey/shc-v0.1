<!-- Modal tomas-->
<div class="modal fade agregarTomas " tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<!-- Header -->
			<div class="modal-header modal-green" align="center">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Agregar SHC</h4>
			</div>

			<!-- body -->
			<div align="center" class="modal-body">
				<form class="form-inline" method="POST" action="tomas/agregar">
					<div class="form-group">
						<input class="form-control"  type="text" name="txtUbicacion" placeholder="Zona de la casa" required pattern="|^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ0-9]*$|" title="No se permite: Simbolos ni espacios en blanco">
					</div>

					<div class="form-group">
						<input class="form-control" type="text" name="txtIdphoton"  placeholder="Id del toma" required  title="Ingrese un Id correcto.">
					</div>

					<div class="form-group">
						<input class="btn btn-success" type="submit" name="btnaAgregarToma" value="Agregar"/>
					</div>
				</form>
			</div>

			<!-- footer-->
			<div class="modal-footer">
				<form>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
				</form>
			</div>
		</div>
	</div>
</div>
