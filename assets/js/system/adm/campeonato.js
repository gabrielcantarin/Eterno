$(document).ready(function () {
    var base_url = $("#base_url").val();

    $("#btnSubmit").click(function () {
	event.preventDefault();
	var erro = [];
	$("#nome_campeonato, #sigla_campeonato, #temporada_campeonato").each(function () {
	    if ($(this).val().trim() == '') {
		erro.push($(this).attr('title'));
	    }
	});

	if (!erro.length) {
	    $("#frmEvento").submit();
	} else {
	    alert('Existem campos não preenchidos');
	}
    });

    $("[name='editar']").click(function () {
	var id_campeonato = $(this).parent().attr('data-id');

	$.ajax({
	    url: base_url + 'Administrativo_Controller/ajaxGetCampeonatoById',
	    type: 'json',
	    method: 'POST',
	    data: {
		id_campeonato: id_campeonato
	    },
	    success: function (r) {
		var obj = $.parseJSON(r);
		
		$("#id_campeonato").val(obj.id_campeonato);
		$("#nome_campeonato").val(obj.nome_campeonato);
		$("#sigla_campeonato").val(obj.sigla_campeonato);
		$("#temporada_campeonato").val(obj.temporada_campeonato);
	    }
	});

    });
    
    $("[name='excluir']").click(function () {
	var id_campeonato = $(this).parent().attr('data-id');
	if(confirm('Tem certeza que deseja remover esse Campeonato ?')){
	    $.ajax({
		url: base_url + 'Administrativo_Controller/ajaxDeleteCampeonatoById',
		type: 'json',
		method: 'POST',
		data: {
		    id_campeonato: id_campeonato
		},
		success: function (r) {
		    alert('Campeonato removido com sucesso.');
		    window.location.href =  base_url + 'Administrativo_Controller/index_campeonato'
		}
	    });
	}

    });
});
