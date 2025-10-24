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
?>