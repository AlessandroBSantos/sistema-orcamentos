<?php
session_start();
require 'config/conexao.php';

if(isset($_SESSION['usuario_id'])){
    header("Location: dashboard.php");
    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if($usuario){

        if(password_verify($senha, $usuario['senha'])){

            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nome'] = $usuario['nome'];
            $_SESSION['usuario_email'] = $usuario['email'];

            header("Location: dashboard.php");
            exit;

        }

    }

    $erro = "Usuário ou senha inválidos";
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>LLA Software - Ordem de Serviço</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

<style>

body{
    background: linear-gradient(135deg,#0f172a,#1e293b);
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

.login-card{
    width:100%;
    max-width:420px;
    border:none;
    border-radius:20px;
    overflow:hidden;
}

.logo{
    font-size:55px;
    color:#0d6efd;
}

.card-body{
    padding:40px;
}

.btn-login{
    height:50px;
    font-size:18px;
}

</style>

</head>

<body>

<div class="card shadow-lg login-card">

<div class="card-body">

<div class="text-center mb-4">

<i class="fa-solid fa-screwdriver-wrench logo"></i>

<h3 class="mt-3">Sistema de OS</h3>

<small class="text-muted">LLA Software</small>

</div>

<?php if(isset($erro)): ?>

<div class="alert alert-danger">
    <?= $erro ?>
</div>

<?php endif; ?>

<form method="POST">

<div class="mb-3">

<label class="form-label">
    E-mail
</label>

<div class="input-group">

<span class="input-group-text">
    <i class="fa fa-envelope"></i>
</span>

<input
type="email"
name="email"
class="form-control"
required>

</div>

</div>

<div class="mb-4">

<label class="form-label">
    Senha
</label>

<div class="input-group">

<span class="input-group-text">
    <i class="fa fa-lock"></i>
</span>

<input
type="password"
name="senha"
class="form-control"
required>

</div>

</div>

<button
type="submit"
class="btn btn-primary w-100 btn-login">

<i class="fa fa-right-to-bracket"></i>
Entrar

</button>

</form>

<div class="text-center mt-4">

<small class="text-muted">
Versão 1.0
</small>

</div>

</div>

</div>

</body>
</html>