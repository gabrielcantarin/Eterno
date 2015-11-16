<?php
montaTitulo('Evento');

?>

    <form class="form-horizontal frmEvento"  action="<?php echo base_url('Administrativo_Controller/saveOrUpdateEvento'); ?>" method="POST">
	<h4><?= $evento->identificador_evento . ' ' . $evento->sigla_campeonato . ' ' . $evento->temporada_campeonato ?></h4>
	
	<div class="form-group">
	    <label for="id_cidade" class="col-sm-2 control-label">Local</label>
	    <div class="col-sm-10">
                <span>
                    <?= $evento->nome_cidade.' / '.$evento->nome_uf ?>
                </span>
	    </div>
	</div>
	
	
	<div class="form-group">
	    <label for="data_evento" class="col-sm-2 control-label">Data</label>
	    <div class="col-sm-10">
                <span>
                    <?=  date('d/m/Y', strtotime($evento->data_evento))?>
                </span>
	    </div>
	</div>
	
	
	<div class="form-group">
	    <label for="id_status_evento" class="col-sm-2 control-label">Status</label>
	    <div class="col-sm-10">
                <span>
                    <?= $evento->nome_cidade . '/' .$evento->nome_uf ?>
                </span>
	    </div>
	</div>
	
	
	<div class="form-group">
	    <label for="descricao_evento" class="col-sm-2 control-label">Descrição do Evento</label>
	    <div class="col-sm-10">
                <span>
                    <?= $evento->descricao_evento ? : '-' ?>
                </span>
	    </div>
	</div>
	
	<?php if($evento->id_foto){ ?>
	<div class="form-group">
	    <label for="descricao_evento" class="col-sm-2 control-label">Fotos</label>
	    <div class="col-sm-10">
		<a target="_blak" href="<?= $evento->link_foto ?>">Aqui</a>
	    </div>
	</div>
	<?php } ?>
	    
    </form>
</div>



