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

		 

   // Enviar consulta
      $instruccion = "select * from coches where id_coche='$id'";
      $consulta = mysqli_query ($conexion,$instruccion)
         or die ("Fallo en la consulta");
   // Mostrar resultados de la consulta
      $nfilas = mysqli_num_rows ($consulta);
        $resultado = mysqli_fetch_array ($consulta);
        print ("<TABLE>\n");
        print ("<TR>\n");
        print ("<td>El coche ". $resultado['modelo'] ." de la marca ". $resultado['marca'] ." en color ". $resultado['color'] ." esta disponible para alquilarlo por ". $resultado['precio'] ." €</td>");
        
        print ("<TD rowspan='2'> <img src='" . $resultado['foto'] . "' width=250px></TD>\n");
        print ("</TR>\n");
        print ("<TR>\n");
        print ("<td>Estas seguro que lo quieres devolver <form action ='coches_desalquilar1.php' method='post'> <input type='hidden' name='id' value='".$resultado['id_coche']."'>");
            print ("<input type='submit' value='Devolver'></form></td>");
        print ("</TR>\n");
        print ("</TABLE>\n");
// Cerrar 
mysqli_close ($conexion);

?>
</BODY>
</HTML>
