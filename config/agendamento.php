<?php
session_start();
include("conexao/conexao.php");

$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);
$data = mysqli_real_escape_string($conexao, $_POST['data']);
$ndata = implode("-",array_reverse(explode("/",$data)));
$horario = mysqli_real_escape_string($conexao, $_POST['horario']);
$categoria = mysqli_real_escape_string($conexao, $_POST['categoria']);
$servico = mysqli_real_escape_string($conexao, $_POST['servico']);

$sql = "select count(*) as total from agendamentos where data_agenda = '$ndata' and horario = '$horario' and id_servico = '$servico'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] > 0) {
	$_SESSION['erro_agendamento'] = true;
	header('Location: ../user.php');
	exit;
}

$sql = "INSERT INTO agendamentos (nome, telefone, data_agenda, horario, id_categoria, id_servico) VALUES ('$nome', '$telefone', '$ndata', '$horario', $categoria, '$servico')";

if($conexao->query($sql) === TRUE) {
	$_SESSION['ok_agendamento'] = true;
}
$conexao->close();

header('Location: ../user.php');
exit;
