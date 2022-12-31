<?php require 'views/shared/header.php'; ?>
<div class="d-flex align-items-center justify-content-center vh-100">
    <div class="text-center">
        <h1 class="display-1 fw-bold">Eliminar usuario</h1>
        <div class="lead">
            <label> Se va a eliminar el registro, ¿Desea continuar?</label>
        </div>
        <div class="lead">
            <a href="<?php echo constant("URL") ?>/chofer/deleteChofer?id=<?php echo $this->dni ?>" class="btn btn-secondary">Sí</a>&nbsp;
            <a href="<?php echo constant("URL") ?>/chofer" class="btn btn-danger">No</a>
        </div>
    </div>
    
</div>
<?php require 'views/shared/footer.php'; ?>