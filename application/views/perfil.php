<section class="perfil">
	<div class="backgroundPerfil" id="navscrollstart">
		<!--<div align="center mb-3 " style="margin-top: 4.5rem; padding-top: 1rem;">-->
			<h1 class="font-weight-bold mb-5 mt-5 text-center"><u>Perfil de Usuario</u></h1>
		<div class="row"> 
			<div class="col-15 col-md-6 mx-auto text-center">
				<h3 class="">Datos Personales</h3>
				
				<form action="<?=base_url()?>perfil/editarPerfil" name="editarPerfilForm" method="post" enctype="multipart/form-data">
					<div class="form-group col-12 col-md-5 mx-auto text-center">
						
						<label for="imgUser">Foto de perfil:</label><br>
						<img class="img-fluid rounded" id="previewImagenUser" style="width: 200px; height: 200px;" src="<?=base_url().$usuario['urlimagen'] ?>">
						<div class="input-group">
			                <label class="input-group-btn">
			                    <span class="btn btn-primary">
			                        Buscar <input type="file" style="display: none;" name="imgUser" id="imgUser" aria-describedby="fileHelp" accept=".jpg, .jpeg, .png" onchange="loadFileUser(event)" disabled>

			                    </span>
			                </label>
			                <input type="text" class="form-control botonfile" readonly>
			            </div>
						<small id="fileHelp" class="form-text text-muted"><strong>Formatos válidos: jpg, jpeg y png.<br> Tamaño recomendado: 100x100.</strong></small><br>
					
						<label><strong>Email:</strong> <span id="perfilEmail" name="perfilEmail"><?= $usuario['email'] ?></span></label><br>

						<label><strong>Nombre y Apellidos:</strong><input type="text" class="form-control" value="<?= $usuario['apenom'] ?>" name="perfilNombre" id="perfilNombreId" disabled></label><br>

						<label><strong>Teléfono:</strong><input type="text" class="form-control" name="perfilTelefono" id="perfilTelefonoId" value="<?= $usuario['telefono'] ?>" disabled></label><br>
						<button type="button" class="btn btn-secondary" onclick="editarPerfil()" id="perfilEditar">Editar</button>
						<button type="button" class="btn btn-primary" id="perfilGuardar" onclick="editarGuardar()" disabled>Guardar Cambios</button>
					</div>
				</form>
				<br><br>
				<p class="mx-xs-center text-xs-center"><strong>Valoración media:</strong></p>
				<div class="mx-auto mb-5 pb-5" id="rate" data-rateyo-rating="50%"></div><!--<div id="resultadoRating"></div>-->
			</div>
			<div class="col-12 col-md-5 mx-auto text-center">
				<h3 class="text-center">Crear nueva receta</h3>
				<form action="<?= base_url() ?>user/nuevaReceta" class="ml-3" method="post" enctype="multipart/form-data" accept-charset="utf-8">
					<!--falta poder elegir la categoria-->
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
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
						</select>
					</div>

		         	 <div class="form-group">
					    <label for="numIngredientes">Número de Ingredientes</label>
					    <select class="form-control" id="numIngredientes" onchange="numeroIngredientes()">
							<option>---</option>
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
						<label for="imgReceta">Añadir una foto:</label><br>
						<img class="img-fluid rounded" id="previewImagen">
						<div class="input-group">
			                <label class="input-group-btn">
			                    <span class="btn btn-primary">
			                        Buscar <input type="file" style="display: none;" name="imgReceta" id="imgReceta" aria-describedby="fileHelp" accept=".jpg, .jpeg, .png" onchange="loadFile(event)">

			                    </span>
			                </label>
			                <input type="text" class="form-control botonfile" readonly>
			            </div>

			            <!--<input type="file" class="form-control-file" name="imgReceta" id="imgReceta" aria-describedby="fileHelp" accept=".jpg, .jpeg, .png" onchange="loadFile(event)">-->
						<small id="fileHelp" class="form-text text-muted"><strong>Formatos válidos: jpg, jpeg y png.</strong></small><br>
						<button type="button" class="btn btn-warning mb-3" onclick="borrarPreview()" id="eliminarPreview" disabled>Eliminar Imagen Seleccionada</button>
					</div>
					
					<div class="row">
						<div class="form-group col-12 col-md-5 mx-auto">
							<label ><strong>Dificultad:</strong></label>
							<div class="btn-group" data-toggle="buttons">
							  <label class="btn btn-success active">
							    <input type="radio" name="dificultad" value="facil" autocomplete="off" checked> Fácil
							  </label>
							  <label class="btn btn-warning">
							    <input type="radio" name="dificultad" value="medio" autocomplete="off"> Medio
							  </label>
							  <label class="btn btn-danger">
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
</section>