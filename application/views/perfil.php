<section class="perfil">
	<div class="backgroundPerfil" id="navscrollstart">
		<!--<div align="center mb-3 " style="margin-top: 4.5rem; padding-top: 1rem;">-->
			<h1 class="font-weight-bold mb-5 mt-5 text-center"><u>Perfil de Usuario</u></h1>
		<div class="row"> 
			<div class="col-12 col-md-3 mx-auto text-center">
				<h3 class="">Datos Personales</h3>
				<label><strong>Email:</strong> <span id="perfilEmail" name="perfilEmail">a@gmail.com</span></label><br>
				<form action="<?= base_url() ?>user/editarPerfil" method="post" accept-charset="utf-8">
					<div class="form-group">
						<label><strong>Nombre y Apellidos:</strong><input type="text" class="form-control" name="perfilNombre" id="perfilNombre" disabled></label><br>
						<label><strong>Teléfono:</strong><input type="text" class="form-control" name="perfilTelefono" id="perfilTelefono" disabled></label><br>
						<button type="button" class="btn btn-secondary" onclick="editarPerfil()" id="perfilEditar">Editar</button>
						<button type="button" class="btn btn-primary" id="perfilGuardar" onclick="editarGuardar()" disabled>Guardar Cambios</button>
					</div>
				</form>
				<br><br>
				<p class="mx-xs-center text-xs-center"><strong>Valoración media:</strong></p>
				<div class="mx-auto" id="rate" data-rateyo-rating="50%"></div><!--<div id="resultadoRating"></div>-->
			</div>
			<div class="col-12 col-md-4 mx-auto text-center">
				<h3 class="text-center">Crear nueva receta</h3>
				<form action="<?= base_url() ?>user/nuevaReceta" class="ml-3" method="post" enctype="multipart/form-data" accept-charset="utf-8">
					<div class="form-group">
		            	<label for="nombreReceta" class="col-form-label">Nombre:</label>
		            	<input type="text" class="form-control" id="nombreReceta" name="nombreReceta">
		         	</div>

		         	<div class="form-group">
		            	<label for="preparacionReceta" class="col-form-label">Preparación:</label>
		            	<textarea class="form-control" name="preparacionReceta" id="preparacionReceta" rows="3"></textarea>
		         	</div>

		         	<div class="form-group">
					    <label for="numPersonas">Número de Personas</label>
					    <select class="form-control" id="numPersonas">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>
					</div>

		         	 <div class="form-group">
					    <label for="numIngredientes">Número de Ingredientes</label>
					    <select class="form-control" id="numIngredientes" onchange="numeroIngredientes()">
							<option>---</option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
							<option>6</option>
							<option>7</option>
							<option>8</option>
							<option>9</option>
							<option>10</option>
							<option>11</option>
							<option>12</option>
							<option>13</option>
							<option>14</option>
							<option>15</option>
						</select>
					</div>

					<div class="form-group" id="ingredientes"></div>

		         	<div class="form-group">
						<label for="imgReceta">Añadir una foto:</label><br>
						<img class="img-fluid rounded" id="previewImagen">
						<div class="input-group">
			                <label class="input-group-btn">
			                    <span class="btn btn-primary">
			                        Browse&hellip; <input type="file" style="display: none;" name="imgReceta" id="imgReceta" aria-describedby="fileHelp" accept=".jpg, .jpeg, .png" onchange="loadFile(event)">

			                    </span>
			                </label>
			                <input type="text" class="form-control botonfile" readonly>
			            </div>

			            <!--<input type="file" class="form-control-file" name="imgReceta" id="imgReceta" aria-describedby="fileHelp" accept=".jpg, .jpeg, .png" onchange="loadFile(event)">-->
						<small id="fileHelp" class="form-text text-muted"><strong>Formatos válidos: jpg, jpeg y png.</strong></small><br>
						<button type="button" class="btn btn-warning" onclick="borrarPreview()" id="eliminarPreview" disabled>Eliminar Imagen Seleccionada</button>
					</div>

					<button type="button" class="btn btn-primary mb-5" id="crearRecete" onclick="crearReceta()">Crear Receta</button>
				</form>
			</div>
	</div>
</section>