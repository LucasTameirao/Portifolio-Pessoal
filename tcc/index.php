<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Inventário Inteligente</title>
    <link rel="stylesheet" href="csshomepage.css"> <!-- Link para o CSS -->
</head>
<body>
    <?php
    include("conexao.php");
    ?>
    <header>
        <div class="logo">Smart Flow</div>
    </header>

    <section class="hero">
        <h1>Gerencie o seu estoque de forma inteligente</h2>
        <p>Acompanhe, gerencie e otimize seu estoque com facilidade.</p>
        <a href="#login" class="cta-button">Log-in</a>

        <p>Caso queira apenas conhecer o projeto sem criar uma conta clique aqui:</p>

        <form action="login_without_account.php" method="POST">
            <button type="submit" class="cta-button">Entrar</button>
        </form>
    </section>

    <section class="login-container">

        <div class="login-form" id="login">
            <h2>Login</h2>
            <form action="loginProcess.php" method="POST">
                <input type="hidden" name="action" value="login">
                <label for="name">Nome:</label>
                <input type="text" id="name" name="nome" required>
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" required>
                <label for="password">Senha:</label>
                <input type="password" id="password" name="senha" required>
                <button type="submit">Entrar</button>
            </form>
        </div>

        <div class="create-account-form" id="create-account">
            <h2>Crie sua conta</h2>
            <form action="process.php" method="POST">
                <input type="hidden" name="action" value="create_account">
                <label for="new-cpf">CPF:</label>
                <input type="text" id="new-cpf" name="cpf" required>
                <label for="new-name">Nome:</label>
                <input type="text" id="new-name" name="nome" required>
                <label for="new-password">Senha:</label>
                <input type="password" id="new-password" name="senha" required>
                <button type="submit">Criar Conta</button>
            </form>
        </div>
    </section>

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
