<?php
session_start();
include_once '../config.php';
include_once DBAPI;

if (empty($_POST['email'])) {
    header('Location: esqueceuSenha.php');
    exit();
}

$db = open_database();

?>

<?php if ($db) : ?>

    <?php

    $email = $_POST['email'];
    $filtraEmail = filter_var($email, FILTER_SANITIZE_SPECIAL_CHARS);
    $filtraEmail = filter_var($filtraEmail, FILTER_SANITIZE_ADD_SLASHES);

    $destinatario = $filtraEmail;
    $remetente = "fulano@gmail.com";

    if ($email <> "") {

        $consultaInformacoes = mysqli_query($db, "SELECT * FROM tblusuario WHERE email_tblusuario = '$filtraEmail'") or die(mysqli_error($db));
        $contador = mysqli_num_rows($consultaInformacoes);

        if ($contador == 1) {
            while ($resultado = mysqli_fetch_array($consultaInformacoes)) {
                $nome  = $resultado['nome_tblusuario'];
                $email = $resultado['email_tblusuario'];
                $senha = $resultado['senha_tblusuario'];
            }
            $corpo_email  = "Ola, " . $nome . " o procedimento de recuperar dados, foi efetuado com sucesso !\n";
            $corpo_email .= "Senha de acesso = " . $senha . "\n";
            $corpo_email .= "Seu email = " . $email . "\n";
            $corpo_email .= "Nao responda esse email, e-Mail automatizado";
            mail($destinatario, "Recuperacao de Senha", $corpo_email, $remetente);

            $_SESSION['enviado'] = true;
            $_SESSION['nome_email'] = $email;
            header('Location: esqueceuSenha.php');
            exit();
        } else {
            $_SESSION['nao_enviado'] = true;
            header('Location: esqueceuSenha.php');
            exit();
        }
    }
    ?>
<?php else : ?>
    <div class="alert alert-danger" role="alert">
        <p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>
    </div>

<?php endif; ?>