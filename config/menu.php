<?php
if (!isset($_SESSION)) session_start();
?>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<nav class="navbar navbar-expand-md bg-dark navbar-dark">

    <a class="navbar-brand" href="index.php"><img class="logo" src="images/logo1.png"></a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
      <ul class="navbar-nav" style="margin-right:22px;">
        <li class="nav-item">
          <a href="index.php">Home</a>
        </li>

        <li class="nav-item">
          <a href="user.php">Agendamento</a>
        </li>
      </ul>
      <ul class="navbar-nav" style="font-size:14px;">
        <li class="nav-item">
          <a href="login.php"> Login <span class="fas fa-sign-in-alt"></span></a>
        </li>
      </ul>
    </div>

  </nav>