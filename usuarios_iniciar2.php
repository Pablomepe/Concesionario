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
		
   $password = trim(strip_tags(MD5($_REQUEST['password'])));
   $email = trim(strip_tags($_REQUEST['email']));
   

   

   // Enviar consulta
      $instruccion = "select * from Usuarios where email='$email' and password='$password'";
      $consulta = mysqli_query ($conexion,$instruccion);
      if (mysqli_num_rows($consulta) == 1){
         $resultado = mysqli_fetch_array ($consulta);
         $_SESSION['nombre']=$resultado['nombre'];
         if ($resultado['tipo']=="adm"){
         $_SESSION['tipo']=1;
         }
         elseif ($resultado['tipo']=="com"){
            $_SESSION['tipo']=2;
         }
         elseif ($resultado['tipo']=="ven"){
            $_SESSION['tipo']=3;
         }
         header('location: index.php');
      }
      else{
         echo "Error al iniciar session";
      }
      

// Cerrar 
mysqli_close ($conexion);

?>
      <form action ='index.php' method="post">
         <input type="submit" value="inicio">
      </form>
</BODY>
</HTML>
