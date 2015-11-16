<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Noticia_Controller extends CI_Controller
{

    public function noticia($noticia)
    {
	$dados['noticia'] = $this->getNoticiaById($noticia);

	$this->template->load('template', 'noticia', $dados);
    }

    public function getNoticiaById($noticia)
    {
	$this->load->model('Noticia_Model');
	
	$retorno = $this->Noticia_Model->getNoticiaById($noticia);

	if(!count($retorno)) {
	    header("location:" . base_url() . 'Principal_Controller/error');
	}

	return $retorno;
    }

}
