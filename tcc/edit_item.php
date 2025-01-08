<?php

include('conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $quantidade = $_POST['quantidade'];
    $categoria = $_POST['categoria'];

    // Atualiza o item no banco
    $stmt = $mysqli->prepare("UPDATE itens SET nome = ?, quantidade = ?, categoria = ? WHERE id = ?");
    $stmt->bind_param("sisi", $nome, $quantidade, $categoria, $id);
    $stmt->execute();

    // Redireciona para a página principal
    header("Location: phphomepage.php");
    exit;
} else {
    // Obtém os dados do item para exibir no formulário de edição
    $id = $_GET['id'];
    $result = $mysqli->query("SELECT * FROM itens WHERE id = $id");
    $item = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Item</title>
</head>
<body>
    <h1>Editar Item</h1>
    <form action="edit_item.php" method="POST">
        <input type="hidden" name="id" value="<?= $item['id'] ?>">

        <label for="nome">Nome:</label><br>
        <input type="text" name="nome" id="nome" value="<?= htmlspecialchars($item['nome']) ?>" required><br><br>

        <label for="quantidade">Quantidade:</label><br>
        <input type="number" name="quantidade" id="quantidade" value="<?= $item['quantidade'] ?>" min="0" required><br><br>

        <label for="categoria">Categoria:</label><br>
        <input type="text" name="categoria" id="categoria" value="<?= htmlspecialchars($item['categoria']) ?>" required><br><br>

        <button type="submit">Salvar Alterações</button>
    </form>
</body>
</html>