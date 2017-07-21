<div class="container">
    <div class="card-block">
        <div class="card">
            <div class="card-header title">
                <span class="icofont icofont-square-right" style="font-size: 1.3em; color: #599E4E;"></span>
                <label>¿Cómo obtener una cita en línea?</label>
            </div>
            <div class="card-block">
                <?php
                echo $instrucciones;
                ?>
            </div>
        </div>
    </div>
    <div class="card-block">
        <div class="card">
            <div class="card-block">
                <div id="Reserva" class="form-inline" >
                    <input type="hidden" id="tipo" value="<?php echo $tipo; ?>" />
                    <div class="form-group">
                        <label class="m-2">Fecha: </label>
                        <div class='input-group date' id='datetimepicker1'>
                            <span class="input-group-addon">
                                <span class="icofont icofont-ui-calendar"></span>
                            </span>
                            <input type='text' name="txtfecha" id="txtfecha" class="form-control" placeholder="Ingresar fecha"/>
                        </div>
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <div class="form-group">
                        <label for="mode" class="m-2">Motivo: </label>
                        <select id="cmbMotivo" name="cmbMotivo" class="form-control space-right">
                            <option value="">[Seleccione]</option>
                            <?php
                            foreach ($motivo->result() as $fila1) {
                                ?>
                                <option value="<?php echo $fila1->COD_MODALIDAD ?>">
                                    <?php
                                    echo $fila1->TXT_MODALIDAD;
                                    ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <button class="btn btn-default" onClick = "buscarDisponibilida();"><span class="icofont icofont-search-alt-1"></span> Ver Disponibilidad</button>
                    <input type = "hidden" class = "btn btn-success" value = "Anular Cita" id = "anulacita" />
                </div>
            </div>
        </div>
    </div>
    <form id="guardarCita" action="<?php echo base_url(); ?>home/guardar" method = "POST">
        <div class="card-block">
            <div class = "card ">
                <div class = "card-header title">
                    <span class="icofont icofont-square-right" style="font-size: 1.3em; color: #599E4E;"></span>
                    <label><?php echo $cabeceraH;
                            ?></label>
                </div>
                <div class="card-block">
                    <div class='table-responsive' >
                        <div name='tabla1' id='tabla1'>
                        </div>

                    </div>
                    <div id="frmAdministrado" name="frmAdministrado">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php
if ($tipo == '00001') {
    ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#datetimepicker1').datepicker({
                format: 'yyyy-mm-dd',
                daysOfWeekDisabled: "0,6",
                startDate: '-0d',
                endDate: '+7d'
            });
        });

    </script>

    <?php
} else if ($tipo == '00002') {
    ?>
    <script type="text/javascript">

        $(document).ready(function () {
            $('#datetimepicker1').datepicker({
                format: 'yyyy-mm-dd',
                daysOfWeekDisabled: "0,7",
                startDate: '-0d',
                endDate: '+7d'
            });
        });
    </script>
    <?php
}
?>
<script>
    function buscarDisponibilida() {
        var correcto = true;
        var comp = 0;
        if ($("#txtfecha").val() == "") {
            swal({
                title: '<span class="icofont icofont-calendar" style="font-size:2em; color:#709D4E;"></span>\n\
                <br><br><p style="font-size:1em; color:#345634;">Debe seleccionar una fecha!',
                showConfirmButton: false,
                timer: 2000,
                html: true
            });
            $("#txtfecha").focus();
            correcto = false;
        } else
        if (comp == 1) {
            swal({
                title: '<span class="icofont icofont-calendar" style="font-size:2em; color:#709D4E;"></span>\n\
                <br><br><p style="font-size:1em; color:#345634;">La fecha debe ser mayor o igual a la fecha actual!',
                showConfirmButton: false,
                timer: 2000,
                html: true
            });
            $("#txtfecha").focus();
            correcto = false;
        } else
        if ($("#cmbMotivo").val() == "") {
            swal({
                title: '<span class="icofont icofont-list" style="font-size:2em; color:#709D4E;"></span>\n\
                <br><br><p style="font-size:1em; color:#345634;">Debe seleccionar la modalidad!',
                showConfirmButton: false,
                timer: 2000,
                html: true
            });
            $("#cmbMotivo").focus();
            correcto = false;
        }
        if (correcto) {

            var parametros = {
                "tipo": $("#tipo").val(),
                "txtfecha": $("#txtfecha").val(),
                "cmbMotivo": $("#cmbMotivo").val()
            };
            $.ajax({
                data: parametros,
                url: '<?php echo base_url(); ?>home/mostrarfechas',
                type: 'post',
                success: function (response) {
                    $("#tabla1").html(response);
                    $("#frmAdministrado").html("");
                }
            });
        }
    }
</script>