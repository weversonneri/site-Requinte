<?php
include("config/conexao/conexao.php");
require('config/verificaLogin.php');
nivelAdmin();
$consulta = "SELECT * FROM usuarios where id <> '1' ";
$con      = $conexao->query($consulta) or die($conexao->error);
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
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">

        <a class="navbar-brand" href="index.php">Projeto</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a href="admin.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="config/logout.php"><span class="fas fa-sign-out-alt"></span> Sair </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- /Navbar -->
    <div class="subnavbar">
        <div class="subnavbar-inner">
            <div class="container">
                <ul class="mainnav">
                    <li><a href="admin.php"><span>Agenda</span> </a> </li>
                    <li class="active"><a href="adminUsr.php"><span>Usuarios</span> </a> </li>
                </ul>
            </div>
            <!-- /container -->
        </div>
        <!-- /subnavbar-inner -->
    </div>

    <h3 class="admTitle">Usuarios Cadastrados</h3>

    <div class="container" id="tabela">
        <div class="row">
            <div class="col">
                <table id="cliTable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr class="titulo">
                            <th>id</th>
                            <th>Nivel</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Data de Nascimento</th>
                            <th>Data de cadastro</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($dado = $con->fetch_array()) { ?>
                            <tr>
                                <td><?php echo $dado['id']; ?></td>
                                <td><?php echo $dado['nivel']; ?></td>
                                <td><?php echo $dado['nome']; ?></td>
                                <td><?php echo $dado['email']; ?></td>
                                <td><?php echo $dado['telefone']; ?></td>
                                <td><?php echo date('d/m/Y', strtotime($dado['dt_nascimento'])); ?></td>
                                <td><?php echo date('d/m/Y', strtotime($dado['data_cadastro'])); ?></td>
                                <td>
                                    <a href="" class="btn btn-success" data-toggle="modal" data-target="#editModal" data-id="<?php echo $dado['id']; ?>" data-name="<?php echo $dado['nome']; ?>" data-email="<?php echo $dado['email']; ?>" data-fone="<?php echo $dado['telefone']; ?>" data-dt_nasc="<?php echo date('d/m/Y', strtotime($dado['dt_nascimento'])); ?>" data-nivel="<?php echo $dado['nivel']; ?>"> Editar</a>

                                    <a href="config/crud/deletarUsr.php?id=<?php echo $dado['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir usuário?')" class="btn btn-danger">Excluir</a>
                                </td>
                            <?php } ?>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!------ Edit modal ------->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Editar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="config/crud/editarUsr.php" method="POST">
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Nome: </label>
                            <input name="nome" type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-email" class="control-label">Email: </label>
                            <input name="email" type="email" class="form-control" id="recipient-email">
                        </div>
                        <div class="form-group">
                            <label for="recipient-fone" class="control-label">Telefone: </label>
                            <input data-mask="(00) 00000-0000" name="telefone" type="text" class="form-control" id="recipient-fone">
                        </div>
                        <div class="form-group">
                            <label for="recipient-dt_nasc" class="control-label">Data de nascimento: </label>
                            <input data-mask="00/00/0000" name="dt_nasc" type="text" class="form-control" id="recipient-dt_nasc">
                        </div>
                        <div class="form-group">
                            <label for="recipient-nivel" class="control-label">Nivel: </label>
                            <input name="nivel" type="number" class="form-control" id="recipient-nivel">
                        </div>
                        <input name="id" type="hidden" id="idUsuario">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Alterar</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Scripts -->
    <script src="node_modules/popper.js/dist/popper.js"></script>
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/jquery/dist/jquery.mask.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <!--- Script modal --->
    <script>
        $('#editModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id')
            var recipientnome = button.data('name') // Extract info from data-* attributes
            var recipientemail = button.data('email')
            var recipientfone = button.data('fone')
            var recipientnivel = button.data('nivel')
            var recipientdt_nasc = button.data('dt_nasc')
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('Editar Usuário id: ' + id)
            modal.find('#idUsuario').val(id)
            modal.find('#recipient-name').val(recipientnome)
            modal.find('#recipient-email').val(recipientemail)
            modal.find('#recipient-fone').val(recipientfone)
            modal.find('#recipient-nivel').val(recipientnivel)
            modal.find('#recipient-dt_nasc').val(recipientdt_nasc)
        })
    </script>

    <!---- Data Table ---->

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#cliTable').DataTable({
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