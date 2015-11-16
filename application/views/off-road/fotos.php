<?php
montaTitulo('Fotos');
?>

<table class="table table-striped  table-hover table-condensed">
    <thead>
    <th>Evento</th>
    <th>Cidade</th>
    <th>Data</th>
</thead>
    <tbody>
	<?php
	if (isset($foto) && count($foto)) {
	    foreach ($foto as $ft) {
		?>
		<tr>
		    <td><a title="<?= $ft->link_foto ?>" href="<?= $ft->link_foto ?>"><?= $ft->identificador_evento . ' ' . $ft->sigla_campeonato . ' ' . $ft->temporada_campeonato ?></a></td>
		    <td><?= $ft->nome_cidade ?></td>
		    <td><?= date('d/m/Y', strtotime($ft->data_evento)) ?></td>
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