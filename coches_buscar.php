<?PHP
session_start();
?>
<HTML LANG="es">
<HEAD>
   <link rel="stylesheet" href="style.css">
</HEAD>

<BODY>

   <H1>Buscar coche</H1>
   <div class="form">
   <form action ='coches_buscar2.php' method="post">
      <label for="modelo">Modelo:</label>
      <input type="text" name="modelo" ><br>

      <label for="marca">Marca:</label>
      <input type="text" name="marca" ><br>

      <label for="color">Color:</label>
      <input type="text" name="color" ><br>

      <label for="precio">Precio:</label>
      <input type="number" name="precio" ><br>

      <label for="alquilado">Alquilado:</label>
      <select name="alquilado">
         <option value="3">seleccione algo</option>
         <option value="1">si</option>
         <option value="0">No</option>
      </select><br>

      <input type="submit" value="insertar">
   </form>
   </div>
</BODY>
</HTML>
 