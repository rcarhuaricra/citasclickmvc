<div id="modalAtencion" class="" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modificar Cita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>                
            </div>
            <div class="modal-body">
                <div id="contenidoModal">
                    <input type = "hidden" id = "id" name = "id" value = "<?php echo $COD_CITA; ?>" />
                    <div class = "form-group">
                        <label for = "estado">Estado:</label>
                        <select id = "estado" name = "estado" class = "form-control" required>
                            <option value = "0">SEPARADO</option>
                            <option value = "1">ASISTIO</option>
                        </select>
                    </div>
                    <?php
                    if ($tramite == '00002') {
                        ?>
                        <div class = "form-group">
                            <label for = "LICENCIA">LICENCIA:</label>
                            <select id = "licencia" name = "licencia" class = "form-control" required>
                                <option value = "-">[selecione]</option>
                                <option value = "1">SI</option>
                                <option value = "0">NO</option>
                            </select>
                        </div>
                        <?php
                    }
                    ?>
                    <div class = "form-group">
                        <label for = "observacion">Observación:</label>
                        <textarea id = "observacion" name = "observacion" class = "form-control" required><?php echo $COD_OBSERVACION; ?></textarea>
                    </div>
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
                    ?>
                </div>
            </div>
            <div class="modal-footer" style="text-align:center">
                <button type="button" class="btn btn-success" onClick="cambiarCitaProceso();">Guardar</button>
            </div>     
        </div>
    </div>
</div>