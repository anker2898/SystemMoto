<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SysMot</title>
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">SysMot</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo constant("URL")?>/main">Inicio</a>
                    </li>
                    <?php $links = $_SESSION['user']['PRIVILEGIOS'];?>
                    <?php foreach ($links as $link) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo constant("URL").$link['path']?>"><?php echo $link['label']?></a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <ul class="navbar-nav mr-auto form-inline my-2 my-lg-0">
                <li class="nav-item">
                    <a class="btn btn-outline-danger my-2 my-sm-0" href="<?php echo constant("URL")?>/login/close">Cerrar Sesión</a>
                 </li>
            </ul>
        </nav>