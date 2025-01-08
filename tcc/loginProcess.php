<?php 
    include("conexao.php");

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    if(isset($_POST['nome']) || isset($_POST['senha']) || isset($_POST['cpf'])){
        if(strlen($_POST['nome']) == 0) {
            echo "Preencha seu nome";
        }
        else if(strlen($_POST['senha']) == 0){
            echo "Preencha sua senha";
        }else if(strlen($_POST['cpf']) == 0){
            echo "Preencha seu cpf";
        }else
        {
            
            $nome = $mysqli->real_escape_string($_POST['nome']);
            $senha = $mysqli->real_escape_string($_POST['senha']);
            $cpf = $mysqli->real_escape_string($_POST['cpf']);

            $sql_code = "SELECT * FROM contas WHERE nome = '$nome' AND senha = '$senha' AND cpf = '$cpf'";
            $sql_query = $mysqli -> query($sql_code);

            $quantidade = $sql_query -> num_rows;

            if($quantidade == 1){
                header('location: phphomepage.php');
            } else{
                echo "<h1>Falha ao logar! E-mail ou senha incorretos</h1>";
            }
        }
    }
    
?>