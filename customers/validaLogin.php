<?php
session_start();
include_once '../config.php';
include_once DBAPI;

if (empty($_POST['email']) || empty($_POST['password'])) {
    header('Location: ../index.php');
    exit();
}

$db = open_database();

?>

<?php if ($db) : ?>

    <?php
    $recebeEmail = $_POST['email'];
    $filtraEmail = filter_var($recebeEmail, FILTER_SANITIZE_SPECIAL_CHARS);
    $filtraEmail = filter_var($filtraEmail, FILTER_SANITIZE_ADD_SLASHES);
    $recebeSenha = $_POST['password'];
    $filtraSenha = filter_var($recebeSenha, FILTER_SANITIZE_SPECIAL_CHARS);
    $filtraSenha = filter_var($filtraSenha, FILTER_SANITIZE_ADD_SLASHES);

    $consultaInformacoes = mysqli_query($db, "SELECT * FROM tblusuario WHERE email_tblusuario = '$filtraEmail' LIMIT 1") or die(mysqli_error($db));

    $verificaInformacoes = mysqli_fetch_array($consultaInformacoes);
    if (password_verify($filtraSenha, $verificaInformacoes['senha_tblusuario'])) {
        $_SESSION['login'] = true;
        $_SESSION['nome_usuario'] = $verificaInformacoes['nome_tblusuario'];
        header("Location: exclusivo.php");
        exit();
    } else {
        $_SESSION['nao_login'] = true;
        header('Location: ../index.php');
        exit();
    }
    ?>

<?php else : ?>
    <div class="alert alert-danger" role="alert">
        <p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>
    </div>

<?php endif; ?>