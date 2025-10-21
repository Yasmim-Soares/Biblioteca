<?php

function listarTodosLivros($pdo){

    $sql = "SELECT * FROM livros ORDER BY nome ASC";

    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>