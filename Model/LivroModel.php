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
       // die("Erro ao cadastrar livro: " .$e->getMessage());
        return false;
    }
}

function excluirLivro($pdo, $id){
   $sql = "DELETE FROM livros WHERE id = ?";

   try{
      $stmt = $pdo->prepare($sql);
      $stmt->execute([$id]);

      return true; 
   } catch(PDOException $e) {
      // die("Erro ao deletar livro: " . $e->getMessage());
      return false;
   }
}

function editarLivro($pdo, $id, $nome, $autor, $status){
    $sql = "UPDATE livros SET nome = ?, autor = ?, disponivel = ? WHERE id = ?";
    
    try{
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nome, $autor, $status, $id]);

        return true;
    } catch(PDOException $e){
        return false;
    }
}

function buscarLivroPorId($pdo, $id){
    $sql = "SELECT id, nome, autor, disponivel as status FROM livros WHERE id =?";

    try{
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        return false;
    }
}

?>