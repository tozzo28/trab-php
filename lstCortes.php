<?php
include 'conexao.php';
if (!isset($_SESSION)) session_start();

if ($_SESSION['admin'] == false) {
    include 'menuCliente.php';
} else {
    include 'menu.php';
}

$pdo = Conexao::conectar();
$sql = "select * from corte order by id;";
$lstCorte = $pdo->query($sql);
Conexao::desconectar();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    <div class="container ">
        <h1 class="light-green lighten-4 center-align">Listar Cortes</h1>
        <table class="striped">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Preço</th>
                <?php if ($_SESSION['admin'] == true) { ?>
                    <th>Funções</th>
                <?php } ?>
            </tr>
            <?php
            foreach ($lstCorte as $corte) {
            ?>
                <tr>
                    <td><?php echo $corte['id'] ?></td>
                    <td><?php echo $corte['nome'] ?></td>
                    <td><?php echo $corte['descricao'] ?></td>
                    <td>R$<?php echo $corte['preco'] ?></td>
                    <?php if ($_SESSION['admin'] == true) { ?>
                        <td class="center">
                            <a class="btn-floating btn-small waves-effect waves-light orange" onclick="JavaScript:location.href='frmEdtCorte.php?id=' + 
                           <?php echo $corte['id']; ?>">
                                <i class="material-icons">edit</i>
                            </a>
                            <a class="btn-floating btn-small waves-effect waves-light red" onclick="JavaScript:location.href='delCorte.php?id=' + 
                           <?php echo $corte['id']; ?>">
                                <i class="material-icons">clear</i>
                            </a>
                        </td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </table>
    </div>
    </br>
    </br>
</body>

</html>