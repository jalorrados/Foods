<section class=" categorias fondocategoria">
	<div class="container mt-5 pt-4" id="navscrollstart">
		<div class="row mx-auto text-center">
			<div class="col-12">
				<div class="card" style="width: 18rem;">
				  <img class="card-img-top" src="<?= base_url()?>/assets/img/alimentacion_infantil.jpg" alt="Card image cap"><!--Imagenes de 286x180-->
				  <div class="card-body" style="padding: 1.25rem;">
				    <h5 class="card-title">Alimentación infantil</h5>
				    <p class="card-text">Aquí podrás encontrar recetas para bebés como purés, frutas o verduras hechas para los mas pequeños.</p>
				    <a href="<?= base_url() ?>listado?categoria=Alimentacion%20infantil" class="btn btn-primary"><?=$usuario["totalNumCategorias"][0]?> Recetas</a>
				  </div>
				</div>

				<div class="card" style="width: 18rem;">
				  <img class="card-img-top" src="<?= base_url()?>/assets/img/aperitivos_tapas.jpg" alt="Card image cap">
				  <div class="card-body" style="padding: 1.25rem;">
				    <h5 class="card-title">Aperitivos y tapas</h5>
				    <p class="card-text">Recetas de tapas deliciosas y sencillas para sorprender a familia o amigos.<br/>Platos variados y sencillos.</p>
				    <a href="<?= base_url() ?>listado?categoria=Aperitivos%20y%20tapas"  class="btn btn-primary"><?=$usuario["totalNumCategorias"][1]?> Recetas</a>
				  </div>
				</div>

				<div class="card" style="width: 18rem;">
				  <img class="card-img-top" src="<?= base_url()?>/assets/img/sopas_cremas.jpg" alt="Card image cap">
				  <div class="card-body" style="padding: 1.25rem;">
				    <h5 class="card-title">Sopas y cremas</h5>
				    <p class="card-text">Descubre las mejores sopas y cremas calientes y frías. Llega el frío y recetas triunfan, pásate a las cremas, sopas y entra en calor.</p>
				    <a href="<?= base_url() ?>listado?categoria=Sopas%20y%20cremas"  class="btn btn-primary"><?=$usuario["totalNumCategorias"][2]?> Recetas</a>
				  </div>
				</div>

				<div class="card" style="width: 18rem;">
				  <img class="card-img-top" src="<?= base_url()?>/assets/img/arroces_pastas.jpg" alt="Card image cap">
				  <div class="card-body" style="padding: 1.25rem;">
				    <h5 class="card-title">Arroces y pastas</h5>
				    <p class="card-text">Prepara la mejor pasta o los mejores arroces para coger energía.</p>
				    <a href="<?= base_url() ?>listado?categoria=Arroces%20y%20pastas"  class="btn btn-primary"><?=$usuario["totalNumCategorias"][3]?> Recetas</a>
				  </div>
				</div>

				<div class="card" style="width: 18rem;">
				  <img class="card-img-top" src="<?= base_url()?>/assets/img/potajes_cucharas.jpg" alt="Card image cap">
				  <div class="card-body" style="padding: 1.25rem;">
				    <h5 class="card-title">Potajes y platos de cuchara</h5>
				    <p class="card-text">Ricos potajes y los mejores platos de cuchara para disfrutar.</p>
				    <a href="<?= base_url() ?>listado?categoria=Potajes%20y%20platos de cuchara"  class="btn btn-primary"><?=$usuario["totalNumCategorias"][4]?> Recetas</a>
				  </div>
				</div>

				<div class="card" style="width: 18rem;">
				  <img class="card-img-top" src="<?= base_url()?>/assets/img/verduras_hortalizas.jpg" alt="Card image cap">
				  <div class="card-body" style="padding: 1.25rem;">
				    <h5 class="card-title">Verduras y hortalizas</h5>
				    <p class="card-text">Platos ligeros para una alimentación sana con productos de huerto.</p>
				    <a href="<?= base_url() ?>listado?categoria=Verduras%20y%20hortalizas"  class="btn btn-primary"><?=$usuario["totalNumCategorias"][5]?> Recetas</a>
				  </div>
				</div>

			</div>
		</div>
	</div>
</section>