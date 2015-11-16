<?php
montaTitulo('Home');

if(!count($noticia)){ header('');}
?>

<?php montaSlide('20%', '100%', '5000', array('1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg')); ?>

<div class="row titulo">
    <h1><?= $noticia->titulo_noticia?> </br><small><?= $noticia->chamada_noticia?></small></h1>
</div>

<div class="row text">
    <p><?= $noticia->texto_noticia ?></p>
</div>

<div class="row author-date">
    <span><?= $noticia->nome_usuario . ' - '. date('d/m/Y', strtotime($noticia->data_noticia)) ?></span>
</div>
