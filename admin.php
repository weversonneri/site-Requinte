<?php
include("config/conexao/conexao.php");
require('config/verificaLogin.php');
nivelAdmin();
$sql = "SELECT ag.id, ag.nome, ag.telefone, ag.data_agenda, ag.horario, ca.categoria, se.servico FROM agendamentos ag 
JOIN categorias ca ON ag.id_categoria = ca.id
JOIN servicos se ON ag.id_servico = se.id ORDER BY horario";
$sql_query = $conexao->query($sql) or die($conexao->error);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Painel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/compiler/style.css">
    <link rel="stylesheet" href="node_modules/bootstrap/compiler/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>

<body>
    <!-- Navbar -->
    <?php include("config/menuAdm.php"); ?>
    <!-- /Navbar -->
    <div class="subnavbar">
        <div class="subnavbar-inner">
            <div class="container">
                <ul class="mainnav">
                    <li class="active"><a href="admin.php"><span>Agenda</span> </a> </li>
                    <li><a href="adminUsr.php"><span>Usuarios</span> </a> </li>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <h3 class="admTitle">Agendamentos</h3>

    <div class="container" id="tabela">
        <div class="row">
            <div class="col">
                <table id="agTable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Telefone</th>
                            <th>Data</th>
                            <th>Horario</th>
                            <th>Categoria</th>
                            <th>Serviço</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($dado = $sql_query->fetch_array()) { ?>
                            <tr>
                                <td><?php echo $dado['id']; ?></td>
                                <td><?php echo $dado['nome']; ?></td>
                                <td><?php echo $dado['telefone']; ?></td>
                                <td><?php echo date('d/m/Y', strtotime($dado['data_agenda'])); ?></td>
                                <td><?php echo $dado['horario']; ?></td>
                                <td><?php echo $dado['categoria']; ?></td>
                                <td><?php echo $dado['servico']; ?></td>
                                <td>
                                    <a href="config/crud/deletarAg.php?id=<?php echo $dado['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')" class="btn btn-danger">Excluir</a>
                                </td>

                            <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="node_modules/popper.js/dist/popper.js"></script>
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>

    <!---- Data Table ---->

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

    <!--- Script Data Table --->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#agTable').DataTable({
                order: [
                    [3, "asc"]
                ],
                "language": {
                    "lengthMenu": "_MENU_ Quantidade por página ",
                    "zeroRecords": "Nenhum registro encontrado",
                    "info": "Página _PAGE_ de _PAGES_",
                    "infoEmpty": "Nenhum registro disponível",
                    "infoFiltered": "(filtrado de _MAX_ registros)"
                }
            });
        });
    </script>
    <!---- /Data Table ---->
</body>

</html>