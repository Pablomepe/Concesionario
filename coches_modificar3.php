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
   $id = trim(strip_tags($_REQUEST['id']));
   $modelo = trim(strip_tags($_REQUEST['modelo']));
   $marca = trim(strip_tags($_REQUEST['marca']));
   $color = trim(strip_tags($_REQUEST['color']));
   $precio = trim(strip_tags($_REQUEST['precio']));
   $alquilado = trim(strip_tags($_REQUEST['alquilado']));
   

   $sql = "update coches set modelo='$modelo', marca='$marca', color='$color', precio='$precio', alquilado='$alquilado' where id_coche='$id'";

   if (mysqli_query($conn, $sql)){
      echo "coche actualizado con èxito.";
   }
   else {
      echo "Error al actualizar: " . mysqli_error($conn);
   }
   mysqli_close($conn);

   
?>

      <form action ='index.html' method="post">
         <input type="submit" value="inicio">
      </form>