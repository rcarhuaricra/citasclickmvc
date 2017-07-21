<div class="container">
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="<?php echo base_url(); ?>sesion">Citas</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            </ul>
            <form class="form-inline my-1">
                <strong class="p-2"><?php echo $this->session->userdata('txt_operador'); ?></strong> 
                <div class="btn-group" >
                    <button id="btnGroupDrop1" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="icofont icofont-navigation-menu"></span> Opciones
                    </button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <a href="<?php echo base_url(); ?>panel/logout" role="button" class="dropdown-item">
                            <span class="icofont icofont-logout"></span> Cerrar Sesión
                        </a>
                        <?php
                        if ($rol == 001) {
                            
                        } elseif ($rol == 002 or $rol = 003) {
                            ?>
                            <a href='<?php echo "reporte.php/?tipo=$tramite" ?>' role="button" class="dropdown-item ">
                                <span class="icofont icofont-file-excel"></span> Reporte 
                            </a>
                            <?php
                        }
                        ?>
                    </div>
                </div>

            </form>
        </div>
    </nav>


    <nav class="card">
        <div class="card-block" >
            <div class="form-inline">
                <strong class="p-2">Fecha:</strong> 
                <div class="form-group p-2">
                    <div class='input-group date' id='datetimepicker1'>
                        <span class="input-group-addon">
                            <span class="icofont icofont-ui-calendar"></span>
                        </span>
                        <input type='text' name="txtfecha" id="txtfecha" class="form-control" value="<?php echo date("Y-m-d"); ?>" placeholder="Ingresar fecha"/>
                    </div>

                </div>
                <div class="p-2" >
                    <button class="btn btn-default" id="buscarCitass" name="buscarCitas">Buscar Cita</button>
                </div>

            </div>
        </div>
    </nav>
    <br>
    <div class = "card">
        <div class = "card-header title">
            <span class="icofont icofont-square-right" style="font-size: 1.3em; color: #599E4E;"></span>
            <label>Citas Reservadas</label>
        </div>
        <div class="card-block">
            <div class="table-responsive" id='tablaCita'>
            </div>
        </div>
    </div>

</div>            

<script type="text/javascript">
    $(document).ready(function () {
        $('#datetimepicker1').datepicker({
            format: 'yyyy-mm-dd',
            daysOfWeekDisabled: "0,6",
            startDate: '-0d',
            endDate: '+7d'
        });
    });
    $("#buscarCitass").click(function () {
        var parametros = {
            "txtfecha": $("#txtfecha").val(),
        };
        $.ajax({
            data: parametros,
            url: '<?php echo base_url(); ?>sesion/mostrarCitas',
            type: 'post',
            success: function (response) {
                $("#tablaCita").html(response);
            }
        });

    });



</script>