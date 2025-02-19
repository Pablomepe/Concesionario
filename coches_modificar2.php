<?PHP
session_start();
?>
<HTML LANG="es">
<HEAD>
<link rel="stylesheet" href="style.css">
</HEAD>

<BODY>

<H1>Modificación del coche</H1>

<?PHP

$conexion = mysqli_connect ("localhost", "root", "rootroot","concesionario")
or die ("No se puede conectar con el servidor");

$id = $_REQUEST['id'];


// Enviar consulta
$instruccion = "select * from coches where id_coche = $id;";
$consulta = mysqli_query ($conexion,$instruccion);


if (mysqli_num_rows ($consulta) == 1 ){
   $row = mysqli_fetch_assoc ($consulta);
?>
<div class="form">
<form action="coches_modificar3.php" method="post">
        
      <input type="text" name="id" value="<?php echo $id; ?>" readonly><br>
        <label for="modelo">Modelo:</label>
      <input type="text" name="modelo" value="<?php echo $row['modelo']; ?>"><br>

      <label for="marca">Marca:</label>
      <input type="text" name="marca" value="<?php echo $row['marca']; ?>"><br>

      <label for="color">Color:</label>
      <input type="text" name="color" value="<?php echo $row['color']; ?>"><br>

      <label for="precio">Precio:</label>
      <input type="number" name="precio" value="<?php echo $row['precio']; ?>"><br>

      <label for="alquilado">Alquilado:</label>
      <select name="alquilado">
         <option value="1" <?php if ($row['alquilado'] == '1') echo 'selected'; ?>>si</option>
         <option value="0" <?php if ($row['alquilado'] == '0') echo 'selected'; ?>>No</option>
      </select><br>
        
        <input type="submit" value="Actualizar">
    </form>
</div>
</body>
</html>

<?php
} else {
    echo "No se encontró el coche.";
}

// Cerrar la conexión
mysqli_close($conn);
?>