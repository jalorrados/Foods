<section class="perfil">
	<div class="backgroundPerfil" id="navscrollstart">
		<!--<div align="center mb-3 " style="margin-top: 4.5rem; padding-top: 1rem;">-->
		<h1 class="font-weight-bold mb-5 mt-5 text-center"><u>Perfil de Usuario</u></h1>
		<div class="row">

			<!--Datos personales-->

			<div class="col-15 col-md-6 mx-auto text-center">
				<h3 class="">Datos Personales</h3>
				
				<form action="<?=base_url()?>perfil/editarPerfil" name="editarPerfilForm" method="post" enctype="multipart/form-data">
					<div class="form-group col-12 col-md-5 mx-auto text-center">
						
						<label for="imgUser">Foto de perfil:</label><br>
						<img class="img-fluid rounded" id="previewImagenUser" style="width: 200px; height: 200px;" src="<?=base_url().$usuario['urlimagen'] ?>">
						<div class="input-group mt-2">
			                <label class="input-group-btn">
			                    <span class="btn btn-primary">
			                        Buscar <input type="file" style="display: none;" name="imgUser" id="imgUser" aria-describedby="fileHelp" accept=".jpg, .jpeg, .png" disabled>

			                    </span>
			                </label>
			                <input type="text" class="form-control botonfile" id="inputimgUser" readonly>
			            </div>
						<small id="fileHelp" class="form-text text-muted"><strong>Formatos válidos: jpg, jpeg y png.<br> Tamaño recomendado: 100x100.</strong></small><br>
					
						<label><strong>Email:</strong> <span id="perfilEmail" name="perfilEmail"><?= $usuario['email'] ?></span></label><br>

						<label><strong>Nombre y Apellidos:</strong><input type="text" class="form-control" value="<?= $usuario['apenom'] ?>" name="perfilNombre" id="perfilNombreId" disabled></label><br>

						<label><strong>Teléfono:</strong><input type="text" class="form-control" name="perfilTelefono" id="perfilTelefonoId" value="<?= $usuario['telefono'] ?>" disabled></label><br>
						<button type="button" class="btn btn-secondary" onclick="editarPerfil()" id="perfilEditar">Editar</button>
						<button type="button" class="btn btn-primary" id="perfilGuardar" onclick="editarGuardar()" disabled>Guardar Cambios</button>
						<a href="<?= base_url() ?>perfil/verRecetasUsuario"><button type="button" class="btn btn-primary mt-5" id="verRecetas">Ver todas tus recetas</button></a>
					</div>
				</form>
				<br><br>
				<p class="mx-xs-center text-xs-center"><strong>Valoración media:</strong></p>
				<div class="mx-auto mb-5 pb-5" id="rate" data-rateyo-rating="50%"></div><!--<div id="resultadoRating"></div>-->
			</div>

			<!--Crear receta-->

			
		</div>
	</div>
</section>