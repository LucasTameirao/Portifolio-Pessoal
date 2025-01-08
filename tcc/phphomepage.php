<?php
    session_start();
    include ("conexao.php");

    // Processa a exclusão de itens
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
        $delete_id = $_POST['delete_id'];
        $mysqli->query("DELETE FROM itens WHERE id = $delete_id");
    }

    // Busca os itens no banco
    $result = $mysqli->query("SELECT * FROM itens");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Inventory Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="csshomepage.css">
</head>
<body>
    <header class="d-flex justify-content-between px-5">
        <div class="logo">InventoryApp</div>
    </header>

    <main>
        <div class="container mt-3">
            <div class="row">
                <div class="col">
                    <div class="d-flex flex-column w-100">
                        <h1>Gerenciamento de Estoque</h1>

                        <!-- Formulário para adicionar novos itens -->
                        <form action="add_item.php" method="POST">
                            <h3>Adicionar Novo Item</h3>
                            <label for="nome">Nome:</label><br>
                            <input type="text" name="nome" id="nome" required><br><br>

                            <label for="quantidade">Quantidade:</label><br>
                            <input type="number" name="quantidade" id="quantidade" min="0" required><br><br>

                            <label for="categoria">Categoria:</label><br>
                            <input type="text" name="categoria" id="categoria" required><br><br>

                            <button type="submit" class="w-100">Adicionar Item</button>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
        

        <hr>

        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="d-flex p-4 flex-column">
                    <h2 class="text-center mb-5">Itens no Estoque</h2>
                            
                        <style>
                            table {
                                border-collapse: collapse; /* Une as bordas */
                                width: 100%;
                            }

                            th, td {
                                border: 1px solid #ddd; /* Borda ao redor das células */
                                padding: 8px;
                                text-align: left;
                            }

                            th {
                                background-color: #f2f2f2; /* Cor do cabeçalho */
                            }

                            tr:nth-child(even) {
                                background-color: #f9f9f9; /* Cor para linhas alternadas */
                            }

                            tr:hover {
                                background-color: #f1f1f1; /* Cor ao passar o mouse */
                            }
                        </style>

                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Quantidade</th>
                                    <th>Categoria</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($item = $result->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?= $item['id'] ?></td>
                                        <td><?= htmlspecialchars($item['nome']) ?></td>
                                        <td><?= $item['quantidade'] ?></td>
                                        <td><?= htmlspecialchars($item['categoria']) ?></td>
                                        <td>
                                            <!-- Botões de ação -->
                                            <form action="edit_item.php"  method="GET" style="display:inline;">
                                                <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                                <button type="submit" class="btn btn-sm btn-primary mb-3">Editar</button>
                                            </form>
                                            <form action="" method="POST" style="display:inline;">
                                                <input type="hidden" name="delete_id" value="<?= $item['id'] ?>">
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Deseja realmente excluir este item?')">Excluir</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
        

    </main>

    <footer>
        <p>&copy; 2024 SmartFlow. Todos os direitos reservados.</p>
        <ul>
            <li><a href="#privacy">Termos de Privacidade</a></li>
            <li><a href="#terms">Termos de Serviço</a></li>
            <li><a href="#social">Siga-nos nas Redes Sociais</a></li>
        </ul>
    </footer>
</body>
</html>