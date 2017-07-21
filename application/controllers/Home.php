<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->model('user_model');
    }

    protected function gereraClave() {
        //Se define una cadena de caractares. Te recomiendo que uses esta.
        $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
        //Obtenemos la longitud de la cadena de caracteres
        $longitudCadena = strlen($cadena);
        //Se define la variable que va a contener la contraseña
        $pass = "";
        //Se define la longitud de la contraseña, en mi caso 10, pero puedes poner la longitud que quieras
        $longitudPass = 8;
        //Creamos la contraseña
        for ($i = 1; $i <= $longitudPass; $i++) {
            //Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
            $pos = rand(0, $longitudCadena - 1);
            //Vamos formando la contraseña en cada iteraccion del bucle, añadiendo
            //a la cadena $pass la letra correspondiente a la posicion $pos en la cadena de caracteres definida.
            $pass .= substr($cadena, $pos, 1);
        }
        return $pass;
    }

    public function index() {
        $dato['titulo'] = "Elija tipo de Cita";
        $this->load->view('plantilla/head', $dato);
        ?>
        <a href="<?php echo base_url() ?>home/edificacion" class="btn btn-success">
            <span class="icofont icofont-cement-mix" aria-hidden="true" style="font-size: 1.5em;"></span>
            Citas edificación
        </a>
        <a href="<?php echo base_url() ?>home/funcionamiento" class="btn btn-info ">
            <span class="icofont icofont-industries-alt-4" aria-hidden="true" style="font-size: 1.5em;"></span>
            Citas funcionamiento
        </a>
        <?php
    }

    public function edificacion() {
        $tipo = '00001';
        $datos['tipo'] = $tipo;
        $dato['titulo'] = "Registro de Citas Edificación";
        $this->load->view('plantilla/head', $dato);

        $datos['motivo'] = $this->user_model->motivo($tipo);
        $datos['cabeceraH'] = "Disponibilidad de Operadores";
        $datos['instrucciones'] = "<p>- Completa tus datos.</p> 
                                    <p>- Las citas serán de lunes a viernes, de 8:00 a.m. a 12:00 p.m. </p>
                                    <p>- Una vez registrada la cita, le esperamos puntualmente el día y la hora señalada para atender su trámite.</p>";
        $this->load->view('user/fechas', $datos);
        $this->load->view('plantilla/foot');
    }

    public function funcionamiento() {
        $tipo = '00002';
        $datos['tipo'] = $tipo;
        $dato['titulo'] = "Registro de Citas Edificación";
        $this->load->view('plantilla/head', $dato);

        $datos['motivo'] = $this->user_model->motivo($tipo);
        $datos['cabeceraH'] = "Disponibilidad de Asesores de Plataforma";
        $datos['instrucciones'] = "<p>- Completa tus datos.</p> 
                                    <p>- Las citas serán de lunes a viernes, de 8:00 a.m. a 1:00 p.m. </p>
                                    <p>- Una vez registrada la cita, le esperamos puntualmente el día y la hora señalada.</p>";
        $this->load->view('user/fechas', $datos);
        $this->load->view('plantilla/foot');
    }

    public function mostrarfechas() {
        $tipo = $this->input->post('tipo');
        $fecha = $this->input->post('txtfecha');
        $motivo = $this->input->post('cmbMotivo');
        $datos['tabla'] = $this->user_model->fechas($fecha, $tipo);
        echo $datos;
        $datos['tipo'] = $tipo;
        $this->load->view('user/tablafechas', $datos);
    }

    public function formulario() {
        $datos['programacion'] = $this->input->post('valorProgramacion');
        $datos['hora'] = $this->input->post('valorHora');
        $datos['fecha'] = $this->input->post('vfecha');
        $datos['tipo'] = $this->input->post('vtipo');
        $datos['motivo'] = $this->input->post('vmotivo');
        $this->load->view('user/formularioAdministrado', $datos);
    }

    public function buscar() {
        $doc = $this->input->post('numdoc');
        //busca si esxiste administrado y develve datos 
        $datos = $this->user_model->buscarAdministrado($doc);
        echo json_encode($datos);
    }

    public function guardar() {
        $tipo = $this->input->post('tipo');
        $modalidad = $this->input->post('vmotivo');
        $idprog = $this->input->post('idprog');
        $doc = $this->input->post('numero');
        $tipodoc = $this->input->post('tipoDocumento');
        $nombre_razonsocial = strtoupper($this->input->post('TXT_NOMBRE_RAZONSOCIAL'));
        $apellido_representante = strtoupper($this->input->post('TXT_APELLIDO_REPRESENTANTE'));
        $email = strtoupper($this->input->post('TXT_EMAIL'));
        $telefono = $this->input->post('NUM_TELEFONO');
        $direccion = strtoupper($this->input->post('TXT_DIRECCION'));
        $direccion_local = strtoupper($this->input->post('TXT_DIRECCIONLOCAL'));
        $giro = $this->input->post('txt_giro');
        $area = $this->input->post('txt_area');
        $code = $this->gereraClave();
        //verifica si esxiste administrado
        if ($this->user_model->validaDocumento($doc) == true) {
            if ($tipo == "00001") {
                $update = [
                    'TXT_NOMBRE_RAZONSOCIAL' => $nombre_razonsocial,
                    'TXT_APELLIDO_REPRESENTANTE' => $apellido_representante,
                    'TXT_EMAIL' => $email,
                    'NUM_TELEFONO' => $telefono,
                    'TXT_DIRECCION' => $direccion
                ];
            } else if ($tipo == "00002") {
                $update = [
                    'TXT_NOMBRE_RAZONSOCIAL' => $nombre_razonsocial,
                    'TXT_EMAIL' => $email,
                    'NUM_TELEFONO' => $telefono
                ];
            }
            //actualizamos datos del administrado
            $this->user_model->updateAdministrado($doc, $update);
        } else {
            $insertAdmin = [
                'COD_DOCUMENTO' => $doc,
                'TIPDOC' => $tipodoc,
                'TXT_NOMBRE_RAZONSOCIAL' => $nombre_razonsocial,
                'TXT_APELLIDO_REPRESENTANTE' => $apellido_representante,
                'TXT_EMAIL' => $email,
                'NUM_TELEFONO' => $telefono,
                'TXT_DIRECCION' => $direccion
            ];
            //guardamos datos del administrado
            $this->user_model->guardarAdministrado($insertAdmin);
        }
        $insertcita = [
            'COD_CITA' => NULL,
            'COD_ESTADO' => '0',
            'COD_DOCUMENTO' => $doc,
            'COD_MODALIDAD' => $modalidad,
            'COD_PROGRAMACION' => $idprog,
            'COD_CODE' => $code,
            'COD_TIPOTRAMITE' => $tipo,
            'COD_ASISTIO' => '',
            'COD_OBSERVACION' => '',
            'TXT_GIRO' => $giro,
            'TXT_AREA' => $area,
            'TXT_DIRECCIONLOCAL' => $direccion_local
        ];
        $idcita = $this->user_model->guardarCita($insertcita);
        if ($this->enviarCorreo($idcita) == true) {
            ?>                       
            <p style="text-align: center;">Estimado(a) Usuario, su Cita ha sido Reservada.</p>
            <p style="text-align: center;">Su código de cita es: <label> "<?php echo $code; ?>" </label>
                Verifique su Correo Electrónico.</p>
            <input type="button" class="btn btn-success" onclick="document.location.reload();" value="Aceptar">
            <a href="<?php echo base_url() ?>home/tickepdf/<?php echo $idcita; ?>" class="btn btn-link">
                <span class="icofont icofont-download" aria-hidden="true"></span>
                Versión Imprimible
            </a>
            <?php
        } else {
            ?>
            <p style="text-align: center;">Estimado(a) Usuario, ocurrio un error inesperado intentelo otra vez.</p>
            <input type="button" class="btn btn-success" onclick="document.location.reload();" value="Aceptar">
            <?php
        }
    }

    protected function enviarCorreo($idcita) {
        $this->load->library('My_PHPmailer');
        $data = $this->user_model->buscarCita($idcita);
        if ($data->COD_TIPOTRAMITE == '00001') {
            $asunto = "REGISTRO DE CITAS EN UN CLICK";
        } elseif ($data->COD_TIPOTRAMITE == '00002') {
            $asunto = "REGISTRO DE CITAS PARA LICENCIAS DE FUNCIONAMIENTO";
        }
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPDebug = 0;                                           /* Habilitamos el debug por si existen errores podamos imprimirlos */
        $mail->SMTPAuth = true;
        $mail->Host = "ssl://mail.munisanisidro.gob.pe";
        $mail->Port = 465;                                              /* Configuramos el puerto, si es TLS el puerto es 587 */
        $mail->Username = "ronald.carhuaricra@munisanisidro.gob.pe";
        $mail->Password = "ivan_:;";
        $mail->AddReplyTo('replyto@munisanisidro.gob.pe', 'Reply to name');
        $mail->SetFrom("tramitesonline@munisanisidro.gob.pe", $asunto);
        $mail->isHTML(true);
        $mail->Subject = "REGISTRO DE CITAS PARA TRAMITES - MUNICIPALIDAD DE SAN ISIDRO - LIMA - PERU"; /* Configuramos el asunto que contendrá el mensaje */
        $mail->Body = $this->load->view('user/correo', $data, TRUE);
        $mail->AddAddress($data->TXT_EMAIL);
        return $mail->Send();
    }

    public function tickepdf($idcita) {
        $this->load->library('dompdf_gen');
        $data = $this->user_model->buscarCita($idcita);
        if ($data->COD_TIPOTRAMITE == '00001') {
            $paper_size1 = array(0, 0, 535.5, 377.1);
        } elseif ($data->COD_TIPOTRAMITE == '00002') {
            $paper_size1 = array(0, 0, 595, 400);
        }
        $this->load->view('user/pdf', $data, false);
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size1);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Cita_" . $data->COD_CODE . ".pdf", array('Attachment' => 1));
    }

}
