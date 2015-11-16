<?php
montaTitulo('Usuários');
//montaBreadCrumb($_SERVER['REQUEST_URI']);

?>

<div id="container table-responsive">
    <h4>Lista de Usuários</h4>
    <div class="table-responsive">
	<table class="table table-striped table-bordered table-hover table-condensed">
	    <thead>
		<th>Nome</th>
		<th>E-mail</th>
		<th>Admin</th>
		<th>Ações</th>
	    </thead>
	    <tbody>
		<?php
		if (isset($usuario) && count($usuario)) {
		    foreach ($usuario as $usu) {
			?>
			<tr>
			    <td><?= $usu->nome_usuario . ' ' . $usu->sobrenome_usuario ?></td>
			    <td><?= $usu->email_usuario ?></td>
			    <td><?= $usu->nome_perfil ?></td>
			    <td data-id="<?= $usu->id_usuario ?>"><i class="fa fa-pencil-square-o" name="editar"></i>&nbsp;&nbsp;&nbsp;<i class="fa fa-times" name="excluir"></i></td>
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

    <form class="form-horizontal" id="frmEvento" action="<?php echo base_url('Usuario_Controller/saveOrUpdateUsuario'); ?>" method="POST">
	<h4>Criar ou Atualizar Usuário</h4>

	<input type="hidden" class="form-control" id="id_usuario" name="id_usuario" placeholder="id_usuario">
	<input type="hidden" class="form-control" id="from" name="from" placeholder="from" value="<?= $_SERVER['REDIRECT_URL'] ?>">

	<!-- Nome -->
	<div class="form-group">
	    <label for="nome_usuario" class="col-sm-2 control-label">Nome</label>
	    <div class="col-sm-10">
		<input type="text" class="form-control" id="nome_usuario" name="nome_usuario"  placeholder="Nome" title="Nome">
	    </div>
	</div>

	<!-- Sobrenome -->
	<div class="form-group">
	    <label for="sobrenome_usuario" class="col-sm-2 control-label">Sobrenome</label>
	    <div class="col-sm-10">
		<input type="text" class="form-control" id="sobrenome_usuario" name="sobrenome_usuario"  placeholder="Sobrenome" title="Sobrenome">
	    </div>
	</div>

	<!-- E-mail -->
	<div class="form-group">
	    <label for="email_usuario" class="col-sm-2 control-label">E-mail</label>
	    <div class="col-sm-10">
		<input type="email" class="form-control" id="email_usuario" name="email_usuario"  placeholder="E-mail" title="E-mail">
	    </div>
	</div>

	<!-- Data Nascimento -->
	<div class="form-group">
	    <label for="nascimento_usuario" class="col-sm-2 control-label">Data de Nascimento</label>
	    <div class="col-sm-10">
		<input type="date" class="form-control" id="nascimento_usuario" name="nascimento_usuario"  placeholder="Data de Nascimento" title="Data de Nascimento">
	    </div>
	</div>

	<!-- Telefone -->
	<div class="form-group">
	    <label for="telefone_usuario" class="col-sm-2 control-label">Telefone</label>
	    <div class="col-sm-10">
		<input type="text" class="form-control" id="telefone_usuario" name="telefone_usuario"  placeholder="Telefone" title="Telefone">
	    </div>
	</div>

	<!-- Celular -->
	<div class="form-group">
	    <label for="celular_usuario" class="col-sm-2 control-label">Celular</label>
	    <div class="col-sm-10">
		<input type="text" class="form-control" id="celular_usuario" name="celular_usuario"  placeholder="Celular" title="Celular">
	    </div>
	</div>

	<!-- UF -->
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

	<!-- Cidade -->
	<div class="form-group">
	    <label for="id_cidade" class="col-sm-2 control-label">Cidade</label>
	    <div class="col-sm-10">
		<select class="form-control" id="id_cidade" name="id_cidade" title="Cidade">
		    <option>- Selecione -</option>
		</select>
	    </div>
	</div>

	<!-- Perfil -->
	<div class="form-group">
	    <label for="id_cidade" class="col-sm-2 control-label">Perfil</label>
	    <div class="col-sm-10">
		<div class="radio">
		    <label><input type="radio" id="id_perfil" name="id_perfil" value="1" style="margin: -6px 10px 0px -20px">Normal</label>
		</div>
		<div class="radio">
		    <label><input type="radio" id="id_perfil" name="id_perfil" value="2" style="margin: -6px 10px 0px -20px">Escritor</label>
		</div>
		<div class="radio">
		    <label><input type="radio" id="id_perfil" name="id_perfil" value="3" style="margin: -6px 10px 0px -20px">Administrador</label>
		</div>
	    </div>
	</div>

	<div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
		<button type="submit" id="btnSubmit" class="btn btn-default">Salvar</button>
	    </div>
	</div>

    </form>
</div>




<script src="<?php echo base_url('assets/js/system/adm/usuario.js'); ?>"></script>