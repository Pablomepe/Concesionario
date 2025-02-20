<?PHP
session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Concesionario</title>
  <link rel="icon" type="image/x-icon" href="./img/favicon.ico">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   <header class="p-3 text-bg-dark">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="index.php" class="nav-link px-2 text-secondary">Home</a></li>
          <li><a href="coches.php" class="nav-link px-2 text-white">Coches</a></li>
          <?php  
            if ($_SESSION['tipo']==1){
          ?>
          <li><a href="usuarios.php" class="nav-link px-2 text-white">Usuarios</a></li>
          <li><a href="alquileres.php" class="nav-link px-2 text-white">alquileres</a></li>
          <?php
            }
          ?>
        </ul>

        <div class="text-end">

        <?php

          if (isset($_SESSION["nombre"])){
            print('<div class="dropdown text-end">
            
          <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="./img/persona.png" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          
          <ul class="dropdown-menu text-small">
            <li><a class="dropdown-item" href="#">Hi, '.$_SESSION["nombre"].'</a></li>
            <li><a class="dropdown-item" href="usuarios_modificar2_1.php">Settings</a></li>
            <li><a class="dropdown-item" href="usuarios_perfil.php">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="usuarios_cerrar.php">Sign out</a></li>
          </ul>
        </div>');
          }
        else{
          print ('<a href="usuarios_iniciar.php"> <button type="button" class="btn btn-outline-light me-2">Login</button></a>
          <a href="usuarios_anadir.php"><button type="button" class="btn btn-warning">Sign-up</button></a>');
        }
          ?>
         
         
        </div>
      </div>
    </div>
  </header>
  <style>
    h1 {
      text-align: center;  
    }
    input {
        margin: 5px;;
    }
  </style>
  </head>
<body>
    
</body>
</html>