<?php require 'views/shared/header.php'; ?>
<div class="container text-center">
    <div class="row">
        <div class="col-4">
            <h1>Usuarios</h1>
        </div>
    </div>
    <div class="row">
        <label> Se va a eliminar el registro, ¿Desea continuar?</label>
    </div>
    <div class="row">
        <a href="<?php echo constant("URL") ?>/user/deleteUser?id=<?php echo $this->dni ?>" class="btn btn-secondary">Sí</a>&nbsp;
        <a href="<?php echo constant("URL") ?>/user" class="btn btn-danger">No</a>
    </div>
</div>
<?php require 'views/shared/footer.php'; ?>
