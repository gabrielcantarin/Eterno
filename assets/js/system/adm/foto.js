$(document).ready(function () {
    var base_url = $("#base_url").val();

    $("#btnSubmit").click(function () {
	event.preventDefault();
	var erro = [];
	$("#id_evento, #link_foto").each(function () {
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
	var id_foto = $(this).parent().attr('data-id');

	$.ajax({
	    url: base_url + 'Administrativo_Controller/ajaxGetFotoById',
	    type: 'json',
	    method: 'POST',
	    data: {
		id_foto: id_foto
	    },
	    success: function (r) {
		var obj = $.parseJSON(r);
		
		$("#id_foto").val(obj.id_foto);
		$("#id_evento").val(obj.id_evento);
		$("#link_foto").val(obj.link_foto);
	    }
	});

    });
    
    $("[name='excluir']").click(function () {
	var id_foto = $(this).parent().attr('data-id');
	
	if(confirm('Tem certeza que deseja remover esse Albúm ?')){
	    $.ajax({
		url: base_url + 'Administrativo_Controller/ajaxDeleteFotoById',
		type: 'json',
		method: 'POST',
		data: {
		    id_foto: id_foto
		},
		success: function (r) {
		    alert('Albúm removido com sucesso.');
		    window.location.href =  base_url + 'Administrativo_Controller/index_foto'
		}
	    });
	}

    });
});
