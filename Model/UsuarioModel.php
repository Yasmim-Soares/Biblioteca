<?php

function verificarUsuario($pdo, $email, $senha){
    $sql = "SELECT * FROM usuarios WHERE email = ?";

    try{
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$usuario){
            return false;
        }

        if(password_verify($senha, $usuario['senha'])){
            unset($usuario['senha']);
            return $usuario;
        } else {
            return false;
        }
    } catch (PDOException $e){
        return false;
    }
}

function cadastrarUsuario($pdo, $email, $senha){
    $hashSenha = password_hash($senha, PASSWORD_DEFAULT);
    $sql = "INSERT INTO usuarios (email, senha) VALUES (?, ?)";
    
    try{
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$email, $hashSenha]);
    } catch(PDOException $e){
        return false;
    }
}
?>