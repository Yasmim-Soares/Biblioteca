<?php
    
    $id = '';
    $nome = '';
    $autor = '';
    $status = 1;
    $titulo = "Cadastrar Novo Livro";

    if (isset($livro) && $livro) {
        $id = $livro['id'];
        $nome = $livro['nome'];
        $autor = $livro['autor'];
        $status = $livro['status'];
        $titulo = 'Editar livro';
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Biblioteca | <?php echo $titulo?></title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header class="main-header">
        <div class="header-left"></div> <div class="header-center">Sistema de Biblioteca</div>
    <div class="header-right"></div> 
    </header>
    <h2><?php echo $titulo?></h2>

    <form action="index.php" method="POST">

        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <label for="nome">Nome do Livro:</label><br>
        <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($nome);?>" required><br><br>
        
        <label for="autor">Autor: </label><br>
        <input type="text" id="autor" name="autor" value="<?php echo htmlspecialchars($autor);?>" required><br><br>

        <label>Status</label><br>

        <input type="radio" id="disponivel" name="status" value="1" <?php echo($status == 1)? 'checked' : '' ;?>>
        <label for="disponivel">Disponível</label><br>
        <input type="radio" id="emprestado" name="status" value="0" <?php echo($status == 0)? 'checked' : '' ;?>>
        <label for="emprestado">Emprestado</label><br><br>

        <button type="submit">Cadastrar</button>
    </form>

    <br>
    <a href="index.php">Voltar para a Lista</a>
</body>

</html>