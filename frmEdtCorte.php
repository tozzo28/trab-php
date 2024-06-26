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
$sql = 'select * from corte where id=?';
$query = $pdo->prepare($sql);
$query->execute(array($id));
$lstCorte = $query->fetch(PDO::FETCH_ASSOC);

Conexao::desconectar();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <form class="container" action="edtCorte.php" method="POST">
            <div class="container center-align ">
                <h1>Editar Corte</h1>
            </div>
            <div class="input-field col s8">
                <h3><label for="lblID" class="black-text bold"><b>ID: <?php echo $id; ?> </b></label> </h3>
                <input type="hidden" name="txtID" id="id" value="<?php echo $id; ?>">
            </div>
            <div class="">
                <input id="textarea1" class="materialize-textarea" name="txtNome" value="<?php echo $lstCorte['nome'] ?>"></input>
                <label for="textarea1">Nome do corte</label>
                <input id="textarea1" class="materialize-textarea" name="txtDesc" value="<?php echo $lstCorte['descricao'] ?>">></input>
                <label for="textarea1">Descrição do corte</label>
                <input id="textarea1" class="materialize-textarea" name="txtPreco" value="<?php echo $lstCorte['preco'] ?>">></input>
                <label for="textarea1">Preço do corte</label>
            </div>
            <br>
            <br>
            <div class="row center-align">
                <button class="btn waves-effect waves-light green" type="submit" name="action">Salvar
                    <i class="material-icons right">send</i>
                    <br>
                    <button class="btn waves-effect waves-light red" type="reset" name="action"> Limpar
                        <i class="material-icons right">clear_all</i>
                    </button>
            </div>
        </form>
    </div>
</body>

</html>