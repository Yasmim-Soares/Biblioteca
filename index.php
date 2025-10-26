<?php
session_start();

require_once 'model/Conexao.php';
require_once 'model/LivroModel.php';
require_once 'model/UsuarioModel.php';

$login = $_POST['login'] ?? null;
$acao_register = $_POST['register'] ?? null;
$acao = $_GET['acao'] ?? null;

if($login == 'login'){
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $usuario = verificarUsuario($pdo, $email, $senha);

    if($usuario){
        $_SESSION['usuarioId'] = $usuario['id'];
        $_SESSION['usuarioEmail'] = $usuario['email'];

        header('Location: index.php');
        exit;
    } else {
        $erroLogin = true;
    }
}


elseif ($acao_register == 'register'){
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmarSenha = $_POST['confirmarSenha'];

    if (strlen($senha) < 8) {
        $erro_register = "A senha deve ter pelo menos 8 caracteres.";
    } 
    elseif (!preg_match('/[a-zA-Z]/', $senha)) {
        $erro_register = "A senha deve conter pelo menos uma letra.";
    } 
    elseif (!preg_match('/\d/', $senha)) { 
        $erro_register = "A senha deve conter pelo menos um número.";
    } 
    elseif ($senha !== $confirmarSenha) {
        $erro_register = "As senhas não conferem.";
    } else {
        $sucesso = cadastrarUsuario($pdo, $email, $senha);

        if($sucesso){
          header('Location: index.php?cadastro=sucesso');
          exit;
        }else {
          $erro_register = "Erro ao cadastrar. Este e-mail já pode estar em uso. ";
        }
    }
}
    if($acao == 'logout'){
        session_unset();
        session_destroy();

        header('Location: index.php');
        exit;
    }

    if(isset($_SESSION['usuarioId'])){
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nome'])) {
            if (isset($_POST['nome']) && isset($_POST['autor']) && isset($_POST['status'])) {

                $nome = $_POST['nome'];
                $autor = $_POST['autor'];
                $status = $_POST['status'];

                if (isset($_POST['id']) && !empty($_POST['id'])) {
                    $id = $_POST['id'];
                    editarLivro($pdo, $id, $nome, $autor, $status);
                } else {
                    cadastrarLivro($pdo, $nome, $autor, $status);
                }
            
            header('Location: index.php');
            exit;
        }
    }

    else {
    switch($acao){
        case 'cadastrar':
            require_once 'View/FormLivros.php';
        break;

        case 'listar':
        default:
            $busca = $_GET['busca'] ?? '';
            $livros = listarTodosLivros($pdo, $busca);
            require_once 'View/ListarLivros.php';
            break;

        case 'excluir':
            if (isset($_GET['id'])){
                $id = $_GET['id'];
                excluirLivro($pdo, $id);
            }
                header('Location: index.php');
                exit;
                break;

        case 'editar':            
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $livro = buscarLivroPorId($pdo, $id);                 
                    require_once './View/FormLivros.php';

                } else {
                    header('Location: index.php');
                    exit;
                }
                 break;
        }
    }
} else {
    if(isset($_GET['cadastro']) && $_GET['cadastro'] == 'sucesso'){
        $erroLogin = "Cadastro realizado com sucesso! Faça seu login.";
    }

    if($acao == 'register' || isset($erro_register)){
        require_once 'View/Registro.php';
    } else {
        require_once 'View/login.php';
    }
}
 
?>