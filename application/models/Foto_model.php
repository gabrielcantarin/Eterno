<?php

class Foto_Model extends CI_Model
{

    var $table = 'Foto';

    function __construct()
    {
	parent::__construct();
    }

    public function getFoto($modalidade = NULL)
    {
	$this->db->where('removido_foto',0);
	$this->db->join('Evento',"Evento.id_evento = {$this->table}.id_evento");
	$this->db->join('Cidade',"Cidade.id_cidade = Evento.id_cidade");
	$this->db->join('Campeonato',"Campeonato.id_campeonato = Evento.id_campeonato",'left');
	
	if($modalidade){
	    $this->db->where('Evento.id_modalidade',$modalidade);
	}
	
	$query = $this->db->get($this->table);
	
	return ($query->num_rows() > 0) ? $query->result() : [];
    }
    
    public function saveOrUpdate($data)
    {
	if ($data['id_foto']) {
	    $this->db->update_batch($this->table, [$data],'id_foto');
	} else {
	    unset($data['id_foto']);
	    $this->db->insert_batch($this->table, [$data]);
	}
    }
    
    public function getFotoById($id_foto)
    {
	$this->db->where('id_foto',$id_foto);
	$query = $this->db->get($this->table);
	
	return ($query->num_rows() > 0) ? $query->row() : [];
    }
    
    public function deleteFotoById($id_foto){
	$this->db->set('removido_foto',1);
	$this->db->where('id_foto',$id_foto);
	
	$this->db->update($this->table);
    }

}
