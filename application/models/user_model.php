<?php

class user_model extends CI_Model {

    public function motivo($tipo) {
        $sql = "SELECT `COD_MODALIDAD`, TXT_MODALIDAD,COD_TIPOTRAMITE FROM acc_tramite WHERE `COD_TIPOTRAMITE`='$tipo'";
        return $this->db->query($sql);
    }

    public function fechas($fecha, $tipo) {
        $sql = "SELECT 
             B.COD_PROGRAMACION
            , B.HR_PROGRAMACION
            , (SELECT A.TXT_OPERADOR FROM acc_operador A WHERE A.COD_OPERADOR=B.COD_OPERADOR) as OPERADOR
            , B.FECHA
            , B.COD_TIPOTRAMITE
            , (SELECT C.COD_ESTADO FROM acc_cita C WHERE C.COD_PROGRAMACION=B.COD_PROGRAMACION) as ESTADO 
            FROM `acc_programacion` B  
            WHERE 
            B.FECHA='$fecha' AND B.COD_TIPOTRAMITE='$tipo'";
        return $this->db->query($sql);
    }

    public function buscarAdministrado($doc) {
        $sql = "SELECT 
                 COD_DOCUMENTO
                 , TXT_NOMBRE_RAZONSOCIAL
                 , TXT_APELLIDO_REPRESENTANTE
                 , TXT_EMAIL
                 , NUM_TELEFONO
                 , TXT_DIRECCION 
                 FROM `acc_administrado` 
                 WHERE COD_DOCUMENTO='$doc'";
        $query = $this->db->query($sql);
        return $query->row();
    }

    public function validaDocumento($doc) {
        $sql = "select * from `acc_administrado` where COD_DOCUMENTO='$doc'";
        $result = $this->db->query($sql);
        if ($result->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function updateAdministrado($doc, $update) {
        $this->db->where('COD_DOCUMENTO', $doc);
        return $this->db->update('acc_administrado', $update);
    }

    public function guardarAdministrado($insertAdmin) {
        $this->db->insert('acc_administrado', $insertAdmin);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function guardarCita($insertcita) {
        if ($this->db->insert('acc_cita', $insertcita)) {
            return $this->db->insert_id();
        } else {
            return FALSE;
        }
    }

    public function buscarCita($idcita) {
        $sql = "SELECT C.COD_CITA
            , C.COD_CODE
            , A.TXT_EMAIL
            , TD.TXTDOC
            , C.COD_DOCUMENTO
            , TXT_MODALIDAD
            , P.FECHA
            , P.HR_PROGRAMACION
            , M.TXT_TIPOTRAMITE
            , C.COD_TIPOTRAMITE
            , C.TXT_GIRO
            , C.TXT_AREA
            , C.TXT_DIRECCIONLOCAL
            , C.COD_OBSERVACION
            FROM acc_cita C
            INNER JOIN acc_administrado A ON C.COD_DOCUMENTO=A.COD_DOCUMENTO
            INNER JOIN acc_programacion P ON P.COD_PROGRAMACION=C.COD_PROGRAMACION
            INNER JOIN acc_tramite T ON T.`COD_MODALIDAD`=C.COD_MODALIDAD
            INNER JOIN acc_modalidadtramite M ON M.COD_TIPOTRAMITE=C.COD_TIPOTRAMITE
            INNER JOIN acc_tipodocumento TD ON TD.TIPDOC=A.TIPDOC
            WHERE cod_cita = '$idcita'";
        $query = $this->db->query($sql);
        return $query->row();
    }

}
