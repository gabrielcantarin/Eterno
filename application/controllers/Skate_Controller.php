<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Skate_Controller extends CI_Controller
{
    public function index()
    {
	$dados = [];
	$dados['evento'] = $this->getNext5Evento();
	$dados['novidade'] = $this->getNext5Novidade();
	$dados['noticia'] = $this->getNext3Noticia();
	
	$this->template->load('template', 'skate/index',$dados);
    }
    
    public function agenda()
    {
	$dados = [];
	$dados['evento'] = $this->getAgenda();
	
	$this->template->load('template', 'skate/agenda',$dados);
    }
    
    public function classificacao()
    {
	$this->template->load('template', 'skate/classificacao');
    }
    
    public function eventosRealizados()
    {
	$dados = [];
	$dados['evento'] = $this->getEventosRealizados();
	
	$this->template->load('template', 'skate/eventos-realizados',$dados);
    }
    
    public function fotos()
    {
	$this->load->model('Foto_Model');
	
	$dados = [];
	$dados['foto'] = $this->Foto_Model->getFoto(SKATE);
	
	$this->template->load('template', 'skate/fotos',$dados);
    }
    
    public function inscricoesAntecipadas()
    {
	$this->template->load('template', 'skate/inscricoes-antecipadas');
    }
    
    public function parceiros()
    {
	$this->template->load('template', 'skate/parceiros');
    }
    
    public function regulamento()
    {
	$this->template->load('template', 'skate/regulamento');
    }
    
    public function getNext5Novidade()
    {
	$this->load->model('Novidade_Model');

	return $this->Novidade_Model->getNext5Novidade(SKATE);
    }
    
    public function getNext5Evento()
    {
	$this->load->model('Evento_Model');

	return $this->Evento_Model->getNext5Evento(SKATE);
    }
    
    public function getNext3Noticia()
    {
	$this->load->model('Noticia_Model');

	return $this->Noticia_Model->getNext3Noticia(SKATE);
    }
    
    public function getAgenda()
    {
	$this->load->model('Evento_Model');
	
	return $this->Evento_Model->getAgenda(SKATE);
    }
    
    public function getEventosRealizados()
    {
	$this->load->model('Evento_Model');
	
	return $this->Evento_Model->getEventosRealizados(SKATE);
    }
}
