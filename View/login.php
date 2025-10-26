<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="main-header">
        <div class="header-left"></div> <div class="header-center">Sistema de Biblioteca</div>
    <div class="header-right"></div> 
    </header>
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
            <div class="input-wrapper">
            <span class="icon">📧</span>
            <input type="email" id="email" name="email" required>
        </div>
        </div>
        <br>
        <div>
            <label for="senha">Senha:</label><br>
            <div class="input-wrapper">
            <span class="icon">🔒</span>
            <input type="password" id="senha" name="senha" required>
        </div>
        </div>
        <br>
        <button type="submit">Entrar</button>
    </form>

    <br>
    <p class="link-centro">
        Não tem uma conta?
        <a href="index.php?acao=register" >Cadastre-se aqui</a>
    </p>
</body>
</html>