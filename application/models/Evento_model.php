<?php

class Evento_Model extends CI_Model
{

    var $table = 'Evento';

    function __construct()
    {
	parent::__construct();
    }

    public function saveOrUpdate($data)
    {
	if ($data['id_evento']) {
	    $this->db->update_batch($this->table, [$data],'id_evento');
	} else {
	    unset($data['id_evento']);
	    $this->db->insert_batch($this->table, [$data]);
	}
    }
    
    public function getEvento()
    {
	$this->db->where('removido_evento',0);
	$this->db->join('Modalidade',"Modalidade.id_modalidade = {$this->table}.id_modalidade");
	$this->db->join('Status_Evento',"Status_Evento.id_status_evento = {$this->table}.id_status_evento");
	$this->db->join('Cidade',"Cidade.id_cidade = {$this->table}.id_cidade");
	$this->db->join('Campeonato',"Campeonato.id_campeonato = {$this->table}.id_campeonato",'left');
	$this->db->order_by('data_evento','Desc');
	
	$query = $this->db->get($this->table);
	
	return ($query->num_rows() > 0) ? $query->result() : [];
    }
    
    public function getEventoById($id_evento)
    {
        header("Access-Control-Allow-Origin: *");
	$this->db->where('Evento.id_evento',$id_evento);
	
	$this->db->join('Cidade',"Cidade.id_cidade = {$this->table}.id_cidade");
	$this->db->join('Campeonato',"Campeonato.id_campeonato = {$this->table}.id_campeonato",'left');
	$this->db->join('Foto',"Foto.id_evento = {$this->table}.id_evento",'left');
	$this->db->join('Uf',"Uf.id_uf = Cidade.id_uf");
	$this->db->limit(1);
	
        
	$query = $this->db->get($this->table);
	
	return ($query->num_rows() > 0) ? $query->row() : [];
    }
    
    public function deleteEventoById($id_evento){
	$this->db->set('removido_evento',1);
	$this->db->where('id_evento',$id_evento);
	
	$this->db->update($this->table);
    }
    
    public function getNext5Evento($modalidade = NULL)
    {
	$today = date("Y-m-d");
	
	$this->db->where('removido_evento',0);
	$this->db->where('data_evento >=',$today);
	$this->db->order_by('data_evento','asc');
	$this->db->join('Cidade',"Cidade.id_cidade = {$this->table}.id_cidade");
	$this->db->join('Campeonato',"Campeonato.id_campeonato = {$this->table}.id_campeonato",'left');
	$this->db->limit(5);
	
	if($modalidade){
	    $this->db->where('id_modalidade',$modalidade);
	}
	
	$query = $this->db->get($this->table);
	
	return ($query->num_rows() > 0) ? $query->result() : [];
    }
    
    public function getAgenda($modalidade = NULL)
    {
	$today = date("Y-m-d");
	
	$this->db->where('removido_evento',0);
	$this->db->where('data_evento >=',$today);
	$this->db->order_by('data_evento','asc');
	$this->db->join('Cidade',"Cidade.id_cidade = {$this->table}.id_cidade");
	$this->db->join('Status_Evento',"Status_Evento.id_status_evento = {$this->table}.id_status_evento");
	$this->db->join('Campeonato',"Campeonato.id_campeonato = {$this->table}.id_campeonato",'left');
	
	if($modalidade){
	    $this->db->where('id_modalidade',$modalidade);
	}
	
	$query = $this->db->get($this->table);
	
	return ($query->num_rows() > 0) ? $query->result() : [];
    }
    
    public function getEventosRealizados($modalidade = NULL)
    {
	$today = date("Y-m-d");
	
	$this->db->where('removido_evento',0);
	$this->db->where('data_evento <=',$today);
	$this->db->where('Evento.id_status_evento',REALIZADO);
	
	$this->db->join('Cidade',"Cidade.id_cidade = {$this->table}.id_cidade");
	$this->db->join('Status_Evento',"Status_Evento.id_status_evento = {$this->table}.id_status_evento");
	$this->db->join('Campeonato',"Campeonato.id_campeonato = {$this->table}.id_campeonato",'left');
	
	$this->db->order_by('data_evento','asc');
	
	if($modalidade){
	    $this->db->where('id_modalidade',$modalidade);
	}
	
	$query = $this->db->get($this->table);
	return ($query->num_rows() > 0) ? $query->result() : [];
    }

}
