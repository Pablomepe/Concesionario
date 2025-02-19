<?PHP
session_start();
?>
<HTML LANG="es">
   <HEAD>
      <link rel="stylesheet" href="style.css">
   </HEAD>
   
   <BODY>
   
      <H1>Que desea hacer con los alquileres</H1>
      <div class="form">
      <form action ='index.php' method="post">
         <input type="submit" value="inicio">
      </form>
      <form action ='alquileres_listar.php' method="post">
         <input type="submit" value="listar">
      </form>
      <form action ='alquileres_borrar.php' method="post">
         <input type="submit" value="borrar">
      </form>
      </div>
   </BODY>
   </HTML>
    