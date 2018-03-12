$('nav').affix({
    offset: {
     	top: $('#navscrollstart').offset().top
    }
});

function login(){
	loginform.submit();
}

function editarPerfil(){
	document.getElementById("perfilNombre").disabled = false;
	document.getElementById("perfilTelefono").disabled = false;
	document.getElementById("perfilGuardar").disabled = false;
}

function editarGuardar(){
	document.getElementById("perfilNombre").disabled = true;
	document.getElementById("perfilTelefono").disabled = true;
	document.getElementById("perfilGuardar").disabled = true;
}

function numeroIngredientes(){
	var numSeleccionado = document.getElementById("numIngredientes");
	var divCantidad = document.getElementById("ingredientes");
	divCantidad.innerHTML = "";

	if (numSeleccionado.value != "---") {
		for (var i = 0; i < numSeleccionado.value; i++) {
			var divv = document.createElement("div");
			divv.setAttribute("class","form-inline");
			divv.style.marginBottom="5px";
			divv.innerHTML +='<input type="text" placeholder="Ingrediente" style="width: 200px;" class="form-control" id="ingrediente'+numSeleccionado.value+'" name="ingrediente'+numSeleccionado.value+'">'+
			'<input type="number" min="0" max="999" placeholder="Cantidad" style="width: 110px;" class="form-control" id="cantidad'+numSeleccionado.value+'" name="cantidad'+numSeleccionado.value+'">'+
			'<select class="form-control" name="tipoingrediente"><option>Unidades</option><option>Kilos</option><option>Gramos</option><option>Cucharadas</option><option>Litros</option><option>Mililitros</option><option>Tazas</option></select>';
			
			divCantidad.appendChild(divv);
		}
	}
}

function loadFile(event) {
	var boton = document.getElementById('eliminarPreview');
	boton.disabled = false;

	var output = document.getElementById('previewImagen');
	output.src = URL.createObjectURL(event.target.files[0]);
};

function borrarPreview(){
	var img = document.getElementById("previewImagen");
	var imginput = document.getElementById("imgReceta");
	var boton = document.getElementById('eliminarPreview');
	boton.disabled = true;
	img.src=" ";
	imginput.value = "";
}


//JQuery
$(function () {
 
 	$("#rate").rateYo({
		spacing   : "5px",
    	readOnly: true,//solo lectura
    	multiColor: {
 
    		"startColor": "#FF0000", 
    		"endColor"  : "#F5F209"  
    	},

    	/*onSet: function (rating) {
 			//$("#resultadoRating").text(rating);
	    	alert("Rating is set to: " + rating);
	    }*/
	});

});

$(function() {

  // We can attach the `fileselect` event to all file inputs on the page
  $(document).on('change', ':file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
  });

  // We can watch for our custom `fileselect` event like this
  $(document).ready( function() {
      $(':file').on('fileselect', function(event, numFiles, label) {

          var input = $(this).parents('.input-group').find(':text'),
              log = numFiles > 1 ? numFiles + ' files selected' : label;

          if( input.length ) {
              input.val(log);
          } else {
              if( log ) alert(log);
          }

      });
  });
  
});