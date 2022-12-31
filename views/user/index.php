<?php require 'views/shared/header.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Usuarios</h1>
        </div><div class="col-4">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Buscar</span>
                </div>
                <input id="searchTerm" type="text" class="form-control" onkeyup="doSearch()">
            </div>
        </div>
    </div>

    <table class="table table-striped" id="datos">
        <thead>
            <tr>
                <th scope="col">Usuario</th>
                <th scope="col">Estado</th>
                <th scope="col">Nombres</th>
                <th scope="col">Apellido Paterno</th>
                <th scope="col">Apellido Materno</th>
                <th scope="col">Documento</th>
                <td scope="col">
                    <a href="<?php echo constant("URL") ?>/user/new" class="btn btn-primary">Nuevo</a>
                </td>
            </tr>

        </thead>
        <div data-spy="scroll" data-target="#list-example" data-offset="0" class="scrollspy-example">
            <tbody>
                <?php foreach ($this->rows as $row) { ?>
                    <tr>
                        <?php
                        for ($i = 0; $i < count($row); $i++) {
                            if ($i == 1) {
                                ?>
                                <td>
                                    <?php if ($row[$i] == 1) { ?>
                                        <span class="badge badge-success">Habilitado</span>
                                    <?php } else { ?><span class="badge badge-danger">Deshabilitado</span>
                                    <?php } ?>
                                </td>
                            <?php } else { ?>
                                <td><?php echo ($row[$i]) ?>
                                </td>
                            <?php } ?>

                        <?php } ?>
                        <td>
                            <a href="<?php echo constant("URL") ?>/user/edit?id=<?php echo ($row[5]) ?>" class="btn btn-secondary">Editar</a>
                            <a href="<?php echo constant("URL") ?>/user/delete?id=<?php echo ($row[5]) ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
                <tr class='noSearch hide'>
                    <td colspan="7"></td>
                </tr>
            </tbody>
        </div>
    </table>
</div>
<?php require 'views/shared/footer.php'; ?>
