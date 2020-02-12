<?php
include("../conexao/conexao.php");

$id = mysqli_real_escape_string($conexao, $_POST['id']);
$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$email = mysqli_real_escape_string($conexao, $_POST['email']);
$telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);
$nivel = mysqli_real_escape_string($conexao, $_POST['nivel']);
$data = mysqli_real_escape_string($conexao, $_POST['dt_nasc']);
$ndata = implode("-",array_reverse(explode("/",$data)));
//$senha = mysqli_real_escape_string($conexao, md5($_POST['senha']));

$sql = "UPDATE usuarios SET nome='$nome', email='$email', telefone = '$telefone', dt_nascimento = '$ndata', nivel = '$nivel' WHERE id = '$id' ";
$sql_query = $conexao->query($sql) or die($conexao->error);


if (mysqli_affected_rows($conexao) != 0) {
    echo "
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../adminUsr.php'>
        <script> alert('Cadastro editado com Sucesso.'); </script>";
} else {
    echo "
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../adminUsr.php'>
        <script> alert('Erro ao editar cadastro.'); </script>";
} ?>

<?php $conexao->close(); ?>