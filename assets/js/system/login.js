$(document).ready(function () {
    var base_url = $("#base_url").val();

    $("#btnLogin").click(function () {

        var email_usuario = $("#email_usuario").val();
        var senha_usuario = $("#senha_usuario").val();
        
        if(email_usuario.trim() && senha_usuario.trim()){
            $.ajax({
                url: base_url + 'Usuario_Controller/login',
                type: 'json',
                method: 'POST',
                data: {
                    email_usuario: email_usuario,
                    senha_usuario: senha_usuario
                },
                success: function (r) {
                    console.log(r);
                    if(r == 0){
                        alert('Usuário ou senha inválidos');
                    } else {
                        window.location.href = base_url;
                    }
                }
            });
        }else{
            alert('Favor verificar usuário e senha!');
        }

    });
});