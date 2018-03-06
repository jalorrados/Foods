<header class="page-item">

	<nav>
		<div class="nav-wrapper container">
			<a href="<?= base_url()?>" class="brand-logo">Logo</a>
			<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
			<ul class="left hide-on-med-and-down centrar">
			    <li><a href="sass.html">Inicio</a></li>
			    <li class="site-nav--has-submenu"><a href="#" class="site-nav__link dropdown-button" data-activates="features-dropdown" data-beloworigin="true" data-constrainwidth="false" data-hover="true">Categorias<i class="material-icons right">arrow_drop_down</i></a>
		        	<ul id="features-dropdown" class="site-nav__submenu dropdown-content submenu">
		                <li>
		                  <a href="/pages/dark-theme" class="site-nav__link">Prueba 1</a>
		                </li>
		                <li>
		                  <a href="/collections/dark-theme" class="site-nav__link">Prueba 2</a>
		                </li>
		                <li>
		                  <a href="/collections/fillscreen-style" class="site-nav__link">Prueba 3</a>
		                </li>
		                <li>
		                  <a href="/collections/horizontal" class="site-nav__link">Prueba 4</a>
		                </li>
		                <li>
		                  <a href="/collections/all-products" class="site-nav__link">Prueba 5</a>
		                </li>
		                <li>
		                  <a href="/pages/contact-us" class="site-nav__link">Prueba 6</a>
		                </li>
		        	</ul>
				<li class="flor"><a href="collapsible.html">Contacto</a></li>
		        </li>
			</ul>
			<ul class="right hide-on-med-and-down">
			    <li class="flor"><input type="text" name="search" class="search"></li>
			    <?php if(true):?>
				   	<li class="flor"><a id="customer_login_link" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Ingresar</a></li>
					<li class="flor" ><a href="#modal1" id="customer_register_link" class="modal-trigger">Registrarte</a></li>
				<?php endif;?>
			</ul>
		</div>

	  <!-- Modal Structure -->
	  <div id="modal1" class="modal modal-fixed-footer modalcolors" style="width: 500px;">
	    <div class="modal-content" style="height: 100%">
	      <div class="modal-header" style="text-align: center;">
	      	<h4 class="center">Registro de usuario</h4>
	      </div>
	      
	      <div class="row" style="text-align: center;">
		    <form class="col s12" id="signform">
		      <div class="row">
		        <div class="input-field col s12" style="margin-top: 2rem;" id="usuario">
		          <i class="material-icons prefix">account_circle</i>
		          <input id="icon_prefixuser" type="text" name="signuser">
		          <label for="icon_prefixuser">Nombre y apellidos</label>
		        </div>
		        <div class="input-field col s12" style="margin-top: 1rem;">
		          <i class="material-icons prefix">lock_outline</i>
		          <input id="icon_prefixpass" type="text" name="signtlf">
		          <label for="icon_prefixpass">Teléfono</label>
		        </div>
		        <div class="input-field col s12" style="margin-top: 1rem;">
					<i class="material-icons prefix">markunread</i>
					<input id="email" type="email" name="signemail">
					<label for="email" >Email</label>
				</div>
		        <div class="input-field col s12" style="margin-top: 1rem;">
		          <i class="material-icons prefix">lock_outline</i>
		          <input id="icon_prefixpass" type="password" name="signpassword">
		          <label for="icon_prefixpass">Contraseña</label>
		        </div>
		        <div class="input-field col s12" style="margin-top: 1rem;">
		          <i class="material-icons prefix">lock_outline</i>
		          <input id="icon_prefixpass" type="password" name="signpassword2">
		          <label for="icon_prefixpass">Repetir contraseña</label>
		        </div>
		      </div>

		    </form>
		  </div>

	    </div>
	    <div class="modal-footer" style="text-align: center;">
			<button href="" class="modal-action modal-close waves-effect waves-red btn-flat ">Cancelar</button>
	    	<button href="" class="modal-action modal-close waves-effect waves-green btn-flat ">Aceptar</button>
	    </div>
	  </div>

	  <script type="text/javascript">
	  	$(function(){
	  		$("#signform").validate({
				rules: {
				    signuser: {
				        required: true,
				        minlength: 2
				    }
				},


				messages: {
		            signuser:{
		                required: "Enter a username",
		                minlength: "Enter at least 5 characters"
		            }
		        },
		          
		        errorElement : 'div',
		        errorPlacement: function(error, element) {
		          var placement = $("label").data('error');
		          if (placement) {
		            $(placement).append(error)
		          } else {
		            error.insertAfter(element);
		          }
		        }
	  		});
	  	});
	  </script>
</header>