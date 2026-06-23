<?php
$host = "localhost";
$banco = "ales7542_orcamentos";
$usuario = "ales7542_orcamentos_user";
$senha = "#Anjin2305!";

try {
    $pdo = new PDO("$host;dbname=$banco";charset=utf8mb4",
        $usuario,
        $senha,
        );

        $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
        );

} catch (PDOException $e) {
    echo "Erro ao conectar com o banco de dados: " . $e->getMessage();
    exit;
}