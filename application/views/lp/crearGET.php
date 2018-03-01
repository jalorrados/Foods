<script type="text/javascript" src="<?=base_url()?>assets/js/Serialize.js"></script>
<script type="text/javascript">
	var conexion;

	function accionAJAX() {
		document.getElementById("idMensaje").innerHTML=conexion.responseText;
	}

	function peticionAJAX() {
		conexion = new XMLHttpRequest();
		
		var datosSerializados = serialize(document.getElementById("idFormulario"));
		conexion.open('POST', '<?=base_url()?>lp/crearPost', true);
		conexion.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
		conexion.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		conexion.send(datosSerializados);
		
		conexion.onreadystatechange = function() {
			if (conexion.readyState==4 && conexion.status==200) {
				accionAJAX();
			}
		}
	}
</script>


<div class="container">
	<form id="idFormulario" class="form">
		<fieldset>
			<legend>Datos del lenguaje</legend>
			<label for="idNombre">Nombre</label>
			<input class="form-control" type="text" id="idNombre" name="lp" />		
			<input type="button" class="btn btn-default" onclick="peticionAJAX()" value="Enviar"/>
			<div id="idMensaje"></div>	

		</fieldset>
	</form>
</div>