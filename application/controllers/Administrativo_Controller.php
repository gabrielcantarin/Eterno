<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Administrativo_Controller extends CI_Controller
{

    function __construct()
    {
	parent::__construct();
    }

    public function index()
    {
	$this->template->load('template', 'adm/index');
    }

    public function index_campeonato()
    {
	$data = [];
	$data['campeonato'] = $this->getCampeonato();
	
	$this->template->load('template', 'adm/campeonato',$data);
    }
    
    public function index_foto()
    {
	$data = [];
	$data['foto']	    = $this->getFoto();
	$data['evento']	    = $this->getEvento();
	
	$this->template->load('template', 'adm/foto',$data);
    }

    public function index_event()
    {
	$data = [];
	$data['evento']	    = $this->getEvento();
	$data['uf']	    = $this->getUf();
	$data['status']	    = $this->getStatus();
	$data['campeonato'] = $this->getCampeonato();
	$data['modalidade'] = $this->getModalidade();
	
	$this->template->load('template', 'adm/evento',$data);
    }
    
    public function index_usuario()
    {
	$data = [];
	$data['uf']	    = $this->getUf();
	$data['usuario']    = $this->getUsuario();
	
	$this->template->load('template', 'adm/usuario',$data);
    }
    
    public function index_noticia()
    {
	$data = [];
	$data['modalidade'] = $this->getModalidade();
	$data['noticia'] = $this->getNoticia();

	$this->template->load('template', 'adm/noticia',$data);
    }

    public function saveOrUpdateEvento()
    {
	$this->load->model('Evento_Model');
	
	$data = $this->input->post();
	
	if($data['id_campeonato'] == SELECIONE){
	    $data['id_campeonato'] = null;
	}
        
	$this->Evento_Model->saveOrUpdate($data);
	
	$this->load->model('Novidade_Model');
	$this->Novidade_Model->createNovidade($data['id_modalidade'],'Agenda');
	
	header("location:".base_url().'Administrativo_controller/index_evento');
    }
    
    public function ajaxDeleteEventoById()
    {
        exit('aki');
	$this->load->model('Evento_Model');
	$id_evento = $this->input->post('id_evento');
	
	$this->Evento_Model->deleteEventoById($id_evento);
    }
    
    private function getEvento()
    {
	$this->load->model('Evento_Model');
	
	return $this->Evento_Model->getEvento();
    }
    
    public function ajaxGetEventoById()
    {
        exit('aki');
	$this->load->model('Evento_Model');
	$id_evento = $this->input->post('id_evento');
        $evento = $this->Evento_Model->getEventoById($id_evento);
	
	echo json_encode($evento);
    }
    
    private function getUf()
    {
	$this->load->model('Uf_Model');
	
	return $this->Uf_Model->getUf();
    }
    
    public function ajaxGetCidade()
    {
	$this->load->model('Cidade_Model');
	$uf = $this->input->post('uf');
	
	echo json_encode($this->Cidade_Model->getCidade($uf));
    }
    
    private function getStatus()
    {
	$this->load->model('Status_Evento_Model');
	
	return $this->Status_Evento_Model->getStatus();
    }
    
    private function getCampeonato()
    {
	$this->load->model('Campeonato_Model');
	
	return $this->Campeonato_Model->getCampeonato();
    }
    
    private function getModalidade()
    {
	$this->load->model('Modalidade_Model');
	
	return $this->Modalidade_Model->getModalidade();
    }
    
    public function saveOrUpdateCampeonato()
    {
	$this->load->model('Campeonato_Model');
	$data = $this->input->post();
	
	$this->Campeonato_Model->saveOrUpdate($data);
	
	header("location:".base_url().'Administrativo_controller/index_campeonato');
    }
    
    public function ajaxGetCampeonatoById()
    {
	$this->load->model('Campeonato_Model');
	$id_campeonato = $this->input->post('id_campeonato');
	
	echo json_encode($this->Campeonato_Model->getCampeonatoById($id_campeonato));
    }
    
    public function ajaxDeleteCampeonatoById()
    {
	$this->load->model('Campeonato_Model');
	$id_campeonato = $this->input->post('id_campeonato');
	
	$this->Campeonato_Model->deleteCampeonatoById($id_campeonato);
    }
    
    public function saveOrUpdateFoto()
    {
	$this->load->model('Foto_Model');
	$data = $this->input->post();
	
	$this->Foto_Model->saveOrUpdate($data);
	
	$this->load->model('Evento_Model');
	$id_modalidade = $this->Evento_Model->getEventoById($data['id_evento'])->id_modalidade;
	
	$this->load->model('Novidade_Model');
	$this->Novidade_Model->createNovidade($id_modalidade,'Galeria de Fotos');
	
	header("location:".base_url().'Administrativo_controller/index_foto');
    }
    
    public function ajaxGetFotoById()
    {
	$this->load->model('Foto_Model');
	$id_foto = $this->input->post('id_foto');
	
	echo json_encode($this->Foto_Model->getFotoById($id_foto));
    }
    
    public function getFoto()
    {
	$this->load->model('Foto_Model');
	
	return $this->Foto_Model->getFoto();
    }
    
    public function ajaxDeleteFotoById()
    {
	$this->load->model('Foto_Model');
	$id_foto = $this->input->post('id_foto');
	
	$this->Foto_Model->deleteFotoById($id_foto);
    }
    
    public function getUsuario()
    {
	$this->load->model('Usuario_Model');
	
	return $this->Usuario_Model->getUsuario();
    }
    
    public function saveOrUpdateNoticia()
    {
	$this->load->model('Noticia_Model');
	$data = $this->input->post();
	
	$this->Noticia_Model->saveOrUpdate($data);
	
	$this->load->model('Novidade_Model');
	$this->Novidade_Model->createNovidade($data['id_modalidade'],'Notícia');
	
	header("location:".base_url().'Administrativo_controller/index_noticia');
    }
    
    private function getNoticia()
    {
	$this->load->model('Noticia_Model');
	
	return $this->Noticia_Model->getNoticia();
    }
    
    public function ajaxDeleteNoticiaById()
    {
	$this->load->model('Noticia_Model');
	$id_noticia = $this->input->post('id_noticia');
	
	$this->Noticia_Model->deleteNoticiaById($id_noticia);
    }
    
    public function ajaxGetNoticiaById()
    {
	$this->load->model('Noticia_Model');
	$id_noticia = $this->input->post('id_noticia');
	
	echo json_encode($this->Noticia_Model->getNoticiaById($id_noticia));
    }
    
}
