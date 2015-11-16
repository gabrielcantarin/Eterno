<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Antigomobilismo_Controller extends CI_Controller
{
    public function index()
    {
	$dados = [];
	$dados['evento'] = $this->getNext5Evento();
	$dados['novidade'] = $this->getNext5Novidade();
	$dados['noticia'] = $this->getNext3Noticia();
	
	$this->template->load('template', 'antigomobilismo/index',$dados);
    }
    
    public function fotos()
    {
	$this->load->model('Foto_Model');
	
	$dados = [];
	$dados['foto'] = $this->Foto_Model->getFoto(ANTIGOMOBILISMO);
	
	$this->template->load('template', 'antigomobilismo/fotos',$dados);
    }
    
    public function agenda()
    {
	$dados = [];
	$dados['evento'] = $this->getAgenda();
	
	$this->template->load('template', 'antigomobilismo/agenda',$dados);
    }
    
    public function eventosRealizados()
    {
	$dados = [];
	$dados['evento'] = $this->getEventosRealizados();
	
	$this->template->load('template', 'antigomobilismo/eventos-realizados',$dados);
    }
    
    public function parceiros()
    {
	$this->template->load('template', 'antigomobilismo/parceiros');
    }
    
    public function regulamento()
    {
	$this->template->load('template', 'antigomobilismo/regulamento');
    }
    
    public function getNext5Novidade()
    {
	$this->load->model('Novidade_Model');

	return $this->Novidade_Model->getNext5Novidade(ANTIGOMOBILISMO);
    }
    
    public function getNext5Evento()
    {
	$this->load->model('Evento_Model');

	return $this->Evento_Model->getNext5Evento(ANTIGOMOBILISMO);
    }
    
    public function getNext3Noticia()
    {
	$this->load->model('Noticia_Model');

	return $this->Noticia_Model->getNext3Noticia(ANTIGOMOBILISMO);
    }
    
    public function getAgenda()
    {
	$this->load->model('Evento_Model');
	
	return $this->Evento_Model->getAgenda(ANTIGOMOBILISMO);
    }
    
    public function getEventosRealizados()
    {
	$this->load->model('Evento_Model');
	
	return $this->Evento_Model->getEventosRealizados(ANTIGOMOBILISMO);
    }
}
