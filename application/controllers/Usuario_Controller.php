<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_Controller extends CI_Controller
{

    public function saveOrUpdateUsuario()
    {
        $this->load->model('Usuario_Model');
        $data = $this->input->post();

        $from = $data['from'];
        unset($data['from']);

        $this->Usuario_Model->saveOrUpdate($data);
        header("location:" . base_url() . $from);
    }

    public function ajaxGetUsuarioById()
    {
        $this->load->model('Usuario_Model');
        $id_usuario = $this->input->post('id_usuario');

        echo json_encode($this->Usuario_Model->getUsuarioById($id_usuario));
    }

    public function ajaxDeleteUsuarioById()
    {
        $this->load->model('Usuario_Model');
        $id_usuario = $this->input->post('id_usuario');

        $this->Usuario_Model->deleteUsuarioById($id_usuario);
    }

    public function ajaxValidaDuplicidade()
    {
        $this->load->model('Usuario_Model');
        $email_usuario = $this->input->post('email_usuario');
        $id_usuario = $this->input->post('id_usuario');

        echo json_encode($this->Usuario_Model->verificaDuplicidadeUsuario($email_usuario, $id_usuario));
    }

    public function login()
    {
        $email_usuario = $this->input->post('email_usuario');
        $senha_usuario = md5($this->input->post('senha_usuario'));
        
        $usuario = $this->validaUsuario($email_usuario, $senha_usuario);

        if ($usuario) {
            $this->openSession($usuario);
            echo json_encode(1);
        } else {
            echo json_encode(0);
        }
    }

    private function validaUsuario($email_usuario, $senha_usuario)
    {
        $this->load->model('Usuario_Model');

        return $this->Usuario_Model->validaUsuario($email_usuario, $senha_usuario);
    }

    private function openSession($usuario)
    {
        $sessionData = array(
            'is_usuario'         => $usuario->is_usuario,
            'nome_usuario'       => $usuario->nome_usuario,
            'email_usuario'      => $usuario->email_usuario,
            'id_perfil'          => $usuario->id_perfil
        );

        $this->session->set_userdata($sessionData);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        header('Location: '. base_url());
    }

}
