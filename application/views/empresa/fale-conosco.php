<?php 
    montaTitulo('Fale Conosco'); 
    montaBreadCrumb($_SERVER['REQUEST_URI']);
?>

<script>
    $(document).ready(function(){
        CKEDITOR.replace( 'textArea' );
    });
</script>
<div class="ui form segment">
    <div class="field">
        <label>Nome Completo</label>
        <div class="ui left labeled icon input">
            <input type="text" placeholder="Nome">
            <i class="user icon"></i>
        </div>
    </div>
    <div class="field">
        <label>Telefone para Contato</label>
        <div class="ui left labeled icon input">
            <input type="text" placeholder="Telefone ou Celular">
            <i class="Mobile icon"></i>
        </div>
    </div>
    <div class="field">
        <label>E-mail</label>
        <div class="ui left labeled icon input">
            <input type="email" placeholder="E-mail">
            <i class="icon">@</i>
        </div>
    </div>
    <div class="field">
        <label>Mensagem</label>
        <textarea id="textArea"></textarea>
    </div>
    <div class="ui blue submit button left">Cadastrar</div>
</div>
