<?php
montaTitulo('Notícia');
//montaBreadCrumb($_SERVER['REQUEST_URI']);
?>

<div id="container table-responsive">
    <h4>Lista de Notícias</h4>
    <div class="table-responsive">
	<table class="table table-striped table-bordered table-hover table-condensed">
	    <thead>
	    <th>Modalidade</th>
	    <th>Título</th>
	    <th>Data</th>
	    <th>Autor</th>
	    <th>Ações</th>
	    </thead>
	    <tbody>
		<?php
		if (isset($noticia) && count($noticia)) {
		    foreach ($noticia as $not) {
			?>
			<tr>
			    <td><?= $not->nome_modalidade ?></td>
			    <td><?= $not->titulo_noticia ?></td>
			    <td><?= date('d/m/Y', strtotime($not->data_noticia)) ?></td>
			    <td><?= $not->nome_usuario ?></td>
			    <td data-id="<?= $not->id_noticia ?>"><i class="fa fa-pencil-square-o" name="editar"></i>&nbsp;&nbsp;&nbsp;<i class="fa fa-times" name="excluir"></i></td>
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

    <form class="form-horizontal" id="frmEvento" action="<?php echo base_url('Administrativo_Controller/saveOrUpdateNoticia'); ?>" method="POST">
	<h4>Criar ou Atualizar Notícia</h4>

	<input type="hidden" id="id_noticia"    name="id_noticia">
	<input type="hidden" id="data_noticia"  name="data_noticia" value="<?= date("Y-m-d H:i:s") ?>">
	<input type="hidden" id="id_usuario"    name="id_usuario"   value="<?= isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : '1' ?>">

	<!-- Título -->
	<div class="form-group">
	    <label for="titulo_noticia" class="col-sm-2 control-label">Título</label>
	    <div class="col-sm-10">
		<input maxlength="55" type="text" class="form-control" id="titulo_noticia" name="titulo_noticia"  placeholder="Título" title="Título">
	    </div>
	</div>

	<!-- Chamada -->
	<div class="form-group">
	    <label for="chamada_noticia" class="col-sm-2 control-label">Chamada notícia</label>
	    <div class="col-sm-10">
		<input type="text" class="form-control" id="chamada_noticia" name="chamada_noticia" maxlength="250"  placeholder="Chamada notícia" title="Chamada notícia">
	    </div>
	</div>

	<!-- Modalidade -->
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

	<!-- Texto Notícia -->
	<div class="form-group">
	    <label for="texto_noticia" class="col-sm-2 control-label">Texto Notícia</label>
	    <div class="col-sm-10">
		<textarea class="form-control" id="texto_noticia" name="texto_noticia" text="Texto Notícia" placeholder="Texto Notícia" rows="9" id="comment"></textarea>
	    </div>
	</div>

	<div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
		<button type="submit" id="btnSubmit" class="btn btn-default">Salvar</button>
	    </div>
	</div>
    </form>
</div>




<script src="<?php echo base_url('assets/js/system/adm/noticia.js'); ?>"></script>