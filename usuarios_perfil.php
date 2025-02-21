<?PHP
session_start();
if (isset($_SESSION['nombre'])){
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <?php include 'header.php'; ?>
</head>
<body>
<?php
    print("<main class='container'><div class='bg-body-tertiary p-5 m-5 rounded'>
    <h1> Hola, ". $_SESSION['nombre']."</h1></div></main>")
?>
<main class="container" >
  <div class="bg-body-tertiary p-5 rounded">
    <h1 style="text-align: left">Mi Saldo</h1>
    <hr>
    <?php
    $conexion = mysqli_connect ("localhost", "root", "rootroot","concesionario")
    or die ("No se puede conectar con el servidor");
    $id = $_SESSION['id'];
    $instruccion = "select * from usuarios where id_usuario='$id';";
    $consulta = mysqli_query ($conexion,$instruccion)
      or die ("Fallo en la consulta");
      $resultado = mysqli_fetch_array ($consulta);
  print("<h1>".$resultado['saldo']."€</h1>")
    ?>
  </div>
</main>
<main class="container" >
  <div class="bg-body-tertiary p-5 rounded">
    <h1 style="text-align: left">Mis Coches</h1>
    <hr>
    <?php
    $conexion = mysqli_connect ("localhost", "root", "rootroot","concesionario")
    or die ("No se puede conectar con el servidor");
   $id = $_SESSION['id'];

// Enviar consulta
 $instruccion = "select * from coches where id_dueno='$id';";

 $consulta = mysqli_query ($conexion,$instruccion)
    or die ("Fallo en la consulta");
 
 $nfilas = mysqli_num_rows ($consulta);
 if ($nfilas > 0)
 {
    print ("<TABLE style='width: 100%; background-color: transparent; color: black; border:0px;'>\n");
    print ("<TR>\n");
    print ("<TH>Modelo</TH>\n");
    print ("<TH>Marca</TH>\n");
    print ("<TH>Color</TH>\n");
    print ("<TH>Precio</TH>\n");
    print ("<TH>Alquilado</TH>\n");
    print ("<TH>Imagen</TH>\n");
    print ("<TH>Cual quieres Editar / Eliminar</TH>\n");
    print ("</TR>\n");

    for ($i=0; $i<$nfilas; $i++)
    {
       $resultado = mysqli_fetch_array ($consulta);
       if ($resultado['alquilado'] == 1){
          $alquilado='SI';
       }
       else {
          $alquilado='NO';
       }
       print ("<TR>\n");
       print ("<TD>" . $resultado['modelo'] . "</TD>\n");
       print ("<TD>" . $resultado['marca'] . "</TD>\n");
       print ("<TD>" . $resultado['color'] . "</TD>\n");
       print ("<TD>" . $resultado['precio'] . "</TD>\n");
       print ("<TD>" . $alquilado . "</TD>\n");
       print ("<TD><img src='" . $resultado['foto'] . "' width=200px></TD>\n");
       print ("<TD><form action ='coches_modificar2_2.php' method='post'> <input type='hidden' name='id' value='".$resultado['id_coche']."'>");
       print ("<input type='submit' value='Editar/Eliminar'></form></TD>");
       print ("</TR>\n");
    }
    
    print ("</TABLE>\n");
    
 }
 else {
    print ("No Tiene coches en propiedad.");
 }
    ?>


  </div>
</main>
<main class="container">
  <div class="bg-body-tertiary p-5 rounded">
    <h1 style="text-align: left">Mis Alquileres</h1>
    <hr>
    <?php
    $conexion = mysqli_connect ("localhost", "root", "rootroot","concesionario")
    or die ("No se puede conectar con el servidor");
   $id = $_SESSION['id'];
 $instruccion = "select * from alquileres where id_usuario='$id' and devuelto is null;";

 $consulta = mysqli_query ($conexion,$instruccion)
    or die ("Fallo en la consulta");
    $nfilas = mysqli_num_rows ($consulta);
    if ($nfilas > 0) {
        print ("<TABLE style='width: 100%; background-color: transparent; color: black; border:0px;'>\n");
        print ("<TR>\n");
        print ("<TH>Modelo</TH>\n");
        print ("<TH>Marca</TH>\n");
        print ("<TH>Color</TH>\n");
        print ("<TH>Precio</TH>\n");
        print ("<TH>Imagen</TH>\n");
        print ("<TH>Cancelar alquiler</TH>\n");
        print ("</TR>\n");
   
        for ($i=0; $i<$nfilas; $i++) {
            $resultado = mysqli_fetch_array ($consulta);
            $id_coche = $resultado['id_coche'];

            $instruccion2 = "select * from coches where id_coche='$id_coche';";
            $consulta2 = mysqli_query ($conexion,$instruccion2)
                or die ("Fallo en la consulta");
            $resultado2 = mysqli_fetch_array ($consulta2);
            
            print ("<TR>\n");
            print ("<TD>" . $resultado2['modelo'] . "</TD>\n");
            print ("<TD>" . $resultado2['marca'] . "</TD>\n");
            print ("<TD>" . $resultado2['color'] . "</TD>\n");
            print ("<TD>" . $resultado2['precio'] . "</TD>\n");
            print ("<TD><img src='" . $resultado2['foto'] . "' width=200px></TD>\n");
            print ("<TD><form action ='coches_desalquilar.php' method='post'> <input type='hidden' name='id' value='".$resultado['id_coche']."'>");
            print ("<input type='submit' value='Devolver'></form></TD>");
            print ("</TR>\n");
        }
    }
    else {
        print ("No Tiene coches en Alquiler.");
    }
}
else{
    header('location: usuarios_sin_permisos.php');
}
    ?>

    
  </div>
</main>
</body>
</html>