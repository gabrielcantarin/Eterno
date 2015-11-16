<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Evento_Controller extends CI_Controller
{

    public function evento($evento_id)
    {
	$dados['evento'] = $this->getEventoById($evento_id);

	$this->template->load('template', 'evento', $dados);
    }

    public function getEventoById($evento_id)
    {
	$this->load->model('Evento_Model');
	
	$retorno = $this->Evento_Model->getEventoById($evento_id);

	if(!count($retorno)) {
	    header("location:" . base_url() . 'Principal_Controller/error');
	}

	return $retorno;
    }

}
