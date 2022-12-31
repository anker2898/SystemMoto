<?php require 'views/shared/header.php'; ?>
<form action="<?php echo constant("URL") ?>/chofer/guardar" method="POST" enctype="multipart/form-data">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Chofer</h1>
            </div>
        </div>
        <hr/>
        <label for="">Datos personales</label>
        <div class="row">
            <div class="col-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Nombres</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Nombres" 
                           name="nombre" maxlength="50" aria-label="Username" 
                           aria-describedby="basic-addon1" required
                           <?php echo $this->data != null ? "value='" . $this->data['NOMBRE'] . "'" : "" ?>>
                </div>
            </div>
            <div class="col-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Apellido Paterno</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Apellido Paterno" 
                           name="apPaterno" maxlength="50" aria-label="Username" 
                           aria-describedby="basic-addon1" required
                           <?php echo $this->data != null ? "value='" . $this->data['APELLIDO_PAT'] . "'" : "" ?>>
                </div>
            </div>
            <div class="col-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Apellido Materno</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Apellido Materno" 
                           name="apMaterno" maxlength="50" aria-label="Username" 
                           aria-describedby="basic-addon1" required
                           <?php echo $this->data != null ? "value='" . $this->data['APELLIDO_MAT'] . "'" : "" ?>>
                </div>
            </div>
            <div class="col-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Documento</span>
                    </div>
                    <input type="number" class="form-control" placeholder="Documento" 
                           name="documento" maxlength="8" aria-label="Username" 
                           aria-describedby="basic-addon1" required
                           <?php echo $this->data != null ? "value='" . $this->data['DOCUMENTO'] . "'" : "" ?>>
                </div>
            </div>
            <div class="col-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Correo</span>
                    </div>
                    <input type="email" class="form-control" placeholder="Correo" 
                           name="correo" maxlength="50" aria-label="Username" 
                           aria-describedby="basic-addon1" required
                           <?php echo $this->data != null ? "value='" . $this->data['EMAIL'] . "'" : "" ?>>
                </div>
            </div>
            <div class="col-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Número</span>
                    </div>
                    <input type="number" class="form-control" placeholder="Número" 
                           name="numero" maxlength="9" aria-label="Username" 
                           aria-describedby="basic-addon1" required
                           <?php echo $this->data != null ? "value='" . $this->data['NUMERO'] . "'" : "" ?>>
                </div>
            </div>
        </div>
        <label for="">Antecedentes y licencias</label>
        <div class="row">
            <div class="col-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Brevete</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Brevete" 
                           name="brevete" maxlength="50" aria-label="Username" 
                           aria-describedby="basic-addon1" required
                           <?php echo $this->data != null ? "value='" . $this->data['BREVETE'] . "'" : "" ?>>
                </div>
            </div>
            <div class="col-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Vencimiento</span>
                    </div>
                    <input type="date" class="form-control" placeholder="Nombres" 
                           name="vencimiento" maxlength="50" aria-label="Username" 
                           aria-describedby="basic-addon1" required
                           <?php echo $this->data != null ? "value='" . $this->data['VENCIMIENTO'] . "'" : "" ?>>
                </div>
            </div>
            <div class="col-4">
                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" name="file" class="custom-file-input" id="inputGroupFile02" accept="application/pdf"/>
                        <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02"
                               id="antedentes"><?php echo isset($this->data) ? explode("/", $this->data['ANTECEDENTES'])[3] : "Cargar antecedentes" ?></label>
                    </div>
                </div>
            </div>
            <div class="col-12 text-center" id="viewer-pdf-temp">
                <?php if (isset($this->data)) { ?>
                    <iframe width="90%" height="400px"    
                            src="../<?php echo $this->data['ANTECEDENTES'] ?>" allowfullscreen></iframe>
                        <?php } ?>
            </div>
        </div>
    </div>
    <div class="container">
        <input type="submit" class="btn btn-secondary" value="Guardar">
        <a href="<?php echo constant("URL") ?>/chofer" class="btn btn-danger">Cancel</a>
    </div>
</form>
<script>
    //choferes
    const antedentes = document.getElementById("inputGroupFile02");
    antedentes.addEventListener('change', function () {
        document.getElementById("antedentes").innerHTML = "<label class='custom-file-label' \n\
    for='inputGroupFile02' aria-describedby='inputGroupFileAddon02'id='antedentes'>" +
                antedentes.files[0].name + "</label>";

        document.getElementById("viewer-pdf-temp").innerHTML = "<iframe width='90%' height='400px' src='" + URL.createObjectURL(antedentes.files[0]) + "' allowfullscreen></iframe>";
    });
</script>
<?php require 'views/shared/footer.php'; ?>
