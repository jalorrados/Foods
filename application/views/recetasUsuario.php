<div class="container my-5" id="navscrollstart">
  <div class="row" id="container">
      <?php foreach($usuario["recetaUsuario"] as $receta): ?>
      <a href="<?= base_url() ?>receta?categoria=<?= $receta["categoria"] ?>&idReceta=<?= $receta['id'] ?>" class="text-black nosub">
        <div class="col-12 mt-5 mb-3 my-3">
            <div class="media" id="<?= $receta['id'] ?>">
              <div class="media-left">
                <?php if($receta['urlimagen'] == "assets/img/noimagen.jpg"):?>
                   <img class="media-object img-fluid rounded imgListado" src="<?= base_url() . $receta['urlimagen'] ?>">
                <?php else:?>
                   <img class="media-object img-fluid rounded imgListado" src="<?=  base_url() .$receta['urlimagen'] ?>">
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