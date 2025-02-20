<?PHP
session_start();
?>
<HTML LANG="es">
<HEAD>
   <link rel="stylesheet" href="style.css">
   <?php include 'header.php'; ?>
</HEAD>

<BODY>

   <H1 >Insertar usuario</H1>
   <div class="form">
   <form action ='usuarios_iniciar2.php' method="post">
      <label for="email">Email:</label>
      <input type="text" name="email" required><br>

      <label for="password">contraseña:</label>
      <input type="password" name="password" required><br>

      <input type="submit" value="insertar">
   </form>
   </div>
</BODY>
</HTML>
 