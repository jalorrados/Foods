<div class="container my-5" id="navscrollstart">
  <!--<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url() ?>categorias">Categorias</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?= $usuario["categoria"] ?></li>
    </ol>
  </nav>-->
  <div class="breadcrumb flat breadcrumbstyle">
    <a href="<?= base_url() ?>categorias"> Categorías</a>
    <a class="activebreadcrumb" href="#"><?= $usuario["categoria"] ?></a>
  </div>

  <!--<form class="form-inline" method="post" action="<?=base_url()?>listado" id="ordenListadoForm">
    <label class="mr-2 ml-3" for="ordenListado">Ordenar:</label>
    <select name="ordenListado" class="custom-select" id="ordenListado" onchange="ordenListadoFormMethod()">
      <option value="nuevo">Más recientes primero</option>
      <option value="viejo" selected>Más antiguos primero</option>
      <option value="letra">Alfabéticamente</option>
    </select>
  </form>-->

  <div class="row" id="container">
      <?php foreach($usuario["listado"] as $receta): ?>
      <a href="<?= base_url() ?>receta?categoria=<?= $usuario["categoria"] ?>&idReceta=<?= $receta['id'] ?>" class="text-black nosub">
        <div class="col-12 mt-5 mb-3 my-3">
            <div class="media row" id="<?= $receta['id'] ?>">
              <div class="col-xs-12 align-items-sm-center justify-content-sm-center mx-auto">
                <?php if($receta['urlimagen'] == "assets/img/noimagen.jpg"):?>
                   <img class="media-object img-fluid rounded imgListado" src="<?= base_url() . $receta['urlimagen'] ?>">
                <?php else:?>
                   <img class="media-object img-fluid rounded imgListado" src="<?= $receta['urlimagen'] ?>">
                <?php endif; ?>
              </div>
              <div class="media-body ml-3 col-xs-12 col-sm-12 align-items-sm-center justify-content-sm-center desclistdot">
                <h4 class="media-heading text-center text-md-left"  style="word-break: break-word;"><?= $receta['nombre'] ?></h4>
                <p class="text-center text-md-left" style="overflow: hidden;text-overflow: ellipsis;height:245px;word-break: break-word;"><?=$receta['preparacion']?></p>
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
        <a class="active" href="<?=base_url()?>listado?limite=<?=$cont?>&categoria=<?=$usuario['categoria']?>&activo=<?=$i?>"><?= $i?></a>
      <?php else:?>
        <a href="<?=base_url()?>listado?limite=<?=$cont?>&categoria=<?=$usuario['categoria']?>&activo=<?=$i?>"><?= $i?></a>
      <?php endif;?>
      <?php $cont+= 5?>
    <?php endfor; ?>
    <!--<a href="#">&raquo;</a>-->
  </div>
</div>