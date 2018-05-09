<section class="perfil">
	<div class="backgroundPerfil" id="navscrollstart">
		<div class="row">
			<div class="col-12 col-md-5 mx-auto text-center">
				<h1 class="font-weight-bold mb-5 mt-5 text-center"><u>Nueva Receta</u></h1>
				<form action="<?= base_url() ?>crearReceta/nuevaReceta" class="ml-3" method="post" name="crearRecetaForm" enctype="multipart/form-data" accept-charset="utf-8">
					<div class="form-group">
			        	<label for="nombreReceta" class="col-form-label">Nombre:</label>
			        	<input type="text" class="form-control" id="nombreReceta" name="nombreReceta">
			     	</div>

			     	<div class="form-group">
			        	<label for="preparacionReceta" class="col-form-label">Preparación:</label>
			        	<textarea class="form-control" name="preparacionReceta" id="preparacionReceta" rows="3" ></textarea>
			     	</div>

			     	<div class="form-group">
					    <label for="numPersonas">Número de Personas</label>
					    <select class="form-control" name="numPersonas" id="numPersonas">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
						</select>
					</div>

			     	<div class="form-group">
					    <label for="numIngredientes">Número de Ingredientes</label>
					    <select class="form-control" name="numIngredientes" id="numIngredientes" onchange="numeroIngredientes()">
							<option value="---">---</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
							<option value="13">13</option>
							<option value="14">14</option>
							<option value="15">15</option>
						</select>
					</div>

					<div class="form-group" id="ingredientes"></div>

			     	<div class="form-group">
						<label>Añadir una foto:</label><br>
						<img class="img-fluid rounded" id="previewImagen">
						<div class="input-group">
			                <label class="input-group-btn">
			                    <span class="btn btn-primary">
			                        Buscar <input type="file" style="display: none;" name="imgReceta" id="imgReceta" aria-describedby="fileHelp" accept=".jpg, .jpeg, .png">

			                    </span>
			                </label>
			                <input type="text" class="form-control botonfile" id="inputimgReceta" readonly>
			            </div>
						<small id="fileHelp" class="form-text text-muted"><strong>Formatos válidos: jpg, jpeg y png.</strong></small><br>
						<button type="button" class="btn btn-warning mb-3" onclick="borrarPreview()" id="eliminarPreview" disabled>Eliminar Imagen Seleccionada</button>
					</div>
								
					<div class="row">
						<div class="form-group col-12 col-md-5 mx-auto">
							<label ><strong>Dificultad:</strong></label>
							<div class="btn-group" data-toggle="buttons">
							  <label class="btn btn-success noactive active">
							    <input type="radio" name="dificultad" value="facil" autocomplete="off" checked> Fácil
							  </label>
							  <label class="btn btn-warning noactive">
							    <input type="radio" name="dificultad" value="medio" autocomplete="off"> Medio
							  </label>
							  <label class="btn btn-danger noactive">
							    <input type="radio" name="dificultad" value="dificil" autocomplete="off"> Difícil
							  </label>
							</div>
						</div>
						<div class="form-group col-12 col-md-5 mx-auto">
							<label for="categoriaReceta" class="form-label"><strong>Categoría</strong></label>
						    <select class="form-control" id="categoriaReceta" name="categoriaReceta">
								<option value="infantil">Alimentacion infantil</option>
								<option value="tapas">Aperitivos y tapas</option>
								<option value="sopas">Sopas y cremas</option>
								<option value="pastas">Arroces y pastas</option>
								<option value="potajes">Potajes y platos de cuchara</option>
								<option value="verduras">Verduras y hortalizas</option>
							</select>
						</div>
					</div>
					<br>
					<button type="button" class="btn btn-primary mb-5" id="crearRecete" onclick="crearReceta()">Crear Receta</button>
				</form>
			</div>
		</div>
	</div>
</section>