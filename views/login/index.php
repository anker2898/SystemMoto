<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesion</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,700;0,800;1,600;1,800&display=swap" rel="stylesheet">
    <style>
        *,
        *::after,
        *::before {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            user-select: none;
            font-family: "Montserrat", "sans-serif";
        }

        body {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 14px;
            background-color: #ecf0f3;
            color: #a0a5a8;
        }

        .container {
            position: relative;
            width: 1000px;
            min-width: 1000px;
            min-height: 550px;
            height: 400px;
            padding: 5px;
            background-color: #ecf0f3;
            box-shadow: 10px 10px 10px #d1d9e6, -10px -10px #f9f9f9;
            border-radius: 12px;
            overflow: hidden;
        }

        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            top: 0;
            left: 0;
            width: 600px;
            height: 100%;
            padding: 25px;
            background-color: #ecf0f3;
            transition: 1.25s;
        }

        .form {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            width: 100%;
            height: 100%;
        }

        .form-input {
            width: 350px;
            height: 40px;
            margin: 6px 0;
            padding-left: 25px;
            font-size: 13px;
            letter-spacing: 0.15px;
            border: none;
            outline: none;
            transition: 0.25s ease;
            border-radius: 20px;
            box-shadow: 2px 2px 4px #d1d9e6, inset -2px -2px 4px #f9f9f9;
        }

        .form-input:focus {
            box-shadow: 4px 4px 4px #d1d9e6, inset -4px -2px 4px #f9f9f9;
        }

        .brand-img {
            position: absolute;
            top: 0;
            transition: 1.25s;
            overflow: hidden;
            box-shadow: 4px 4px 10px #d1d9e6, -4px -4px 10px #f9f9f9;
            left: calc(100% - 400px);
        }

        .brand-img>img {
            height: 100%;
            width: 100%;
        }

        img {
            max-width: 100%;
        }

        .form-title {
            font-size: 24px;
            font-weight: 700;
            line-height: 3;
            color: #4c4c4c;
        }

        .form-submit-button {
            margin-top: 1em;
            width: 20vw;
            height: 5vh;
            background: #8ca5b8;
            color: #fff;
            border: 1px solid rgb(212, 205, 205);
            border-radius: 20px;
            box-shadow: 5px 5px 5px #eee;
            text-shadow: none;
            cursor: pointer;
        }

        .form-submit-button:hover {
            background: #016ABC;
            color: #fff;
            border: 1px solid #eee;
            border-radius: 20px;
            box-shadow: 5px 5px 5px #eee;
            text-shadow: none;
        }

        @media (max-width: 1200px) {
            .container {
                transform: scale(0.7);
            }
        }

        @media (max-width: 1000px) {
            .container {
                transform: scale(0.6);
            }
        }

        @media (max-width: 800px) {
            .container {
                transform: scale(0.5);
            }
        }

        @media (max-width: 600px) {
            .container {
                transform: scale(0.4);
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="form-container">
            <form class="form" action="<?php echo constant("URL") ?>/login/auth" method="post">

                <h2 class="form-title">
                    SystemMoto
                </h2>
                <input type="text" placeholder="Username" id="typeEmailX" name="user" class="form-input" required>
                <input type="password" placeholder="Password" id="typePasswordX" name="pass" class="form-input">
                <input class="form-submit-button" type="submit" value="Iniciar Sesion" name="login"><span></span></input>
                <?php if ($this->mensaje) { ?>
                    <div>
                        <p>Usuario y/o contraseña incorrecta.</p>
                    </div>
                <?php } ?>


            </form>
        </div>
        <div class="brand-img">
            <img src="assets/img/login-img.jpg" alt="">
        </div>
    </div>

</body>

</html>