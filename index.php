<?php
require_once 'conexao.php';
require_once 'Model/LivroModel.php';

$livros = listarTodosLivros($pdo);

require_once 'View/ListarLivros.php';
?>