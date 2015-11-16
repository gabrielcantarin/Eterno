<?php
montaTitulo('Home');
?>

<?php montaSlide('20%', '100%', '5000', array('1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg')); ?>

<div class="ui segment" style="padding: 10 20 0 20;text-align: center">
    <div class="col-md-6">
        <div class="row first" class="top: 0">
            <h2 class='ui header'>PRÓXIMOS EVENTOS</h2>
        </div>
        <div class="row">
            &nbsp;
        </div>
        <div class="row" style="margin: 0 auto;" >
            <table class="table">
		<?php
		if (isset($evento) && count($evento)) {
		    foreach ($evento as $ev) {
			?>
                            <tr>
                                <td>
                                    <span>
                                        <a class="link-noticia" href="<?= base_url() . 'Evento_Controller/evento/' . $ev->id_evento ?>" />
                                            <?= $ev->identificador_evento . ' ' . $ev->sigla_campeonato ?>
                                        </a>
                                    </span>
                                </td>
                                <td style="text-align: center">
                                    <a class="link-noticia" href="<?= base_url() . 'Evento_Controller/evento/' . $ev->id_evento ?>" />
                                        <?= $ev->nome_cidade . '/' . $ev->nome_uf ?>
                                    </a>
                                </td>
                                <td style="text-align: right">
                                    <a class="link-noticia" href="<?= base_url() . 'Evento_Controller/evento/' . $ev->id_evento ?>" />
                                        <?= date('d/m/Y', strtotime($ev->data_evento)) ?>
                                    </a>
                                </td>
                            </tr>
			<?php
		    }
		} else {
		    ?>
    		<tr>
    		    <td colspan="3" style="text-align: center;">Indique um evento <a href="<?= base_url('Principal_Controller/view/empresa/fale-conosco.php') ?>"/>aqui</a></td>
    		</tr>
		    <?php
		}
		?>
            </table>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row first" >
            <h2 class='ui header'>NOVIDADES </h2>
        </div>
        <div class="row">
            &nbsp;
        </div>
        <div class="row" style="margin: 0 auto;">
            <table class="table">
		<?php
		if (isset($novidade) && count($novidade)) {
		    foreach ($novidade as $nov) {
			?>
	                <tr>
	                    <td><?= $nov->nome_modalidade ?></td>
	                    <td style="text-align: center"><?= $nov->tipo_novidade ?></td>
	                    <td style="text-align: right"><?= date('d/m/Y', strtotime($nov->data_novidade)) ?></td>
	                </tr>
			<?php
		    }
		} else {
		    ?>
    		<tr>
    		    <td colspan="3" style="text-align: center;">Não existem novidades para essa modalidade</td>
    		</tr>
		    <?php
		}
		?>
            </table>
        </div>
    </div>

</div>

<div class="ui segment" style="padding: 10 20 10 20;text-align: center">
    <div class="row">
	<?php
	if (isset($noticia) && count($noticia)) {
	    foreach ($noticia as $not) {
		?>
	        <div class="col-sm-6 col-md-4">
	            <div class="thumbnail">
	                <div class="caption">
	                    <h3><a class="link-noticia" href="<?= base_url() . 'Noticia_Controller/noticia/' . $not->id_noticia ?>" /><?= $not->titulo_noticia ?></a></h3>
	                    <p><?= $not->chamada_noticia ?></p>
	                </div>
	            </div>
	        </div>
		<?php
	    }
	} else {
	    ?>
    	    Não existem notícias para essa modalidade, se deseja ser um redator clique <a href="<?= base_url('Principal_Controller/view/empresa/fale-conosco.php') ?>"/>aqui</a>
	    <?php
	}
	?>
    </div>
</div>
