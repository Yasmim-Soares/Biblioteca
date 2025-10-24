<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
</head>
<body>
<h1>Sistema de Biblioteca</h1>
<h2>Acesso Restrito</h2>    
<?php
if(isset($erro_login) && $erro_login){
    echo '<script type="text/javascript">';
    echo 'alert("E-mail ou senha inválidos.");';
    echo '</script>';
}
?>

    <form action="index.php" method="POST">
        <input type="hidden" name="login" value="login">

        <div>
            <label for="email">E-mail:</label><br>
            <input type="email" id="email" name="email" required>
        </div>
        <br>
        <div>
            <label for="senha">Senha:</label><br>
            <input type="password" id="senha" name="senha" required>
        </div>
        <br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>