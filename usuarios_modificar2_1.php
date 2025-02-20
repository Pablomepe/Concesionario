<?PHP
session_start();
?>
<HTML LANG="es">
<HEAD>
<link rel="stylesheet" href="style.css">
<?php include 'header.php'; ?>
</HEAD>

<BODY>

<H1>Modificación del usuario</H1>

<?PHP

$conexion = mysqli_connect ("localhost", "root", "rootroot","concesionario")
or die ("No se puede conectar con el servidor");

$id = $_SESSION['id'];


// Enviar consulta
$instruccion = "select * from Usuarios where id_usuario = $id;";
$consulta = mysqli_query ($conexion,$instruccion);


if (mysqli_num_rows ($consulta) == 1 ){
   $row = mysqli_fetch_assoc ($consulta);
?>
<div class="form">
<form action="usuarios_modificar3.php" method="post">
        
        <input type="text" name="id" value="<?php echo $id; ?>" readonly><br>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>"><br>

        <label for="password">contraseña:</label>
        <input type="password" name="password" value="<?php echo $row['password']; ?>"><br>

        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" value="<?php echo $row['apellidos']; ?>"><br>

        <label for="DNI">DNI:</label>
        <input type="text" name="DNI" value="<?php echo $row['dni']; ?>"><br>

        <label for="saldo">Saldo:</label>
        <input type="number" name="saldo" value="<?php echo $row['saldo']; ?>"><br>
            
        <input type="submit" value="Actualizar">
    </form>
</div>
</body>
</html>

<?php
} else {
    echo "No se encontró el usuario.";
}

// Cerrar la conexión
mysqli_close($conn);
 
?>