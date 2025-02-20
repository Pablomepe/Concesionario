<?PHP
session_start();
?>
<HTML LANG="es">
<HEAD>
<link rel="stylesheet" href="style.css">
</HEAD>

<BODY>
<?PHP

   // Conectar con el servidor de base de datos
      $conexion = mysqli_connect ("localhost", "root", "rootroot","concesionario")
         or die ("No se puede conectar con el servidor");
		
   $modelo = trim(strip_tags($_REQUEST['modelo']));
   $marca = trim(strip_tags($_REQUEST['marca']));
   $color = trim(strip_tags($_REQUEST['color']));
   $precio = trim(strip_tags($_REQUEST['precio']));
   $alquilado = 0;
   $target_dir = "./img/";
   $dueno = $_SESSION['id'];

   if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
      $file = $_FILES['image'];
      
      // Obtener el nombre y ruta del archivo destino
      $target_file = $target_dir . basename($file["name"]);
  
      // Verificar si el archivo es realmente una imagen
      $check = getimagesize($file["tmp_name"]);
      if ($check === false) {
          die("El archivo seleccionado no es una imagen.");
      }
  
      // Verificar si el archivo ya existe
      if (file_exists($target_file)) {
          die("El archivo ya existe en el servidor.");
      }
  
      // Intentar mover el archivo al directorio de destino
      if (move_uploaded_file($file["tmp_name"], $target_file)) {
      } else {
          die("Hubo un error al subir el archivo.");
      }
  } else {
      die("No se ha seleccionado ningún archivo.");
  }

   // Enviar consulta
      $instruccion = "insert into Coches (modelo, marca, color, precio, alquilado, foto, id_dueno) values ('$modelo', '$marca', '$color', '$precio', '$alquilado', '$target_file', '$dueno')";
   
      if (mysqli_query ($conexion,$instruccion)) {
         echo "<h1>Coche insertado con exito</h1>";
      }
      else{
         echo "Error al insertar coche" . mysqli_error($conexion);
      }
      

// Cerrar 
mysqli_close ($conexion);

?>
      <form action ='index.php' method="post">
         <input type="submit" value="inicio">
      </form>
</BODY>
</HTML>
