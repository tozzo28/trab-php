<?php 
    $user = trim($_POST['txtUsuario']);
    $Pwd = trim($_POST['txtPwd']);

   include 'conexao.php';

   $sql = "select * from barbeiro where email LIKE ?";
   $pdo = Conexao::conectar();
   $query = $pdo->prepare($sql);
   $query->execute (array($user));
   $dados = $query->fetch(PDO::FETCH_ASSOC);
   
   if(empty($dados)){
    header("location:login.php");
   }

   Conexao::desconectar();

   if(md5($Pwd) == $dados['senha']){
    session_start();
    $_SESSION['user'] = $dados['email'];
    $_SESSION['senha'] = $dados['senha'];
    $_SESSION['admin'] = $dados['admin'];
   
    header('location:lstBarbeiro.php');
   
   }else{
    echo "Senha ou Email Inválidos";
   }
?>