<?php
session_start();
require '../config/conexao.php';
?>

<h2>Cadastro de Clientes</h2>

<form method="POST" action="salvar_cliente.php">
    Nome:
    <input type="text" name="nome" required>

    CPF/CNPJ:
    <input type="texte" name="telefone">

    Telefone:
    <input type="text" name="telefone">

    Whatsapp:
    <input type="text" name="whatsapp">

    Email:
    <input type="text" name="email">

    <button type="submit">
        salvar
    </button>
</form>