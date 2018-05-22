<div class="container my-5" id="navscrollstart">
  <!--<form class="form-inline mt-3 pt-3">
    <label class="mr-2 ml-3" for="ordenListado">Ordenar:</label>
    <select class="custom-select" id="ordenListado">
      <option value="nuevo" selected>Más recientes primero</option>
      <option value="viejo">Más antiguos primero</option>
      <option value="letra">Alfabeticamente</option>
    </select>
  </form>-->
   <div class="row" id="container">
      <?php foreach($usuario["listadoBuscar"] as $receta): ?>
      <a href="<?= base_url() ?>receta?categoria=<?= $receta["categoria"] ?>&idReceta=<?= $receta['id'] ?>" class="text-black nosub">
        <div class="col-12 mt-5 mb-3 my-3">
            <div class="media" id="<?= $receta['id'] ?>">
              <div class="media-left">
                <?php if($receta['urlimagen'] == "assets/img/noimagen.jpg"):?>
                   <img class="media-object img-fluid rounded imgListado" src="<?= base_url() . $receta['urlimagen'] ?>">
                <?php else:?>
                   <img class="media-object img-fluid rounded imgListado" src="<?= base_url() .$receta['urlimagen'] ?>">
                <?php endif; ?>
              </div>
              <div class="media-body ml-3">
                <h4 class="media-heading"><?= $receta['nombre'] ?></h4>
                <?=$receta['preparacion']?>
              </div>
            </div>
        </div>
        <hr width="100%" color="black"/>
      </a>
      
      <?php endforeach; ?>
  </div>
  <div class="pagination mx-auto align-content-center justify-content-center text-center">
    <!--<a href="#">&laquo;</a>-->
    <?php $cont = 0?>
    <?php for($i = 1; $i <= $usuario["paginas"]; $i++):?>
      <?php if($usuario["paginacionactive"] == $i):?>
        <a class="active" href="<?=base_url()?>inicio/buscar?limite=<?=$cont?>&activo=<?=$i?>&palabraBuscada=<?=$usuario['palabraBuscada']?>"><?= $i?></a>
      <?php else:?>
        <a href="<?=base_url()?>inicio/buscar?limite=<?=$cont?>&activo=<?=$i?>&palabraBuscada=<?=$usuario['palabraBuscada']?>"><?= $i?></a>
      <?php endif;?>
      <?php $cont+= 5?>
    <?php endfor; ?>
    <!--<a href="#">&raquo;</a>-->
  </div>
</div>