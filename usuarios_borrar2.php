<?PHP
session_start();
?>
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
   $id = $_REQUEST['id'];

   $sql = "delete from Usuarios where id_usuario='$id'";

   if (mysqli_query($conn, $sql)){
      echo "usuario eliminado con èxito.";
   }
   else {
      echo "Error al eliminar: " . mysqli_error($conn);
   }
   mysqli_close($conn);
?>
      <form action ='index.php' method="post">
         <input type="submit" value="inicio">
      </form>