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
         $id_com = $_SESSION['id'];

		 

   // Enviar consulta
      $instruccion = "select * from coches where id_coche='$id'";
      $consulta = mysqli_query ($conexion,$instruccion)
         or die ("Fallo en la consulta 1");
      $resultado = mysqli_fetch_array ($consulta);
      $precio = $resultado['precio'];
      $dueno = $resultado['id_dueno'];

      $instruccion2 = "select * from usuarios where id_usuario='$id_com'";
      $consulta2 = mysqli_query ($conexion,$instruccion2)
         or die ("Fallo en la consulta 2");
      $resultado2 = mysqli_fetch_array ($consulta2);
      $saldo = $resultado2['saldo'];
      

      if ($saldo >= $precio) {
         $nuevo_saldo = $saldo-$precio;
         $instruccion3 = "UPDATE usuarios SET saldo = '$nuevo_saldo' WHERE id_usuario = '$id_com'";
         $consulta3 = mysqli_query ($conexion,$instruccion3)
            or die ("Fallo en la consulta 3");
         
         $instruccion4 = "select * from usuarios where id_usuario='$dueno'";
         $consulta4 = mysqli_query ($conexion,$instruccion4)
            or die ("Fallo en la consulta 4");
         $resultado4 = mysqli_fetch_array ($consulta4);
         $saldo2 = $resultado4['saldo'];

         $nuevo_saldo2 = $saldo2+$precio;
         $instruccion5 = "UPDATE usuarios SET saldo = '$nuevo_saldo2' WHERE id_usuario = '$dueno'";
         $consulta5 = mysqli_query ($conexion,$instruccion5)
            or die ("Fallo en la consulta 5");

         $instruccion6 = "UPDATE coches SET alquilado = '1' WHERE id_coche = '$id'";
         $consulta6 = mysqli_query ($conexion,$instruccion6)
            or die ("Fallo en la consulta 6");

         $instruccion7 = "INSERT INTO alquileres (id_usuario, id_coche, prestado) VALUES ('$id_com', '$id', now())";
         $consulta7 = mysqli_query ($conexion,$instruccion7)
            or die ("Fallo en la consulta 7");
         header('location: coches_listar.php');
      }
      else { 
         print("No dispone de suficiente saldo");
      }
// Cerrar 
mysqli_close ($conexion);

?>
</BODY>
</HTML>
