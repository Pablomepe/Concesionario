
<?PHP
session_start();
if ($_SESSION['tipo']!=1 ){
   header('location: usuarios_sin_permisos.php');
}
else{
?>
<HTML LANG="es">
<HEAD>
   <link rel="stylesheet" href="style.css">
   <?php include 'header.php'; ?>
</HEAD>

<BODY>

   <H1>Eliminar alquiler</H1>
   <div class="form">
   <form action ='alquileres_borrar1.php' method="post">

      <label for="id_usuario">Id_usuario:</label>
      <input type="number" name="id_usuario" ><br>

      <label for="id_coche">Id_coche:</label>
      <input type="number" name="id_coche" ><br>

      <label for="prestado">prestado:</label>
      <input type="datetime-local" name="prestado" ><br>

      <label for="devuelto">Devuelto:</label>
      <input type="datetime-local" name="devuelto" ><br>

      <input type="submit" value="buscar">
   </form>
   </div>
</BODY>
</HTML>
<?php
}
?>