<?php
    
  if(!isset($_SESSION)) session_start();

  if($_SESSION['admin'] == false){
    die ("Cadastro não pode ser concluido");
  }

    include 'conexao.php';

    $nome = trim($_POST['txtNome']); 
    $descricao = trim($_POST['txtDesc']);
    $preco = trim($_POST['txtPreco']);
    $id = $_POST['txtID'];

    $preco=str_replace(",",".",$preco);

    if (!empty($id) && !empty($nome) && !empty($descricao) && !empty($preco)){
        $pdo = Conexao::conectar(); 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        $sql = "UPDATE corte SET nome=?,descricao=?,preco=? WHERE id=?";
        $query = $pdo->prepare($sql);
        $query->execute(array($nome, $descricao, $preco, $id));
        Conexao::desconectar(); 
    }

    header("location:lstCortes.php");
?> 