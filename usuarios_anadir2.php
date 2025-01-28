<HTML LANG="es">
<HEAD>
<link rel="stylesheet" href="style.css">
</HEAD>

<BODY>
<?PHP

   // Conectar con el servidor de base de datos
      $conexion = mysqli_connect ("localhost", "root", "rootroot","concesionario")
         or die ("No se puede conectar con el servidor");
		
   $password = trim(strip_tags(MD5($_REQUEST['password'])));
   $nombre = trim(strip_tags($_REQUEST['nombre']));
   $apellido = trim(strip_tags($_REQUEST['apellido']));
   $DNI = trim(strip_tags($_REQUEST['DNI']));
   $saldo = trim(strip_tags($_REQUEST['saldo']));
   

   // Enviar consulta
      $instruccion = "insert into Usuarios (password, nombre, apellidos, dni, saldo) values ('$password', '$nombre', '$apellido', '$DNI', '$saldo')";
      
      if (mysqli_query ($conexion,$instruccion)) {
         echo "<h1>Usuario insertado con exito</h1>";
      }
      else{
         echo "Error al insertar Usuario" . mysqli_error($conexion);
      }
      

// Cerrar 
mysqli_close ($conexion);

?>
      <form action ='index.html' method="post">
         <input type="submit" value="inicio">
      </form>
</BODY>
</HTML>
