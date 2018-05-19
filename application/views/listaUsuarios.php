<div class="container my-5" id="navscrollstart">
	<h2 align="center">Lista de Usuarios</h2>
	<table id="listaUsuarios" class="table table-bordered">
		<thead>
			<tr>
				<th>Email</th>
				<th>Nombre y Apellidos</th>
				<th>Teléfono</th>
				<th>Cambiar Permisos</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($usuario["allUsers"] as $user): ?>
				<tr>
					<td><?= $user->email?></td>
					<td><?= $user->apenom?></td>
					<td><?= $user->telefono?></td>
					<?php if($user->rol == "admin") : ?>

						<?php if ($user->email == $usuario["email"]): ?>
							<td><button type="button" class="btn btn-success btn-sm" disabled>Admin</button></td>
						<?php else : ?>
							<td><button type="button" class="btn btn-success btn-sm" onclick="cambiarPermisos(this)" value="<?=$user->email?>-admin">Admin</button></td>
						<?php endif ?>

					<?php elseif ($user->rol == "user"): ?>
						<td><button type="button" class="btn btn-info btn-sm" onclick="cambiarPermisos(this)" value="<?=$user->email?>-user">User</button></td>

					<?php else : ?>
						<td><button type="button" class="btn btn-warning btn-sm" onclick="cambiarPermisos(this)" value="<?=$user->email?>-editor">Editor</button></td>

					<?php endif; ?>

					<?php if ($user->email == $usuario["email"]): ?>
						<td><button type="button" class="btn btn-danger btn-sm" disabled>Eliminar</button></td>
					<?php else : ?>
						<td><button type="button" class="btn btn-danger btn-sm" onclick="eliminarUsuario(this)" value="<?=$user->email?>">Eliminar</button></td>
					<?php endif; ?>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>