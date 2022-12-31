<?php require 'views/shared/header.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Choferes</h1>
        </div><div class="col-4">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Buscar</span>
                </div>
                <input id="searchTerm" type="text" class="form-control" onkeyup="doSearch()">
            </div>
        </div>
    </div>

    <table class="table table-striped text-center" id="datos">
        <thead>
            <tr>
                <th scope="col">Documento</th>
                <th scope="col">Nombres</th>
                <th scope="col">Apellido Paterno</th>
                <th scope="col">N° Brevete</th>
                <th scope="col">Vencimiento</th>
                <th scope="col">Antecedentes</th>
                <td scope="col">
                    <a href="<?php echo constant("URL") ?>/chofer/new" class="btn btn-primary">Nuevo</a>
                </td>
            </tr>

        </thead>
        <div data-spy="scroll" data-target="#list-example" data-offset="0" class="scrollspy-example">
            <tbody>
                <?php foreach ($this->rows as $row) { ?>
                    <tr>
                        <?php
                        for ($i = 0; $i < count($row); $i++) {
                            if ($i == 5) {
                                ?>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" 
                                            data-target="#exampleModal" onclick="selectPdf('<?php echo $row[5] ?>')">
                                        Visualizar
                                    </button>

                                </td>
                            <?php } else { ?>
                                <td><?php echo ($row[$i]) ?>
                                </td>
                            <?php } ?>

                        <?php } ?>
                        <td>
                            <a href="<?php echo constant("URL") ?>/chofer/edit?id=<?php echo ($row[0]) ?>" class="btn btn-secondary">Editar</a>
                            <a href="<?php echo constant("URL") ?>/chofer/delete?id=<?php echo ($row[0]) ?>" class="btn btn-danger">Eliminar</a>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Antecedentes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe width="100%" height="400px"  id="pdf-preview"  
                        src="" allowfullscreen></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<script>
    function selectPdf(path) {
        document.getElementById("pdf-preview").src = path;
    }
</script>
<?php require 'views/shared/footer.php'; ?>
