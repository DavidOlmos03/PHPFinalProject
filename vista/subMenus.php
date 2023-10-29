<!DOCTYPE html>
<html lang="en">
<!-- crud Modal HTML -->
<div id="crudModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="vistaTipoActor.php" method="post">
				<div class="modal-header">						
					<h4 class="modal-title">TipoActor</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Id</label>
						<input type="text" id="txtId" name="txtId" class="form-control" value="<?php echo $id ?>">
					</div>					
					<div class="form-group">
						<label>Nombre</label>
						<input type="text" id="txtNombre" name="txtNombre" class="form-control" value="<?php echo $nom ?>">
					</div>
					<div class="form-group">
						<input type="submit" id="btnGuardar" name="bt" class="btn btn-success" value="Guardar">
						<input type="submit" id="btnConsultar" name="bt" class="btn btn-success" value="Consultar">
						<input type="submit" id="btnModificar" name="bt" class="btn btn-warning" value="Modificar">
						<input type="submit" id="btnBorrar" name="bt" class="btn btn-warning" value="Borrar">
					</div>				
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Consultar, modificar, borrar (código HTML) -->
<div id="crudCB" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="vistaUsuarios.php" method="post">
				<div class="modal-header">						
					<h4 class="modal-title">Usuario</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Nombre</label>
						<input type="text" id="txtNombre" name="txtNombre" class="form-control" value="<?php echo $nom ?>">
					</div>
					<div class="form-group">
						<input type="submit" id="btnConsultar" name="bt" class="btn btn-success" value="Consultar">
						<input type="submit" id="btnBorrar" name="bt" class="btn btn-warning" value="Borrar">
					</div>				
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					
				</div>
			</form>
		</div>
	</div>
</div>