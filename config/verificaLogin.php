<?php
session_start();
if (!isset($_SESSION['UsuarioEmail'])) {
  header('Location: login.php');
  exit();
}

function nivelAdmin()
{
  if (!isset($_SESSION)) session_start();

  // Verifica se não há a variável da sessão que identifica o usuário
  if ($_SESSION['UsuarioNivel'] != 1) {
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: login.php");
    exit();
  }
}


function nivelUser()
{
  if (!isset($_SESSION)) session_start();

  // Verifica se não há a variável da sessão que identifica o usuário
  if ($_SESSION['UsuarioNivel'] != 0) {
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: login.php");
    exit();
  }
}
