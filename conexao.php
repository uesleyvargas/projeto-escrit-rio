<?php
    $host = 'localhost';
    $user = 'root';
    $pass = ''; // Vazio
    $db   = 'novo_trabalho'; // Nome do teu banco

    $conexao = new mysqli($host, $user, $pass, $db);

    if ($conexao->connect_error) {
        die("Erro na conexão: " . $conexao->connect_error);
    } 
?>