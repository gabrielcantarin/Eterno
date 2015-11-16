<?php
montaTitulo('Area Administrativa');
//montaBreadCrumb($_SERVER['REQUEST_URI']);
?>

<?php montaSlide('20%', '100%', '5000', array('1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg')); ?>

<div class="ui link list">
    <h3 class="ui header">ETERNO RACING</h3>
    <a class="item" href="<?php echo base_url('Administrativo_Controller/index_campeonato'); ?>">Campeonato</a>
    <a class="item" href="<?php echo base_url('Administrativo_Controller/index_evento'); ?>">Evento</a>
    <a class="item" href="<?php echo base_url('Administrativo_Controller/index_foto'); ?>">Fotos</a>
    <a class="item" href="<?php echo base_url('Administrativo_Controller/index_noticia'); ?>">Notícia</a>
    <a class="item" href="<?php echo base_url('Administrativo_Controller/index_usuario'); ?>">Usuário</a>
</div>