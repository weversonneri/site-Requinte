<?php
include("config/conexao/conexao.php");
if (!isset($_SESSION)) session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/compiler/style.css">
    <link rel="stylesheet" href="node_modules/bootstrap/compiler/login.css">
    <link rel="stylesheet" href="node_modules/bootstrap/compiler/bootstrap.css">
    <link href="node_modules/bootstrap/compiler/datepicker.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">


    <title>Login</title>
</head>

<body>

    <!-- Navbar -->
    <?php if (!isset($_SESSION['UsuarioEmail']))
        include("config/menu.php");
    ?>
    <!-- /Navbar -->
    <div class="login-page">
        <div class="login">
            <div class="form">
                <?php
                if (isset($_SESSION['status_cadastro'])) :
                ?>
                    <div class="is-success">
                        <script>
                            alert("Cadastro efetuado com sucesso!")
                        </script>
                    </div>
                <?php
                endif;
                unset($_SESSION['status_cadastro']);
                ?>
                <?php
                if (isset($_SESSION['email_existe'])) :
                ?>
                    <div class="is-info">
                        <script>
                            alert("Email já cadastrado")
                        </script>
                    </div>
                <?php
                endif;
                unset($_SESSION['email_existe']);
                ?>


                <form class="register-form" action="config/cadastrar.php" method="POST"> <span class="required"></span>
                    <input name="nome" type="text" placeholder="Nome" required="required" /> <span class="required"></span>
                    <input name="email" type="email" placeholder="Email" required="required" /> <span class="required"></span>
                    <input name="telefone" type="text" placeholder="Telefone" data-mask="(00) 00000-0000" required="required" /> <span class="required"></span>
                    <input name="data" type="text" placeholder="Data de Nascimento" id="datapicker" data-mask="00/00/0000" data-language='pt-BR' /> <span class="required"></span>
                    <input name="senha" type="password" placeholder="Senha" required="required" /> <span class="required"></span>
                    <button>Cadastre-se</button>
                    <p class="message">Já possui cadastro? <a href="#">Entrar</a></p>
                </form>
                <?php
                if (isset($_SESSION['nao_autenticado'])) :
                ?>
                    <div class="is-danger">
                        <script>
                            alert("Email ou senha inválido.")
                        </script>
                    </div>
                <?php
                endif;
                unset($_SESSION['nao_autenticado']);
                ?>
                <form class="login-form" action="config/autentica.php" method="POST">
                    <input name="email" type="email" placeholder="Email" required="required" />
                    <input name="senha" type="password" placeholder="Senha" required="required" />
                    <button name="entrar">Entrar</button>
                    <p class="message">Não possui cadastro? <a href="#">Crie uma conta</a></p>
                </form>
            </div>

            </form>
        </div>
    </div>

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

    <!----- Datapicker ----->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/jquery/external/datepicker.js"></script>
    <script src="node_modules/jquery/external/datepicker.min.js"></script>
    <script src="node_modules/jquery/external/i18n/datepicker.pt-BR.js"></script>
    <script>
        $('#datapicker').datepicker();
    </script>

    <!-- Scripts -->
    <script src="node_modules/popper.js/dist/popper.js"></script>
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/jquery/dist/jquery.mask.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script src="node_modules/bootstrap/js/login.js"></script>

</body>

</html>