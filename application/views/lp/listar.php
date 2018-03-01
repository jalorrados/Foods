<div class="container">
	<form action="<?= base_url() ?>lp/listarPost" method="post">
		<label for="idFiltro">Filtro</label>
		<input id="idFiltro" type="text" name="filtro" value="<?= $filtro ?>">
		<input type="submit" value="Filtrar">
	</form>
	<table class="table table-striped">
		<tr>
			<th>Nombre de lenguaje</th>
			<th>Acciones</th>
		</tr>
		
		<?php foreach ($lps as $lp): ?>
			<tr>
				<td><?= $lp->nombre ?></td>

				<td>
					<form method="post" action="<?= base_url() ?>lp/modificar" class="enlinea">
						<input type="hidden" name="lpid" value="<?= $lp->id ?>">
						<input type="hidden" name="lpnombre" value="<?= $lp->nombre ?>">
						<input type="hidden" name="filtrohidden" value="<?= $filtro ?>">
						<button type="submit" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-pencil"></span></button>
					</form>

					<form method="post" action="<?= base_url() ?>lp/borrar" class="enlinea">
						<input type="hidden" name="lpid" value="<?= $lp->id ?>">
						<input type="hidden" name="filtrohidden" value="<?= $filtro ?>">
						<button type="submit" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-trash"></span></button>
					</form>
				</td>
			</tr>
		<?php endforeach;?>
	</table>
</div>