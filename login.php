<?php
session_start();
require_once 'config/conexao.php';

// Se já estiver logado
if (isset($_SESSION['usuario_id'])) {
    header('Location: dashboard.php');
    exit;
}

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = trim($_POST['email'] ?? '');
    $senha = trim($_POST['senha'] ?? '');

    try {

        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {

            // SENHA EM TEXTO (temporário)
            if(password_verify($senha, $usuario['senha'])){

                session_regenerate_id(true);

                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_nome'] = $usuario['nome'];
                $_SESSION['usuario_email'] = $usuario['email'];

                header('Location: dashboard.php');
                exit;
            }
        }

        $erro = 'Usuário ou senha inválidos';

    } catch (Exception $e) {

        $erro = 'Erro ao processar login';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>LLA Software - Sistema de Orçamentos</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

<style>

body{
    background: linear-gradient(135deg,#0f172a,#1e293b);
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

.login-card{
    width:100%;
    max-width:450px;
    border:none;
    border-radius:20px;
    overflow:hidden;
}

.card-body{
    padding:40px;
}

.logo{
    font-size:60px;
    color:#0d6efd;
}

.btn-login{
    height:55px;
    font-size:18px;
    font-weight:600;
}

</style>

</head>

<body>

<div class="card shadow-lg login-card">

    <div class="card-body">

        <div class="text-center mb-4">

            <i class="fa-solid fa-screwdriver-wrench logo"></i>

            <h2 class="mt-3">
                Sistema de Orçamentos
            </h2>

            <p class="text-muted">
                LLA Software
            </p>

        </div>

        <?php if (!empty($erro)): ?>

            <div class="alert alert-danger">
                <?= htmlspecialchars($erro) ?>
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