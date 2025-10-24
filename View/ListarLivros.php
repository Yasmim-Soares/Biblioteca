<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Biblioteca</title>
</head>
<body>
    <h1>Sistema de Biblioteca</h1>
    <h2>Lista de Livros</h2>

    <a href="index.php?acao=cadastrar">Cadastrar Novo Livro</a>
    <hr>

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
</body>                                       
</html>