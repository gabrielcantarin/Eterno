<?php

class Campeonato_Model extends CI_Model
{

    var $table = 'Campeonato';

    function __construct()
    {
	parent::__construct();
    }

    public function getCampeonato()
    {
	$this->db->where('removido_campeonato',0);
	$query = $this->db->get($this->table);
	
	return ($query->num_rows() > 0) ? $query->result() : [];
    }
    
    public function saveOrUpdate($data)
    {
	if ($data['id_campeonato']) {
	    $this->db->update_batch($this->table, [$data],'id_campeonato');
	} else {
	    unset($data['id_campeonato']);
	    $this->db->insert_batch($this->table, [$data]);
	}
    }
    
    public function getCampeonatoById($id_campeonato)
    {
	$this->db->where('id_campeonato',$id_campeonato);
	$query = $this->db->get($this->table);
	
	return ($query->num_rows() > 0) ? $query->row() : [];
    }
    
    public function deleteCampeonatoById($id_campeonato){
	$this->db->set('removido_campeonato',1);
	$this->db->where('id_campeonato',$id_campeonato);
	
	$this->db->update($this->table);
    }

}
