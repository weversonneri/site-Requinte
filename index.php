<?php
if (!isset($_SESSION)) session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/compiler/style.css">
    <link rel="stylesheet" href="node_modules/bootstrap/compiler/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <link href='https://fonts.googleapis.com/css?family=Cinzel Decorative' rel='stylesheet'>
    <title>Index</title>
</head>

<body>
    <!-- Navbar -->
    <?php if (!isset($_SESSION['UsuarioEmail']))
        include("config/menu.php");
    ?>
    <?php if (isset($_SESSION['UsuarioEmail'])) : ?>
        <?php if ($_SESSION['UsuarioNivel'] == 0) {
            include("config/menuUsr.php");
        } elseif ($_SESSION['UsuarioNivel'] == 1) {
            include("config/menuAdm.php");
        }
        ?>
    <?php endif; ?>
    <!-- /Navbar -->

    <div class="container-fluid" id="banner-index">
        <div class="titulo-index">
            <h1>Requinte</h1>
            <h2>SALÃO DE BELEZA E ESTÉTICA</h2>
            <a href="http://localhost/requinte/config/agendamento.php">RESERVE UM HORÁRIO</a>
        </div>
        <div class="row">
            <div class="col-sm info">
                <hr class="bar01">
                <h3>ENDEREÇO</h3>
                <h4>Brasília – DF</h4>
            </div>
            <div class="col-sm info">
                <hr class="bar01">
                <h3>TELEFONE</h3>
                <h4>(61) 9 8574-6779</h4>
            </div>
            <div class="col-sm info">
                <hr class="bar01">
                <h3>Horário</h3>
                <h4>Seg – Sab : 9:00 – 19:00</h4>
            </div>
        </div>

    </div>

    <div class="container-fluid" id="salon">
        <div class="row">
            <div class="col-sm salon-info">
                <h3>CONHEÇA O SALÃO</h3>
                <hr class="bar02">
                <p>
                    Oferecemos um ambiente exclusivo ao público, com local diferenciado e confortável e um atendimento personalizado, com o propósito de oferecer a melhor experiência para o cliente.
                </p>
                <a href="http://localhost/requinte/config/agendamento.php">VENHA CONHECER</a>
            </div>
            <div class="col-sm salon-info">
                <img src="images/salon.jpg">
            </div>
        </div>
    </div>

    <div class="container-fluid" id="services">
        <h3>SERVIÇOS</h3>
        <hr class="bar02">

    </div>

    <!------- Alguns Trabalhos --------->
    <div class="container-fluid trabalhos">
        <div class="container">

            <h3 class="font-weight-light text-lg-left">ALGUNS TRABALHOS</h3>

            <hr class="mt-2 mb-5">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="images/pic06.jpeg" class="fancybox" rel="ligthbox">
                        <img src="images/pic06.jpeg" class="zoom img-fluid " alt="">
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="images/pic07.jpeg" class="fancybox" rel="ligthbox">
                        <img src="images/pic07.jpeg" class="zoom img-fluid " alt="">
                    </a>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="images/pic03.jpeg" class="fancybox" rel="ligthbox">
                        <img src="images/pic03.jpeg" class="zoom img-fluid " alt="">
                    </a>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="images/pic02.jpeg" class="fancybox" rel="ligthbox">
                        <img src="images/pic02.jpeg" class="zoom img-fluid " alt="">
                    </a>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="images/pic01.jpg" class="fancybox" rel="ligthbox">
                        <img src="images/pic01.jpg" class="zoom img-fluid " alt="">
                    </a>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="images/pic16.jpeg" class="fancybox" rel="ligthbox">
                        <img src="images/pic16.jpeg" class="zoom img-fluid " alt="">
                    </a>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="images/pic17.jpeg" class="fancybox" rel="ligthbox">
                        <img src="images/pic17.jpeg" class="zoom img-fluid " alt="">
                    </a>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="images/pic18.jpeg" class="fancybox" rel="ligthbox">
                        <img src="images/pic18.jpeg" class="zoom img-fluid " alt="">
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="images/pic19.jpeg" class="fancybox" rel="ligthbox">
                        <img src="images/pic19.jpeg" class="zoom img-fluid " alt="">
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="images/pic20.jpeg" class="fancybox" rel="ligthbox">
                        <img src="images/pic20.jpeg" class="zoom img-fluid " alt="">
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="images/pic21.jpeg" class="fancybox" rel="ligthbox">
                        <img src="images/pic21.jpeg" class="zoom img-fluid " alt="">
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="images/pic22.jpeg" class="fancybox" rel="ligthbox">
                        <img src="images/pic22.jpeg" class="zoom img-fluid " alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->

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
                    <div class="col">
                        <div class="span12">
                            &copy; 2019 <a href="#">Weverson Neri - 201720187</a>.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="node_modules/popper.js/dist/popper.js"></script>
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });

            $(".zoom").hover(function() {

                $(this).addClass('transition');
            }, function() {

                $(this).removeClass('transition');
            });
        });
    </script>

</body>

</html>