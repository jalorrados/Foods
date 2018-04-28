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
			    <h5 class="card-title">Prueba de texto</h5>
			    <p class="card-text">We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components.</p>
			  </div>
			</div>
			<div class="card col-xs-12 col-sm-12 col-md-3" style="width: 18rem; height: 25rem;">
			  <img class="card-img-top2 mx-auto" src="<?= base_url() ?>assets/img/icon2.svg" alt="Card image cap">
			  <div class="card-body2">
			    <h5 class="card-title">Prueba de texto</h5>
			    <p class="card-text">We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components.</p>
			  </div>
			</div>
			<div class="card col-xs-12 col-sm-12 col-md-3" style="width: 18rem; height: 25rem;">
			  <img class="card-img-top2 mx-auto" src="<?= base_url() ?>assets/img/icon3.svg" alt="Card image cap">
			  <div class="card-body2">
			    <h5 class="card-title">Prueba de texto</h5>
			    <p class="card-text">We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components.</p>
			  </div>
			</div>
		</div>
	</div>

	<div class="imagen3 text-white" id="navscrollstart">
<!-- 		<span class="mx-auto">Prueba de texto</span><br/> -->
<!-- 		<span class="mx-auto text-white">Prueba de texto 2</span><br/><br/> -->
<!--		<button type="button" class="btn btn-primary mx-auto botones" style="width: 150px;">Prueba</button> -->
			<iframe width="560" height="315" src="https://www.youtube.com/embed/qkacq-0AOL4" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen style="margin-right: 260px;"></iframe>
			<iframe width="560" height="315" src="https://www.youtube.com/embed/D7frGb0-TGk" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
	</div>

	<div class="imagen4 text-center row align-content-center justify-content-center mx-auto my-5">
	  <p class="h2 mx-auto col-12 ">Acerca de</p>
	  <div class="col-12 mt-3">
	    <p class="card-text">We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components.</p>
	  </div>
	</div>

</section>
