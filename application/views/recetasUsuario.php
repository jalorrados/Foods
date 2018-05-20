<div class="container my-5" id="navscrollstart">
  <!--<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url() ?>categorias">Categorias</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?= $receta["categoria"] ?></li>
    </ol>
  </nav>-->
  <!--<form class="form-inline">
    <label class="mr-2 ml-3" for="ordenListado">Ordenar:</label>
    <select class="custom-select" id="ordenListado">
      <option value="nuevo" selected>Más recientes primero</option>
      <option value="viejo">Más antiguos primero</option>
      <option value="letra">Alfabeticamente</option>
    </select>
  </form>-->
  <div class="row" id="container">
      <?php foreach($usuario["recetaUsuario"] as $receta): ?>
      <a href="<?= base_url() ?>receta?categoria=<?= $receta["categoria"] ?>&idReceta=<?= $receta['id'] ?>" class="text-black nosub">
        <div class="col-12 mt-5 mb-3 my-3">
            <div class="media" id="<?= $receta['id'] ?>">
              <div class="media-left">
                <?php if($receta['urlimagen'] == "assets/img/noimagen.jpg"):?>
                   <img class="media-object img-fluid rounded imgListado" src="<?= base_url() . $receta['urlimagen'] ?>">
                <?php else:?>
                   <img class="media-object img-fluid rounded imgListado" src="<?= $receta['urlimagen'] ?>">
                <?php endif; ?>
              </div>
              <div class="media-body ml-3" style="word-break:break-all; word-wrap:break-word;">
                <h4 class="media-heading"><?= $receta['nombre'] ?></h4>
                <p><?=$receta['preparacion']?></p>
              </div>
            </div>
        </div>
        <hr width="100%" color="black"/>
      </a>
      
      <?php endforeach; ?>
  </div>
</div>