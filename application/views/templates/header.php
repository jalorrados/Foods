<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><img src="<?= base_url()?>/assets/img/logo.svg" class="logo2"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
        	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categorias
        	</a>
          	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
	          <a class="dropdown-item" href="#">Action</a>
	          <a class="dropdown-item" href="#">Another action</a>
	          <a class="dropdown-item" href="#">Something else here</a>
	        </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contacto</a>
        </li>
      </ul>
      <form class="form-inline">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
      </form>
      <ul class="navbar-nav m-r-0">
        <li class="nav-item">
          <a class="nav-link" href="" data-toggle="modal" data-target="#login">Ingresar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="" data-toggle="modal" data-target="#signup">Registrarse</a>
        </li>
      </ul>
    </div>
  </nav>

<!-- Sign up form -->

<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content fondoform">
      <div class="modal-header">
        <img src="<?= base_url()?>/assets/img/logo.svg" class="logo">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="signuser" class="col-form-label">Nombre y apellidos</label>
            <input type="text" class="form-control" id="signuser" name="signuser">
          </div>
          <div class="form-group">
            <label for="signemail" class="col-form-label">Email</label>
            <input type="text" class="form-control" id="signemail" name="signemail">
          </div>
          <div class="form-group">
            <label for="signtlf" class="col-form-label">Teléfono</label>
            <input type="text" class="form-control" id="signtlf" name="signtlf">
          </div>
          <div class="form-group">
            <label for="signpass" class="col-form-label">Contraseña</label>
            <input type="text" class="form-control" id="signpass" name="signpass">
          </div>
          <div class="form-group">
            <label for="signpassrepeat" class="col-form-label">Repetir contraseña</label>
            <input type="text" class="form-control" id="signpassrepeat" name="signpassrepeat">
          </div>
        </form>
      </div>
      <div class="modal-footer align-content-center justify-content-center">
        <button type="button" class="btn btn-success">Registrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Login form -->

<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content fondoform">
      <div class="modal-header">
        <img src="<?= base_url()?>/assets/img/logo.svg" class="logo">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="text-lg-center">
          <div class="form-group">
            <label for="signemail" class="col-form-label">Email</label>
            <input type="text" class="form-control" id="loginemail" name="loginemail">
          </div>
          <div class="form-group">
            <label for="signpass" class="col-form-label">Contraseña</label>
            <input type="text" class="form-control" id="loginpass" name="loginpass">
          </div>
        </form>
      </div>
      <div class="modal-footer align-content-center justify-content-center">
        <button type="button" class="btn btn-success">Iniciar sesión</button>
      </div>
    </div>
  </div>
</div>