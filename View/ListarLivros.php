<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Biblioteca</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="main-header">
        <div class="header-left">
            Olá, <?php echo htmlspecialchars($_SESSION['usuarioEmail']); ?>!
            <a href="index.php?acao=logout" class="logout-link-header">Sair</a>
        </div>

        <div class="header-center">
            Sistema de Biblioteca
        </div>

        <div class="header-right">
        </div>
    </header>

    <h2>Lista de Livros</h2>


    <form action="index.php" method="GET">
        <input type="hidden" name="acao" value="listar">

        <label for="busca">Buscar por Nome:</label>
        <p input-busca>
        <input type="text" id="busca" name="busca" placeholder="Digite o nome do livro..." value="<?php echo htmlspecialchars($busca ?? '');?>">
        </p>

        <p button-busca>
        <button type="submit">Buscar</button>
        </p>
    </form><br><br>

    <table border="1">
        <thead>
            <tr>
                <th>Nome do livro</th>
                <th>Autor</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(!empty($livros)){
                foreach($livros as $livro){
                    echo"<tr>";
                    
                    echo"<td>" . htmlspecialchars($livro['nome']) . "</td>";
                    echo"<td>" . htmlspecialchars($livro['autor']) . "</td>";
                    
                    $status = ($livro['disponivel'] == 1) ? 'Disponivel' : 'Emprestado';
                    echo "<td>" . $status . "</td>";

                    
                    echo "<td>";
                    echo "<a href='index.php?acao=editar&id=" .$livro['id']."'>Editar</a> | ";

                    $link_excluir = "index.php?acao=excluir&id=" .$livro['id'];
                    echo "<a href='". $link_excluir . "' onclick='return confirm (\"Tem certeza que deseja excluir este livro? \")'>Excluir</a>";
                    echo "</td>";

                    echo "</tr>";
                } 
            } else {
                echo "<tr><td colspan='4'> Nenhum livro cadastrado </td></tr>";
            }
            ?>
        </tbody>
    </table>
    <p class="link-centro">
    <a href="index.php?acao=cadastrar">Cadastrar Novo Livro</a>
    </p>
</body>                                       
</html>