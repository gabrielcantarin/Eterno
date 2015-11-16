<html>
    <head>
        <meta charset="UTF-8">
        <title>Eterno Promoções e Eventos</title>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
        <script src="<?php echo base_url('assets/js/jquery-1.11.1.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/semantic.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/ckeditor/ckeditor.js'); ?>"></script>
        
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/semantic.min.css'); ?>"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        
    </head>
    <body>
	<input type="hidden" id="base_url" name="base_url" value="<?= base_url()?>"/>
        <header>
            <nav class="navbar navbar-inverse" role="navigation">
                <div class="container-fluid">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <i class="orange icon list layout"></i>
                    </button>
                    
                    <div class="navbar-header">
                        <a class="navbar-brand" href="<?php echo base_url('Principal_Controller/index'); ?>" style="font-weight: bold;">ETERNO RACING</a>
                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Empresa <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('Principal_Controller/view/empresa/index.php'); ?>">Home</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('Principal_Controller/view/empresa/contato.php'); ?>">Contato</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('Principal_Controller/view/empresa/fale-conosco.php'); ?>">Fale Conosco</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('Principal_Controller/view/empresa/sobre.php'); ?>">Sobre</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('Principal_Controller/view/empresa/trabalhe-conosco.php'); ?>">Trabalhe Conosco</a></li>
                                </ul>
                            </li>
                        </ul>

                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Antigomobilismo <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('Antigomobilismo_Controller/index'); ?>">Home</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('Antigomobilismo_Controller/agenda'); ?>">Agenda</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('Antigomobilismo_Controller/eventosRealizados'); ?>">Eventos Realizados</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('Antigomobilismo_Controller/fotos'); ?>">Fotos</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('Antigomobilismo_Controller/parceiros'); ?>">Parceiros</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('Antigomobilismo_Controller/regulamento'); ?>">Regulamento</a></li>
                                </ul>
                            </li>
                        </ul>
			
			<ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ciclismo <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('Ciclismo_Controller/index'); ?>">Home</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('Ciclismo_Controller/agenda'); ?>">Agenda</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('Ciclismo_Controller/eventosRealizados'); ?>">Eventos Realizados</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('Ciclismo_Controller/fotos'); ?>">Fotos</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('Ciclismo_Controller/parceiros'); ?>">Parceiros</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('Ciclismo_Controller/regulamento'); ?>">Regulamento</a></li>
                                </ul>
                            </li>
                        </ul>

                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Motocross <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('Motocross_Controller/index'); ?>">Home</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('Motocross_Controller/agenda'); ?>">Agenda</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('Motocross_Controller/classificacao'); ?>">Classificação</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('Motocross_Controller/eventosRealizados'); ?>">Eventos Realizados</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('Motocross_Controller/fotos'); ?>">Fotos</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('Motocross_Controller/inscricoesAntecipadas'); ?>">Inscrições Antecipadas</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('Motocross_Controller/parceiros'); ?>">Parceiros</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('Motocross_Controller/regulamento'); ?>">Regulamento</a></li>
                                </ul>
                            </li>
                        </ul>

                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Off-Road <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('OffRoad_Controller/index'); ?>">Home</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('OffRoad_Controller/agenda'); ?>">Agenda</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('OffRoad_Controller/eventosRealizados'); ?>">Eventos Realizados</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('OffRoad_Controller/fotos'); ?>">Fotos</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('OffRoad_Controller/parceiros'); ?>">Parceiros</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('OffRoad_Controller/regulamento'); ?>">Regulamento</a></li>
                                </ul>
                            </li>
                        </ul>
			
			<ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Skate <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('Skate_Controller/index'); ?>">Home</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('Skate_Controller/agenda'); ?>">Agenda</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('Skate_Controller/classificacao'); ?>">Classificação</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('Skate_Controller/eventosRealizados'); ?>">Eventos Realizados</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('Skate_Controller/fotos'); ?>">Fotos</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('Skate_Controller/inscricoesAntecipadas'); ?>">Inscrições Antecipadas</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('Skate_Controller/parceiros'); ?>">Parceiros</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('Skate_Controller/regulamento'); ?>">Regulamento</a></li>
                                </ul>
                            </li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <?php if ($this->session->userdata('nome_usuario') != '') { ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= $this->session->userdata('nome_usuario') ?> <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <?php if ($this->session->userdata('id_perfil') == 3) { ?>
                                        <li><a href="<?php echo base_url('Administrativo_Controller/index'); ?>">Administrativo</a></li>
                                        <?php } ?>
                                        <li><a href="#">Alterar Dados</a></li>
                                        <li><a href="#"><a href="<?php echo base_url('Usuario_Controller/logout'); ?>">Logout</a></a></li>
                                    </ul>
                                </li>
                            <?php } else { ?>
                                <li><a href="<?php echo base_url('Principal_Controller/login'); ?>">Login</a></li>
                            <?php } ?>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </header>
        <section class="main">
            <div id='main'>
                <?php echo $contents; ?>
            </div>
            <div class="push"></div>
        </section>

        <footer>
            <div class="ui three column grid ">
                <div class="column">
                    <div class="rodape">
                        <div class="ui link list">
                            <h3 class="ui header">ETERNO RACING</h3>
                            <a class="item">Empresa</a>
                            <a class="item">Antigomobilismo</a>
                            <a class="item">Motocross</a>
                            <a class="item">Skate</a>
                            <a class="item">Off-Road</a>
                        </div>
                    </div>
                </div>
                <div class="column middle">
                    <div class="ui ">
                        <h4 class="ui header" style="margin-top: 127px; text-align: center">Todos os Direitos Reservados</h4>
                        <p style="text-align:center;"><a href="http://www.cantarinanet.com.br">www.cantarinanet.com.br</a></p>
                    </div>
                </div>
                <div class="column">
                    <div class="rodape">
                        <div class="ui">
                            <h3 class="ui header">SOCIAL</h3>
                            <div class="ui icon button black">
                                <i class="facebook big icon"></i>
                            </div>
                            <div class="ui icon button black">
                                <i class="flickr big icon"></i>
                            </div>
                            <div class="ui icon button black">
                                <i class="Twitter big icon"></i>
                            </div>
                            <div class="ui icon button black">
                                <i class="Google Plus big icon"></i>
                            </div>
                            <div class="ui icon button black">
                                <i class="youtube big icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>