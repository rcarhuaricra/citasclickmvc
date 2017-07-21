<?php
$COD_CITA = $COD_CITA;
$COD_CODE = $COD_CODE;
$correo = $TXT_EMAIL;
$TIPODOC = $TXTDOC;
$COD_DOCUMENTO = $COD_DOCUMENTO;
$COD_MODALIDAD = $TXT_MODALIDAD;
$FECHA = $FECHA;
$HORA = $HR_PROGRAMACION;
$MODALIDAD = $TXT_TIPOTRAMITE;
$COD_TIPOTRAMITE = $COD_TIPOTRAMITE;
$TXT_GIRO = $TXT_GIRO;
$TXT_AREA = $TXT_AREA;
$TXT_DIRECCIONLOCAL = $TXT_DIRECCIONLOCAL;
if ($COD_TIPOTRAMITE == '00001') {
    $atencion1 = 'Modulo';
    $anexo = '2908';
    $masdatos = '';
    $asunto = "REGISTRO DE CITAS EN UN CLICK";
    $imp = "Versi&oacute;n Imprimible.";
    $subtite = "";
} elseif ($COD_TIPOTRAMITE == '00002') {
    $atencion1 = 'Asesor de Plataforma';
    $anexo = '6412';
    $asunto = "REGISTRO DE CITAS PARA LICENCIAS DE FUNCIONAMIENTO";
    $masdatos = "<tr> 
                    <td align='left' style='font-size:16px;padding: 5px 0 5px 10px '>
                        <strong>Giros en Consulta: </strong>$TXT_GIRO
                    </td>
                </tr>";
    $imp = "Versi&oacute;n Imprimible y Requisitos.";
    $subtite = "<tr > 
                <td align='center'  style='font-size:15px; color: #2b573a;font-weight:bold;padding:0px 0px 20px 0px'>
                Solo para ingreso de Expedientes de Licencias de Funcionamiento con ITSE BASICA EX POST
                </td>
                </tr>";
}
?>
<meta charset='UTF-8'>
<div id=':1t2' class='ii gt adP adO'>
    <div id=':1t1' class='a3s aXjCH m153e201a39382d31'>
        <table border='0' cellpadding='0' cellspacing='0' width='100%'>
            <tbody>
                <tr>
                    <td style='font-family: Helvetica,sans-serif;line-height:14px;font-size:11px;color:#333333;text-align:center'>                    
                        <a title='Versión Online' href="<?php echo base_url(); ?>home/tickepdf/<?php echo$COD_CITA;?>" target='_blank' data-saferedirecturl='#'><?php echo $imp; ?></a> 
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td>
                        <table style='font-family: Arial,sans-serif; font-size:16px; width:100%; background:#ffffff; margin:0; padding:0'>
                            <tbody>
                                <tr style='font-family: Arial,sans-serif;font-size:16px;margin:0;padding:0'>
                                    <td style='font-family: Arial,sans-serif;font-size:16px;vertical-align:top;margin:0;padding:0' valign='top'></td>
                                    <td width='600' style='font-family: Arial,sans-serif;font-size:16px;vertical-align:top;display:block!important;max-width:600px!important;clear:both!important;margin:10px auto 0px;padding:0;border:1px solid #333' valign='top'>
                                        <div style='font-family: Arial,sans-serif;font-size:16px;max-width:600px;display:block;margin:0px auto 0;padding:0px'>
                                            <table width='100%' cellpadding='0' cellspacing='0' style='font-family: Arial,sans-serif;font-size:16px;background:#fff;margin:0;padding:0'>
                                                <tbody>
                                                    <tr style='font-family: Arial,sans-serif;font-size:16px;margin:0;padding:0'>
                                                        <td style='font-family: Arial,sans-serif;font-size:16px;vertical-align:top;margin:0;padding:0px' valign='top'>
                                                            <table width='100%' cellpadding='5' cellspacing='5' style='font-family: Arial,sans-serif;font-size:16px;margin:0;padding:0;' bgcolor='#fff'>
                                                                <tbody>
                                                                    <tr>
                                                                        <td align='left' style='padding:20px 10px 0 20px ; '><img src='http://msi.gob.pe/portal/msicitas/img/logomsi.png' alt='' width='75px'/></td>
                                                                        <td align='' style='padding:20px 0 0 20px' >                                                                   
                                                                            <table>
                                                                                <tr > 
                                                                                    <td align='center'  style='font-size:29px; color: #2b573a;font-weight:bold; '>
                                                                                        Municipalidad de San Isidro 
                                                                                    </td>
                                                                                </tr>
                                                                                <tr > 
                                                                                    <td align='center'  style='font-size:18px; color: #2b573a;font-weight:bold;padding:0px 0px 20px 0px'>
                                                                                        Citas para <?php echo $MODALIDAD; ?>
                                                                                    </td>

                                                                                </tr>
                                                                                <tr align='right'> 
                                                                                    <td style='font-size:17px; font-weight:bold;padding:10px 0px 20px 0px'>
                                                                                        Codigo de Cita:<?php echo $COD_CODE; ?>
                                                                                    </td>

                                                                                </tr>
                                                                                <?php echo $subtite ?>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr style='font-family: Arial,sans-serif;font-size:16px;margin:0;padding:0'>
                                                        <td style='font-family: Arial,sans-serif;font-size:16px;vertical-align:top;margin:0;padding:0px 20px 20px 20px' valign='top'>
                                                            <table width='100%' cellpadding='0' cellspacing='0' style='font-family: Arial,sans-serif;font-size:16px;margin:0;padding:0'>
                                                                <hr>
                                                                <tbody>
                                                                    <tr > 
                                                                        <td align='left'  style='font-size:16px;padding: 10px 0 5px 0px'>
                                                                            Estimado Usuario Ud. ha reservado una cita con la siguiente informaci&oacute;n:
                                                                        </td>
                                                                    </tr>
                                                                    <tr > 
                                                                        <td align='left' style='font-size:16px;padding: 5px 0 5px 10px '>
                                                                            <strong><?php echo $TIPODOC ?>: </strong><?php echo $COD_DOCUMENTO; ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr > 
                                                                        <td align='left' style='font-size:16px;padding: 5px 0 5px 10px '>
                                                                            <strong>Motivo de Cita: </strong><?php echo $COD_MODALIDAD; ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr > 
                                                                        <td align='left' style='font-size:16px;padding: 5px 0 5px 10px '>
                                                                            <strong>Fecha de Cita: </strong><?php echo $FECHA; ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr > 
                                                                        <td align='left' style='font-size:16px;padding: 5px 0 5px 10px '>
                                                                            <strong>Hora de Cita: </strong><?php echo $HORA; ?>
                                                                        </td>
                                                                    </tr><?php echo $masdatos; ?>

                                                                    <tr >
                                                                        <td align = 'left' style = 'font-size:16px;padding: 5px 0px 0px 10px '>
                                                                            <strong>Lugar de Atenci&oacute;n: </strong> <?php echo LOCAL_ATENCION; ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr >
                                                                        <td align = 'left' style = 'font-size:14px;padding: 25px 0px 0px 0px '>
                                                                            <strong>Debe tener en cuenta que: </strong>
                                                                        </td>
                                                                    </tr>
                                                                    <tr >
                                                                        <td align = 'left' style = 'font-size:13px;padding: 5px 0px 0px 0px '>
                                                                            - Le esperamos puntualmente el d&iacute;a y hora programado de lo contrario perder&aacute; su cita.
                                                                        </td>
                                                                    </tr>
                                                                    <tr >
                                                                        <td align = 'left' style = 'font-size:13px;padding: 5px 0px 0px 0px '>
                                                                            - Debe conservar su c&oacute;digo de cita ya que sera requerido por el <?php echo $atencion1; ?>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr style = 'font-family: Arial,sans-serif;font-size:16px;margin:0;background-color: #333;'>
                                                        <td align = 'center' style = 'font-size:16px;padding: 10px 0 0px 0 ; color: #fff'>
                                                            Cualquier consulta no dude en llamar a nuestra
                                                        </td>
                                                    </tr>
                                                    <tr style = 'font-family: Arial,sans-serif;font-size:16px;margin:0;background-color: #333;'>
                                                        <td align = 'center' style = 'font-size:16px;padding: 5px 0 0px 0 ; color: #fff'>
                                                            Central T&eacute;lefonica de <strong>513-9000 </strong>Anexo <strong><?php echo $anexo; ?></strong>,
                                                        </td>
                                                    </tr>
                                                    <tr style = 'font-family: Arial,sans-serif;font-size:16px;margin:0;background-color: #333;'>
                                                        <td align = 'center' style = 'font-size:16px;padding: 5px 0 10px 0 ; color: #fff'>
                                                            en donde atenderemos todas sus preguntas.
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </td>
                                    <td style = 'font-family: Arial,sans-serif;font-size:16px;vertical-align:top;margin:0;padding:0' valign = 'top'></td>
                                </tr>
                                <tr style = 'font-family: Arial,sans-serif;font-size:16px;margin:0;padding:0'>
                                    <td style = 'font-family: Arial,sans-serif;font-size:16px;vertical-align:top;margin:0;padding:0' valign = 'top'></td>
                                    <td width = '600'
                                        style = 'font-family: Arial,sans-serif;
                                        font-size:10px;vertical-align:top;display:block!important;
                                        max-width:600px!important;clear:both!important;margin:0 auto;padding:10px 0' valign = 'top'>
                                        <div style = 'font-family: Arial,sans-serif;font-size:10px;max-width:600px;display:block;margin:0px auto 0;padding:0px'>

                                        </div>
                                    </td>
                                    <td style = 'font-family: Arial,sans-serif;font-size:16px;vertical-align:top;margin:0;padding:0' valign = 'top'></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
