<script type="text/javascript" src="<?=base_url()?>assets/js/Serialize.js"></script>
<script type="text/javascript">
	var conexion;

	function accionAJAX() {
		document.getElementById("idMensaje").innerHTML=conexion.responseText;
	}

	function peticionAJAX() {
		conexion = new XMLHttpRequest();
		
		var datosSerializados = serialize(document.getElementById("idFormulario"));
		conexion.open('POST', '<?=base_url()?>empleado/crearPost', true);
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
			<legend>Datos de empleado</legend>
			<label for="idNombre">Nombre</label>
			<input class="form-control" type="text" id="idNombre" name="nombre" />		
			<label for="idApellido1">Apellido1</label>
			<input class="form-control" type="text" id="idApellido1" name="apellido1" />		
			<label for="idApellido2">Apellido2</label>
			<input class="form-control" type="text" id="idApellido2" name="apellido2" />
			<label for="idContrasena">Contraseña</label>
			<input class="form-control" type="password" id="idContrasena" name="contrasena" />
			<label for="idTelefono">Telefono</label>
			<input class="form-control" type="text" id="idTelefono" name="telefono" />
			<label>Ciudades</label>
			<select name="ciudades" class="form-control">
				<?php foreach($ciudades as $ciudad):?>
					<option value="<?= $ciudad->id ?>"><?= $ciudad->nombre ?></option>
				<?php endforeach;?>
			</select>
			<input type="button" class="btn btn-default" onclick="peticionAJAX()" value="Enviar"/>
			<div id="idMensaje"></div>	
		</fieldset>
	</form>
</div>