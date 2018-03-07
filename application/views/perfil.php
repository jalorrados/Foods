<div class="container" style="margin-top: 5rem;">
	<div align="center">
		<h1><u><strong>Perfil de Usuario</strong></u></h1>
	</div>
	<div class="row">
		<div class="col-8">
			<h3>Datos Personales</h3>
			<label><strong>Nombre y Apelldos:</strong> <span id="username">David</span></label><br>
			<label><strong>Email:</strong> <span id="username">a@gmail.com</span></label><br>
			<label><strong>Teléfono:</strong> <span id="username">915587521</span></label>
		</div>
		<div class="col-4">
			<h3>Crear nueva receta</h3>
			<form action="<?= base_url() ?>user/nuevaReceta" method="post" enctype="multipart/form-data" accept-charset="utf-8">
				<div class="form-group">
	            	<label for="nombreReceta" class="col-form-label">Nombre:</label>
	            	<input type="text" class="form-control" id="nombreReceta" name="nombreReceta">
	         	</div>

	         	<div class="form-group">
	            	<label for="preparacionReceta" class="col-form-label">Preparación:</label>
	            	<textarea class="form-control" name="preparacionReceta" id="preparacionReceta" rows="3"></textarea>
	         	</div>

	         	 <div class="form-group">
				    <label for="numReceta">Número de personas</label>
				    <select class="form-control" id="numReceta">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
				</div>

	         	<div class="form-group">
					<label for="imgReceta">Añadir una foto:</label>
					<input type="file" class="form-control-file" name="imgReceta" id="imgReceta" aria-describedby="fileHelp">
					<small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input.</small>
				</div>
			</form>
		</div>
	</div>
</div>