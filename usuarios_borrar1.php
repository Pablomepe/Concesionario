<?PHP
session_start();
if ($_SESSION['tipo']!=1 ){
   header('location: usuarios_sin_permisos.php');
}
else{
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
		
         $nombre = trim(strip_tags($_REQUEST['nombre']));
         $apellido = trim(strip_tags($_REQUEST['apellido']));
         $DNI = trim(strip_tags($_REQUEST['DNI']));
         $saldo = trim(strip_tags($_REQUEST['saldo']));
         $id = trim(strip_tags($_REQUEST['id']));

   // Enviar consulta
      $instruccion = "select * from Usuarios where nombre ='$nombre' or apellidos ='$apellido' or dni='$DNI' or saldo='$saldo'";
   
      $consulta = mysqli_query ($conexion,$instruccion)
         or die ("Fallo en la consulta");
      
      $nfilas = mysqli_num_rows ($consulta);
      if ($nfilas > 0)
      {
         print ("<form action ='usuarios_borrar2.php' method='post'>");
         print ("<TABLE>\n");
         print ("<TR>\n");
      
         print ("<TH>Nombre</TH>\n");
         print ("<TH>apellido</TH>\n");
         print ("<TH>DNI</TH>\n");
         print ("<TH>Saldo</TH>\n");
         print ("<TH>cual quieres borrar</TH>\n");
         print ("</TR>\n");

         for ($i=0; $i<$nfilas; $i++)
         {
            $resultado = mysqli_fetch_array ($consulta);
            print ("<TR>\n");
            print ("<TD>" . $resultado['nombre'] . "</TD>\n");
            print ("<TD>" . $resultado['apellidos'] . "</TD>\n");
            print ("<TD>" . $resultado['dni'] . "</TD>\n");
            print ("<TD>" . $resultado['saldo'] . "</TD>\n");
            print ("<TD><input type='radio' name='id' value='".$resultado['id_usuario']."' ></TD>");
            print ("</TR>\n");
         }
         
         print ("</TABLE>\n");
         print ("<input type='submit' value='borrar'></form>");
      }
      else {
         print ("No hay usuarios que coincidan");
      }
      

// Cerrar 
mysqli_close ($conexion);

?>

</BODY>
</HTML>
<?php
}
?>