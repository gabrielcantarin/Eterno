<?php

class Noticia_Model extends CI_Model
{

    var $table = 'Noticia';

    function __construct()
    {
	parent::__construct();
    }

    public function getNoticia()
    {
	$this->db->where('removido_noticia',0);
	$this->db->join('Usuario',"Usuario.id_usuario = {$this->table}.id_usuario");
	$this->db->join('Modalidade',"Modalidade.id_modalidade = {$this->table}.id_modalidade");
	
	$query = $this->db->get($this->table);
	
	return ($query->num_rows() > 0) ? $query->result() : [];
    }
    
    public function saveOrUpdate($data)
    {
	if ($data['id_noticia']) {
	    $this->db->update_batch($this->table, [$data],'id_noticia');
	} else {
	    unset($data['id_noticia']);
	    $this->db->insert_batch($this->table, [$data]);
	}
    }
    
    public function getNoticiaById($id_noticia)
    {
	$this->db->where('id_noticia',$id_noticia);
	$this->db->join('Usuario',"Usuario.id_usuario = {$this->table}.id_usuario");
	$this->db->where('removido_noticia',0);
	$query = $this->db->get($this->table);
	
	return ($query->num_rows() > 0) ? $query->row() : [];
    }
    
    public function deleteNoticiaById($id_noticia){
	$this->db->set('removido_noticia',1);
	$this->db->where('id_noticia',$id_noticia);
	
	$this->db->update($this->table);
    }
    
    public function getNext3Noticia($modalidade = null)
    {
	$this->db->limit(3);
	$this->db->where('removido_noticia',0);
	$this->db->order_by('data_noticia','DESC');
	
	if($modalidade){
	    $this->db->where('id_modalidade',$modalidade);
	}
	
	$query = $this->db->get($this->table);
	
	return ($query->num_rows() > 0) ? $query->result() : [];
    }

}
