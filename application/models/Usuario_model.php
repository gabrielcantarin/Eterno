<?php

class Usuario_Model extends CI_Model
{

    var $table = 'Usuario';

    function __construct()
    {
	parent::__construct();
    }

    public function saveOrUpdate($data)
    {
	if ($data['id_usuario']) {
	    $this->db->update_batch($this->table, [$data],'id_usuario');
	} else {
	    unset($data['id_usuario']);
	    $this->db->insert_batch($this->table, [$data]);
	}
    }
    
    public function getUsuario()
    {
	$this->db->where('removido_usuario',0);
	$this->db->join('Perfil',"Perfil.id_perfil = {$this->table}.id_perfil");
	
	$query = $this->db->get($this->table);
	
	return ($query->num_rows() > 0) ? $query->result() : [];
    }
    
    public function getUsuarioById($id_usuario)
    {
	$this->db->where('id_usuario',$id_usuario);
	$this->db->join('Perfil',"Perfil.id_perfil = {$this->table}.id_perfil");
	$this->db->join('Cidade',"Cidade.id_cidade = {$this->table}.id_cidade");
	$this->db->join('Uf',"Uf.id_uf = Cidade.id_uf");
	
	
	$query = $this->db->get($this->table);
	
	return ($query->num_rows() > 0) ? $query->row() : [];
    }
    
    public function deleteUsuarioById($id_usuario)
    {
	$this->db->set('removido_usuario',1);
	$this->db->where('id_usuario',$id_usuario);
	
	$this->db->update($this->table);
    }
    
    public function verificaDuplicidadeUsuario($email_usuario,$id_usuario)
    {
	if($id_usuario){
	    $this->db->where('id_usuario <>',$id_usuario);
	}
	
	$this->db->where('email_usuario',$email_usuario);
	$this->db->where('removido_usuario',0);
	
	$query = $this->db->get($this->table);
	
	return ($query->num_rows() > 0) ? false : true;
    }
    
    public function validaUsuario($email_usuario,$senha_usuario)
    {
	$this->db->where('email_usuario',$email_usuario);
	$this->db->where('senha_usuario',$senha_usuario);
	$this->db->where('removido_usuario',0);
	
	$query = $this->db->get($this->table);
	
	return ($query->num_rows() > 0) ? $query->row() : [];
    }
}
