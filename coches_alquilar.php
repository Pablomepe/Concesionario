<?PHP
session_start();

?>
<HTML LANG="es">
<HEAD>
<link rel="stylesheet" href="style.css">
<?php include 'header.php'; ?>
</HEAD>

<BODY>

<?PHP
if (isset($_SESSION['nombre'])){
   // Conectar con el servidor de base de datos
      $conexion = mysqli_connect ("localhost", "root", "rootroot", "concesionario")
         or die ("No se puede conectar con el servidor");

         $id = $_REQUEST['id'];
         $id_com = $_SESSION['id'];

		 

   // Enviar consulta
      $instruccion = "select * from coches where id_coche='$id'";
      $consulta = mysqli_query ($conexion,$instruccion)
         or die ("Fallo en la consulta");
   // Mostrar resultados de la consulta
      $nfilas = mysqli_num_rows ($consulta);
        $resultado = mysqli_fetch_array ($consulta);
        if ($id_com==$resultado['id_dueno']){
         print ("<div class='form' style='background-color: white; margin-top:20px; border-radius: 20px;'>
            <H1 style='color: red;'>¡¡No puedes alquilar un coche tuyo!!</H1>
         </div>");
        }
        else{
        print ("<TABLE>\n");
        print ("<TR>\n");
        print ("<td>El coche ". $resultado['modelo'] ." de la marca ". $resultado['marca'] ." en color ". $resultado['color'] ." esta disponible para alquilarlo por ". $resultado['precio'] ." €</td>");
        
        print ("<TD rowspan='2'> <img src='" . $resultado['foto'] . "' width=250px></TD>\n");
        print ("</TR>\n");
        print ("<TR>\n");
        print ("<td>Estas seguro que lo quieres alquilar <form action ='coches_alquilar1.php' method='post'> <input type='hidden' name='id' value='".$resultado['id_coche']."'>");
            print ("<input type='submit' value='Alquilar'></form></td>");
        print ("</TR>\n");
        print ("</TABLE>\n");
        }
// Cerrar 
mysqli_close ($conexion);
}
else{
?>
<table>
   <tr>
      <td>
         <h1>¡¡ Necesitas iniciar sesion para poder alquilar un coche !!</h1>
      </td>
   </tr>
</table>
<?php
}
?>

</BODY>
</HTML>
