<?php
if (!isset($_SESSION)) session_start();

if ($_SESSION['admin'] == false) {
    include 'menuCliente.php';
} else {
    include 'menu.php';
}


$id = $_GET['id'];
include 'conexao.php';
$pdo = Conexao::conectar();
$sql = 'select * from barbeiro where id=?';
$query = $pdo->prepare($sql);
$query->execute(array($id));
$lstBarbeiro = $query->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="center-align container ">
        <h1 class="center-align">Editar barbeiro</h1>
    </div>
    <div class="center-align">
        <form class="col s12 container" action="edtBarbeiro.php" method="POST" id="frmInsBarbeiro">
            <div class="input-field col s8">
                <h3><label for="lblID" class="black-text bold"><b>ID: <?php echo $id; ?> </b></label> </h3>
                <input type="hidden" name="txtID" id="id" value="<?php echo $id; ?>">
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="icon_prefix" type="text" class="validate" name="txt_Nome" value="<?php echo $lstBarbeiro['nome'] ?>">
                    <label for="icon_prefix">Nome do Barbeiro</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">date_range</i>
                    <input id="date_range" type="number" class="validate" name="txt_Idade" value="<?php echo $lstBarbeiro['idade'] ?>">
                    <label for="date_range">Idade</label>
                </div>
                <br>
                <select class="browser-default" name="txt_Entrada">
                    <option value="<?php echo $lstBarbeiro['HoraEntrada']?>"><?php echo $lstBarbeiro['HoraEntrada']?></option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                </select>
                <br>
                <select class="browser-default" name="txt_Saida">
                    <option value="<?php echo $lstBarbeiro['HoraSaida']?>"><?php echo $lstBarbeiro['HoraSaida']?></option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                </select>
                <br>
                <div>
                    <input id="icon_prefix" type="text" class="validate" name="txtEmail" value="<?php echo $lstBarbeiro['email'] ?>">
                    <label for="icon_prefix">Email do Barbeiro</label>
                </div>
                <div>
                    <input id="icon_prefix" type="password" class="validate" name="txtPwd">
                    <label for="icon_prefix">Senha</label>
                </div>
                <div class="left-align col s12 container">
                    <div class="row ">
                        <button class="btn waves-effect waves-light green" type="submit" name="action">Atulizar
                            <i class="material-icons right">send</i>
                            <br>
                    </div>
                    <div class="row">
                        <button class="btn waves-effect waves-light red" type="reset" name="action"> Limpar
                            <i class="material-icons right">clear_all</i>
                        </button>
                    </div>
                </div>
        </form>
    </div>
</body>

</html>