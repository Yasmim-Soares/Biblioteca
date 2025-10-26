<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca | Cadastrar Usuário</title>
    <script>
        function validarRegrasAoVivo(){
            var senha = document.getElementById('senha').value;

            var regraComprimento = document.getElementById('regra-comprimento');
            var regraLetra = document.getElementById('regra-letra');
            var regraNumero = document.getElementById('regra-numero');

            if(senha.length >= 8){
                regraComprimento.style.color = "green";
            } else {
                regraComprimento.style.color = "#666"
            }

            if(senha.match(/[a-zA-Z]/)){
                regraLetra.style.color = "green";
            } else {
                regraLetra.style.color = "#666"
            }

            if(senha.match(/[0-9]/)){
                regraNumero.style.color = "green";
            } else {
                regraNumero.style.color = "#666"
            }
        }
        function validarSenha(){
            var senha = document.getElementById('senha').value;
            var confirmarSenha = document.getElementById('confirmarSenha').value;

            if (senha.length < 8) {
                alert('A senha deve ter pelo menos 8 caracteres.');
                return false; 
            }
            if (!senha.match(/[a-zA-Z]/)) {
                alert('A senha deve conter pelo menos uma letra.');
                return false; 
            }
            if (!senha.match(/[0-9]/)) {
                alert('A senha deve conter pelo menos um número.');
                return false; 
            }

            if(senha != confirmarSenha){
                alert('As senhas digitadas não conferem');
                return false;
            }
            return true
        }
    </script>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="main-header">
        <div class="header-left"></div> <div class="header-center">Sistema de Biblioteca</div>
        <div class="header-right"></div>
    </header>
    <h2>Criar Nova Conta</h2>

    <?php
    if(isset($erro_register) && $erro_register){
        echo '<script>alert("'.htmlspecialchars($erro_register) . '");</script>';
    }
    ?>

    <form action="index.php" method="POST" onsubmit="return validarSenha();">
        <input type="hidden" name="register" value="register">

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
                    <input type="password" id="senha" name="senha" onkeyup="validarRegrasAoVivo()" required>
                </div>
                <div id="regras-senha">
                <ul>
                    <li id="regra-comprimento">Pelo menos 8 caracteres</li>
                    <li id="regra-letra">Pelo menos 1 letra</li>
                    <li id="regra-numero">Pelo menos 1 número</li>
                </ul>
            </div>
        </div>
        <br>
        <div>
            <label for="confirmarSenha">Confirmar Senha:</label><br>
            <div class="input-wrapper">
            <span class="icon">🔒</span>
            <input type="password" id="confirmarSenha" name="confirmarSenha" required>
        </div>
        </div>
        <br>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>