<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class OffRoad_Controller extends CI_Controller
{
    public function index()
    {
	$dados = [];
	$dados['evento'] = $this->getNext5Evento();
	$dados['novidade'] = $this->getNext5Novidade();
	$dados['noticia'] = $this->getNext3Noticia();
	
	$this->template->load('template', 'off-road/index',$dados);
    }
    
    public function fotos()
    {
	$this->load->model('Foto_Model');
	
	$dados = [];
	$dados['foto'] = $this->Foto_Model->getFoto(OFFROAD);
	
	$this->template->load('template', 'off-road/fotos',$dados);
    }
    
    public function agenda()
    {
	$dados = [];
	$dados['evento'] = $this->getAgenda();
	
	$this->template->load('template', 'off-road/agenda',$dados);
    }
    
    public function eventosRealizados()
    {
	$dados = [];
	$dados['evento'] = $this->getEventosRealizados();
	
	$this->template->load('template', 'off-road/eventos-realizados',$dados);
    }
    
    public function parceiros()
    {
	$this->template->load('template', 'off-road/parceiros');
    }
    
    public function regulamento()
    {
	$this->template->load('template', 'off-road/regulamento');
    }
    
    public function getNext5Novidade()
    {
	$this->load->model('Novidade_Model');

	return $this->Novidade_Model->getNext5Novidade(OFFROAD);
    }
    
    public function getNext5Evento()
    {
	$this->load->model('Evento_Model');

	return $this->Evento_Model->getNext5Evento(OFFROAD);
    }
    
    public function getNext3Noticia()
    {
	$this->load->model('Noticia_Model');

	return $this->Noticia_Model->getNext3Noticia(OFFROAD);
    }
    
    public function getAgenda()
    {
	$this->load->model('Evento_Model');
	
	return $this->Evento_Model->getAgenda(OFFROAD);
    }
    
    public function getEventosRealizados()
    {
	$this->load->model('Evento_Model');
	
	return $this->Evento_Model->getEventosRealizados(OFFROAD);
    }
}
