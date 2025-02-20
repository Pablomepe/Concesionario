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
		
   $pass = trim(strip_tags($_REQUEST['password']));
   $password = password_hash($pass, PASSWORD_DEFAULT);
   $nombre = trim(strip_tags($_REQUEST['nombre']));
   $apellido = trim(strip_tags($_REQUEST['apellido']));
   $DNI = trim(strip_tags($_REQUEST['DNI']));
   $saldo = trim(strip_tags($_REQUEST['saldo']));
   $email = trim(strip_tags($_REQUEST['email']));
   $tipo = trim(strip_tags($_REQUEST['tipo']));

   

   // Enviar consulta
      $instruccion = "insert into Usuarios (email, password, nombre, apellidos, dni, saldo, tipo) values ('$email', '$password', '$nombre', '$apellido', '$DNI', '$saldo', '$tipo')";
      
      if (mysqli_query ($conexion,$instruccion)) {
         echo "<h1>Usuario insertado con exito</h1>";
      }
      else{
         echo "Error al insertar Usuario" . mysqli_error($conexion);
      }
      

// Cerrar 
mysqli_close ($conexion);
header('location: usuarios_anadir.php');

?>
      
</BODY>
</HTML>
