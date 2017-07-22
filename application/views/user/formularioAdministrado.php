<?php ?>
<div class="alert alert-success" role="alert" name='cita' id='cita'>
    <?php
    echo "Eligio su Cita para el día: <label>$fecha </label> a Horas <label> $hora </label>";
    ?>
</div>
<input type="hidden" name="horaCita" id="horaCita" value="<?php echo $hora; ?>" />
<input type="hidden" name="fechaCita" id="fechaCita" value="<?php echo $fecha; ?>" />
<input type="hidden" name="idprog" id="idprog" value="<?php echo $programacion; ?>" />
<input type="hidden" name="vmotivo" id="vmotivo" value="<?php echo $motivo; ?>" />
<input type="hidden" name="tipo" id="vtipo" value="<?php echo $tipo; ?>" />

<div class="">
    <span class="help-block">Seleccione su Tipo de Documento:</span>

    <div class=" row">
        <div class=" col-sm-4 form-group">
            <div class="input-group ">
                <span class="input-group-addon" id="basic-addon1"><span class="icofont icofont-id-card" aria-hidden="true"></span></span>
                <select id="tipoDocumento" name="tipoDocumento" class="form-control" onchange="mostrarAdmin();" required>    
                    <?php
                    if ($tipo == '00001') {
                        ?>
                        <option value="1">DNI / L.E.</option>
                        <option value="2">CARNET EXT.</option>
                        <option value="3">RUC</option>
                        <?php
                    } elseif ($tipo == '00002') {
                        ?>
                        <option value="3">RUC</option>
                        <?php
                    }
                    ?>
                </select>
            </div>            
        </div>
        <div class="col-sm-8 form-group">
            <div class="input-group">
                <input type="text" id="numero" name="numero" class="form-control"  
                <?php
                if ($tipo == '00001') {
                    echo 'placeholder="Número de Documento"';
                } elseif ($tipo == '00002') {
                    echo 'placeholder="Número de RUC"';
                }
                ?>  required/>
                <span class="input-group-btn">
                    <button type="button" id="btnSearch" class="btn btn-default" 
                            onclick="buscarAdministrado($('#numero').val(), $('#tipoDocumento').val(), $('#tipo').val());
                                    return false;"><span class="icofont icofont-user-search"></span> Buscar</button>
                </span>
                <span class="input-group-btn">
                    <button type="button" id="btnClear" class="btn btn-default" onclick="clean()"><span class="icofont icofont-brush"></span> Limpiar</button>
                </span>
            </div>

        </div>

        <?php
        if ($tipo == '00001') {
            ?>
            <div class="col-sm-12 form-group">
                <input type="text" name="TXT_NOMBRE_RAZONSOCIAL" id="TXT_NOMBRE_RAZONSOCIAL"  class="form-control" placeholder="Nombre"  title="Ingrese su Nombre" required/>
            </div>    
            <div class="col-sm-12 form-group">    
                <input type="text" name="TXT_APELLIDO_REPRESENTANTE" id="TXT_APELLIDO_REPRESENTANTE" class="form-control" placeholder="Apellidos" title="Ingrese su Apellido" required/>
            </div>
            <div class="col-sm-12 form-group" >
                <input type="email" name="TXT_EMAIL" id="TXT_EMAIL" class="form-control" title="E-mail@dominio.es" id="inputEmail" placeholder="E-mail" required/>
            </div>
            <div class="col-sm-12 form-group">
                <input type="text" name="NUM_TELEFONO" id="NUM_TELEFONO" class="form-control" placeholder="Teléfono" pattern="[0-9]{9}"  title="Ingrese su Teléfono solo numeros" required/>   
            </div>
            <div class="col-sm-12 form-group ">
                <input rows="3" name="TXT_DIRECCION" id="TXT_DIRECCION" class="form-control" placeholder="Dirección"  required/></textarea>
            </div>


            <?php
        } elseif ($tipo == '00002') {
            ?>
            <div class="col-sm-12 form-group">
                <input type="text" name="TXT_NOMBRE_RAZONSOCIAL" id="TXT_NOMBRE_RAZONSOCIAL"  class="form-control" placeholder="Razón Social y/o Nombre y Apellido"  
                       title="Ingrese su Razón Social y/o Nombre y Apellido" required/>
            </div>    
            <div class="col-sm-12 form-group" >
                <input type="email" name="TXT_EMAIL" id="TXT_EMAIL" class="form-control" title="E-mail@dominio.es" placeholder="E-mail" required/>
            </div>
            <div class="col-sm-12 form-group">
                <input type="text" name="NUM_TELEFONO" id="NUM_TELEFONO" class="form-control" placeholder="Teléfono" pattern="[0-9]{9}"  title="Ingrese su Teléfono solo numeros" required/>   
            </div>
            <div class="col-sm-12 form-group ">
                <input rows="3" name="TXT_DIRECCIONLOCAL" id="TXT_DIRECCIONLOCAL" class="form-control"  placeholder="Dirección Correspondiente al Local" required/></textarea>
            </div>
            <div class="col-sm-12 form-group ">
                <input rows="3" name="txt_giro" id="txt_giro" class="form-control" placeholder="Giro comercial en consulta" title="Ingrese Giro comercial en consulta" required/></textarea>
            </div>
            <div class="col-sm-12 form-group ">
                <input rows="3" name="txt_area" id="txt_area" class="form-control" placeholder="Área del Establecimiento " title="Ingrese Área del Establecimiento" required/></textarea>
            </div>
            <?php
        }
        ?> 
    </div>
    <div id="botones" name="botones" style="text-align:center">
        <button type="submit" id="btnReserva" name="btnReserva" class="btn btn-success"  >   Reservar</button> 
        <input type="button" id="btnCancel" name="btnCancel" class="btn btn-default" onclick="document.location.reload();" value="Cancelar">
    </div>
</div>  


<div id="modalCofirmacion" class="modal fade bs-example-modal" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Reserva de Citas</h4>
            </div>
            <div class="modal-body text-center" id="contenidoCofirmacion">
            </div>
        </div>
    </div>
</div>
<script>
    $('form#guardarCita').submit(function (e) {
        $('#btnReserva').attr("disabled", true);
        $('#btnReserva').html('Guardando Datos ...');
        event.preventDefault();
        $.ajax({
            cache: false,
            type: 'post',
            url: '<?php echo base_url(); ?>home/guardar',
            data: $('#guardarCita').serialize(),
            success: function (response) {
                $("#modalCofirmacion").modal({backdrop: "static", keyboard: false});
                $("#contenidoCofirmacion").html(response);
            }
        });
    });
    function clean() {
        $("#numero").val("");
        $("#TXT_NOMBRE_RAZONSOCIAL").val("");
        $("#TXT_APELLIDO_REPRESENTANTE").val("");
        $("#TXT_EMAIL").val("");
        $("#NUM_TELEFONO").val("");
        $("#TXT_DIRECCION").val("");
    }



    function mostrarAdmin() {
        var name = $("#tipoDocumento").val();
        if (name == 1 || name == 2) {
            $("#numero").attr("placeholder", "Número de Documento");
            $("#TXT_NOMBRE_RAZONSOCIAL").attr("placeholder", "Nombre");
            $("#TXT_NOMBRE_RAZONSOCIAL").attr("title", "Ingrese se Nombre");
            $("#TXT_APELLIDO_REPRESENTANTE").attr("placeholder", "Apellidos");
            $("#TXT_APELLIDO_REPRESENTANTE").attr("title", "Ingrese sus apellidos");
            $("#TXT_EMAIL").attr("placeholder", "E-mail");
            $("#NUM_TELEFONO").attr("placeholder", "Teléfono");
            $("#TXT_DIRECCION").attr("placeholder", "Dirección");
        }
        if (name == 3) {
            $("#numero").attr("placeholder", "Ingrese Nro de RUC");
            $("#TXT_NOMBRE_RAZONSOCIAL").attr("placeholder", "Razón Social");
            $("#TXT_NOMBRE_RAZONSOCIAL").attr("title", "Ingrese Razón Social");
            $("#TXT_APELLIDO_REPRESENTANTE").attr("placeholder", "Representante Legal");
            $("#TXT_APELLIDO_REPRESENTANTE").attr("title", "Ingrese Nombre Representante Legal");
            $("#TXT_EMAIL").attr("placeholder", "E-mail");
            $("#NUM_TELEFONO").attr("placeholder", "Teléfono");
            $("#TXT_DIRECCION").attr("placeholder", "Dirección");
        }
    }

    function buscarAdministrado(numero, tipoDoc, tipo) {
        //alert (numero+"aaaa");
        //alert (tipoDoc+"bbb");
        cantidad = numero.length;
        var correcto = true;
        //alert(cantidad);
        if (cantidad == "") {
            swal({title: "Alto!", text: "Ingrese el número de documento", type: "warning", timer: 2500});
            correcto = false;
            $("#numero").focus();
        } else
        if (tipoDoc == 1) {
            //alert("es dni");
            if (cantidad != 8) {
                swal({title: "Alto!", text: "Ingrese número de DNI valido", type: "warning", timer: 2500});
                correcto = false;
                $("#numero").focus();
            }
        } else
        if (tipoDoc == 2) {
            //alert("es ext");
            if (cantidad != 15) {
                swal({title: "Alto!", text: "Ingrese Número de Extranjeria Valido", type: "warning", timer: 2500});
                correcto = false;
                $("#numero").focus();
            }
        } else
        if (tipoDoc == 3) {
            //alert("es ruc");
            if (cantidad != 11) {
                swal({title: "Alto!", text: "Ingrese Número de RUC Valido", type: "warning", timer: 2500});
                correcto = false;
                $("#numero").focus();
            }
        }
        if (correcto) {
            //alert("es igual a " + cantidad);
            var parametros = {
                "numdoc": numero,
                "vTipoDoc": tipoDoc,
                "vTipo": tipo
            };
            $.ajax({
                data: parametros,
                url: '<?php echo base_url(); ?>/home/buscar',
                type: 'post',
                success: function (response) {
                    //parseamos el JSON del response
                    var d = JSON.parse(response);
                    if (d != null) {
                        $("#TXT_NOMBRE_RAZONSOCIAL").attr("value", d.TXT_NOMBRE_RAZONSOCIAL);
                        $("#TXT_APELLIDO_REPRESENTANTE").attr("value", d.TXT_APELLIDO_REPRESENTANTE);
                        $("#TXT_EMAIL").attr("value", d.TXT_EMAIL);
                        $("#NUM_TELEFONO").attr("value", d.NUM_TELEFONO);
                        $("#TXT_DIRECCION").attr("value", d.TXT_DIRECCION);
                    } else {
                        swal({title: "Alto!", text: "No se encuentra registrado ingrese sus datos por unica vez", type: "warning", timer: 3000});
                        $("#TXT_NOMBRE_RAZONSOCIAL").focus();
                    }
                }
            });
        }
    }
</script>


