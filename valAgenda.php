<?php 
     include 'conexao.php';
     if(!isset($_SESSION)) session_start();

     $pdo = Conexao::conectar(); 
     $sql = "select * from cliente order by id;";
     $lstCliente = $pdo->query($sql); 
     Conexao::desconectar(); 

    $clienteAtual = null;

    foreach($lstCliente as $cliente){
        if($cliente['id'] == !isset($_SESSION['id'])){
            $clienteAtual = $cliente['id'];
        }
    }

     $barbeiro = trim($_POST['txtBarbeiro']);
     $dia = trim($_POST['txtData']);
     $horario = trim($_POST['txtHorario']);


    echo $clienteAtual;

    if (!empty($clienteAtual) && !empty($barbeiro) && !empty($dia)  && !empty($horario)){
         $pdo = Conexao::conectar(); 
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
         $sql = "INSERT INTO agendamento(barbeiro, cliente, horario, dia) VALUES (?,?,?,?)"; 
         $query = $pdo->prepare($sql);
         $query->execute(array($barbeiro, $clienteAtual, $horario, $dia));
         Conexao::desconectar(); 
     }
     header("location:lstBarbeiro.php"); 
?>