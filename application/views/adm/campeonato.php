<?php
montaTitulo('Campeonato');
//montaBreadCrumb($_SERVER['REQUEST_URI']);
?>

<div id="container table-responsive">
    <h4>Motocross</h4>
    <div class="table-responsive">
	<table class="table table-striped table-bordered table-hover table-condensed">
	    <thead>
		<th>Nome Campeonato</th>
		<th>Sigla</th>
		<th>Temporada</th>
		<th>Ações</th>
	    </thead>
	    <tbody>
		<?php
		if (isset($campeonato) && count($campeonato)) {
		    foreach ($campeonato as $camp) {
			?>
			<tr>
			    <td><?= $camp->nome_campeonato ?></td>
			    <td><?= $camp->sigla_campeonato ?></td>
			    <td><?= $camp->temporada_campeonato ?></td>
			    <td data-id="<?= $camp->id_campeonato ?>"><i class="fa fa-pencil-square-o" name="editar"></i>&nbsp;&nbsp;&nbsp;<i class="fa fa-times" name="excluir"></i></td>
			</tr>
			<?php
		    }
		} else {
		    ?>
    		<tr>
    		    <td colspan="7" style='text-align: center;'>Não existem Registros.</td>
    		</tr>
		    <?php
		}
		?>
	    </tbody>
	</table>
    </div>

    <form class="form-horizontal" id="frmEvento" action="<?php echo base_url('Administrativo_Controller/saveOrUpdateCampeonato'); ?>" method="POST">
	<h4>Criar ou Atualizar Campeonato</h4>

	<input type="hidden" class="form-control" id="id_campeonato" name="id_campeonato" placeholder="id_campeonato">

	<div class="form-group">
	    <label for="nome_campeonato" class="col-sm-2 control-label">Nome</label>
	    <div class="col-sm-10">
		<input type="text" class="form-control" id="nome_campeonato" name="nome_campeonato"  placeholder="Nome do Campeonato" title="Nome do Campeonato">
	    </div>
	</div>
	
	<div class="form-group">
	    <label for="sigla_campeonato" class="col-sm-2 control-label">Sigla</label>
	    <div class="col-sm-10">
		<input type="text" class="form-control" id="sigla_campeonato" name="sigla_campeonato"  placeholder="Sigla do Campeonato" title="Sigla do Campeonato">
	    </div>
	</div>
	
	<div class="form-group">
	    <label for="temporada_campeonato" class="col-sm-2 control-label">Temporada</label>
	    <div class="col-sm-10">
		<input type="text" class="form-control" id="temporada_campeonato" name="temporada_campeonato"  placeholder="Temporada do Campeonato" title="Temporada do Campeonato">
	    </div>
	</div>
	
	<div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
		<button type="submit" id="btnSubmit" class="btn btn-default">Salvar</button>
	    </div>
	</div>
    </form>
</div>




<script src="<?php echo base_url('assets/js/system/adm/campeonato.js'); ?>"></script>