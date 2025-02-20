<?PHP
session_start();
?>
<HTML LANG="es">
<HEAD>
<link rel="stylesheet" href="style.css">
<?php include 'header.php'; ?>
</HEAD>

<BODY>

<H1>Lista de alquileres</H1>

<?PHP

   // Conectar con el servidor de base de datos
      $conexion = mysqli_connect ("localhost", "root", "rootroot", "concesionario")
         or die ("No se puede conectar con el servidor");
		 

   // Enviar consulta
      $instruccion = "select * from Alquileres";
      $consulta = mysqli_query ($conexion,$instruccion)
         or die ("Fallo en la consulta");
   // Mostrar resultados de la consulta
      $nfilas = mysqli_num_rows ($consulta);
      if ($nfilas > 0)
      {
         print ("<TABLE>\n");
         print ("<TR>\n");
         print ("<TH>id_alquiler</TH>\n");
         print ("<TH>id_usuario</TH>\n");
         print ("<TH>id_coche</TH>\n");
         print ("<TH>prestado</TH>\n");
         print ("<TH>devuelto</TH>\n");
         print ("</TR>\n");

         for ($i=0; $i<$nfilas; $i++)
         {
            $resultado = mysqli_fetch_array ($consulta);
            print ("<TR>\n");
            print ("<TD>" . $resultado['id_alquiler'] . "</TD>\n");
            print ("<TD>" . $resultado['id_usuario'] . "</TD>\n");
            print ("<TD>" . $resultado['id_coche'] . "</TD>\n");
            print ("<TD>" . $resultado['prestado'] . "</TD>\n");
            print ("<TD>" . $resultado['devuelto'] . "</TD>\n");
            
            print ("</TR>\n");
         }

         print ("</TABLE>\n");
      }
      else
         print ("No hay alquileres disponibles");

// Cerrar 
mysqli_close ($conexion);

?>
<br>
      <form action ='index.php' method="post">
         <input type="submit" value="inicio">
      </form>

</BODY>
</HTML>
