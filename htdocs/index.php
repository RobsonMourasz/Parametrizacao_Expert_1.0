<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app/assets/css/login.css">
    <link rel="shortcut icon" href="app/assets/img/favicon.ico" type="image/x-icon">
    <title>Login - Parametrização</title>
</head>

<body>
    <div class="container">
        <div class="login">

            <div class="page section-login">
                <div class="title">
                    <h1>Faça seu login</h1>
                </div>
                <div class="content">

                    <form action="src/funcoes/login.php" method="post">

                        <div class="group-input">
                            <label for="" class="label-input">Usuario</label>
                            <input type="text" name="user" id="user" class="input-label" require>
                        </div> <!-- group-input -->

                        <div class="group-input">
                            <label for="" class="label-input">Senha</label>
                            <input type="password" name="pass" id="pass" class="input-label" require>
                        </div> <!-- group-input -->

                        <div class="group-input-check">
                            <input type="checkbox" id="check-lembrar" name="check-lembrar">
                            <label for="check-lembrar" class="check-lembrar">  Me lembre novamente  </label>
                        </div> <!-- group-input -->

                        <div class="group-input"> 
                            <input type="submit" value="Acessar" class="btn btn-login">
                        </div> <!-- group-input -->

                    </form>

                </div>
            </div> <!-- section-login -->

            <div class="page section-img">
            </div> <!-- section-img -->

        </div> <!-- login -->

    </div> <!-- container -->
    <script src="app/assets/js/login.min.js"></script> <!-- JS Efeitos  -->
</body>

</html>