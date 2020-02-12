<?php
if (!isset($_SESSION)) session_start();
?>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">

    <a class="navbar-brand" href="index.php">Projeto</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item ">
                <a href="admin.php" >Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="config/logout.php"><span class="fas fa-sign-out-alt"></span> Sair </a>
            </li>
        </ul>
    </div>
</nav>