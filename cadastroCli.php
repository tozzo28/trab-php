<?php
include 'menuinicio.php'
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
</head>

<body>
    <div class="center-align">
        <h1>Cadastrar</h1>
    </div>
    <div class="row container">
        <form class="col s12" method="POST" action="cadastrarCliente.php">
            <div class="row">
                <div class="input-field col s12">
                    <input id="first_name" type="text" name="txtNome" class="validate">
                    <label for="first_name">Nome</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="email" type="email" name="txtEmail" class="validate">
                    <label for="email">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="password" type="password" name="txtPwd" class="validate">
                    <label for="password">Password</label>
                </div>
            </div>
            <div>
                <button class="btn waves-effect waves-light" type="submit" name="action">Cadastrar
                    <i class="material-icons right">send</i>
                </button>
            </div>
            <br>
            <div>
                <button class="btn waves-effect waves-light red" type="reset" name="action"> Limpar
                    <i class="material-icons right">clear_all</i>
                </button>
            </div>
        </form>
    </div>
</body>

</html>