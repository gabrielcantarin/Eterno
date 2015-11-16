<?php 
    montaTitulo('Eventos Realizados'); 
?>


<table class="table table-striped table-hover table-condensed">
    <thead>
    <th>Evento</th>
    <th>Cidade</th>
    <th>Data</th>
</thead>
<tbody>
    <?php
    if (isset($evento) && count($evento)) {
	foreach ($evento as $ev) {
	    ?>
	    <tr>
		<td>
		    <a href="<?= base_url() . 'Evento_Controller/evento/' . $ev->id_evento ?>">
			<?= $ev->identificador_evento.' '.$ev->sigla_campeonato.' '. $ev->temporada_campeonato ?>
		    </a>
		</td>
		<td><?= $ev->nome_cidade ?></td>
		<td><?= date('d/m/Y', strtotime($ev->data_evento)) ?></td>
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