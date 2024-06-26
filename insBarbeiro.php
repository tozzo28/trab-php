<?php 
    include 'conexao.php';
    if(!isset($_SESSION)) session_start();

    if($_SESSION['admin'] == false){
      die ("Cadastro não pode ser concluido");
    }

    $nome = trim($_POST['txt_Nome']); 
    $idade = trim($_POST['txt_Idade']);
    $entrada = trim($_POST['txt_Entrada']);
    $saida = trim($_POST['txt_Saida']);
    $email = trim($_POST['txtEmail']);
    $pwd = trim($_POST['txtPwd']);
    
    $pwd = md5($pwd);


    if (!empty($nome) && !empty($idade) && !empty($entrada) && !empty($saida) && !empty($email) && !empty($pwd)){
        $pdo = Conexao::conectar(); 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        $sql = "INSERT INTO barbeiro(nome, idade, HoraEntrada, HoraSaida, email, senha) VALUES (?,?,?,?,?,?)"; 
        $query = $pdo->prepare($sql);
        $query->execute(array($nome, $idade, $entrada, $saida, $email, $pwd));
        Conexao::desconectar(); 
    }
    header("location:lstBarbeiro.php");
?> 