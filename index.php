<?PHP
session_start();
?>
<HTML LANG="es">
<HEAD>
   <link rel="stylesheet" href="style.css">
</HEAD>

<BODY>

   <H1>Que desea hacer</H1>
   <div class="form">
   <form action ='coches.php' method="post">
      <input type="submit" value="Coches">
   </form>
   <form action ='usuarios.php' method="post">
      <input type="submit" value="usuarios">
   </form>
   <form action ='alquileres.php' method="post">
      <input type="submit" value="alquileres">
   </form>
   </div>
</BODY>
</HTML>
 