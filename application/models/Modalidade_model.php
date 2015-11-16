<?php

class Modalidade_Model extends CI_Model
{

    var $table = 'Modalidade';

    function __construct()
    {
	parent::__construct();
    }

    public function getModalidade()
    {
	$query = $this->db->get($this->table);
	
	return ($query->num_rows() > 0) ? $query->result() : [];
    }

}
