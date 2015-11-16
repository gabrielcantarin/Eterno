<?php

class Cidade_Model extends CI_Model
{

    var $table = 'Cidade';

    function __construct()
    {
	parent::__construct();
    }

    public function getCidade($uf)
    {
	$this->db->select('id_cidade');
	$this->db->select('nome_cidade');
	$this->db->where('id_uf',$uf);
	
	$query = $this->db->get($this->table);
	
	return ($query->num_rows() > 0) ? $query->result() : [];
    }

}
