<?php
session_start();
include_once '../config.php';
require_once(DBAPI);
?>

<?php include_once(HEADER_TEMPLATE); ?>

<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-6 cadastro">
            <h2 class="title-cadastro">SISTEMA DE LOGIN</h2>
            <p>Para ter acesso ao conteúdo exclusivo, por favor, cadastre-se utilizando o formulário abaixo!</p>
            <hr>
            <form method="post" action="validaCadastro.php" id="validaCadastro">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Endereço de e-mail</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu e-mail" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Digite sua senha" required>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
                
                <?php if (isset($_SESSION['nao_cadastrado'])) : ?>
                    <p class="usuario-cadastrado">Seu cadastro foi efetuado com sucesso!</p>
                <?php elseif (isset($_SESSION['cadastrado'])) : ?>
                    <p class="usuario-cadastro">Usuário já possui cadastro!</p>
                <?php endif;
                unset($_SESSION['nao_cadastrado']);
                unset($_SESSION['cadastrado']);
                ?>
            </form>
            <hr />
            <div>
                <p>Se você já possui cadastro, <a href="../index.php">clique aqui</a> para acessar o Conteúdo Exclusivo!</p>
            </div>
        </div>
    </div>
</div>

<?php include_once(FOOTER_TEMPLATE); ?>