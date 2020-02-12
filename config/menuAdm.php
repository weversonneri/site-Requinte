<?php
if (!isset($_SESSION)) session_start();
?>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">

    <a class="navbar-brand" href="index.php"><img class="logo" src="images/logo1.png"></a>


    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a href="admin.php">Dashboard</a>
            </li>
        </ul>
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