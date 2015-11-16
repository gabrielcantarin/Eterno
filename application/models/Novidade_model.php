<?php

class Novidade_Model extends CI_Model
{

    var $table = 'Novidade';

    function __construct()
    {
	parent::__construct();
    }
    
    public function createNovidade($modalidade,$tipo)
    {
	$this->db->set('id_modalidade',$modalidade);
	$this->db->set('tipo_novidade',$tipo);
	$this->db->set('data_novidade',date("Y-m-d"));
	
	$this->db->insert($this->table);
    }
    
    public function getNext5Novidade($modalidade = NULL)
    {
	$this->db->where('removido_novidade',0);
	$this->db->order_by('id_novidade','DESC');
	$this->db->join('Modalidade',"Modalidade.id_modalidade = {$this->table}.id_modalidade");
	$this->db->limit(5);
	
	if($modalidade){
	    $this->db->where('Modalidade.id_modalidade',$modalidade);
	}
	
	$query = $this->db->get($this->table);
	
	return ($query->num_rows() > 0) ? $query->result() : [];
    }

}
