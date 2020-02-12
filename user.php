<?php
include("config/conexao/conexao.php");
require('config/verificaLogin.php');
nivelUser();
$sql = "SELECT * FROM categorias ORDER BY categoria";
$sql_query = $conexao->query($sql) or die($conexao->error);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Agendamento</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/compiler/style.css">
    <link rel="stylesheet" href="node_modules/bootstrap/compiler/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link href="node_modules/bootstrap/compiler/timepicki.css" rel="stylesheet">
    <link href="node_modules/bootstrap/compiler/datepicker.css" rel="stylesheet">

</head>

<body>
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-start" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="user.php">Agendamento</a>
                    </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-user-circle"></i> <?php echo $_SESSION['UsuarioNome'] ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="#"><span class="far fa-address-card"></span>Perfil</a></li>
                            <li><a href="config/logout.php"><span class="fas fa-sign-out-alt"></span> Sair </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /Navbar -->
    </header>

    <div class="titulo">
        <h3> AGENDE O SEU HORÁRIO </h3>
        <h6> Escolha o dia, horário, serviço e profissional </h6>
    </div>
    <?php
    if (isset($_SESSION['ok_agendamento'])) :
        ?>
        <div class="is-success">
            <script>
                alert("Agendamento efetuado com sucesso!")
            </script>
        </div>
    <?php
    endif;
    unset($_SESSION['ok_agendamento']);
    ?>
    <?php
    if (isset($_SESSION['erro_agendamento'])) :
        ?>
        <div class="is-info">
            <script>
                alert("Esse serviço não possui vaga no horário escolhido.")
            </script>
        </div>
    <?php
    endif;
    unset($_SESSION['erro_agendamento']);
    ?>

    <form class="services" action="config/agendamento.php" method="POST">
        <div class="container">
            <div class="row">
                <div class="form-group col">
                    <label for="inputEmail4">Nome</label>
                    <input type="text" name="nome" class="form-control" value="<?php echo $_SESSION['UsuarioNome'] ?>" required="required"><span class="required"></span>
                </div>
                <div class="form-group col">
                    <label for="inputPassword4">telefone</label>
                    <input type="text" name="telefone" class="form-control" required="required" data-mask="(00) 00000-0000"><span class="required"></span>
                </div>
            </div>

            <div class="row">
                <div class="form-group col">
                    <label for="inputEmail4">Data</label>
                    <input id="datapicker" type="text" name="data" class="form-control" required="required" data-language='pt-BR' data-mask="00/00/0000"><span class="required"></span>
                </div>
                <div class="form-group col">
                    <label for="inputPassword4">Horario</label>
                    <input id="timepicker" type="text" name="horario" class="form-control" required="required"><span class="required"></span>
                </div>
            </div>

            <div class="row">

                <div class="form-group col-6">
                    <label for="inputCategoria">Categoria</label>
                    <select class="form-control" id="categoria" name="categoria">
                        <option value="" disabled selected></option>
                        <?php while ($dado = $sql_query->fetch_array()) { ?>
                            <option value="<?php echo $dado['id']; ?>"><?php echo $dado['categoria']; ?></option>

                        <?php } ?>
                    </select>
                </div>

                <div class="form-group col-6">
                    <label for="inputEmail4">Serviço</label>
                    <select class="form-control" id="servico" name="servico">
                        <option value="" disabled selected> escolha a categoria de serviço </option>

                    </select>
                </div>

            </div>
            <button name="agendar" class="btn btn-success">Agendar</button>
        </div>
    </form>

    <!-- Top-bar -->
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="social">
                        <ul class="social-share">
                            <li><a href="https://pt-br.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></i></a></li>
                            <li><a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></i></a></li>
                            <li><a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!------- Footer -------->
    <div class="footer">
        <div class="footer-inner">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        &copy; 2019 <a href="#">Weverson Neri - 201720187</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!----- Timepicker ----->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/jquery/external/timepicki.js"></script>
    <script>
        $('#timepicker').timepicki({
            format: "24h",
            interval: 20,
            startHour: 9,

        });
    </script>
    <!----- Datapicker ----->
    <script src="node_modules/jquery/external/datepicker.js"></script>
    <script src="node_modules/jquery/external/datepicker.min.js"></script>
    <script src="node_modules/jquery/external/i18n/datepicker.pt-BR.js"></script>
    <script>
        $('#datapicker').datepicker({
            minDate: new Date()
        });
    </script>
    <!-- Scripts -->
    <script src="node_modules/popper.js/dist/popper.js"></script>
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/jquery/dist/jquery.mask.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <!---- Dependent drop down menu --->
    <script type="text/javascript">
        $(document).ready(function() {
            $("#categoria").change(function() {
                var id_categoria = $(this).val();
                $.ajax({
                    url: "config/select.php",
                    method: "POST",
                    data: {
                        categoriaID: id_categoria
                    },
                    success: function(data) {
                        $("#servico").html(data)
                    }
                })
            })
        });
    </script>

</body>

</html>