<table id = "tablaAtencion" class = "display table table-hover table-bordered table-container ">
    <thead>
        <tr>

            <?php
            
            if ($this->session->userdata('tipotramite') == '00001') {
                ?>
                <th style = "text-align: center">Fecha</th>
                <th style = "text-align: center">Horario</th>
                <th style = "text-align: center">Documento </th>
                <th style = "text-align: center">Nombre</th>
                <th style = "text-align: center">Asistio</th>
                <?php
            } else {
                ?>
                <th style = "text-align: center">Fecha</th>
                <th style = "text-align: center">Horario</th>
                <th style = "text-align: center">RUC del Administrado</th>
                <th style = "text-align: center">Nombre o Razón Social</th>
                <th style = "text-align: center">Asistio</th>
                <th style = "text-align: center">Giro Solicitado</th>
                <th style = "text-align: center">Área</th>
                <th style = "text-align: center">Lugar</th>
                <?php
            }
            ?>
            <th style = "text-align: center">Observacioness <?php
            ?></th>
            <th style = "text-align: center">...</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($tabla->result() as $fila) {
            ?>
            <tr>
                <td style="text-align: center" ><?php echo $fila->FECHA; ?> </td>
                <td style="text-align: center" ><?php echo $fila->HR_PROGRAMACION; ?> </td>
                <td style="text-align: center" ><?php echo $fila->COD_DOCUMENTO; ?> </td>
                <td style="text-align: center" ><?php echo $fila->TXT_NOMBRE_RAZONSOCIAL; ?> </td>
                <td style="text-align: center" ><?php echo $fila->TXT_ESTADO; ?> </td>
                <?php
                if ($this->session->userdata('tipotramite') != '00001') {
                    ?>
                    <td style="text-align: center" ><?php echo $fila->TXT_GIRO; ?> </td>
                    <td style="text-align: center" ><?php echo $fila->TXT_AREA; ?> </td>
                    <td style="text-align: center" ><?php echo $fila->TXT_DIRECCIONLOCAL; ?> </td>
                    <?php
                }
                ?>
                <td style="text-align: center" ><?php echo $fila->COD_OBSERVACION; ?> </td>
                <td style = "text-align: center"><?php
                    if ($this->session->userdata('rol') != '003') {
                        if ($fila->TXT_ESTADO == 'SEPARADO') {
                            ?>
                            <button id="editarCita" type="button" class="btn btn-default btn-sm" onClick="cambiarCita(<?php echo $fila->COD_CITA; ?>);" >
                                <span class="icofont icofont-search-alt-1"></span>
                            </button>
                            <a href="<?php echo base_url(); ?>sesion/editar/<?php echo $fila->COD_CITA; ?>">
                                editar
                                <?php  ?>
                            </a>
                            <?php
                        } else {
                            if ($fila->FECHA < date("Y-m-d")) {
                                echo date("Y-m-d");
                                echo "atendido";
                            } else {
                                ?>
                                <button id = "editarCita" type = "button" class = "btn btn-warning btn-sm" onClick = "cambiarCita(<?php echo $fila->COD_CITA; ?>);" >
                                    ATENDIDO
                                </button>
                                <?php
                            }
                        }
                    }
                    ?></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>

<script>
    function cambiarCita(idcita) {
        var parametros = {
            "vCita": idcita
        };
        $.ajax({
            data: parametros,
            url: '<?php echo base_url() ?>sesion/cambiar',
            type: 'POST',
            beforeSend: function () {
                $("#contenidoModal").html("Procesando, espere por favor...");
            },
            success: function (response) {
                if (response != "") {
                    $("#modalAtencion").modal({backdrop: "static"});
                    $("#contenidoModal").html(response);

                }
            }
        });
    }
</script>