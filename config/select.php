<?php
include("conexao/conexao.php");

$sql = "SELECT * FROM servicos WHERE id_categoria='".$_POST['categoriaID']."' ORDER BY servico";
$sql_query = $conexao->query($sql) or die($conexao->error);
$output .= '<option value="" disabled selected> </option>';

while ($dado = $sql_query->fetch_array()) { 
    $output .= '<option value="'.$dado['id']. '">'.$dado['servico']. ' </option>';
}
echo $output;
