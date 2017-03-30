<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <link href="<?php echo base_url('css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!--google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500" rel="stylesheet">

    <!-- font icon -->
    <link href="<?php echo base_url('css/font-awesome.min.css'); ?>" rel="stylesheet" /> 
    <!--Mis estilos-->
    <link href="<?php echo base_url().'css/login.css'; ?>" rel="stylesheet">

	<title>SHC-2</title>
</head>
  
  <style>
    *{
      font-family: 'Poppins', sans-serif;
    }
    
  </style>

<body>
  
<header style="margin-bottom: 20px;">
  <!-- Navegador -->
  <nav class="navbar  navbar-fixed-top navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">SHC</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li class="nav-item <?php echo $login; ?>">
              <a class="nav-link" href="<?php echo site_url('login'); ?>">Iniciar sesión</a>
          </li>
          <li class="nav-item <?php echo $signin; ?>">
              <a class="nav-link" href="<?php echo site_url('signin'); ?>">Registrarse</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>

  <div class="container-fluid">
    <div class="row">
  


	

          

          

          

	