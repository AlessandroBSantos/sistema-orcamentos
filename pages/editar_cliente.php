<?php

session_start();
require '../config/conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../login.php");
    exit;
}

$id = $_GET['id'] ?? 0;

$stmt = $pdo->prepare("
    SELECT *
    FROM clientes
    WHERE id = ?
");

$stmt->execute([$id]);

$cliente = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$cliente) {
    die("Cliente não encontrado.");
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Editar Cliente</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#0F172A;
}

.card{
    border:none;
    border-radius:15px;
}

</style>

</head>

<body>

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-warning">

<h4 class="mb-0">
Editar Cliente
</h4>

</div>

<div class="card-body">

<form action="atualizar_cliente.php" method="POST">

<input
type="hidden"
name="id"
value="<?= $cliente['id'] ?>">

<div class="row">

<div class="col-md-6 mb-3">

<label>Nome</label>

<input
type="text"
name="nome"
class="form-control"
value="<?= $cliente['nome'] ?>"
required>

</div>

<div class="col-md-3 mb-3">

<label>CPF/CNPJ</label>

<input
type="text"
name="cpf_cnpj"
class="form-control"
value="<?= $cliente['cpf_cnpj'] ?>">

</div>

<div class="col-md-3 mb-3">

<label>Telefone</label>

<input
type="text"
name="telefone"
class="form-control"
value="<?= $cliente['telefone'] ?>">

</div>

</div>

<div class="row">

<div class="col-md-4 mb-3">

<label>WhatsApp</label>

<input
type="text"
name="whatsapp"
class="form-control"
value="<?= $cliente['whatsapp'] ?>">

</div>

<div class="col-md-8 mb-3">

<label>E-mail</label>

<input
type="email"
name="email"
class="form-control"
value="<?= $cliente['email'] ?>">

</div>

</div>

<div class="text-end">
<div class="row">

    <div class="col-md-2 mb-3">
        <label>CEP</label>
        <input
            type="text"
            name="cep"
            class="form-control"
            value="<?= $cliente['cep'] ?>">
    </div>

    <div class="col-md-8 mb-3">
        <label>Endereço</label>
        <input
            type="text"
            name="endereco"
            class="form-control"
            value="<?= $cliente['endereco'] ?>">
    </div>

    <div class="col-md-2 mb-3">
        <label>Número</label>
        <input
            type="text"
            name="numero"
            class="form-control"
            value="<?= $cliente['numero'] ?>">
    </div>

</div>

<div class="row">

    <div class="col-md-4 mb-3">
        <label>Bairro</label>
        <input
            type="text"
            name="bairro"
            class="form-control"
            value="<?= $cliente['bairro'] ?>">
    </div>

    <div class="col-md-6 mb-3">
        <label>Cidade</label>
        <input
            type="text"
            name="cidade"
            class="form-control"
            value="<?= $cliente['cidade'] ?>">
    </div>

    <div class="col-md-2 mb-3">
        <label>UF</label>
        <input
            type="text"
            name="estado"
            class="form-control"
            maxlength="2"
            value="<?= $cliente['estado'] ?>">
    </div>

</div>

<div class="mb-3">

    <label>Observações</label>

    <textarea
        name="observacoes"
        rows="4"
        class="form-control"><?= $cliente['observacoes'] ?></textarea>

</div>
<a href="clientes.php" class="btn btn-secondary">
Cancelar
</a>

<button
type="submit"
class="btn btn-success">

Salvar Alterações

</button>

</div>

</form>

</div>

</div>

</div>

</body>
</html>