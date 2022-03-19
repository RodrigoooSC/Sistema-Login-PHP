<?php
session_start();
include_once '../config.php';
require_once(DBAPI);
?>

<?php include_once(HEADER_TEMPLATE); ?>

<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-auto senha">
            <h2 class="title-senha">SISTEMA DE LOGIN</h2>
            <p>Informe o email utilizado no login, para que um nova senha seja enviada!</p>
            <hr>
            <form method="post" action="recuperaSenha.php" id="validaForm">
                <div class="row g-2">
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu e-mail" required>
                    </div>
                    <div class="col-sm">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </div>
                <?php if (isset($_SESSION['enviado'])) : ?>
                    <p class="enviado">Sua senha foi enviada com sucesso para o email: <?php echo $_SESSION['nome_email']; ?></p>
                <?php elseif (isset($_SESSION['nao_enviado'])) : ?>
                    <p class="nao-enviado">O email não consta na base de dados ou está incorreto.</p>                    
                <?php endif;
                unset($_SESSION['enviado']);
                unset($_SESSION['nao_enviado']);
                unset($_SESSION['nome_email']);
                ?>
            </form>
            <hr>
            <p>Se você já possui cadastro, <a href="../index.php">clique aqui</a> para acessar o Conteúdo Exclusivo!</p>
        </div>
    </div>
</div>

<?php include_once(FOOTER_TEMPLATE); ?>