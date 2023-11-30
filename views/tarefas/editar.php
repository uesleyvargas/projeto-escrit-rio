<?php
include '../../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
   
    $sql = "UPDATE tarefas SET nome='$nome', telefone='$telefone' WHERE id=$id";
    if ($conexao->query($sql) === TRUE) {
        header("Location: listar.php");
    } else {
        echo "Erro ao atualizar: " . $conexao->error;
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT id, nome, telefone, email FROM tarefas WHERE id=$id";
    $result = $conexao->query($sql);
    if ($result->num_rows > 0) {
        $tarefa = $result->fetch_assoc();
    } else {
        echo "Tarefa não encontrada!";
        exit;
    }
}

$conexao->close();
?>
<head>
    <title>editar clientes</title>
</head>
<body>
<style>
  body { 
        background-color: black; 
        color: white; 
        font-family: Arial, sans-serif; 
 } 
 form { 
        display: flex; flex-direction: column; width: 300px;
        margin: 0 auto; 
 }
  label { 
        margin-bottom: 5px; 
 } 
input { 
        margin-bottom: 15px; 
 } 
 button { 
        background-color: green; 
        color: white; padding: 10px 20px; 
        border: none; 
        cursor: pointer; 
 } 
 button:hover { 
          background-color: darkgreen; 
 } 
 a { 
         display: block; text-align: center; 
         margin-top: 20px; 
         color: cyan; 
         text-decoration: none; 
 } 
 a:hover { 
         color: lightcyan; 
 } 
</style>
  <img src="escritorio.jpeg" height="200px" width="200px">
  <form method="post" action="editar.php">
  
    <h1>editar cliente</h1>
    <input type="hidden" name="id" value="<?php echo $tarefa['id']; ?>">
    nome: <input type="text" name="nome" value="<?php echo $tarefa['nome']; ?>"><br>
    telefone: <input type="number" name="telefone" value="<?php echo $tarefa['telefone']; ?>"><br>
    email: <input type="text" name="email" value="<?php echo $tarefa['email']; ?>"><br>
    <input type="submit" value="Salvar"style="background-color: green; border: 1px solid black; color: white; padding: 0 15px; font-size: 25px; width: 300px;;">
    <select name="categoria_id" id="categoria_id">
     <option value="<?php echo $tarefa['id']; ?>"><?php echo $tarefa['nome']; ?></option>
        
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
    
  </form>
 </body>