$('nav').affix({
    offset: {
     	top: $('#navscrollstart').offset().top
    }
});

function login(){
	var exp_email = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
	var exp_pass = /^\w{8,12}$/;

	var email = document.getElementById("loginemail");
	var pass = document.getElementById("loginpass");

	var errorEmail = document.getElementById("errorEmailLogin");
	var errorPass = document.getElementById("errorPassLogin");
	var errorLogin = document.getElementById("errorLogin");

	if (exp_email.test(email.value)) {
			email.style.borderColor = "rgba(0,0,0,.15)";
			errorEmail.style.visibility = "hidden";
			errorLogin.style.visibility = "hidden";

		if (exp_pass.test(pass.value)) {
			pass.style.borderColor = "rgba(0,0,0,.15)";
			errorPass.style.visibility = "hidden";
			errorLogin.style.visibility = "hidden";

			var xml = new XMLHttpRequest();//compruebo si existe el email con esta peticion ajax

			var getUrl = window.location;
			var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];//base url en javascript//en server externo poner 0

			xml.open('GET', baseUrl+'/inicio/loginPostComprobar?comprobarEmailLogin='+email.value+'&comprobarPassLogin='+md5(pass.value), true);
			xml.send();

			xml.onreadystatechange = function() {
				if (xml.readyState==4 && xml.status==200) {

					var respuesta = (xml.responseText).replace("\n","");
					respuesta = respuesta.replace("\r","");

					if (respuesta=="no") {//compruebo el resultado del ajax
						email.style.borderColor = "red";
						pass.style.borderColor = "red";
						errorLogin.style.visibility = "visible";
						email.focus();
					}else{
						pass.value = md5(pass.value);
						loginform.submit();
					}
					
				}
			}

		}else{
			//Mal contraseña
			pass.style.borderColor = "red";
			errorPass.style.visibility = "visible";
		}

	}else{
		//MalEmail
		email.style.borderColor = "red";
		errorEmail.style.visibility = "visible";
	}

}

function registrarse(){
	var exp_signuser = /^[a-zA-Z áéíóúÁÉÍÓÚÑñçÇ]{3,40}$/;
	var exp_email = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
	var exp_telefono = /^([89]|[67])\d{8}$/;
	var exp_pass = /^\w{8,12}$/;

	var signuser = document.getElementById("signuser");
	var email = document.getElementById("signemail");
	var telefono = document.getElementById("signtlf");
	var pass = document.getElementById("signpass");
	var repetir_pass = document.getElementById("signpassrepeat");

	var errorUser = document.getElementById("errorUser");
	var errorEmail = document.getElementById("errorEmail");
	var errorTlf = document.getElementById("errorTlf");
	var errorPass = document.getElementById("errorPass");
	var errorRepPass = document.getElementById("errorRepPass");

	if (exp_signuser.test(signuser.value)) {
		signuser.style.borderColor = "rgba(0,0,0,.15)";
		errorUser.style.visibility = "hidden";

		if (exp_email.test(email.value)) {
			email.style.borderColor = "rgba(0,0,0,.15)";
			errorEmail.style.visibility = "hidden";

			if (exp_telefono.test(telefono.value)) {
				telefono.style.borderColor = "rgba(0,0,0,.15)";
				errorTlf.style.visibility = "hidden";

				if (exp_pass.test(pass.value)) {//metodo md5 es para encriptar
					pass.style.borderColor = "rgba(0,0,0,.15)";
					errorPass.style.visibility = "hidden";

					if ((md5(pass.value) == md5(repetir_pass.value))) {
						repetir_pass.style.borderColor = "rgba(0,0,0,.15)";
						errorRepPass.style.visibility = "hidden";

						var xml = new XMLHttpRequest();//compruebo si existe el email con esta peticion ajax

						var getUrl = window.location;
						var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];//base url en javascript

						xml.open('GET', baseUrl+'/inicio/signPostComprobar?comprobarEmail='+email.value, true);
						xml.send();

						xml.onreadystatechange = function() {
							if (xml.readyState==4 && xml.status==200) {

								var respuesta = (xml.responseText).replace("\n","");
								respuesta = respuesta.replace("\r","");

								if (respuesta=="si") {//compruebo el resultado del ajax
									email.style.borderColor = "red";
									errorEmail.style.visibility = "visible";
									email.focus();
								}else{
									pass.value = md5(pass.value);//encripto la contraseña y se la reasigno al input password para que al hacer el submit recoja el valor encriptado
						
									signform.submit();
								}
								
							}
						}

					}else{
						repetir_pass.style.borderColor = "red";
						errorRepPass.style.visibility = "visible";
						repetir_pass.focus();
					}

				}else{
					//Mal contraseña
					pass.style.borderColor = "red";
					errorPass.style.visibility = "visible";
					pass.focus();
				}

			}else{
				//Mal Telefono
				telefono.style.borderColor = "red";
				errorTlf.style.visibility = "visible";
				telefono.focus();
			}

		}else{
			//Mal Email
			email.style.borderColor = "red";
			errorEmail.style.visibility = "visible";
			email.focus();
		}

	}else{
		//Mal Nombre y contraseña
		signuser.style.borderColor = "red";
		errorUser.style.visibility = "visible";
		signuser.focus();
	}

}


function enviarComentario(){
	var exp_titulo =/^[a-zA-Z0-9 áéíóúÁÉÍÓÚÑñçÇ]{3,20}$/;
	var exp_comentario = /^[a-zA-Z0-9 áéíóúÁÉÍÓÚÑñçÇ.;.]{3,40}$/;
	var titulo =document.getElementById("IdTituloComentario");
	var comentario = document.getElementById("IdDescripcionComentario");

	if (exp_titulo.test(titulo.value) && titulo.value != "" && titulo.value != " ") {
		titulo.style.borderColor = "rgba(0,0,0,.15)";
		errorTitulo.style.visibility = "hidden";

		if (exp_comentario.test(comentario.value) && comentario.value != "" && comentario.value != " ") {
			comentario.style.borderColor = "rgba(0,0,0,.15)";
			errorComentario.style.visibility = "hidden";
			formComentario.submit();

		}else{
			
			comentario.style.borderColor = "red";
			errorComentario.style.visibility = "visible";
		}

	}else{
		
		titulo.style.borderColor = "red";
		errorTitulo.style.visibility = "visible";
	}
}

function editarPerfil(){
	document.getElementById("perfilEditar").disabled = true;
	document.getElementById("perfilNombreId").disabled = false;
	document.getElementById("perfilTelefonoId").disabled = false;
	document.getElementById("perfilGuardar").disabled = false;
	document.getElementById("imgUser").disabled = false;
}

function editarGuardar(){
	var exp_signuser =/^[a-zA-Z áéíóúÁÉÍÓÚÑñçÇ]{3,40}$/;
	var exp_telefono = /^([89]|[67])\d{8}$/;

	var signuser = document.getElementById("perfilNombreId");
	var telefono = document.getElementById("perfilTelefonoId");

	if (exp_signuser.test(signuser.value)) {
		signuser.style.borderColor = "rgba(0,0,0,.15)";
		errorUser.style.visibility = "hidden";

		if (exp_telefono.test(telefono.value)) {
			telefono.style.borderColor = "rgba(0,0,0,.15)";
			errorTlf.style.visibility = "hidden";
			editarPerfilForm.submit();
			document.getElementById("perfilEditar").disabled = false;
			document.getElementById("perfilNombreId").disabled = true;
			document.getElementById("perfilTelefonoId").disabled = true;
			document.getElementById("perfilGuardar").disabled = true;
			document.getElementById("imgUser").disabled = true;
		}else{
			//Mal Telefono
			telefono.style.borderColor = "red";
			errorTlf.style.visibility = "visible";
		}

	}else{
		//Mal user
		signuser.style.borderColor = "red";
		errorUser.style.visibility = "visible";
	}


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
			divv.innerHTML +='<input type="text" placeholder="Ingrediente" style="width: 200px;" class="form-control" id="ingrediente'+i+'" name="ingrediente'+i+'">'+
			'<input type="number" min="0" max="999" placeholder="Cantidad" style="width: 110px;" class="form-control" id="cantidad'+i+'" name="cantidad'+i+'">'+
			'<select class="form-control" id="unidad'+i+'" name="unidad'+i+'"><option>---</option><option>Unidades</option><option>Kilos</option><option>Gramos</option><option>Cucharadas</option><option>Litros</option><option>Mililitros</option><option>Tazas</option></select>';
			
			divCantidad.appendChild(divv);
		}
	}
}

function loadFile(rutaimagen) {

	/*Cambia la imagen*/
	var boton = document.getElementById('eliminarPreview');
	boton.disabled = false;

	var output = document.getElementById('previewImagen');
	output.src = rutaimagen;
	/*output.src = URL.createObjectURL(event.target.files[0]);*/
	$(function() {

	  /*Obtiene el nombre del archivo del input type file y lo añade al input type text*/
	    var input = $("#imgReceta"),
	        numFiles = input.get(0).files ? input.get(0).files.length : 1,
	        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');

	    var input = $("#inputimgReceta").parents('.input-group').find(':text'),
	    	log = numFiles > 1 ? numFiles + ' files selected' : label;

	    if( input.length ) {
	    	input.val(log);
	    } else {
	    	if( log ) alert(log);
	    }
	});
};

$("#imgReceta").checkImageSize({
  minHeight: 300,
  maxHeight: 800,
  showError: true,
  ignoreError: false
});

function loadFileUser(rutaimagen) {

	/*Cambia la imagen*/
	var output = document.getElementById('previewImagenUser');
	output.src = rutaimagen;

	$(function() {

	  /*Obtiene el nombre del archivo del input type file y lo añade al input type text*/
	    var input = $("#imgUser"),
	        numFiles = input.get(0).files ? input.get(0).files.length : 1,
	        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');

	    var input = $("#inputimgUser").parents('.input-group').find(':text'),
	    	log = numFiles > 1 ? numFiles + ' files selected' : label;

	    if( input.length ) {
	    	input.val(log);
	    } else {
	    	if( log ) alert(log);
	    }
	});
};

$("#imgUser").checkUserImageSize({
  minHeight: 300,
  maxHeight: 800,
  showError: true,
  ignoreError: false
});

function borrarPreview(){
	var img = document.getElementById("previewImagen");
	var inputfile = document.getElementById("imgReceta");
	var imginput = document.getElementById("inputimgReceta");
	var boton = document.getElementById('eliminarPreview');
	boton.disabled = true;
	img.src=" ";
	inputfile.value = "";
	inputimgReceta.value = "";
}

function imgUserDefault(){
	var img = document.getElementById("previewImagenUser");
	var inputfile = document.getElementById("imgUser");
	var imginput = document.getElementById("inputimgUser");
	inputfile.value = "";
	imginput.value = "";

	$.ajax({url: "perfil/peticionAjaximagen", success: function(result){
		img.src= result;
    }});
}


function crearReceta(){

	var exp_nombre =/^[a-zA-Z áéíóúÁÉÍÓÚÑñçÇ]{2,40}$/;
	var exp_preparacion =/^[a-zA-Z áéíóúÁÉÍÓÚÑñçÇ.,;]{10,}$/;

	var nombre = document.getElementById("nombreReceta");
	var preparacion = document.getElementById("preparacionReceta");
	var npersonas = document.getElementById("numPersonas");
	var ningredientes = document.getElementById("numIngredientes");
	var ingredientes = document.getElementById("ingredientes");
	var imagen = document.getElementById("imgReceta");
	var categoria = document.getElementById("categoriaReceta");

	if (exp_nombre.test(nombre.value)) {

		if (exp_preparacion.test(preparacion.value)) {

			if (npersonas.value != "---") {

				if (ningredientes.value != "---") {

					if (comprobarningredientes(ingredientes)) {

						if (categoria.value != "---") {

							crearRecetaForm.submit();

						}else{

							alert("Debes seleccionar una categoría");
						}

					}else{

						alert("Debes rellenar todos los campos de ingredientes con datos correctos");
					}

				}else{

					alert("Debe seleccionar el número de ingredientes");
				}

			}else{

				alert("Debe seleccionar el número de personas");
			}

		}else{

			alert("La preparación debe contener al menos 10 caracteres min.");
		}

	}else{

		alert("El nombre debe estar comprendido entre 2 y 40 caracteres");
	}
	
}

function comprobarningredientes(ingredientes){

	var q = true;

	for (var i = 0; i < ingredientes.childNodes.length; i++) {

		if (ingredientes.childNodes[i].childNodes[0].value == "" || !isWordR(ingredientes.childNodes[i].childNodes[0].value)) {
			q = false;
		}

		if (ingredientes.childNodes[i].childNodes[1].value == "" || parseFloat(ingredientes.childNodes[i].childNodes[1].value) <= 0) {
			q = false;
		}

		if (ingredientes.childNodes[i].childNodes[2].value == "---") {
			q = false;
		}

	}

	return q;
}

function buscarListado(){
	var buscarinput = document.getElementById("buscar");
	//var exp_buscar = /^[a-zA-Z áéíóúÁÉÍÓÚÑñçÇ]{3,15}$/;

	if (buscarinput.value!="" && buscarinput.value!=null && buscarinput.value!=" ") {
		buscarForm.submit();
	}
}


$(function() {
	var as = $("a.nosub");
 
 	$("#ordenListado").on("change",function(){
 		if ($("#ordenListado").val()=="nuevo") {
			var masnuevo = as.sort(function (b, c) {
       			return $(b).find("div.media").attr('id') < $(c).find("div.media").attr('id');
    		});
    		$("div#container").html(masnuevo);

		}else if($("#ordenListado").val()=="viejo") {
			var masviejo = as.sort(function (b, c) {
       			return $(b).find("div.media").attr('id') > $(c).find("div.media").attr('id');
    		});
    		$("div#container").html(masviejo);

		}else{
			var letras = as.sort(function (b, c) {
       			return $(b).find("h4.media-heading").text() > $(c).find("h4.media-heading").text();
    		});
    		$("div#container").html(letras);
		}
 	});

});

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
