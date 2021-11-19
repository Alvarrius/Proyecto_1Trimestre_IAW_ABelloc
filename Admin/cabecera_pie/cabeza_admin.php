<?php 
session_start();
  if(!isset($_SESSION['usuario'])){
    header("Location:/Proyecto_Trimestre_ABelloc/Paginas/login.php");
  }else{
    if($_SESSION['usuario']=="ok"){
      $nombreUsuario=$_SESSION["nombreUsuario"];
    }
  }
?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Alvarrius7">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Portal Admin</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/pricing/">

    

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Favicons -->
    <link rel="icon" type="image/png" href="/Proyecto_Trimestre_ABelloc/Imagenes/logos/wolf.png">



    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    
  </head>
  <body>
    
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check" viewBox="0 0 16 16">
    <title>Check</title>
    <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
  </symbol>
</svg>

<div class="container py-3">
  <header>
    

    <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
      <a href="/Proyecto_Trimestre_ABelloc/Admin/inicio_admin.php" class="d-flex align-items-center text-dark text-decoration-none">
        <img src='/Proyecto_Trimestre_ABelloc/Imagenes/logos/wolf.gif' width="80" height="auto" alt='Cpus'/> 
        <span class="fs-4">CPUs Alvarrius <b><i>(ADMIN MODE)</b></i></span><br>
      </a>

      <?php $url="http://".$_SERVER['HTTP_HOST']."/Proyecto_Trimestre_ABelloc/Admin" ?> 

      <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
        <a class="me-3 py-2 text-dark text-decoration-none" href="<?php echo $url;?>/inicio_admin.php">Inicio <b><i>(ADMIN)</b></i></a>
        <a class="me-3 py-2 text-dark text-decoration-none" href="<?php echo $url;?>/seccion/productos.php">Productos <b><i>(ADMIN)</b></i></a>
        <a class="me-3 py-2 text-dark text-decoration-none" href="<?php echo $url;?>/seccion/pedidos.php">Pedidos <b><i>(ADMIN)</b></i></a>
        <a class="me-3 py-2 text-dark text-decoration-none" href="<?php echo $url;?>/seccion/cerrar.php">Cerrar Sesión</a> 
      </nav>
    </div>
  </header>

  <div class="container-fluid">
        <div class="row">