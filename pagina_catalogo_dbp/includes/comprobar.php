<?php
// Este código verifica si el producto está añadido al carrito.
function cart($item_id) {
    
    $user_id = $_SESSION['user_id']; // Obtiene el ID del usuario de la sesión
    require("basedatos.php"); // Incluye el archivo de la base de datos
   
    // Consulta para verificar si el producto está añadido al carrito para el usuario actual
    $query = "SELECT * FROM users_products WHERE item_id='$item_id' AND user_id ='$user_id' and status='added'";
    $result = mysqli_query($con, $query); // Ejecuta la consulta

    // Si se encuentra al menos una fila que coincide con la consulta, devuelve 1, de lo contrario, devuelve 0
    if (mysqli_num_rows($result) >= 1) {
        return 1;
    } else {
        return 0;
    }
}

?>
