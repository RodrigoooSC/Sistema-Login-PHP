<?php
session_start();
include_once '../config.php';
include_once DBAPI;

if (empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['password'])) {
    header('Location: cadastro.php');
    exit();
}

$db = open_database();

?>

<?php if ($db) : ?>


          <?php
          $recebeNome = $_POST['nome'];
          $filtraNome = filter_var($recebeNome, FILTER_SANITIZE_SPECIAL_CHARS);
          $filtraNome = filter_var($filtraNome, FILTER_SANITIZE_ADD_SLASHES);
          $recebeEmail = $_POST['email'];
          $filtraEmail = filter_var($recebeEmail, FILTER_SANITIZE_SPECIAL_CHARS);
          $filtraEmail = filter_var($filtraEmail, FILTER_SANITIZE_ADD_SLASHES);
          $recebeSenha = $_POST['password'];
          $filtraSenha = filter_var($recebeSenha, FILTER_SANITIZE_SPECIAL_CHARS);
          $filtraSenha = filter_var($filtraSenha, FILTER_SANITIZE_ADD_SLASHES);
          function criptoSenha($criptoSenha)
          {
               return md5($criptoSenha);
          }
          $criptoSenha = criptoSenha($filtraSenha);
          $consultaBanco = mysqli_query($db, "SELECT * FROM tblusuario WHERE email_tblusuario = '$recebeEmail'") or die(mysqli_error($db));
          $verificaBanco = mysqli_num_rows($consultaBanco);
          if ($verificaBanco == 1) {           
               $_SESSION['cadastrado'] = true ;             
               header('Location: cadastro.php');
               exit();
               return false;               
          } 
          else {
               $insereDados = mysqli_query($db, "INSERT INTO tblusuario (nome_tblusuario, email_tblusuario, senha_tblusuario) VALUES ('$filtraNome', '$filtraEmail', '$criptoSenha')") or die(mysqli_error($db));
               $_SESSION['nao_cadastrado'] = true ;
               header('Location: cadastro.php');
               exit();
          }
          ?>
 <?php else : ?>
    <div class="alert alert-danger" role="alert">
        <p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>
    </div>

<?php endif; ?>