<section class="principal">
	
	<div class="imagen1 btn-group-vertical mt-5 mx-auto" id="navscrollstart">
		<?php if(empty($usuario["infoid"])):?>
			<p class="h2 text-white destacadas text-center mx-auto font-weight-bold"><u>No hay recetas destacadas</u></p>
		<?php else:?>
			<p class="h2 text-white destacadas text-center mx-auto font-weight-bold"><u>Recetas destacadas</u></p>
		<?php endif; ?>
		<div id="carouselExampleIndicators" class="carousel slide mx-auto" data-ride="carousel">
		  	<ol class="carousel-indicators">
			    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		  	</ol>
		  	<div class="carousel-inner">
		  		<?php for($i = 0; $i<count($usuario["infoid"]);$i++): ?>
		  			<?php if($i == 0):?>
				    	<div class="carousel-item active">
					<?php else:?>
						<div class="carousel-item">
					<?php endif; ?>
					<a href="<?= base_url() ?>receta?categoria=<?= $usuario['infoval'][$i][0]['categoria'] ?>&idReceta=<?= $usuario['idRecetasTop'][$i] ?>" class="text-black nosub">
				    		<img class="d-block w-100 img-fluid" src="<?= base_url(). $usuario['infoid'][$i][0]?>">
				    		<div class="carousel-caption d-none d-md-block">
						  	  <h5><?=$usuario["infoval"][$i][0]["nombre"]?></h5>
							</div>
				    	</div>
				    </a>
			    <?php endfor; ?>
		    	</div><!--class carousel item-->
		    </div><!--class carousel-inner-->
		</div>
	</div>

	<div class="text-center row align-content-center justify-content-center mx-auto pt-5">
			<div class="card col-xs-12 col-sm-12 col-md-3" style="width: 18rem; height: 25rem;">
			  <img class="card-img-top2 mx-auto" src="<?= base_url() ?>assets/img/icon1.svg" alt="Card image cap">
			  <div class="card-body2">
			    <h5 class="card-title">Crea receta</h5>
			    <p class="card-text">¿Tienes un especial talento en la cocina? Regístrate, publica tus propias recetas y ayuda a los demás usuarios con tus conocimientos sobre cocina comentando otras recetas.</p>
			  </div>
			</div>
			<div class="card col-xs-12 col-sm-12 col-md-3" style="width: 18rem; height: 25rem;">
			  <img class="card-img-top2 mx-auto" src="<?= base_url() ?>assets/img/icon2.svg" alt="Card image cap">
			  <div class="card-body2">
			    <h5 class="card-title">Puntúa otras recetas</h5>
			    <p class="card-text">Prueba las recetas creadas en nuestra página web, puntúalas para ayudar con tu valoración y hazlas populares en la web.</p>
			  </div>
			</div>
			<div class="card col-xs-12 col-sm-12 col-md-3" style="width: 18rem; height: 25rem;">
			  <img class="card-img-top2 mx-auto" src="<?= base_url() ?>assets/img/icon3.svg" alt="Card image cap">
			  <div class="card-body2">
			    <h5 class="card-title">Conocimientos de cocina</h5>
			    <p class="card-text">Viendo los comentarios de cada receta podrás ver consejos de otros usuarios para mejorar tu propia receta.</p>
			  </div>
			</div>
		</div>
	</div>

	<div class="imagen3 mx-auto align-content-center text-center text-white row" id="navscrollstart">
<!-- 		<span class="mx-auto">Prueba de texto</span><br/> -->
<!-- 		<span class="mx-auto text-white">Prueba de texto 2</span><br/><br/> -->
<!--		<button type="button" class="btn btn-primary mx-auto botones" style="width: 150px;">Prueba</button> -->
			<div style="width: 560px;" class="embed-responsive mx-auto embed-responsive-16by9 col-12 col-md-5 mb-2">
				<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/qkacq-0AOL4"  allowfullscreen ></iframe>
			</div>

			<div style="width: 560px;" class="embed-responsive mx-auto embed-responsive-16by9 col-12 col-md-5">
				<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/D7frGb0-TGk"  allowfullscreen ></iframe>
			</div>

	</div>

	<!-- <div class="imagen4 text-center row align-content-center justify-content-center mx-auto my-5">
	  <p class="h2 mx-auto col-12 ">Aviso legal</p>
	  <div class="col-12 mt-3">
	    <p class="card-text">Foods.com es una página registrada.</p>
	  </div>
	</div> -->

</section>
