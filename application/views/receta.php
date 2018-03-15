<div class="container mt-5 pt-3 mb-3">
	<div class="rounded pb-3" style="border: 1px solid black; ">
		<div class="row">
			<h3 class="text-center col-12">Titulo de la receta</h3>
			<img src="<?=base_url()?>assets/img/arroces_pastas.jpg" class="mx-auto align-content-center justify-content-center">
		</div>
		<div class="text-white text-center mt-2 mx-3" style="background-color: gray;">Ingredientes</div>
		
		<ul>
			<li>1</li>
			<li>2</li>
			<li>3</li>
			<li>4</li>
			<li>5</li>
			<li>6</li>
			<li>7</li>
		</ul>

		<div class="text-white text-center mt-2 mx-3" style="background-color: gray;">Preparación</div>

		<p class="mx-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		<div class="mx-auto col-12" id="rate2"></div>
	</div>
	<h3>Añade un comentario</h3>
	<form name="formComentario" action="receta_submit" method="get" accept-charset="utf-8">
		<textarea name="comentario" class="form-control" rows="3" placeholder="Escriba el comentario"></textarea>
		<input type="button" name="" value="Enviar" onclick="enviarComentario()">
	</form>
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