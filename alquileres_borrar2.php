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

   $sql = "delete from Alquileres where id_alquiler='$id'";

   if (mysqli_query($conn, $sql)){
      echo "alquiler eliminado con èxito.";
   }
   else {
      echo "Error al eliminar: " . mysqli_error($conn);
   }
   mysqli_close($conn);
?>
      <form action ='index.html' method="post">
         <input type="submit" value="inicio">
      </form>