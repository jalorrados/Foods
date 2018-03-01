<div class="container">
	<form class="form" action="<?= base_url() ?>lp/modificardos" method="post">
		<fieldset>
			<legend>Datos del lenguaje</legend>
			<label >Nombre</label>
			<input type="hidden" name="lpiddos" value="<?= $id ?>">
			<input type="hidden" name="filtrohiddendos" value="<?= $filtro ?>">
			<input class="form-control" type="text" name="lpnombredos" value="<?= $nombre ?>" />		
			<input type="submit" class="btn btn-default" value="Enviar"/>

		</fieldset>
	</form>
</div>