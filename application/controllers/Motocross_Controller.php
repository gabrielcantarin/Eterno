<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Motocross_Controller extends CI_Controller
{
    public function index()
    {
	$dados = [];
	$dados['evento'] = $this->getNext5Evento();
	$dados['novidade'] = $this->getNext5Novidade();
	$dados['noticia'] = $this->getNext3Noticia();
	
	$this->template->load('template', 'motocross/index',$dados);
    }
    
    public function agenda()
    {
	$dados = [];
	$dados['evento'] = $this->getAgenda();
	
	$this->template->load('template', 'motocross/agenda',$dados);
    }
    
    public function classificacao()
    {
	$this->template->load('template', 'motocross/classificacao');
    }
    
    public function eventosRealizados()
    {
	$dados = [];
	$dados['evento'] = $this->getEventosRealizados();
	
	$this->template->load('template', 'motocross/eventos-realizados',$dados);
    }
    
    public function fotos()
    {
	$this->load->model('Foto_Model');
	
	$dados = [];
	$dados['foto'] = $this->Foto_Model->getFoto(MOTOCROSS);
	
	$this->template->load('template', 'motocross/fotos',$dados);
    }
    
    public function inscricoesAntecipadas()
    {
	$this->template->load('template', 'motocross/inscricoes-antecipadas');
    }
    
    public function parceiros()
    {
	$this->template->load('template', 'motocross/parceiros');
    }
    
    public function regulamento()
    {
	$this->template->load('template', 'motocross/regulamento');
    }
    
    public function getNext5Novidade()
    {
	$this->load->model('Novidade_Model');

	return $this->Novidade_Model->getNext5Novidade(MOTOCROSS);
    }
    
    public function getNext5Evento()
    {
	$this->load->model('Evento_Model');

	return $this->Evento_Model->getNext5Evento(MOTOCROSS);
    }
    
    public function getNext3Noticia()
    {
	$this->load->model('Noticia_Model');

	return $this->Noticia_Model->getNext3Noticia(MOTOCROSS);
    }
    
    public function getAgenda()
    {
	$this->load->model('Evento_Model');
	
	return $this->Evento_Model->getAgenda(MOTOCROSS);
    }
    
    public function getEventosRealizados()
    {
	$this->load->model('Evento_Model');
	
	return $this->Evento_Model->getEventosRealizados(MOTOCROSS);
    }
}
