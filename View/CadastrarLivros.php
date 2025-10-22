<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cadastrar Livro</title>
</head>

<body>
    <h1>Sistema de Biblioteca</h1>
    <h2>Cadastro de Livros</h2>

    <form action="/index.php" method="POST">
        <label for="name">Nome do Livro:</label>
        <input type="text" id="name" name="nome">
        
        <label for="autor">Autor: </label>
        <input type="text" id="autor" name="autor">

        <label for="status">Status</label>
        <input type="radio" id="disponivel" name="status" value="disponivel">
    </form>
</body>

</html>