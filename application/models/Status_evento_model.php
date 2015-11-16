<?php

class Status_Evento_Model extends CI_Model
{

    var $table = 'Status_Evento';

    function __construct()
    {
	parent::__construct();
    }

    public function getStatus()
    {
	$query = $this->db->get($this->table);
	
	return ($query->num_rows() > 0) ? $query->result() : [];
    }

}
