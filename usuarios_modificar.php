<?PHP
session_start();
?>
<HTML LANG="es">
<HEAD>
   <link rel="stylesheet" href="style.css">
</HEAD>

<BODY>

   <H1>Modificar usuario</H1>
   <div class="form">
   <form action ='usuarios_modificar1.php' method="post">
      <label for="nombre">Nombre:</label>
      <input type="text" name="nombre" ><br>

      <label for="password">contraseña:</label>
      <input type="password" name="password" ><br>

      <label for="apellido">Apellido:</label>
      <input type="text" name="apellido" ><br>

      <label for="DNI">DNI:</label>
      <input type="text" name="DNI" ><br>

      <label for="saldo">Saldo:</label>
      <input type="number" name="saldo"><br>

      <input type="submit" value="modificar">
   </form>
   </div>
</BODY>
</HTML>
 