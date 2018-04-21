<section class="navbar">
  <nav id="nav" class="navbar navbar-toggleable navbar-expand-lg fixed-top" data-spy="affix">
    <div>
      <a class="navbar-brand" href="<?= base_url() ?>"><img src="<?= base_url()?>/assets/img/logo.svg" class="logo2"></a>
      <button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon mt-2">☰</span>
      </button>
    </div>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active text-center text-lg-left">
          <a class="nav-link h6" href="<?= base_url() ?>">Inicio <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item text-center text-lg-left">
          <a class="nav-link h6" href="<?= base_url() ?>categorias">Categorías</a>
        </li>
        <?php if(!empty($_SESSION)):?>
          <li class="nav-item text-center text-lg-left">
            <a class="nav-link h6" href="<?= base_url() ?>crearReceta">Nueva receta</a>
          </li>
         <?php endif; ?>
        <li class="nav-item text-center text-lg-left">
          <a class="nav-link h6" href="" data-toggle="modal" data-target="#contacto">Contacto</a>
        </li>
      </ul>
      <form class="form-inline text-center text-lg-left row mx-sm-auto mx-md-0" name="buscarForm" method="post" action="<?= base_url() ?>inicio/buscar">
            <input class="form-control mr-sm-2 col-8 ml-auto" type="search" placeholder="Buscar" aria-label="Search" name="buscar" id="buscar">
            <button class="btn btn-outline-info my-2 my-sm-0 mr-auto search text-center" type="button" onclick="buscarListado()">Buscar</button>
      </form>
      <ul class="navbar-nav m-r-0 text-center text-lg-left">
        <li class="nav-item">
          <?php if(empty($_SESSION)):?>
            <a class="nav-link h6" href="" data-toggle="modal" data-target="#login">Ingresar</a>
          <?php else:?>
            <a class="nav-link h6" href="<?= base_url()?>perfil"><?=$usuario['apenom']?></a>
          <?php endif; ?>
        </li>
        <li class="nav-item">
           <?php if(empty($_SESSION)):?>
            <a class="nav-link h6" href="" data-toggle="modal" data-target="#signup">Registrarse</a>
          <?php else:?>
            <a class="nav-link h6" href="<?= base_url()?>inicio/logOut" >Cerrar sesión</a>
          <?php endif; ?>
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
          <form name="signform" action="<?= base_url() ?>inicio/signPost" method="post">
            <div class="form-group">
              <label for="signuser" class="col-form-label">Nombre y apellidos</label>
              <input type="text" class="form-control" id="signuser" name="signuser">
              <small id="errorUser" style="visibility: hidden;" class="form-text text-danger">Nombre y apellidos incorrectos.</small>
            </div>
            <div class="form-group">
              <label for="signemail" class="col-form-label">Email</label>
              <input type="text" class="form-control" id="signemail" name="signemail">
              <small id="errorEmail" style="visibility: hidden;" class="form-text text-danger">Email incorrecto o ya existe.</small>
            </div>
            <div class="form-group">
              <label for="signtlf" class="col-form-label">Teléfono</label>
              <input type="text" class="form-control" id="signtlf" name="signtlf">
              <small id="errorTlf" style="visibility: hidden;" class="form-text text-danger">Teléfono debe tener 9 digitos y empezar por 6,7,8 o 9.</small>
            </div>
            <div class="form-group">
              <label for="signpass" class="col-form-label">Contraseña</label>
              <input type="password" class="form-control" id="signpass" name="signpass">
              <small id="errorPass" style="visibility: hidden;" class="form-text text-danger">Contraseña debe tener entre 8 y 12 carácteres.</small>
            </div>
            <div class="form-group">
              <label for="signpassrepeat" class="col-form-label">Repetir contraseña</label>
              <input type="password" class="form-control" id="signpassrepeat" name="signpassrepeat" onkeypress="signEnter(event)">
              <small id="errorRepPass" style="visibility: hidden;" class="form-text text-danger">Las contraseñas no coinciden.</small>
            </div>
          </form>
        </div>
        <div class="modal-footer align-content-center justify-content-center">
          <button type="button" id="botonsign" class="btn btn-success" onclick="registrarse()">Registrar</button>
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
          <form class="text-lg-center" name="loginform" action="<?= base_url() ?>inicio/loginPost" method="post">
            <small id="errorLogin" style="visibility: hidden;" class="form-text text-danger">Email o contraseña incorrectos.</small>
            <div class="form-group">
              <label for="loginemail" class="col-form-label">Email</label>
              <input type="text" class="form-control" id="loginemail" name="loginemail">
              <small id="errorEmailLogin" style="visibility: hidden;" class="form-text text-danger">Email incorrecto.</small>
            </div>
            <div class="form-group">
              <label for="loginpass" class="col-form-label">Contraseña</label>
              <input type="password" class="form-control" id="loginpass" name="loginpass" onkeypress="loginEnter(event)">
              <small id="errorPassLogin" style="visibility: hidden;" class="form-text text-danger">Contraseña debe tener entre 8 y 12 carácteres.</small>
            </div>
          </form>
        </div>
        <div class="modal-footer align-content-center justify-content-center">
          <button type="button" id="botonlogin" class="btn btn-success" onclick="login()">Iniciar sesión</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Contacts modal -->

  <div class="modal fade" id="contacto" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content fondocontacto">
        <div class="modal-header">
          <img src="<?= base_url()?>/assets/img/logo.svg" class="logo">
        </div>
        <div class="modal-body">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <div class="modal-footer align-content-center justify-content-center">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
</section>