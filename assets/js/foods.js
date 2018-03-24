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
			var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];//base url en javascript

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
	formComentario.submit();
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

function loadFileUser(event) {
	var output = document.getElementById('previewImagenUser');
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

/*Obtiene el nombre del archivo del input type file y lo añade al input type text*/
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