<?PHP
session_start();
?>
<HTML LANG="es">
<HEAD>
   <link rel="stylesheet" href="style.css">
</HEAD>

<BODY>

   <H1>Insertar usuario</H1>
   <div class="form">
   <form action ='usuarios_anadir2.php' method="post">
      <label for="nombre">Nombre:</label>
      <input type="text" name="nombre" required><br>

      <label for="password">contraseña:</label>
      <input type="password" name="password" required><br>

      <label for="apellido">Apellido:</label>
      <input type="text" name="apellido" required><br>

      <label for="DNI">DNI:</label>
      <input type="text" name="DNI" required><br>

      <label for="saldo">Saldo:</label>
      <input type="number" name="saldo"><br>

      <label for="tipo">Tipo:</label>
      <select name="tipo">
         <option value="com">Comprador</option>
         <option value="ven">Vendedor</option>
      </select><br>

      <input type="submit" value="insertar">
   </form>
   </div>
</BODY>
</HTML>
 