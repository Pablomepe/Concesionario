<?PHP
session_start();
?>
<HTML LANG="es">
<HEAD>
<link rel="stylesheet" href="style.css">
</HEAD>

<BODY>

<H1>Lista de coches</H1>

<?PHP

   // Conectar con el servidor de base de datos
      $conexion = mysqli_connect ("localhost", "root", "rootroot", "concesionario")
         or die ("No se puede conectar con el servidor");
		 

   // Enviar consulta
      $instruccion = "select * from Usuarios";
      $consulta = mysqli_query ($conexion,$instruccion)
         or die ("Fallo en la consulta");
   // Mostrar resultados de la consulta
      $nfilas = mysqli_num_rows ($consulta);
      if ($nfilas > 0)
      {
         print ("<TABLE>\n");
         print ("<TR>\n");
         print ("<TH>Nombre</TH>\n");
         print ("<TH>apellido</TH>\n");
         print ("<TH>DNI</TH>\n");
         print ("<TH>Saldo</TH>\n");
         print ("<TH>Tipo</TH>\n");
         print ("</TR>\n");

         for ($i=0; $i<$nfilas; $i++)
         {
            $resultado = mysqli_fetch_array ($consulta);
            print ("<TR>\n");
            print ("<TD>" . $resultado['nombre'] . "</TD>\n");
            print ("<TD>" . $resultado['apellidos'] . "</TD>\n");
            print ("<TD>" . $resultado['dni'] . "</TD>\n");
            print ("<TD>" . $resultado['saldo'] . "</TD>\n");
            print ("<TD>" . $resultado['tipo'] . "</TD>\n");
            print ("</TR>\n");
         }

         print ("</TABLE>\n");
      }
      else
         print ("No hay usuarios disponibles");

// Cerrar 
mysqli_close ($conexion);

?>
<br>
      <form action ='index.php' method="post">
         <input type="submit" value="inicio">
      </form>

</BODY>
</HTML>
