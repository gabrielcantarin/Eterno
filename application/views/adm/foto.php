<?php
montaTitulo('Foto');
//montaBreadCrumb($_SERVER['REQUEST_URI']);

?>

<div id="container table-responsive">
    <h4>Lista de Albuns</h4>
    <div class="table-responsive">
	<table class="table table-striped table-bordered table-hover table-condensed">
	    <thead>
		<th>Evento</th>
		<th>Cidade</th>
		<th>Data</th>
		<th>Link</th>
		<th>Ações</th>
	    </thead>
	    <tbody>
		<?php
		if (isset($foto) && count($foto)) {
		    foreach ($foto as $ft) {
			?>
			<tr>
			    <td><?= $ft->identificador_evento.' '.$ft->sigla_campeonato.' '. $ft->temporada_campeonato ?></td>
			    <td><?= $ft->nome_cidade ?></td>
			    <td><?= date('d/m/Y', strtotime($ft->data_evento))?></td>
			    <td><a title="<?= $ft->link_foto ?>" href="<?= $ft->link_foto ?>">Clique Aqui</a></td>
			    <td data-id="<?= $ft->id_foto ?>"><i class="fa fa-pencil-square-o" name="editar"></i>&nbsp;&nbsp;&nbsp;<i class="fa fa-times" name="excluir"></i></td>
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

    <form class="form-horizontal" id="frmEvento" action="<?php echo base_url('Administrativo_Controller/saveOrUpdateFoto'); ?>" method="POST">
	<h4>Criar ou Atualizar Albuns</h4>

	<input type="hidden" class="form-control" id="id_foto" name="id_foto" placeholder="id_foto">

	<div class="form-group">
	    <label for="id_evento" class="col-sm-2 control-label">Evento</label>
	    <div class="col-sm-10">
		<select class="form-control" id="id_evento" name="id_evento" title="Evento">
		    <option>- Selecione -</option>
		    <?php
		    if (isset($evento) && count($evento)) {
			foreach ($evento as $ev) {
			    ?>
			    <option value="<?= $ev->id_evento ?>"><?= $ev->identificador_evento.' '.$ev->sigla_campeonato.' '. $ev->temporada_campeonato.' - '.$ev->nome_cidade.' - '.date('d/m/Y', strtotime($ev->data_evento)) ?></option>
			    <?php
			}
		    }
		    ?>
		</select>
	    </div>
	</div>
	<div class="form-group">
	    <label for="link_foto" class="col-sm-2 control-label">Link</label>
	    <div class="col-sm-10">
		<input type="text" class="form-control" id="link_foto" name="link_foto"  placeholder="Link do Álbum" title="Link do Álbum">
	    </div>
	</div>
	<div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
		<button type="submit" id="btnSubmit" class="btn btn-default">Salvar</button>
	    </div>
	</div>
    </form>
</div>




<script src="<?php echo base_url('assets/js/system/adm/foto.js'); ?>"></script>