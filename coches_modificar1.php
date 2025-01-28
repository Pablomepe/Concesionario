<HTML LANG="es">
<HEAD>
   <link rel="stylesheet" href="style.css">
   
</HEAD>

<BODY>

<H1>Coches para modificar</H1>

<?PHP

   // Conectar con el servidor de base de datos
      $conexion = mysqli_connect ("localhost", "root", "rootroot","concesionario")
         or die ("No se puede conectar con el servidor");
		
         $modelo = trim(strip_tags($_REQUEST['modelo']));
         $marca = trim(strip_tags($_REQUEST['marca']));
         $color = trim(strip_tags($_REQUEST['color']));
         $precio = trim(strip_tags($_REQUEST['precio']));
         $alquilado = trim(strip_tags($_REQUEST['alquilado']));

   // Enviar consulta
      $instruccion = "select * from coches where modelo ='$modelo' or marca ='$marca' or color='$color' or precio='$precio' or alquilado='$alquilado' or foto='$img';";
   
      $consulta = mysqli_query ($conexion,$instruccion)
         or die ("Fallo en la consulta");
      
      $nfilas = mysqli_num_rows ($consulta);
      if ($nfilas > 0)
      {
         print ("<form action ='coches_modificar2.php' method='post'>");
         print ("<TABLE>\n");
         print ("<TR>\n");
         print ("<TH>Modelo</TH>\n");
         print ("<TH>Marca</TH>\n");
         print ("<TH>Color</TH>\n");
         print ("<TH>Precio</TH>\n");
         print ("<TH>Alquilado</TH>\n");
         print ("<TH>Imagen</TH>\n");
         print ("<TH>Cual quieres editar</TH>\n");
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
         print ("<input type='submit' value='modificar'></form>");
      }
      else {
         print ("No hay coches que coincidan");
      }
      

// Cerrar 
mysqli_close ($conexion);

?>

</BODY>
</HTML>
