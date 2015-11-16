<?php
montaTitulo('Evento');
//montaBreadCrumb($_SERVER['REQUEST_URI']);
?>

<div id="container table-responsive">
    <h4>Motocross</h4>
    <div class="table-responsive">
	<table class="table table-striped table-bordered table-hover table-condensed">
	    <thead>
		<th>Modalidade</th>
		<th>Identificador</th>
		<th>Campeonato</th>
		<th>Cidade</th>
		<th>Data</th>
		<th>Status</th>
		<th>Ações</th>
	    </thead>
	    <tbody>
		<?php
		if (isset($evento) && count($evento)) {
		    foreach ($evento as $ev) {
			?>
			<tr>
			    <td><?= $ev->nome_modalidade ?></td>
			    <td><?= $ev->identificador_evento ?></td>
			    <td><?= $ev->nome_campeonato ?></td>
			    <td><?= $ev->nome_cidade ?></td>
			    <td><?= date('d/m/Y', strtotime($ev->data_evento)) ?></td>
			    <td><?= $ev->nome_status_evento ?></td>
			    <td data-id="<?= $ev->id_evento ?>"><i class="fa fa-pencil-square-o" name="editar"></i>&nbsp;&nbsp;&nbsp;<i class="fa fa-times" name="excluir"></i></td>
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

    <form class="form-horizontal" id="frmEvento" action="<?php echo base_url('Administrativo_Controller/saveOrUpdateEvento'); ?>" method="POST">
	<h4>Criar ou Atualizar Evento</h4>

	<input type="text" class="form-control" id="id_evento" name="id_evento" placeholder="id_evento">

	<div class="form-group">
	    <label for="id_modalidade" class="col-sm-2 control-label">Modalidade</label>
	    <div class="col-sm-10">
		<select class="form-control" id="id_modalidade" name="id_modalidade" title="Modalidade">
		    <option>- Selecione -</option>
		    <?php
		    if (isset($modalidade) && count($modalidade)) {
			foreach ($modalidade as $mod) {
			    ?>
			    <option value="<?= $mod->id_modalidade ?>"><?= $mod->nome_modalidade ?></option>
			    <?php
			}
		    }
		    ?>
		</select>
	    </div>
	</div>
	<div class="form-group">
	    <label for="id_uf" class="col-sm-2 control-label">UF</label>
	    <div class="col-sm-10">
		<select class="form-control" id="id_uf"  title="UF">
		    <option>- Selecione -</option>
		    <?php
		    if (isset($uf) && count($uf)) {
			foreach ($uf as $u) {
			    ?>
			    <option value="<?= $u->id_uf ?>"><?= $u->sigla_uf ?></option>
			    <?php
			}
		    }
		    ?>
		</select>
	    </div>
	</div>
	<div class="form-group">
	    <label for="id_cidade" class="col-sm-2 control-label">Cidade</label>
	    <div class="col-sm-10">
		<select class="form-control" id="id_cidade" name="id_cidade" title="Cidade">
		    <option>- Selecione -</option>
		</select>
	    </div>
	</div>
	<div class="form-group">
	    <label for="id_campeonato" class="col-sm-2 control-label">Campeonato</label>
	    <div class="col-sm-10">
		<select class="form-control" id="id_campeonato" name="id_campeonato" title="Campeonato">
		    <option>- Selecione -</option>
		    <?php
		    if (isset($campeonato) && count($campeonato)) {
			foreach ($campeonato as $camp) {
			    ?>
			    <option value="<?= $camp->id_campeonato ?>"><?= $camp->nome_campeonato . ' ' . $camp->temporada_campeonato ?></option>
			    <?php
			}
		    }
		    ?>
		</select>
	    </div>
	</div>
	<div class="form-group">
	    <label for="identificador_evento" class="col-sm-2 control-label">Identificador Evento</label>
	    <div class="col-sm-10">
		<input type="text" class="form-control" id="identificador_evento" name="identificador_evento"  placeholder="Identificador do Evento" title="Identificador do Evento">
	    </div>
	</div>
        <div class="form-group">
	    <label for="cartaz_evento" class="col-sm-2 control-label">Link Cartaz do Evento</label>
	    <div class="col-sm-10">
		<input type="text" class="form-control" id="cartaz_evento" name="cartaz_evento"  placeholder="Link Cartaz do Evento" title="Link Cartaz do Evento">
	    </div>
	</div>
	<div class="form-group">
	    <label for="data_evento" class="col-sm-2 control-label">Data</label>
	    <div class="col-sm-10">
		<input type="date" class="form-control" id="data_evento" name="data_evento" placeholder="Data" title="Data">
	    </div>
	</div>
	<div class="form-group">
	    <label for="id_status_evento" class="col-sm-2 control-label">Status</label>
	    <div class="col-sm-10">
		<select class="form-control" id="id_status_evento" name="id_status_evento" title="Status">
		    <option>- Selecione -</option>
		    <?php
		    if (isset($status) && count($status)) {
			foreach ($status as $sts) {
			    ?>
			    <option value="<?= $sts->id_status_evento ?>"><?= $sts->nome_status_evento ?></option>
			    <?php
			}
		    }
		    ?>
		</select>
	    </div>
	</div>
	
	<!-- Texto Notícia -->
	<div class="form-group">
	    <label for="descricao_evento" class="col-sm-2 control-label">Descrição do Evento</label>
	    <div class="col-sm-10">
		<textarea class="form-control" id="descricao_evento" name="descricao_evento" text="Descrição do Evento" placeholder="Descrição do Evento" rows="9" id="comment"></textarea>
	    </div>
	</div>
	
	
	<div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
		<button type="submit" id="btnSubmit" class="btn btn-default">Salvar</button>
	    </div>
	</div>
    </form>
</div>




<script src="<?php echo base_url('assets/js/system/adm/evento.js'); ?>"></script>