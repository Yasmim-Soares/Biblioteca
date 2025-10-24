<?php

require_once 'model/Conexao.php';
require_once 'model/LivroModel.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['nome']) && isset($_POST['autor']) && isset($_POST['status'])){
        $nome = $_POST['nome'];
        $autor = $_POST['autor'];
        $status = $_POST['status'];

        if(isset($_POST['id']) && !empty($_POST['id'])){
            $id = $_POST['id'];
            editarLivro($pdo, $id, $nome, $autor, $status);
        } else {
            cadastrarLivro($pdo, $nome, $autor, $status);
        }

        header('Location: index.php');
        exit();
    }
} else{
    
    $acao ='listar';
    if(isset($_GET['acao'])){
       $acao = $_GET['acao'];
    }

    switch($acao){
        case 'cadastrar':
            require_once 'view/FormLivros.php';
        break;

        case 'listar':
        default:
            $livros = listarTodosLivros($pdo);
            require_once 'view/ListarLivros.php';
        break;

        case 'excluir':
            if (isset($_GET['id'])){
                $id = $_GET['id'];
                excluirLivro($pdo, $id);
                header('Location: index.php');
                exit;
            }
        break;

        case 'editar':
            try{
                
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                
                    $livro = buscarLivroPorId($pdo, $id);
                    
                    require_once './View/FormLivros.php';

                } else {
                    header('Location: index.php');
                    exit;
                }
            } catch (PDOException $e) {
                $e->getMessage();
            }
        break;
    }
}

?>