<?php

function listarTodosLivros($pdo){

    $sql = "SELECT * FROM livros ORDER BY nome ASC";

    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function cadastrarLivro($pdo, $nome, $autor, $status){
    $sql = "INSERT INTO livros (nome, autor, disponivel) VALUES (?, ?, ?)";

    try{
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nome, $autor, $status]);
        
        return $stmt->lastInsertId();
    } catch(PDOException $e){
        die("Erro ao cadastrar livro: " .$e->getMessage());
        return false;
    }
}

function excluir($pdo, $id){
    
}
?>