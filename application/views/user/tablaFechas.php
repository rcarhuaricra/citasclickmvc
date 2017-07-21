<p>De click en un horario disponible para separar la cita correpondiente:</p> 

<table id="tabla" class="display table table-hover table-bordered table-container">
    <thead>
        <tr id="tblHead">
            <th style="text-align: center">FECHA</th> 
            <th style="text-align: center">HORA</th>
            <?php
            if ($tipo == '00002') {
                echo '<th style="text-align: center">ASESOR DE PLATAFORMA</th>';
            }if ($tipo == '00001') {
                echo '<th style="text-align: center">MÓDULO</th>';
            }
            ?>
            <th style="text-align: center">ESTADO</th> 
        </tr>
    </thead>
    <tbody id="tablaCitas">

        <?php
        $c = 1;
        foreach ($tabla->result() as $fila) {
            echo "<tr>";
            echo "<td>" . $fila->FECHA . "</td>";
            echo "<td>" . $fila->HR_PROGRAMACION . "</td>";
            echo "<td>" . $fila->OPERADOR . "</td>";
            echo "<td>";
            if ($fila->ESTADO == '0') {
                echo 'Reservado';
            } else {
                ?>
            <div class="radio">
                <label class="custom-control custom-radio">
                    <input class="custom-control-input" name="radio" type="radio"  id="radio<?php echo $c; ?>" value="<?php echo $fila->COD_PROGRAMACION; ?>" 
                           onchange="formAdministrado($('#radio<?php echo $c; ?>').val(), '<?php echo $fila->HR_PROGRAMACION; ?>');"/>
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Disponible</span>

                </label>
            </div>

            <?php
        }
        echo "</td>";
        echo "<tr>";
        $c++;
    }
    ?>
</table>

<script>
    function formAdministrado(valorProgramacion, valorHora) {

        var parametros = {
            "valorProgramacion": valorProgramacion,
            "valorHora": valorHora,
            "vfecha": $("#txtfecha").val(),
            "vtipo": $("#tipo").val(),
            "vmotivo": $("#cmbMotivo").val()
        };
        $.ajax({
            data: parametros,
            url: '<?php echo base_url(); ?>/home/formulario',
            type: 'post',
            success: function (response) {
                $("#frmAdministrado").html(response);
                $('#tipoDocumento').focus();
            }
        });
    }
</script>