<?php 
    $user = trim($_POST['txtUsuario']);
    $Pwd = trim($_POST['txtPwd']);

   include 'conexao.php';

   $sql = "select * from cliente where email LIKE ?";
   $pdo = Conexao::conectar();
   $query = $pdo->prepare($sql);
   $query->execute (array($user));
   $dados = $query->fetch(PDO::FETCH_ASSOC);
   
   if(empty($dados)){
    header("location:login.php");
   }

   Conexao::desconectar();

   if(md5($Pwd) == $dados['password']){
    session_start();
    $_SESSION['user'] = $dados['email'];
    $_SESSION['Pwd'] = $dados['password'];
    $_SESSION['admin'] = $dados['admin'];
    
    if($_SESSION['admin'] == false){
    header("location:lstBarbeiro.php");
    }else{
        header("location:frmBarbeiro.php");
    }
   }else{
    echo "Senha ou Email Inválidos";
   }
?>