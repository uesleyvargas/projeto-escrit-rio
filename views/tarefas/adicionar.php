<?php 
    include '../../conexao.php';
?>
<head>
    <title>Adicionar cliente</title>
    <link rel="stylesheet" type="text/css" href="adicionar.css">
</head>

<body>
 <img src="escritorio.jpeg" height="200px" width="200px">
    <div class="container">
        <form method="post" action="adicionar.php">
         <h3>Adicionar cliente</h3>
            <label for="titulo">nome:</label>
            <input type="text" name="nome" id="nome"><br>
            <label for="titulo">telefone:</label>
            <input type="number" name="telefone" id="telefone"><br>

            <label for="descricao">email:</label>
            <input type="text"name="email" id="email"><br>

            <label for="categoria_id">extrato:</label>
            <select name="categoria_id" id="categoria_id">
                <option value="">Selecione um extrato</option>
                <?php
                    $sql_categorias = 
                        "SELECT id, nome 
                            FROM categorias";
                    $result_categorias = $conexao->query($sql_categorias);

                    while ($row = $result_categorias->fetch_assoc()) {
                        $categoria_id = $row['id'];
                        $categoria_nome = $row['nome'];
                        echo "<option value='$categoria_id'>$categoria_nome</option>";
                    }
                ?>
            </select><br>

            <input type="submit" value="Adicionar" style="background-color: green; border: 1px solid black; color: white; padding: 0 15px; font-size: 25px; width: 300px;;">
        </form>
    </div>
</body>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $categoria_id = $_POST['categoria_id'];

        $sql_tarefa = 
        "INSERT INTO 
            tarefas (nome, telefone, email, categoria_id) 
        VALUES 
            ('$nome', '$telefone', '$email', '$categoria_id')";
            
        if ($conexao->query($sql_tarefa) === TRUE) {
            header("Location: listar.php");
        } else {
            echo "Erro: " . $conexao->error;
        }
    }
    $conexao->close();
?>


