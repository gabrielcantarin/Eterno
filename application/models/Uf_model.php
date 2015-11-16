<?php

class Uf_Model extends CI_Model
{

    var $table = 'Uf';

    function __construct()
    {
	parent::__construct();
    }

    public function getUf()
    {
	$this->db->select('id_uf');
	$this->db->select('sigla_uf');
	
	$query = $this->db->get($this->table);

	return ($query->num_rows() > 0) ? $query->result() : [];
    }

}
