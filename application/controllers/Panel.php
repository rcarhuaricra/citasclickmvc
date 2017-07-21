<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->model('panel_model');
         if ($this->session->userdata('login')) {
            header("location:" . base_url() . 'sesion');
        } 
    }

    public function index() {
        $dato['titulo'] = "Login Citas";
        $this->load->view('plantilla/head', $dato);
        $this->load->view('panel/login');
        $this->load->view('plantilla/foot');
    }

    public function comprobar() {
        $user = strtoupper($this->input->post('usuario'));
        $password = md5(strtoupper($this->input->post('password')));
        $datos = $this->panel_model->buscarOperador($user, $password);
        //busca si esxiste administrado y develve datos 
        if ($datos == null) {
            echo json_encode($datos);
        } else {
            $data = array(
                'COD_OPERADOR' => $datos->COD_OPERADOR,
                'txt_operador' => $datos->txt_operador,
                'rol' => $datos->txt_rol,
                'tipotramite' => $datos->cod_tipotramite,                
                'login' => TRUE
            );
            $this->session->set_userdata($data);
            echo json_encode($datos);
        }
    }

    public function logout() {
        $this->session->sess_destroy();   
        header("location:" . base_url() . 'panel');
    }

}
