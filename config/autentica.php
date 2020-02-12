<?php
session_start();
include('conexao/conexao.php');

if (empty($_POST['email']) || empty($_POST['senha'])) {
    header('Location: ../login.php');
    exit();
}

$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select * from usuarios where email = '$email' and senha = md5('{$senha}')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

$resultado = mysqli_fetch_assoc($result);
$_SESSION['UsuarioEmail'] = $resultado['email'];
$_SESSION['UsuarioID'] = $resultado['id'];
$_SESSION['UsuarioNome'] = $resultado['nome'];
$_SESSION['UsuarioNivel'] = $resultado['nivel'];

if ($row == 1) {

    if ($_SESSION['UsuarioNivel']  == 1) {
        header('Location: ../admin.php');
    } else {
        header('Location: ../user.php');
    }

    exit();
} else {
    $_SESSION['nao_autenticado'] = true;
    header('Location: ../login.php');
    exit();
}