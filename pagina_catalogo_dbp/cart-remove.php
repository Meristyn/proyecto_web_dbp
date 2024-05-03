<?php

require "includes/basedatos.php";
session_start();
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $item_id = $_GET["id"];
    $user_id = $_SESSION['user_id'];

    // Eliminar las filas de la tabla users_products donde item_id y user_id sean iguales a los obtenidos de la página del carrito y de la sesión
    $consulta = "DELETE FROM users_products WHERE item_id='$item_id' AND user_id='$user_id' ";
    $resultado = mysqli_query($con, $consulta);
    header("location:cart.php");
}
?>
