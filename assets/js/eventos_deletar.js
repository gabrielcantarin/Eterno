$(document).ready(function() {
    var cadastrarEvento = 0;
    var listarEvento = 0;
    $("#hideCadastrarEvento").hide();
    $("#hideListarEvento").hide();

    $("#cadastrarEvento").click(function(){
        if(cadastrarEvento == 0){
            $("#hideCadastrarEvento").show('slow');
            cadastrarEvento = 1;
        }else {
            $("#hideCadastrarEvento").hide();
            cadastrarEvento = 0;
        }
    });
    
    $("#listarEventos").click(function(){
        if(listarEvento == 0){
            $("#hideListarEvento").show('slow');
            listarEvento = 1;
        }else {
            $("#hideListarEvento").hide();
            listarEvento = 0;
        }
    });
    
    var selectGrid = $("#hideListarEvento").find($(".conteudoVisibleBox")).find($(".input-group")).find("select[name='selectTipoEvento']");
    $(selectGrid).change(function(){
        var valorSelect = selectGrid.val();
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: '',
            date: '',
            success: function(r){
                
            }
        });
    });
});

