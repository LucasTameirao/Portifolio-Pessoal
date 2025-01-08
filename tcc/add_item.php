<?php

include('conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $quantidade = $_POST['quantidade'];
    $categoria = $_POST['categoria'];

    // Insere o item no banco
    $stmt = $mysqli->prepare("INSERT INTO itens (nome, quantidade, categoria) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $nome, $quantidade, $categoria);
    $stmt->execute();

    // Redireciona para a página principal
    header("Location: phphomepage.php");
    exit;
}
?>