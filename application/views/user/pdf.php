<?php
if ($COD_TIPOTRAMITE == '00001') {
    $conte = '#content{ padding: 1px 20px 0px 20px;}';
    $subtite = '';
    $anexo = '2908';
    $atencion = 'Asesor de Plataforma';
    $datos = '';
    $requisitos = '';
} elseif ($COD_TIPOTRAMITE == '00002') {
    $conte = '';
    $subtite = '<div class="itse">Solo para ingreso de Expedientes de Licencias de Funcionamiento con ITSE BASICA EX POST</div>';
    $anexo = '6412';
    $atencion = 'Asesor de Plataforma';
    $datos = '<strong>Direcci&oacute;n de Licencia en Tr&aacute;mite: </strong>' . $TXT_DIRECCIONLOCAL . '<br>
<strong>    Giros a Solicitar: </strong>' . $TXT_GIRO . '<br>';
    $requisitos = "<div style = \"page-break-before: always;padding-top: 10px; text-align: center;\">               
    <img src='" . getcwd() . "/asset/img/Imagen1.jpg' width='600px' height='480px'/>
</div>";
}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Municipalidad de San Isidro - Citas</title>
        <style>
            @import url("https://www.google.com/fonts#UsePlace:use/Collection:Roboto");
            body{
                font-family: "Roboto", sans-serif;
                font-size: 0.9em;
            }

            @page {
                margin: 0px;
            }
            .footer {
                position:fixed;     
                left:0;
                bottom:0;
                height:55px;
                width:100%;
                background-color:#333;
                color: white;
                text-align: center;

            }

            .mouse{
                position:fixed;     
                right: 40px;
                bottom:30px; 
                z-index: 4;

            }
            
            .body{
                padding-left: 50px
            }
            hr.style2 {
                border-top: 1px double #496F56;
                color: #496F56;
                background-color: #496F56;
            }
        </style>
    <body>
        <table width=100%>
            <thead>
                <tr>
                    <th colspan="3">
                        <img src="<?php echo getcwd(); ?>/asset/img/logomsi.png" width="60px" />
                    </th>
                    <th colspan="9" style="color:#2b573a">
                        <h1 style="line-height: 12px;">Municipalidad de San Isidro</h1>
                        <h2>Citas para <?php echo $TXT_TIPOTRAMITE; ?> </h2>
                    </th>
                </tr>
                <tr>
                    <th colspan="12" style="text-align: right; padding-right: 50px; font-size: 1.2em;">
                        Codigo de Cita: <?php echo $COD_CODE; ?>
                    </th>
                </tr>
                <tr>
                    <th colspan="12">
                        <?php echo $subtite; ?>
                    </th>
                </tr>
            </thead>
            <tbody >
                <tr>
                    <td colspan="12"><hr class="style2"></td>
                </tr>
                <tr>
                    <td colspan="12" class="body">
                        Estimado Usuario Ud. ha reservado una cita con la siguiente información:
                    </td>
                </tr>
                <tr>
                    <td colspan="12" class="body">
                        <strong>   <?php echo $TXTDOC; ?>: </strong><?php echo $COD_DOCUMENTO; ?><br>
                        <strong>    Motivo de Cita: </strong><?php echo $TXT_MODALIDAD; ?><br>
                        <strong>    Fecha de Cita: </strong><?php echo $FECHA; ?><br>
                        <strong>    Hora de Cita: </strong><?php echo $HR_PROGRAMACION; ?><br>
                        <?php echo $datos; ?>
                        <strong>    Lugar de Atención: </strong>
                        <?php echo LOCAL_ATENCION; ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="12" class="body">
                        <p><strong>Debe tener en cuenta que: </strong></p>
                        <ul>
                            <li>Le esperamos puntualmente el día y hora programado de lo contrario perder&aacute; su cita.</li>
                            <li>Debe conservar su código de cita ya que sera requerido por el <?php echo $atencion; ?></li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td colspan="12" class="body">
                        <div>
                            Cualquier consulta no dude en llamar a nuestra 
                            Central Télefonica de <strong>513-9000 </strong>Anexo <strong><?php echo $anexo; ?></strong>, <br>
                            en donde atenderemos todas sus preguntas.
                        </div>  
                    </td>
                </tr>
                <tr>

                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="12" >
                        <div class="footer">
                            <p> <img src="<?php echo getcwd(); ?>/asset/img/telefono.jpg" width="25px"/>
                                Central: [511] 513-9000 - Anexo <?php echo $anexo; ?>   </p>


                        </div>
                        <img class="mouse" src="<?php echo getcwd(); ?>/asset/img/mouse.png" width="50px"/>
                    </td>
                </tr>
            </tfoot>
        </table>

        <div style="padding-top: 18px">
            <?php
            echo $requisitos;
            ?>
        </div>
    </body>
</html>