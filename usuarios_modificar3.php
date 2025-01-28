<HTML LANG="es">
<HEAD>
<link rel="stylesheet" href="style.css">
</HEAD>

<BODY>
<?PHP
   $servername = "localhost";
   $username = "root";
   $password = "rootroot";
   $dbname = "concesionario";

   $conn = mysqli_connect ($servername, $username, $password, $dbname);
   if (!$conn){
      die ("Conexion fallida: " .mysqli_connect_error ());
   }
         $nombre = trim(strip_tags($_REQUEST['nombre']));
         $apellido = trim(strip_tags($_REQUEST['apellido']));
         $contraseña = trim(strip_tags($_REQUEST['password']));
         $DNI = trim(strip_tags($_REQUEST['DNI']));
         $saldo = trim(strip_tags($_REQUEST['saldo']));
         $id = trim(strip_tags($_REQUEST['id']));
 

   $sql = "update usuarios set nombre='$nombre', apellidos='$apellido', password='$contraseña', dni='$DNI', saldo='$saldo' where id_usuario='$id'";

   if (mysqli_query($conn, $sql)){
      echo "usuario actualizado con èxito.";
   }
   else {
      echo "Error al actualizar: " . mysqli_error($conn);
   }
   mysqli_close($conn);

   
?>

      <form action ='index.html' method="post">
         <input type="submit" value="inicio">
      </form>