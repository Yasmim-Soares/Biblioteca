<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cadastrar Livro</title>
</head>

<body>
    <h1>Sistema de Biblioteca</h1>
    <h2>Cadastro de Livros</h2>

    <form action="index.php" method="POST">
        <label for="nome">Nome do Livro:</label><br>
        <input type="text" id="name" name="nome"><br><br>
        
        <label for="autor">Autor: </label><br>
        <input type="text" id="autor" name="autor"><br><br>

        <label for="status">Status</label><br>

        <input type="radio" id="disponivel" name="status" value="1" checked>
        <label for="disponivel">Disponível</label><br>
        <input type="radio" id="emprestado" name="status" value="0">
        <label for="emprestado">Emprestado</label><br><br>

        <input type="submit" value="Salvar Livro">
    </form>

    <br>
    <a href="index.php">Voltar para a Lista</a>
</body>

</html>