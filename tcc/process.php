<?php
    include("conexao.php");
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    $sql_code = "INSERT INTO contas (cpf, nome, senha) values ('{$cpf}', '{$nome}', '{$senha}')";
    $sql_query = $mysqli -> query($sql_code);
    header('location: phphomepage.php');
?>