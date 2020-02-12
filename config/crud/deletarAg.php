<?php
include('../conexao/conexao.php');

$id_agenda = intval($_GET['id']);

$sql = "DELETE FROM agendamentos WHERE id = '$id_agenda' ";
$sql_query = $conexao->query($sql) or die($conexao->error);

if (mysqli_affected_rows($conexao) > 0)
    echo "<script> alert('Agendamento deletado com sucesso!'); location.href='../../admin.php?=admin'; </script>";
else
    echo "<script> alert('ERRO!'); location.href='../../admin.php?=admin'; </script>";
