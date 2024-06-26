<?php
include 'conexao.php';
if (!isset($_SESSION)) session_start();

if ($_SESSION['admin'] == false) {
    include 'menuCliente.php';
} else {
    include 'menu.php';
}

$pdo = Conexao::conectar();
$sql = "select * from barbeiro order by id;";
$lstBarbeiro = $pdo->query($sql);
Conexao::desconectar();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar</title>
</head>

<body>
    <form method="POST" action="valAgenda.php">
        <div class="container">
            <br>
            <select class="browser-default" name="txtBarbeiro">
                <option value="" disabled selected>Selecione o Barbeiro</option>
                <?php  // carregar lista no select option
                foreach ($lstBarbeiro as $barbeiro) { ?>
                    <option value="<?php echo $barbeiro['id']; ?>"><?php echo $barbeiro['nome']; ?></option>
                <?php
                }
                ?>
            </select>
            <br>
            <select class="browser-default" name="txtHorario">
                <option value="" disabled selected>Selecione o horário</option>
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
        </div>
        <div class="container">
            <input type="date" name="txtData" id="data">
            <label for="data">Selecione o dia</label>
        </div>
        <br>
        <br>
        <div class="container">
            <button class="btn waves-effect waves-light green" type="submit" name="action">Agendar
                <i class="material-icons right">send</i>
        </div>
    </form>
</body>

</html>