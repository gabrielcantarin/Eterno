<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Principal_Controller extends CI_Controller
{

    public function index()
    {
	$dados = [];
	$dados['evento'] = $this->getNext5Evento();
	$dados['novidade'] = $this->getNext5Novidade();
	$dados['noticia'] = $this->getNext3Noticia();
	
	$this->template->load('template', 'index',$dados);
    }
    
    public function login()
    {
	$dados = [];
	
	$this->template->load('template', 'login',$dados);
    }
    
    public function cadastro()
    {
	$dados = [];
	
	$this->template->load('template', 'cadastro',$dados);
    }

    public function view($pagina, $pagina2 = NULL)
    {
	if ($pagina2) {
	    $this->template->load('template', $pagina . "/" . $pagina2);
	} else {
	    $this->template->load('template', $pagina);
	}
    }
    
    public function getNext5Novidade()
    {
	$this->load->model('Novidade_Model');

	return $this->Novidade_Model->getNext5Novidade();
    }
    
    public function getNext5Evento()
    {
	$this->load->model('Evento_Model');

	return $this->Evento_Model->getNext5Evento();
    }
    
    public function getNext3Noticia()
    {
	$this->load->model('Noticia_Model');

	return $this->Noticia_Model->getNext3Noticia();
    }
    
    public function error()
    {
	
	$dados = [];
	
	$this->template->load('template', 'error',$dados);
    }

}
