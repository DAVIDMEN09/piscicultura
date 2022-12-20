<?php
session_start();
if (!isset($_SESSION['user'])) {
  echo ' <script> alert("no tiene permisos de acceder"); window.location.href="login.php" </script>';

}

?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>piscicultura</title>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css" />
        <link rel="stylesheet" href="assets/js/jquery-ui/jquery-ui.min.css" />
        <link rel="stylesheet" href="assets/css/style.css" />
        <link rel="stylesheet" href="assets/css/demo.css">
	      <link rel="stylesheet" href="assets/css/footer-distributed.css">
				<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">        
	</head>
    <body>
    <div class="nav-bg">
       <nav class="navegador-principal contenedor ">
        <a class="nav-link" href="?c=comsumidor">Comsumidores</a>
        <a class="nav-link" href="?c=empleado">Empleado</a>
        <a class="nav-link" href="?c=alimento">Alimento</a>
        <a class="nav-link" href="?c=pez">Pez</a>
        <a class="nav-link" href="?c=proveedor">proveedores</a>
        <a class="nav-link" href="?c=estanque">Estanque</a>
        <a class="nav-link" href="exit.php">salir</a>
      </nav>
    </div>

    <div class="container">
