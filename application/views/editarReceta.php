<section class="perfil">
	<div class="backgroundPerfil" id="navscrollstart">
		<div class="row">
			<div class="col-12 col-md-5 mx-auto text-center">
				<h1 class="font-weight-bold mb-5 mt-5 text-center"><u>Editar Receta</u></h1>
				<form action="<?= base_url() ?>Receta/postEditarReceta" class="ml-3" method="post" name="crearRecetaForm" enctype="multipart/form-data" accept-charset="utf-8">
					<input type="hidden" name="idRecetaEscondido" value="<?=$usuario["receta"]->id?>">
					<div class="form-group">
			        	<label for="nombreReceta" class="col-form-label">Nombre:</label>
			        	<input type="text" class="form-control" id="nombreReceta" name="nombreReceta" value="<?=$usuario["receta"]->nombre?>">
			     	</div>

			     	<div class="form-group">
			        	<label for="preparacionReceta" class="col-form-label">Preparación:</label>
			        	<textarea class="form-control" name="preparacionReceta" id="preparacionReceta" rows="3" ><?=$usuario["receta"]->preparacion?></textarea>
			     	</div>

			     	<div class="form-group">
					    <label for="numPersonas">Número de Personas</label>
					   <select class="form-control" name="numPersonas" id="numPersonas">
							<?php
								for ($i=1; $i < 10; $i++) { 
									if ($i == $usuario["receta"]->numpersonas) {
										echo "<option selected value='".$i."'>".$i."</option>";
									}else{
										echo "<option value='".$i."'>".$i."</option>";
									}
								}
							?>
						</select> 
					    
					</div>
			     	<div class="form-group">
					    <label for="numIngredientes">Número de Ingredientes</label>
					   <input type="button" class="w-100 btn btn-primary" value="Añadir Ingrediente" onclick="numeroIngredientes2()">
					</div>

					<div class="form-group" id="ingredientes">
						<?php
							$unidades=["Unidades","Kilos","Gramos","Cucharadas","Litros","Mililitros","Tazas"];
								for ($i=0; $i < $usuario["numing"]; $i++) { 
									echo "<div class='form-inline' style='margin-bottom:5px;'>";
									echo '<input type="text" value="'.$usuario["nombreIngredientes"][$i]->nombre.'" placeholder="Ingrediente" style="width: 200px;" class="form-control" id="ingrediente'.$i.'" name="ingrediente'.$i.'">'.
								'<input type="number" min="0" max="999" value='.$usuario["datosIngredientes"][$i]->cantidad.' placeholder="Cantidad" style="width: 110px;" class="form-control" id="cantidad'.$i.'" name="cantidad'.$i.'">'.
								'<select class="form-control" id="unidad'.$i.'" name="unidad'.$i.'"><option>---</option>';

									for ($j=0; $j < count($unidades); $j++) { 
										if ($unidades[$j]==$usuario["datosIngredientes"][$i]->unidades) {
											echo "<option selected>".$unidades[$j]."</option>";
										} else {
											echo "<option>".$unidades[$j]."</option>";
										}
										
									}
								
								echo "</select></div>";
								}
						?>
					</div>

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
								<?php if($usuario["receta"]->dificultad == "facil"):?>
									<label class="btn btn-success noactive active">
									  <input type="radio" name="dificultad" value="facil" autocomplete="off" checked> Fácil
									</label>
									<label class="btn btn-warning noactive">
									  <input type="radio" name="dificultad" value="medio" autocomplete="off"> Medio
									</label>
									<label class="btn btn-danger noactive">
									  <input type="radio" name="dificultad" value="dificil" autocomplete="off"> Difícil
									</label>
								<?php elseif($usuario["receta"]->dificultad == "medio"):?>
									<label class="btn btn-success noactive">
									  <input type="radio" name="dificultad" value="facil" autocomplete="off"> Fácil
									</label>
									<label class="btn btn-warning noactive active">
									  <input type="radio" name="dificultad" value="medio" autocomplete="off" checked> Medio
									</label>
									<label class="btn btn-danger noactive">
									  <input type="radio" name="dificultad" value="dificil" autocomplete="off"> Difícil
									</label>

								<?php else:?>
									<label class="btn btn-success noactive">
									  <input type="radio" name="dificultad" value="facil" autocomplete="off"> Fácil
									</label>
									<label class="btn btn-warning noactive">
									  <input type="radio" name="dificultad" value="medio" autocomplete="off"> Medio
									</label>
									<label class="btn btn-danger noactive active">
									  <input type="radio" name="dificultad" value="dificil" autocomplete="off" checked> Difícil
									</label>
								<?php endif; ?>
							  
							</div>
						</div>
						<div class="form-group col-12 col-md-5 mx-auto">
							<label for="categoriaReceta" class="form-label"><strong>Categoría</strong></label>

						    <select class="form-control" id="categoriaReceta" name="categoriaReceta">
						    	<?php
						    		$categorias = ["Alimentacion infantil","Aperitivos y tapas","Sopas y cremas","Arroces y pastas","Potajes y platos de cuchara","Verduras y hortalizas"];
						    		$categ=["infantil","tapas","sopas","pastas","potajes","verduras"];

									for ($i=0; $i < 6; $i++) { 
										if ($categ[$i] == $usuario["receta"]->categoria) {
											echo "<option selected value='".$categ[$i]."'>".$categorias[$i]."</option>";
										}else{
											echo "<option value='".$categ[$i]."'>".$categorias[$i]."</option>";
										}
									}
								?>
							</select>
						</div>
					</div>
					<br>
					<button type="button" class="btn btn-primary mb-5" id="crearRecete" onclick="editReceta()">Editar Receta</button>
				</form>
			</div>
		</div>
	</div>
</section>