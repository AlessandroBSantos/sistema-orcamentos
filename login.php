<?php
session_start();
?>

<?php include 'includes/header.php'; ?>

<div class="container">

    <div class="row justify-content-center mt-5">

        <div class="col-md-4">

            <div class="card shadow">

                <div class="card-header text-center">
                    <h3>Login</h3>
                </div>

                <div class="card-body">

                    <form>

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email"
                                   class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Senha</label>
                            <input type="password"
                                   class="form-control">
                        </div>

                        <button
                            class="btn btn-primary w-100">
                            Entrar
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<?php include 'includes/footer.php'; ?>