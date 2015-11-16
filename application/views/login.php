<?php 
    montaTitulo('Login'); 
?>
<div class="ui segment" >
    <div class="column">
	<form id="frmLogin" name="frmLogin" action="<?php echo site_url('Usuario_Controller/login'); ?>" method="post" >
	    <div class="ui form segment">
		<div class="field">
		    <label>E-mail</label>
		    <div class="ui left labeled icon input">
			<input name="email_usuario" id="email_usuario" type="text" placeholder="E-mail">
			<i class="user icon"></i>
		    </div>
		</div>
		<div class="field">
		    <label>Senha</label>
		    <div class="ui left labeled icon input">
			<input name="senha_usuario" id="senha_usuario" type="password" placeholder="Senha">
			<i class="lock icon"></i>
		    </div>
		</div>
		<div id="btnLogin" class="ui blue submit button left">Login</div>
		<a href="<?php echo site_url('Principal_Controller/cadastro'); ?>"><div class="ui blue submit button right">Criar Conta</div></a>
	    </div>
	</form>
    </div>

<!--    <div class="column" style="width: 45%; float: left; text-align: center; margin-left:8.5%; margin-top: 4%;">
        <div clas="fluid" >
            <div class="login medium ui facebook button">
                <i class="facebook icon"></i>
                Login with Facebook
            </div>
        </div>
        </br>
        <div clas="fluid">
            <div class="login medium ui twitter button">
                <i class="twitter icon"></i>
                Login with Twitter
            </div>
        </div>
        </br>
        <div clas="fluid ">
            <div class="login medium ui google plus button">
                <i class="google plus icon"></i>
                Login with Facebook Google
            </div>
        </div>
    </div>
    
    <div class="column" style="width: 10%; float: left" >
        <div class="ui vertical divider">
            Ou
        </div>
    </div>-->
</div>

<script src="<?php echo base_url('assets/js/system/login.js'); ?>"></script>

