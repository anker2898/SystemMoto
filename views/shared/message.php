<?php require 'views/shared/header.php'; ?>
<div class="d-flex align-items-center justify-content-center vh-100">
    <div class="text-center">
        <h1 class="display-1 fw-bold"><?php echo $this->messageHeader ?></h1>
        <p class="lead">
            <?php echo $this->message ?>
        </p>
        <a href="<?php echo constant("URL") . $this->url ?>" class="btn btn-success">Continuar</a>
    </div>
</div>
<?php require 'views/shared/footer.php'; ?>
