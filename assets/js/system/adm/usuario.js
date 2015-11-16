$(document).ready(function () {
    var base_url = $("#base_url").val();

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
	$("#nome_usuario, #sobrenome_usuario, #email_usuario, #id_uf, #id_cidade, #id_perfil").each(function () {
	    if ($(this).val().trim() == '' || $(this).val() == '- Selecione -') {
		erro.push($(this).attr('title'));
	    }
	});

	if (!erro.length) {
	    var email_usuario = $("#email_usuario").val();
	    var id_usuario = $("#id_usuario").val();
	    
	    $.ajax({
		url: base_url + 'Usuario_Controller/ajaxValidaDuplicidade',
		type: 'text',
		method: 'POST',
		data: {
		    email_usuario: email_usuario,
		    id_usuario: id_usuario
		},
		success: function (r) {
		    if(r == 0){
			$("#frmEvento").submit();
		    }
		}
	    });
	} else {
	    alert('Existem campos não preenchidos');
	}
    });

    $("[name='editar']").click(function () {
	var id_usuario = $(this).parent().attr('data-id');

	$.ajax({
	    url: base_url + 'Usuario_Controller/ajaxGetUsuarioById',
	    type: 'json',
	    method: 'POST',
	    data: {
		id_usuario: id_usuario
	    },
	    success: function (r) {
		var obj = $.parseJSON(r);

		$("#id_usuario").val(obj.id_usuario);
		$("#nome_usuario").val(obj.nome_usuario);
		$("#sobrenome_usuario").val(obj.sobrenome_usuario);
		$("#id_uf").val(obj.id_uf);
		$("#email_usuario").val(obj.email_usuario);
		$("#telefone_usuario").val(obj.telefone_usuario);
		$("#celular_usuario").val(obj.celular_usuario);
		$("#nascimento_usuario").val(obj.nascimento_usuario);

		$("[name='id_perfil']").removeAttr('checked');
		$("[name='id_perfil']").eq(obj.id_perfil - 1).prop("checked", true);

		$("#id_uf").change();

		setTimeout(function () {
		    $("#id_cidade").val(obj.id_cidade);
		}, 500);
	    }
	});

    });

    $("[name='excluir']").click(function () {
	var id_usuario = $(this).parent().attr('data-id');

	if (confirm('Tem certeza que deseja remover esse usuário ?')) {
	    $.ajax({
		url: base_url + 'Usuario_Controller/ajaxDeleteUsuarioById',
		type: 'json',
		method: 'POST',
		data: {
		    id_usuario: id_usuario
		},
		success: function (r) {
		    alert('Usuário removido com sucesso.');
		    window.location.href = base_url + $("#from").val();
		}
	    });
	}

    });
});
