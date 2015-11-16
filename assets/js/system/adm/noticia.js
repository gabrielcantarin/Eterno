$(document).ready(function () {
    var base_url = $("#base_url").val();
    CKEDITOR.replace( 'texto_noticia' );

    $("#btnSubmit").click(function () {
	event.preventDefault();
	var erro = [];
	$("#titulo_noticia, #chamada_noticia, #id_evento").each(function () {
	    if ($(this).val().trim() == '' || CKEDITOR.instances['texto_noticia'].getData() == '') {
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
	var id_noticia = $(this).parent().attr('data-id');

	$.ajax({
	    url: base_url + 'Administrativo_Controller/ajaxGetNoticiaById',
	    type: 'json',
	    method: 'POST',
	    data: {
		id_noticia: id_noticia
	    },
	    success: function (r) {
		var obj = $.parseJSON(r);
		
		$("#id_noticia").val(obj.id_noticia);
		$("#data_noticia").val(obj.data_noticia);
		$("#id_usuario").val(obj.id_usuario);
		$("#titulo_noticia").val(obj.titulo_noticia);
		$("#chamada_noticia").val(obj.chamada_noticia);
		$("#id_modalidade").val(obj.id_modalidade);
		CKEDITOR.instances['texto_noticia'].setData(obj.texto_noticia)
	    }
	});

    });
    
    $("[name='excluir']").click(function () {
	var id_noticia = $(this).parent().attr('data-id');
	
	if(confirm('Tem certeza que deseja remover esse Notícia ?')){
	    $.ajax({
		url: base_url + 'Administrativo_Controller/ajaxDeleteNoticiaById',
		type: 'json',
		method: 'POST',
		data: {
		    id_noticia: id_noticia
		},
		success: function (r) {
		    alert('Notícia removida com sucesso.');
		    window.location.href =  base_url + 'Administrativo_Controller/index_noticia'
		}
	    });
	}

    });
});
