<?PHP
session_start();
?>
<HTML LANG="es">
   <HEAD>
      <link rel="stylesheet" href="style.css">
      <?php include 'header.php'; ?>
   </HEAD>
   
   <BODY>
   
      <H1>Que desea hacer con los coches</H1>
   
      <div class="form">
      <form action ='index.php' method="post">
         <input type="submit" value="inicio">
      </form>
      <form action ='coches_anadir.php' method="post">
         <input type="submit" value="anadir">
      </form>
      <form action ='coches_listar.php' method="post">
         <input type="submit" value="listar">
      </form>
      <form action ='coches_buscar.php' method="post">
         <input type="submit" value="buscar">
      </form>
      <form action ='coches_modificar.php' method="post">
         <input type="submit" value="modificar">
      </form>
      <form action ='coches_borrar.php' method="post">
         <input type="submit" value="borrar">
      </form>
      </div>
   </BODY>
   </HTML>
    