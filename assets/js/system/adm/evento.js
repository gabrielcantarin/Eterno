$(document).ready(function () {
    var base_url = $("#base_url").val();
    CKEDITOR.replace( 'descricao_evento' );

    $("#id_uf").change(function () {
	var uf = $(this).val();
	$("#id_cidade > option").remove();

	if (uf != '- Selecione -') {
	    $.ajax({
		url: base_url + 'Administrativo_Controller/ajaxGetCidade',
		type: 'json',
		method: 'POST',
		data: {
		    uf: uf
		},
		success: function (r) {
		    $("#id_cidade").append('<option>- Selecione -</option>');
		    var obj = $.parseJSON(r);

		    jQuery.each(obj, function (i, val) {
			$("#id_cidade").append('<option value="' + val.id_cidade + '">' + val.nome_cidade + '</option>');
		    });
		}
	    });
	} else {
	    $("#id_cidade").append('<option>- Selecione -</option>');
	}
    });

    $("#btnSubmit").click(function () {
	event.preventDefault();
        
	var erro = [];
	$("#id_modalidade, #id_uf, #id_cidade,  #identificador_evento, #data_evento, #id_status_evento").each(function () {
	    if ($(this).val().trim() == '' || $(this).val() == '- Selecione -') {
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
	var id_evento = $(this).parent().attr('data-id');

	$.ajax({
	    url: base_url + 'Administrativo_Controller/ajaxGetEventoById',
	    type: 'json',
	    method: 'POST',
	    data: {
		id_evento: id_evento
	    },
	    success: function (r) {
		var obj = $.parseJSON(r);
                console.log(obj);
		
		$("#id_evento").val(obj.id_evento);
		$("#id_modalidade").val(obj.id_modalidade);
		$("#id_uf").val(obj.id_uf);
		$("#id_campeonato").val(obj.id_campeonato);
		$("#identificador_evento").val(obj.identificador_evento);
		$("#data_evento").val(obj.data_evento);
		$("#id_status_evento").val(obj.id_status_evento);
		CKEDITOR.instances['descricao_evento'].setData(obj.descricao_evento)
		
		$("#id_uf").change();
		
		setTimeout(function(){
		    $("#id_cidade").val(obj.id_cidade);
		}, 500);
	    }
	});
    });
    
    $("[name='excluir']").click(function () {
	var id_evento = $(this).parent().attr('data-id');
	if(confirm('Tem certeza que deseja remover esse evento ?')){
	    $.ajax({
		url: base_url + 'Administrativo_Controller/ajaxDeleteEventoById',
		type: 'json',
		method: 'POST',
		data: {
		    id_evento: id_evento
		},
		success: function (r) {
		    alert('Evento removido com sucesso.');
		    window.location.href =  base_url + 'Administrativo_Controller/index_evento'
		}
	    });
	}

    });
});
