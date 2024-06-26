<?php 
     include 'conexao.php'; 
     $nome = trim($_POST['txtNome']); 
     $email = trim($_POST['txtEmail']);
     $pwd = trim($_POST['txtPwd']);
    
    $pwd = md5($pwd);

    if (!empty($nome) && !empty($email) && !empty($pwd)){
         $pdo = Conexao::conectar(); 
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
         $sql = "INSERT INTO cliente( nome, email, password) VALUES (?,?,?)"; 
         $query = $pdo->prepare($sql);
         $query->execute(array($nome, $email, $pwd));
         Conexao::desconectar(); 
     }
     header("location:login.php"); 
?>