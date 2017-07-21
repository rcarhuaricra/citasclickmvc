<div class="wrapper">
    <div class="" id="myModal" role="dialog">
        <div class="modal-dialog modal-sm">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:10px 30px;" >
                    <h4><span class="glyphicon glyphicon-lock"></span> Citas en un Click</h4>
                </div>
                <div class="modal-body" style="padding:30px 30px;">
                    <form action="<?php echo base_url(); ?>panel/comprobar" method="post" id="login">
                        <div class="form-group" id="user">
                            <label><strong>Usuario</strong></label>
                            <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Ingrese Usuario" >
                            <div class="form-control-feedback"></div>
                        </div>                        
                        <div class="form-group" id="pass">
                            <label><strong>Password</strong></label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Ingrese Password" >
                            <div class="form-control-feedback"></div>
                        </div>
                        <div style="text-align: right">
                            <button class="btn btn-success " type="submit" onClick = "return validar();"><span class="glyphicon glyphicon-off"></span> Ingresar</button>                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>     
</div>
<script>
    function validar() {
        $('#login').bind('submit', function () {

            var correcto = true;
            if ($("#usuario").val() == "") {
                $("#usuario").focus();
                correcto = false;
                $("#user").attr("class", "form-group has-danger");
                $("#user div").html("Ingresar Usuario");
                $("#user label").attr("class", "form-control-label");
                $("#usuario").attr("class", "form-control form-control-danger");
            }
            if ($("#password").val() == "") {
                $("#password").focus();
                correcto = false;
                $("#pass").attr("class", "form-group has-danger");
                $("#pass div").html("Ingresar Password");
                $("#pass label").attr("class", "form-control-label");
                $("#password").attr("class", "form-control form-control-danger");
            }

            if (correcto) {

                var parametros = {
                    "usuario": $("#usuario").val(),
                    "password": $("#password").val()
                };
                $.ajax({
                    data: parametros,
                    url: '<?php echo base_url(); ?>panel/comprobar',
                    type: 'post',
                    success: function (response) {
                        //parseamos el JSON del response                    
                        var d = JSON.parse(response);
                        if (d != null) {
                            window.location.href = "<?php echo base_url(); ?>panel";
                        } else {
                            //swal({title: "Alto!", text: "No se encuentra registrado ingrese sus datos por unica vez", type: "warning", timer: 3000});
                            $("#user").attr("class", "form-group has-danger");
                            $("#user div").html("Ingresar Usuario");
                            $("#user label").attr("class", "form-control-label");
                            $("#usuario").attr("class", "form-control form-control-danger");
                            $("#pass").attr("class", "form-group has-danger");
                            $("#pass div").html("Ingresar Password");
                            $("#pass label").attr("class", "form-control-label");
                            $("#password").attr("class", "form-control form-control-danger");
                            $("#usuario").focus();
                        }
                    }
                });
            }
            event.preventDefault();
        });
    }

</script>