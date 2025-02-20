<?PHP
session_start();
?>
<HTML LANG="es">
<HEAD>
<link rel="stylesheet" href="style.css">
<?php include 'header.php'; ?>
</HEAD>

<BODY>

<H1>Lista de coches</H1>

<?PHP

   // Conectar con el servidor de base de datos
      $conexion = mysqli_connect ("localhost", "root", "rootroot", "concesionario")
         or die ("No se puede conectar con el servidor");

         $id = $_REQUEST['id'];

         $instruccion6 = "UPDATE alquileres SET devuelto = now() WHERE id_coche = '$id'";
         $consulta6 = mysqli_query ($conexion,$instruccion6)
            or die ("Fallo en la consulta 6");
         $instruccion7 = "UPDATE coches SET alquilado = '0' WHERE id_coche = '$id'";
         $consulta7 = mysqli_query ($conexion,$instruccion7)
            or die ("Fallo en la consulta 7");
         header('location: coches_listar.php');
// Cerrar 
mysqli_close ($conexion);

?>
</BODY>
</HTML>
