<div class="fondoReceta">
	<div class="container mt-5 pt-3 mb-3" id="navscrollstart">
		<!--<div aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a  class="text-black" href="<?= base_url() ?>categorias">Categorias</a></li>
				<li class="breadcrumb-item"><a  class="text-black" href="<?= base_url() ?>listado?categoria=<?= $usuario["categoriaurl"] ?>"><?= $usuario["categoria"] ?></a></li>
				<li class="breadcrumb-item active" aria-current="page">Receta</li>
			</ol>
		</div>-->
		<div class="breadcrumb flat breadcrumbstyle">
	  		<a href="<?= base_url() ?>categorias">Categorias</a>
	    	<a  class="text-black" href="<?= base_url() ?>listado?categoria=<?= $usuario["categoriaurl"] ?>"><?= $usuario["categoria"] ?></a>
	    	<a class="activebreadcrumb" href="#">Receta</a>
	 	</div>
		<div class="rounded pb-3 mb-3" style="border: 1px solid black; background-color: white;">
			<div class="row">
				<h3 class="text-center col-12"><u><?= $usuario["receta"]->nombre ?></u></h3>
				<?php if($usuario["receta"]->urlimagen == "assets/img/noimage.jpg"):?>
                   <img src="<?=base_url().$usuario["receta"]->urlimagen?>assets/img/b2.jpg" class="mx-auto align-content-center justify-content-center rounded imagenreceta">
                <?php else:?>
                  <img src="<?=$usuario["receta"]->urlimagen?>" class="mx-auto align-content-center justify-content-center rounded imagenreceta">
                <?php endif; ?>
			</div>
			<div class="text-white text-center mt-2 mx-3" style="background-color: gray;">Ingredientes</div>
			
			<ul class="list-group mx-3">
				<?php for($i = 0; $i <count($usuario["nombreIngredientes"]); $i++):?>
					<li class="list-group-item"><?=$usuario["datosIngredientes"][$i]->cantidad." ".$usuario["datosIngredientes"][$i]->unidades." de ".$usuario["nombreIngredientes"][$i]->nombre?></li>
				<?php endfor; ?>
				<!--<li class="list-group-item">Ingrediente 2</li>
				<li class="list-group-item">Ingrediente 3</li>
				<li class="list-group-item">Ingrediente 4</li>
				<li class="list-group-item">Ingrediente 5</li>
				<li class="list-group-item">Ingrediente 6</li>
				<li class="list-group-item">Ingrediente 7</li>-->
			</ul>

			<div class="text-white text-center mt-2 mx-3" style="background-color: gray;">Preparación</div>

			<p class="mx-3"><?= $usuario["receta"]->preparacion ?></p>
			<div class="mx-auto col-12" id="rate2"></div>
		</div>
		<h3>Añade un comentario</h3>
		<form name="formComentario" action="comentario/crearComentario" method="post" accept-charset="utf-8">
			<input type="text" class="form-control mb-1" name="tituloComentario" placeholder="Escriba un título">
			<textarea name="comentario" class="form-control mb-1" rows="3" placeholder="Escriba el comentario"></textarea>
			<input type="button" class="btn btn-secondary" value="Enviar" onclick="enviarComentario()">
		</form>
		 <div class="row">
        <div class="col-12 mt-5 mb-3 my-3">
            <div class="media">
              <div class="media-left">
                <a href="#">
                  <img class="media-object imgComentarios" src="<?= base_url() ?>assets/img/avatar.png">
                </a>
              </div>
              <div class="media-body ml-3">
                <h4 class="media-heading">Media heading</h4>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
              </div>
            </div>
        </div>
        <hr width="100%" color="black"/>
        <div class="col-12 my-3">
            <div class="media">
              <div class="media-left">
                <a href="#">
                  <img class="media-object imgComentarios" src="<?= base_url() ?>assets/img/avatar.png">
                </a>
              </div>
              <div class="media-body ml-3">
                <h4 class="media-heading">Media heading</h4>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
              </div>
            </div>
        </div>
    </div>
	</div>
</div>

<script type="text/javascript">
	
//JQuery
$(function () {
 
 	$("#rate2").rateYo({
		spacing   : "5px",
    	
    	multiColor: {
 
    		"startColor": "#FF0000", 
    		"endColor"  : "#F5F209"  
    	},

    	onSet: function (rating) {
 			//$("#resultadoRating").text(rating);
	    	alert("Rating is set to: " + rating);
	    }
	});

});

</script>