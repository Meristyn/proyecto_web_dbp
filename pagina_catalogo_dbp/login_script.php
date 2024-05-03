<?php
// Incluye el archivo de conexión a la base de datos
require ("includes/basedatos.php");
// Inicia la sesión para mantener la información del usuario
session_start();

// Obtiene y limpia el correo electrónico y la contraseña enviados por el formulario
$email = $_POST['lemail'];
$email = mysqli_real_escape_string($con, $email);

$password = $_POST['lpassword'];
$password = mysqli_real_escape_string($con, $password);
$password = md5($password); // Encripta la contraseña usando el algoritmo md5

// Consulta para verificar si el correo electrónico y la contraseña coinciden en la base de datos
$query = "SELECT id,email_id,password FROM users WHERE email_id='" . $email . "' AND password='" . $password . "'";
$result = mysqli_query($con, $query);
$num = mysqli_num_rows($result);

// Si no se encuentra ningún registro que coincida, redirige al usuario a la página de inicio de sesión con un mensaje de error
if ($num == 0) {
    $m = "Por favor ingresa un correo y contraseña correctos";
    header('location: index.php?errorl=' . $m);
} else {
    // Si las credenciales son válidas, inicia sesión y redirige al usuario a la página de productos
    $row = mysqli_fetch_array($result);
    $_SESSION['email'] = $row['email_id'];
    $_SESSION['user_id'] = $row['id'];
    header('location:products.php');
}
?>
