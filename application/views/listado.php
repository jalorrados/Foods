<div class="container my-5" id="navscrollstart">
  <!--<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url() ?>categorias">Categorias</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?= $usuario["categoria"] ?></li>
    </ol>
  </nav>-->
  <div class="breadcrumb flat breadcrumbstyle">
    <a href="<?= base_url() ?>categorias"> Categorias</a>
    <a class="activebreadcrumb" href="#"><?= $usuario["categoria"] ?></a>
  </div>
  <div class="row">
      <?php foreach($usuario["listado"] as $receta): ?>
      <a href="<?= base_url() ?>receta?categoria=<?= $usuario["categoria"] ?>&idReceta=<?= $receta->id ?>" class="text-black nosub">
        <div class="col-12 mt-5 mb-3 my-3">
            <div class="media">
              <div class="media-left">
                <img class="media-object" src="<?= base_url() ?>assets/img/aperitivos_tapas.jpg">
              </div>
              <div class="media-body ml-3">
                <h4 class="media-heading"><?= $receta->nombre ?></h4>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
              </div>
            </div>
        </div>
      </a>
      <hr width="100%" color="black"/>
      <?php endforeach; ?>
  </div>
</div>