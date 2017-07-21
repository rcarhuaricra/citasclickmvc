<?php

class panel_model extends CI_Model {

    public function buscarOperador($user, $password) {
        $sql = "SELECT 
                COD_OPERADOR
                , txt_operador
                , txt_rol 
                , cod_tipotramite
                , nom_operador
                FROM `acc_operador` O
                INNER JOIN `acc_roles` R ON O.cod_rol=R.cod_rol
                WHERE NOM_OPERADOR='$user' AND TXT_CLAVE='$password'";
        $query = $this->db->query($sql);

        return $query->row();
    }

    public function mostrar($fecha, $tipo) {
        $sql = "SELECT C.COD_CITA
              , C.COD_CODE
            , C.COD_DOCUMENTO
            , A.TXT_NOMBRE_RAZONSOCIAL
            , E.TXT_ESTADO
            , TD.TXTDOC
            , T.TXT_MODALIDAD
            , P.FECHA
            , P.HR_PROGRAMACION
            , P.COD_OPERADOR
            , M.TXT_TIPOTRAMITE
            , C.COD_TIPOTRAMITE
            , C.TXT_GIRO
            , C.TXT_DIRECCIONLOCAL
            , C.COD_OBSERVACION
            , C.TXT_AREA
             FROM acc_cita C
            INNER JOIN acc_estadocita E ON C.COD_ESTADO = E.COD_ESTADO
            INNER JOIN acc_tramite T ON T.COD_MODALIDAD=C.COD_MODALIDAD 
            INNER JOIN acc_programacion P ON P.COD_PROGRAMACION=C.COD_PROGRAMACION
            INNER JOIN acc_administrado A ON C.COD_DOCUMENTO=A.COD_DOCUMENTO 
            INNER JOIN acc_tipodocumento TD  ON TD.TIPDOC = A.TIPDOC
            INNER JOIN acc_modalidadtramite M ON M.COD_TIPOTRAMITE=C.COD_TIPOTRAMITE
            WHERE P.FECHA='$fecha' AND C.COD_TIPOTRAMITE='$tipo'";
        return $this->db->query($sql);
    }

    public function citaobservacion($cita) {
        $sql = "SELECT * FROM acc_cita WHERE COD_CITA='$cita'";
        $query = $this->db->query($sql);
        return $query->row();
    }

}
