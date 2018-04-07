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
                  <img src="<?=base_url().$usuario["receta"]->urlimagen?>" class="mx-auto align-content-center justify-content-center rounded imagenreceta">
                <?php endif; ?>
			</div>

			<div class="form-group col-12 col-md-5 mx-auto mt-2 text-center">
				<label ><strong>Dificultad:</strong></label>
				<div class="btn-group" data-toggle="buttons">
				<?php if($usuario["receta"]->dificultad == "facil"):?>
				  <label class="btn btn-success active">
				    <input type="radio"  value="facil" autocomplete="off" checked> Fácil
				  </label>
				<?php elseif($usuario["receta"]->dificultad == "medio"):?>
				  <label class="btn btn-warning active">
				    <input type="radio"  value="medio" autocomplete="off" checked> Medio
				  </label>
				<?php else:?>
				  <label class="btn btn-danger active">
				    <input type="radio"  value="dificil" autocomplete="off" checked> Difícil
				  </label>
				<?php endif; ?>
				</div>
			</div>

			<div class="text-white text-center mt-2 mx-3" style="background-color: gray;">Ingredientes</div>
			
			<ul class="list-group mx-3">
				<?php for($i = 0; $i <count($usuario["nombreIngredientes"]); $i++):?>
					<li class="list-group-item"><?=$usuario["datosIngredientes"][$i]->cantidad." ".$usuario["datosIngredientes"][$i]->unidades." de ".$usuario["nombreIngredientes"][$i]->nombre?></li>
				<?php endfor; ?>
			</ul>

			<div class="text-white text-center mt-2 mx-3" style="background-color: gray;">Preparación</div>

			<p class="mx-3"><?= $usuario["receta"]->preparacion ?></p>

			<div class="mx-auto col-12" id="rate2"></div>
			<!--<div class="mx-auto col-12" id="rate2"></div>-->
		</div>
		<?php if(empty($_SESSION)):?>
			<h4>Debes estar registrado para poder dejar un comentario</h4>
		<?php else:?>
			<h3>Añade un comentario</h3>
			<form name="formComentario" action="receta/crearComentario" method="post" accept-charset="utf-8">
				<input type="text" class="form-control mb-1" name="tituloComentario" id="IdTituloComentario" placeholder="Escriba un título"><small id="errorTitulo" style="visibility: hidden;" class="form-text text-danger">Titulo no válido</small>
				<textarea name="descripcionComentario" id="IdDescripcionComentario" class="form-control mb-1" rows="3" placeholder="Escriba el comentario"></textarea><small id="errorComentario" style="visibility: hidden;" class="form-text text-danger">Comentario no válido.</small>
				<input type="hidden" name="recetaId" value="<?=$usuario["id_receta"]?>">
				<input type="button" class="btn btn-secondary" value="Enviar" onclick="enviarComentario()">
			</form>
		<?php endif; ?>
		<div class="row">

		<?php $cont =0?>
		<?php foreach($usuario["valoraciones"] as $valoracion): ?>
	        <div class="col-12 mt-5 mb-3 my-3">
	            <div class="media">
	              <div class="media-left">
	                <a href="#">
	                	<?php for($i = 0; $i <count($usuario["usuarios"]); $i++):?>
							<img class="media-object imgComentarios" src="<?= base_url().$usuario["usuarios"][$cont]->urlimagen ?>">
							<?php $cont++ ?>
							<?php break;?>
						<?php endfor; ?>
	                </a>
	              </div>
	              <div class="media-body ml-3">
	                <h4 class="media-heading"><?=$valoracion["titulo"]?></h4>
	                <?=$valoracion["descripcion"]?>
	              </div>
	            </div>
	        </div>
	        <hr width="100%" color="black"/>
	        <!--<div class="col-12 my-3">
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
	        </div>-->
		<?php endforeach; ?>
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