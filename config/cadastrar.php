<?php
session_start();
include("conexao/conexao.php");

$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$email = mysqli_real_escape_string($conexao, $_POST['email']);
$telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);
$data = mysqli_real_escape_string($conexao, $_POST['data']);
$ndata = implode("-",array_reverse(explode("/",$data)));
$senha = mysqli_real_escape_string($conexao, md5($_POST['senha']));

$sql = "select count(*) as total from usuarios where email = '$email'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] > 0) {
	$_SESSION['email_existe'] = true;
	header('Location: ../login.php');
	exit;
}

$sql = "INSERT INTO usuarios (nome, email, telefone, dt_nascimento, senha, nivel, data_cadastro) VALUES ('$nome', '$email', '$telefone', '$ndata', '$senha', '0', NOW())";

if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}

$conexao->close();

header('Location: ../login.php');
exit;
