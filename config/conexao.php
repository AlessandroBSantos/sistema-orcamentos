<?php

$host = "localhost";
$banco = "ales7542_orcamentos";
$usuario = "ales7542_orcamento_user";
$senha = "nacmb=K<#jj^zCZseHqDbjDyn4UXdNbr";

try {

    $pdo = new PDO(
        "mysql:host=$host;dbname=$banco;charset=utf8mb4",
        $usuario,
        $senha
    );

    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

} catch (PDOException $e) {

    die("Erro ao conectar com o banco: " . $e->getMessage());

}