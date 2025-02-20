<?PHP
session_start();

?>
<HTML LANG="es">
<HEAD>
   <link rel="stylesheet" href="style.css">
   <?php include 'header.php'; ?>
</HEAD>

<BODY>

   <H1>Insertar coche</H1>
   <div class="form">
   <form action ='coches_anadir2.php' method="post" enctype="multipart/form-data">
      <label for="modelo">Modelo:</label>
      <input type="text" name="modelo" required><br>

      <label for="marca">Marca:</label>
      <input type="text" name="marca" required><br>

      <label for="color">Color:</label>
      <input type="text" name="color" required><br>

      <label for="precio">Precio:</label>
      <input type="number" name="precio" required><br>

      <label for="imagen">Imagen:</label>
      <input type="file" name="image" accept="image/*"><br><br>

      <input type="submit" value="insertar">
   </form>
   </div>
</BODY>
</HTML>
 