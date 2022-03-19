<?php
session_start();
include_once 'config.php';
?>

<?php include_once(HEADER_TEMPLATE); ?>

<div class="container">
	<div class="row justify-content-center align-items-center vh-100">
		<div class="col-auto login">
			<h2 class="title-login">SISTEMA DE LOGIN</h2>
			<form method="post" action="customers/validaLogin.php" id="validaForm">
				<div class="mb-3">
					<label for="email" class="form-label">Endereço de e-mail</label>
					<input type="email" class="form-control" id="email" name="email" placeholder="Digite seu e-mail" required>
				</div>
				<div class="mb-3">
					<label for="password" class="form-label">Senha</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Digite sua senha" required>
				</div>
				<div class="mb-3 form-check">
					<input type="checkbox" class="form-check-input " id="lembrar-me">
					<label class="form-check-label" for="lembrar-me">Lembrar-me</label>
				</div>
				<div class="d-grid gap-2">
					<button type="submit" class="btn btn-primary">Fazer login</button>
				</div>

			</form>
			<?php
			if (isset($_SESSION['nao_login'])) :
			?>
				<p class="usuario-invalido">E-mail ou senha inválidos! Tente novamente.</p>
			<?php
			endif;
			unset($_SESSION['nao_login']);
			?>
			<hr />
			<div>
				<p>Esqueceu a senha? <a href="customers/esqueceuSenha.php">Clique aqui!</a></p>
				<p>Ainda não é cadastrado em nosso sistema? <a href="customers/cadastro.php">Cadastre-se</a></p>
			</div>
		</div>
	</div>
</div>

<?php include_once(FOOTER_TEMPLATE); ?>