<?php require 'views/shared/header.php'; ?>
<form action="<?php echo constant("URL") ?>/user/guardar" method="POST">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h1>Usuarios</h1>
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

        <label for="">Credenciales y privilegios</label>
        <div class="row">
            <div class="col-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Usuario</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Usuario" 
                           name="usuario" maxlength="20" aria-label="Username" 
                           aria-describedby="basic-addon1" required
                           <?php echo $this->data != null ? "value='" . $this->data['USER'] . "'" : "" ?>>
                </div>
            </div>
            <div class="col-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="checkbox" aria-label="Checkbox for following text input" name="activo" value="1"
                                   <?php echo $this->data != null ? $this->data['STATUS'] == 1 ? "checked" : "" : "" ?>>
                        </div>
                    </div>
                    <input type="text" class="form-control" aria-label="Text input with checkbox" value="Habilitado" disabled>
                </div>
            </div>
            <div class="col-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="checkbox" aria-label="Checkbox for following text input" name="reset" value="1"
                                   <?php echo $this->data != null ? $this->data['RESET'] == 1 ? "checked" : "" : "checked disabled" ?>>
                        </div>
                    </div>
                    <input type="text" class="form-control" aria-label="Text input with checkbox" value="Restablecer contraseña" disabled>
                </div>
            </div>
        </div>

        <label for="">Roles</label>
        <div class="row">
            <?php foreach ($roles as $rol) { ?>
                <div class="col-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" aria-label="Checkbox for following text input" value="<?php echo ($rol[0]) ?>" name="<?php echo ($rol[1]) ?>">
                            </div>
                        </div>
                        <input type=" text" class="form-control" aria-label="Text input with checkbox" value="<?php echo ($rol[1]) ?>" disabled>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="container">
        <input type="submit" class="btn btn-secondary" value="Guardar">
        <a href="<?php echo constant("URL") ?>/user" class="btn btn-danger">Cancel</a>
    </div>
</form>
<?php require 'views/shared/footer.php'; ?>
