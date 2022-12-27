<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="/assets/css/style.css">
        <style>
            .gradient-custom {
                background: #6a11cb;
                background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));
                background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
            }
        </style>
    </head>

    <body>
        <section class="vh-100 gradient-custom">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">

                                <div class="mb-md-5 mt-md-4 pb-5">
                                    <form action="<?php echo constant("URL") ?>/login/reset" method="post">
                                        <h2 class="fw-bold mb-2 text-uppercase">Cambio de contraseña</h2>
                                        <p class="text-white-50 mb-5">Por favor ingrese su nueva contraseña</p>

                                        <div class="form-outline form-white mb-4">
                                            <input type="password" id="typePasswordNew" class="form-control form-control-lg" name="newpass" />
                                            <label class="form-label" for="typeEmailX">Nueva contraseña</label>
                                        </div>

                                        <div class="form-outline form-white mb-4">
                                            <input type="password" id="typePasswordX" class="form-control form-control-lg" name="pass" />
                                            <label class="form-label" for="typePasswordX" onkeyup="confirm()">Repita contraseña</label>
                                        </div>

                                        <input class="btn btn-outline-light btn-lg px-5" type="submit" value="Guardar Contraseña" name="login" id="login" disabled="true" />
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script>
            document.getElementById('typePasswordX').addEventListener('keyup', function (e) {
                let pass = document.getElementById('typePasswordX').value;
                let passNew = document.getElementById('typePasswordNew').value;
                let message = document.getElementById('message');
                document.getElementById('login').disabled = pass != passNew
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </body>
</html>

