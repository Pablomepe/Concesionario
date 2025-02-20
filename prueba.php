<?php
$pass="pepito";
$hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
echo $hashed_pass;
echo "<br>";
if (password_verify('pepito', $hashed_pass)) {
    echo '¡La contraseña es válida!';
} else {
    echo 'La contraseña no es válida.';
}


?>