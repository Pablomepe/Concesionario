<?PHP
session_start();
?>
<HTML LANG="es">
<HEAD>
<link rel="stylesheet" href="style.css">
<?php include 'header.php'; ?>
</HEAD>

<BODY>

<H1>Coches para borrar</H1>

<?PHP

   // Conectar con el servidor de base de datos
      $conexion = mysqli_connect ("localhost", "root", "rootroot","concesionario")
         or die ("No se puede conectar con el servidor");
		
         $id = $_SESSION['id'];

   // Enviar consulta
      $instruccion = "select * from coches where id_dueno='$id'";
   
      $consulta = mysqli_query ($conexion,$instruccion)
         or die ("Fallo en la consulta");
      
      $nfilas = mysqli_num_rows ($consulta);
      if ($nfilas > 0)
      {
         print ("<form action ='coches_borrar2.php' method='post'>");
         print ("<TABLE>\n");
         print ("<TR>\n");
         print ("<TH>Modelo</TH>\n");
         print ("<TH>Marca</TH>\n");
         print ("<TH>Color</TH>\n");
         print ("<TH>Precio</TH>\n");
         print ("<TH>alquilado</TH>\n");
         print ("<TH>imagen</TH>\n");
         print ("<TH>cual quieres borrar</TH>\n");
         print ("</TR>\n");

         for ($i=0; $i<$nfilas; $i++)
         {
            $resultado = mysqli_fetch_array ($consulta);
            if ($resultado['alquilado'] == 1){
               $alquilado='SI';
            }
            else {
               $alquilado='NO';
            }
            print ("<TR>\n");
            print ("<TD>" . $resultado['modelo'] . "</TD>\n");
            print ("<TD>" . $resultado['marca'] . "</TD>\n");
            print ("<TD>" . $resultado['color'] . "</TD>\n");
            print ("<TD>" . $resultado['precio'] . "</TD>\n");
            print ("<TD>" . $alquilado . "</TD>\n");
            print ("<TD><img src='" . $resultado['foto'] . "' width=80px></TD>\n");
            print ("<TD><input type='radio' name='id' value='".$resultado['id_coche']."' ></TD>");
            print ("</TR>\n");
         }
         
         print ("</TABLE>\n");
         print ("<input type='submit' value='borrar'></form>");
      }
      else {
         print ("No hay coches que coincidan");
      }
      

// Cerrar 
mysqli_close ($conexion);

?>

</BODY>
</HTML>
