<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sesion extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        if (!$this->session->userdata('login')) {
            header("location:" . base_url() . 'panel');
        }
        $this->load->model('panel_model');
        
    }

    public function index() {
        $dato['titulo'] = "Panel ";
        $this->load->view('plantilla/head', $dato);
        $this->load->view('panel/admin');
        $this->load->view('plantilla/foot');
    }

    public function mostrarCitas() {
        $fecha = $this->input->post('txtfecha');
        $tipo = $this->session->userdata('tipotramite');
        $datos['tabla'] = $this->panel_model->mostrar($fecha, $tipo);
        $this->load->view('panel/tablaAtencion', $datos);
    }

    public function cambiar() {
        $codcita = $this->input->post('codcita');
        $datos = $this->panel_model->citaobservacion($codcita);
        echo json_encode($datos);
    }

    public function editar($idcita) {
        $this->load->model('user_model');
        $data = $this->user_model->buscarCita($idcita);
        if ($data == NULL) {
            header("location:" . base_url() . 'panel');
        }
        $dato['titulo'] = "Panel ";
        $this->load->view('plantilla/head', $dato);
        $this->load->view('panel/atencion', $data);
        $this->load->view('plantilla/foot');
    }

}
