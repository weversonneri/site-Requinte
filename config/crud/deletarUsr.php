<?php
include('../conexao/conexao.php');

$id_usuario = intval($_GET['id']);

$sql = "DELETE FROM usuarios WHERE id = '$id_usuario' AND id <> '1' ";
$sql_query = $conexao->query($sql) or die($conexao->error);

if (mysqli_affected_rows($conexao) > 0)
    echo "<script> alert('Usuario deletado com sucesso!'); location.href='../../adminUsr.php?=adminUsr'; </script>";
else
    echo "<script> alert('ERRO!'); location.href='../../adminUsr.php?=adminUsr'; </script>";
