<?php

if (!function_exists('montaTitulo')) {

    function montaTitulo($titulo, $subtitulo = NULL) {
        $string = '';
        $string .= "<h1 class='ui header'>" . $titulo . "</h1>";
        if ($subtitulo) {
            $string .= "<span>" . $subtitulo . "</span>";
        }

        $string .= "<div class='ui divider'></div>";

        print_r($string);
    }

}

if (!function_exists('comboEventos')) {

    function comboEventos() {
        $string = '';
        $string .= "<select id='comboEvento' name='comboEvento' class='form-control' required>";
        $string .= "<option value='0'>Selecione</option>";
        $string .= "<option value='1'>Antigomobilismo</option>";
        $string .= "<option value='2'>Motocross</option>";
        $string .= "<option value='3'>Skate</option>";
        $string .= "<option value='4'>Off-Road</option>";
        $string .= "</select>";

        print_r($string);
    }

}

if (!function_exists('comboUf')) {

    function comboUf() {
        $string = '';
        $string .= "<select id='comboUf' name='comboUf' class='form-control'>";
        $string .= "<option value='0'>Selecione</option>";
        $string .= "<option value='SP'>SP</option>";
        $string .= "<option value='MG'>MG</option>";
        $string .= "<option value='PR'>PR</option>";
        $string .= "<option value='MS'>MS</option>";
        $string .= "<option value='RJ'>RJ</option>";
        $string .= "</select>";

        print_r($string);
    }

}

if (!function_exists('comboStatus')) {

    function comboStatus() {
        $string = '';
        $string .= "<select id='comboStatus' name='comboStatus' class='form-control' required>";
        $string .= "<option value='0'>Selecione</option>";
        $string .= "<option value='1'>A Confirmar</option>";
        $string .= "<option value='2'>Confirmado</option>";
        $string .= "<option value='3'>Realizado</option>";
        $string .= "</select>";

        print_r($string);
    }

}

if (!function_exists('comboMotocross')) {

    function comboMotocross() {
        $string = '';
        $string .= "<select id='comboMotocross' name='comboMotocross' class='form-control' required>";
        $string .= "<option value='0'>Selecione</option>";
        $string .= "<option value='1'>Circuito Eterno Motocross</option>";
        $string .= "<option value='2'>Circuito Interior Paulista de Motocross</option>";
        $string .= "<option value='99'>Extra</option>";
        $string .= "</select>";

        print_r($string);
    }

}

if (!function_exists('comboSkate')) {

    function comboSkate() {
        $string = '';
        $string .= "<select id='comboSkate' name='comboSkate' class='form-control' required>";
        $string .= "<option value='0'>Selecione</option>";
        $string .= "<option value='1'>Circuito Eterno Skate</option>";
        $string .= "<option value='99'>Extra</option>";
        $string .= "</select>";

        print_r($string);
    }

}

if (!function_exists('montaBreadCrumb')) {

    function montaBreadCrumb() {
        $atual = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/principalcontroller/view/index.php';
        $atual = explode('/', $atual);
        $diretorio = '';

        if (count($atual) == 6) {
            $diretorio = $atual[4];
            $atual = $atual[5];
        } else {
            $atual = $atual[4];
        }
        $atual = explode('.', $atual);
        $atual = $atual[0];
        $string = '';
        $arr = array();
//        imprimir($atual);
        switch ($atual) {
            case 'index':
                $arr = array();
                $arr[] = array("atual" => "Home", "url" => base_url('principalcontroller/view/index.php'));
                if ($diretorio) {
                    $arr[] = array("atual" => $diretorio == 'adm' ? 'Administrativo' : $diretorio, "url" => base_url('principalcontroller/view/' . $diretorio . '/index.php'));
                }
                break;
            case 'login':
                $arr = array(
                    array("atual" => "Home", "url" => base_url('principalcontroller/view/index.php')),
                    array("atual" => "Login", "url" => base_url('principalcontroller/view/login.php'))
                );
                break;
            case 'cadastro':
                $arr = array(
                    array("atual" => "Home", "url" => base_url('principalcontroller/view/index.php')),
                    array("atual" => "Login", "url" => base_url('principalcontroller/view/login.php')),
                    array("atual" => "Cadastro", "url" => base_url('principalcontroller/view/cadastro.php'))
                );
                break;
            case 'contato':
                $arr = array(
                    array("atual" => "Home", "url" => base_url('principalcontroller/view/index.php')),
                    array("atual" => "Empresa", "url" => base_url('principalcontroller/view/Empresa/index.php')),
                    array("atual" => "Contato", "url" => base_url('principalcontroller/view/Empresa/contato.php'))
                );
                break;
            case 'fale-conosco':
                $arr = array(
                    array("atual" => "Home", "url" => base_url('principalcontroller/view/index.php')),
                    array("atual" => "Empresa", "url" => base_url('principalcontroller/view/Empresa/index.php')),
                    array("atual" => "Fale Conosco", "url" => base_url('principalcontroller/view/Empresa/fale-conosco.php'))
                );
                break;
            case 'sobre':
                $arr = array(
                    array("atual" => "Home", "url" => base_url('principalcontroller/view/index.php')),
                    array("atual" => "Empresa", "url" => base_url('principalcontroller/view/empresa/index.php')),
                    array("atual" => "Sobre", "url" => base_url('principalcontroller/view/sobre.php'))
                );
                break;
            case 'trabalhe-conosco':
                $arr = array(
                    array("atual" => "Home", "url" => base_url('principalcontroller/view/index.php')),
                    array("atual" => "Empresa", "url" => base_url('principalcontroller/view/Empresa/index.php')),
                    array("atual" => "Fale Conosco", "url" => base_url('principalcontroller/view/Empresa/fale-conosco.php'))
                );
                break;
            case 'agenda':
                $arr = array();
                $arr[] = array("atual" => "Home", "url" => base_url('principalcontroller/view/index.php'));
                if ($diretorio) {
                    $arr[] = array("atual" => $diretorio, "url" => base_url('principalcontroller/view/' . $diretorio . '/index.php'));
                }
                $arr[] = array("atual" => "Agenda", "url" => base_url('principalcontroller/view/'.$diretorio.'/agenda.php'));
                break;
            case 'eventos-realizados':
                $arr = array();
                $arr[] = array("atual" => "Home", "url" => base_url('principalcontroller/view/index.php'));
                if ($diretorio) {
                    $arr[] = array("atual" => $diretorio, "url" => base_url('principalcontroller/view/' . $diretorio . '/index.php'));
                }
                $arr[] = array("atual" => "Eventos Realizados", "url" => base_url('principalcontroller/view/'.$diretorio.'/eventos-realizados.php'));
                break;
            case 'fotos':
                $arr = array();
                $arr[] = array("atual" => "Home", "url" => base_url('principalcontroller/view/index.php'));
                if ($diretorio) {
                    $arr[] = array("atual" => $diretorio, "url" => base_url('principalcontroller/view/' . $diretorio . '/index.php'));
                }
                $arr[] = array("atual" => "Fotos", "url" => base_url('principalcontroller/view/'.$diretorio.'/fotos.php'));
                break;
            case 'parceiros':
                $arr = array();
                $arr[] = array("atual" => "Home", "url" => base_url('principalcontroller/view/index.php'));
                if ($diretorio) {
                    $arr[] = array("atual" => $diretorio, "url" => base_url('principalcontroller/view/' . $diretorio . '/index.php'));
                }
                $arr[] = array("atual" => "Parceiros", "url" => base_url('principalcontroller/view/'.$diretorio.'/parceiros.php'));
                break;
            case 'regulamento':
                $arr = array();
                $arr[] = array("atual" => "Home", "url" => base_url('principalcontroller/view/index.php'));
                if ($diretorio) {
                    $arr[] = array("atual" => $diretorio, "url" => base_url('principalcontroller/view/' . $diretorio . '/index.php'));
                }
                $arr[] = array("atual" => "Regulamento", "url" => base_url('principalcontroller/view/'.$diretorio.'/regulamento.php'));
                break;
            case 'inscricoes-antecipadas':
                $arr = array();
                $arr[] = array("atual" => "Home", "url" => base_url('principalcontroller/view/index.php'));
                if ($diretorio) {
                    $arr[] = array("atual" => $diretorio, "url" => base_url('principalcontroller/view/' . $diretorio . '/index.php'));
                }
                $arr[] = array("atual" => "Inscrições Antecipadas", "url" => base_url('principalcontroller/view/'.$diretorio.'/inscricoes-antecipadas.php'));
                break;
            case 'classificacao':
                $arr = array();
                $arr[] = array("atual" => "Home", "url" => base_url('principalcontroller/view/index.php'));
                if ($diretorio) {
                    $arr[] = array("atual" => $diretorio, "url" => base_url('principalcontroller/view/' . $diretorio . '/index.php'));
                }
                $arr[] = array("atual" => "Classificação", "url" => base_url('principalcontroller/view/'.$diretorio.'/classificacao.php'));
                break;
            case 'cadastrarEvento':
                $arr = array();
                $arr[] = array("atual" => "Home", "url" => base_url('principalcontroller/view/index.php'));
                if ($diretorio) {
                    $arr[] = array("atual" => 'Administrativo', "url" => base_url('principalcontroller/view/' . $diretorio . '/index.php'));
                }
                $arr[] = array("atual" => "Cadastrar Evento", "url" => base_url('principalcontroller/view/'.$diretorio.'/cadastrarEvento.php'));
                break;    
            case 'agendaCRUD':
                $arr = array();
                $arr[] = array("atual" => "Home", "url" => base_url('principalcontroller/view/index.php'));
                if ($diretorio) {
                    $arr[] = array("atual" => 'Administrativo', "url" => base_url('principalcontroller/view/' . $diretorio . '/index.php'));
                }
                $arr[] = array("atual" => "Evento CRUD", "url" => base_url('principalcontroller/view/'.$diretorio.'/agendaCRUD.php'));
                break;
        }

        $string .= '<div class = "ui breadcrumb">';

        for ($i = 0; $i < count($arr); $i++) {

            if ($i < count($arr) - 1) {
                $string .= '<a href="' . $arr[$i]['url'] . '" class = "section">' . $arr[$i]['atual'] . '</a>';
            } else {
                $string .= '<div class="active section">' . $arr[$i]['atual'] . '</div>';
            }

            if ($i < count($arr) - 1) {
                $string .= '<div class = "divider"> / </div>';
            }
        }

        $string .= '</div>';

//    imprimir(count($atual));
        print_r($string);
    }

}

if (!function_exists('montaSlide')) {

    function montaSlide($height = '100%', $width = '100%', $tempo='5000',  $fts = array()) {
        
        $html = '';
        $html.='<style>';
        
        for($i=0;$i<count($fts);$i++){
            $html.='div.item:nth-child('.($i+1).') {';
               $html.="background-image:  url('".base_url('assets/img/'.$fts[$i])."')";
            $html.='}';
        }
        
        $html.='#carousel{';
        $html.='height: '.$height.';';
        $html.='width: '.$width.';';
        
        $html.='}';
        
        $html.='</style>';
        
        $html.= '<div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">';
        $html.= '<div class="carousel-inner">';
        for($i=0;$i<count($fts);$i++){
            if($i==0){
                $html.= '<div class="active item"></div>';
            }else{
                $html.= '<div class="item"></div>';
            }
        }
        $html.= '</div>';
        $html.= '</div>';
        
        
        $html.= '<script>';
        $html.= "$('.carousel').carousel({
                    interval: ".$tempo." 
                });";
        $html.= '</script>';
        print_r($html);
    }

}

if (!function_exists('imprimir')) {

    function imprimir($conteudo) {
        echo "<pre>";
        print_r($conteudo);
        exit;
    }

}

if (!function_exists('data')) {

    function data($mask, $value = NULL, $inc = NULL) {

        $value = (is_numeric($value)) ? "@$value" : $value;
        $date = new DateTime($value, new DateTimeZone('America/Sao_Paulo'));
        $date->modify($inc);
        if ($mask == 'ext') {
            $mes = $date->format('M');
            switch ($mes) {
                case 'Jan':
                    $mes = 'Janeiro';
                    break;
                case 'Feb':
                    $mes = 'Fevereiro';
                    break;
                case 'Mar':
                    $mes = 'Mar&ccedil;o';
                    break;
                case 'Apr':
                    $mes = 'Abril';
                    break;
                case 'May':
                    $mes = 'Maio';
                    break;
                case 'Jun':
                    $mes = 'Junho';
                    break;
                case 'Jul':
                    $mes = 'Julho';
                    break;
                case 'Aug':
                    $mes = 'Agosto';
                    break;
                case 'Sep':
                    $mes = 'Setembro';
                    break;
                case 'Oct':
                    $mes = 'Outubro';
                    break;
                case 'Nov':
                    $mes = 'Novembro';
                    break;
                case 'Dec':
                    $mes = 'Dezembro';
                    break;
            }
            $retorno = $date->format('d') . ' de ' . $mes . ' de ' . $date->format('Y');
        } else {
            $retorno = $date->format($mask);
        }

        return $retorno;
    }

}


if (!function_exists('array_last_key')) {

    function array_last_key($array) {
        foreach ($array as $k => $v) {
            if ($v == end($array)) {
                return $k;
            }
        }
    }

}

if (!function_exists('escapeHTML')) {

    function escapeHTML($valor) {
        $array_invalidos = array('<', '>', '"', '\'');
        $array_validos = array('&lt;', '&gt;', '&#34;', '&#39;');

        return str_replace($array_invalidos, $array_validos, $valor);
    }

}

if (!function_exists('unscapeHTML')) {

    function unscapeHTML($valor) {
        $array_invalidos = array('&lt;', '&gt;', '&#34;', '&#39;');
        $array_validos = array('<', '>', '"', '\'');

        return str_replace($array_invalidos, $array_validos, $valor);
    }

}

if (!function_exists('removeAtributosVazios')) {

    function removeAtributosVazios($obj, $deixarLog = false, $ignorar = array()) {

        if ($deixarLog) {
            $ignorar = array_merge($ignorar, retornaAtributosLog());
        }

        foreach ($obj as $key => $value) {

            if ((!in_array($key, $ignorar)) && !$value && $value != '0') {
                unset($obj->{$key});
            }
        }
    }

}

if (!function_exists('remove_acentos')) {

    function remove_acentos($string, $transform = NULL) {
        $retorno = ereg_replace("[^a-zA-Z0-9_]", "", strtr($string, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", "aaaaeeiooouucAAAAEEIOOOUUC_"));

        return $retorno;
    }

}

if (!function_exists('retornaUsuarioLogado')) {

    function retornaUsuarioLogado() {
        return $_SESSION['usuario']['login'];
    }

}

if (!function_exists('mb_unserialize')) {

    function mb_unserialize($string) {
        $string = preg_replace('!s:(\d+):"(.*?)";!se', "'s:'.strlen('$2').':\"$2\";'", $string);
        return unserialize($string);
    }

}

if (!function_exists('prevenirHtml')) {

    function prevenirHtml($dados) {
        if (is_array($dados) || is_object($dados)) {

            foreach ($dados as $key => $dado) {
                if (is_array($dado) || is_object($dado)) {
                    prevenirHtml($dado);
                } else {
                    $dados->{$key} = htmlentities(utf8_decode($dado));
                }
            }
        } else {
            $dados = htmlentities(utf8_decode($dados));
        }

        return $dados;
    }

}

if (!function_exists('convertCase')) {

    function convertCase($str, $case = 'upper') {

        switch ($case) {
            case "upper" :
            default:
                $str = strtoupper($str);
                $pattern = '/&([A-Z])(UML|ACUTE|CIRC|TILDE|RING|';
                $pattern .= 'ELIG|GRAVE|SLASH|HORN|CEDIL|TH|ORDM|ORDF);/e';
                $replace = "'&'.'\\1'.strtolower('\\2').';'"; //convert the important bit back to lower

                $str = preg_replace($pattern, $replace, $str);

                $pattern = '/&([A-Z]*);/e';
                $replace = "'&'.strtolower('\\1').';'"; //convert the important bit back to lower

                $str = preg_replace($pattern, $replace, $str);

                break;

            case "lower" :
                $str = strtolower($str);
                break;
        }

        return $str;
    }

}

if (!function_exists("toUpper")) {

    function toUpper($str) {
        return strtoupper(strtr($str, "áéíóúâêôãõàèìòùç", "ÁÉÍÓÚÂÊÔÃÕÀÈÌÒÙÇ"));
    }

}


if (!function_exists('convertCaseArray')) {

    function convertCaseArray($array, $atributos, $isArray = TRUE) {

        foreach ($atributos as $atributo) {
            $array[$atributo] = convertCase($array[$atributo]);
        }

        return $array;
    }

}

if (!function_exists('retornaAtributosLog')) {

    function retornaAtributosLog() {
        return array('id_usuario_ins', 'id_usuario_alt', 'data_ins', 'data_alt');
    }

}

if (!function_exists('logInsercao')) {

    function logInsercao($objeto) {

        if (property_exists($objeto, 'id_usuario_ins'))
            $objeto->id_usuario_ins = $_SESSION['usuario']['id'];
        if (property_exists($objeto, 'id_usuario_alt'))
            $objeto->id_usuario_alt = $_SESSION['usuario']['id'];
        if (property_exists($objeto, 'data_ins'))
            $objeto->data_ins = date('Y-m-d');
        if (property_exists($objeto, 'data_alt'))
            $objeto->data_alt = date('Y-m-d');
    }

}

if (!function_exists('logAlteracao')) {

    function logAlteracao($objeto) {
        if (property_exists($objeto, 'id_usuario_ins'))
            unset($objeto->id_usuario_ins);
        if (property_exists($objeto, 'id_usuario_alt'))
            $objeto->id_usuario_alt = $_SESSION['usuario']['id'];
        if (property_exists($objeto, 'data_ins'))
            unset($objeto->data_ins);
        if (property_exists($objeto, 'data_alt'))
            $objeto->data_alt = date('Y-m-d');
    }

}

if (!function_exists('memoria_php')) {

    function memoria_php() {
        $size = memory_get_usage(TRUE);
        $unit = array('b', 'kb', 'mb', 'gb', 'tb', 'pb');
        return @round($size / pow(1024, ($i = floor(log($size, 1024)))), 2) . ' ' . $unit[$i];
    }

}

if (!function_exists('set_memory_relatorio')) {

    function set_memory_relatorio($registros) {
        $qtd_registros = sizeof($registros);

        if ($qtd_registros > 100) {
            $memoria = ceil($qtd_registros * 0.55);
            ini_set('memory_limit', $memoria . 'M');
        }
    }

}

if (!function_exists('mergeSubArray')) {

    function mergeSubArray($array_pai) {

        $array_total = array();

        if (is_array($array_pai[key($array_pai)])) {

            foreach ($array_pai as $array) {

                if (is_array($array[key($array)])) {

                    $array_total = array_merge($array_total, mergeSubArray($array));
                } else {
                    $array_total = array_merge($array_total, $array);
                }
            }
        } else {
            $array_total = $array_pai;
        }

        return $array_total;
    }

}
if (!function_exists('replaceSql')) {

    function replaceSql($str) {

        $caracteres = array('\'', '"', '%', ';', '_');
        $caracteres_trocar = array('\\\'', '\\"', '\\%', '\\;', '\\_');

        return str_replace($caracteres, $caracteres_trocar, $str);
    }

}

if (!function_exists('formata_data')) {

    function formata_data($data, $formato = '') {
        $retorno = '';
        if ($data) {
            $hora = (strlen($data) > 10) ? substr($data, 10) : "";

            if (strstr($data, "/")) {
                list($dia, $mes, $ano) = explode('/', substr($data, 0, 10));
                $formato = $formato ? $formato : "Y-m-d";
            } else {
                list($ano, $mes, $dia) = explode('-', substr($data, 0, 10));
                $formato = $formato ? $formato : "d/m/Y";
            }

            $dataAux = new DateTime($ano . '-' . $mes . '-' . $dia . $hora);
            $retorno = $dataAux->format($formato);
        }

        return $retorno;
    }

}