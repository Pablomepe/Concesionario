<?PHP
session_start();
?>
<HTML LANG="es">
<HEAD>
<link rel="stylesheet" href="style.css">
<?php include 'header.php'; ?>
</HEAD>

<BODY>

<H1>Alquileres para borrar</H1>

<?PHP

   // Conectar con el servidor de base de datos
      $conexion = mysqli_connect ("localhost", "root", "rootroot","concesionario")
         or die ("No se puede conectar con el servidor");
		
         $id_usuario = trim(strip_tags($_REQUEST['id_usuario']));
         $id_coche = trim(strip_tags($_REQUEST['id_coche']));
         $prestado = trim(strip_tags($_REQUEST['prestado']));
         $devuelto = trim(strip_tags($_REQUEST['devuelto']));

      if ($prestado > 0 and $devuelto > 0) {
         $instruccion = "select * from alquileres where id_usuario ='$id_usuario' or id_coche ='$id_coche' or prestado='$prestado' or devuelto='$devuelto';";
      }
      elseif ($prestado > 0){
         $instruccion = "select * from alquileres where id_usuario ='$id_usuario' or id_coche ='$id_coche' or prestado='$prestado';";
      }
      elseif ($devuelto > 0) {

         $instruccion = "select * from alquileres where id_usuario ='$id_usuario' or id_coche ='$id_coche' or devuelto='$devuelto';";
      }
      else {
         $instruccion = "select * from alquileres where id_usuario ='$id_usuario' or id_coche ='$id_coche';";
      }
   // Enviar consulta
      
   
      $consulta = mysqli_query ($conexion,$instruccion)
         or die ("Fallo en la consulta");
      
      $nfilas = mysqli_num_rows ($consulta);
      if ($nfilas > 0)
      {
         print ("<form action ='alquileres_borrar2.php' method='post'>");
         print ("<TABLE>\n");
         print ("<TR>\n");
         print ("<TH>id_usuario</TH>\n");
         print ("<TH>id_coche</TH>\n");
         print ("<TH>prestado</TH>\n");
         print ("<TH>devuelto</TH>\n");
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
            print ("<TD>" . $resultado['id_alquiler'] . "</TD>\n");
            print ("<TD>" . $resultado['id_usuario'] . "</TD>\n");
            print ("<TD>" . $resultado['id_coche'] . "</TD>\n");
            print ("<TD>" . $resultado['prestado'] . "</TD>\n");
            print ("<TD>" . $resultado['devuelto'] . "</TD>\n");
            print ("<TD><input type='radio' name='id' value='".$resultado['id_alquiler']."' ></TD>");
            print ("</TR>\n");
         }
         
         print ("</TABLE>\n");
         print ("<input type='submit' value='borrar'></form>");
      }
      else {
         print ("No hay alquileres que coincidan");
      }
      

// Cerrar 
mysqli_close ($conexion);

?>

</BODY>
</HTML>
