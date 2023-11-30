<!DOCTYPE html>
<html lang="pt-br">
<head>
    
    <title>Cadastro de extrato</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <img src="escritorio.jpeg" height="200px" width="200px">
    <main>
        <form action="" method="post">
            <label for="nome">Digite Seu Extrato Anual:</label>
            <input type="text" id="nome" name="nome" required>
            <button type="submit">Enviar</button>
        </form>
    </main>
    <a href = "/novo_trabalho/views/tarefas/adicionar.php">Adicionar Cliente</a>
</body>

<?php 
    include '../../conexao.php';
?>

<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST['nome'];
        

        $sql_categorias = 
        "INSERT INTO 
            categorias (nome) 
        VALUES 
            ('$nome')";
            
        if ($conexao->query($sql_categorias) === TRUE) {
        } else {
            echo "Erro: " . $conexao->error;
        }
    }
    $conexao->close();
?>

