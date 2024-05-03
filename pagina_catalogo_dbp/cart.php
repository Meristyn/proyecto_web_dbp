<?php
// Incluye el archivo de conexión a la base de datos y comienza la sesión
require "includes/basedatos.php";
session_start();
// Redirige al usuario a la página de inicio si no ha iniciado sesión
if (!isset($_SESSION['email'])) {
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tech21 | Tienda virtual</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <link href='https://fonts.googleapis.com/css?family=Delius Swash Caps' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Andika' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
// Incluye el menú de navegación
include 'includes/header_menu.php';
?>
<!-- Contenido principal -->
<div class="d-flex justify-content-center">
    <div class="col-md-6 my-5 table-responsive p-5">
        <table class="table table-striped table-bordered table-hover">
            <?php
            // Inicializa la variable $sum para el cálculo del total
            $sum = 0;
            // Obtiene el ID de usuario de la sesión actual
            $user_id = $_SESSION['user_id'];
            // Consulta para obtener los productos añadidos al carrito por el usuario actual
            $query = " SELECT products.price AS Price, products.id, products.name AS Name FROM users_products JOIN products ON users_products.item_id = products.id WHERE users_products.user_id='$user_id' and status='Añadido a la Carreta'";
            $result = mysqli_query($con, $query);
            // Si hay productos en el carrito, muestra la tabla
            if (mysqli_num_rows($result) >= 1) {
                ?>
                <thead>
                    <tr>
                        <th>Número del Artículo</th>
                        <th>Nombre del Artículo</th>
                        <th>Precio</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                // Muestra los productos en el carrito y calcula el total
                while ($row = mysqli_fetch_array($result)) {
                    $sum += $row["Price"];
                    $id = $row["id"] . ", ";
                    echo "<tr><td>" . "#" . $row["id"] . "</td><td>" . $row["Name"] . "</td><td>Rs " . $row["Price"] . "</td><td><a href='cart-remove.php?id={$row['id']}' class='remove_item_link'> Eliminar</a></td></tr>";
                }
                $id = rtrim($id, ", ");
                // Muestra el total y un botón para confirmar la orden
                echo "<tr><td></td><td>Total</td><td>Rs " . $sum . "</td><td><a href='success.php' class='btn btn-primary'>Confirmar Orden</a></td></tr>";
                ?>
                </tbody>
                <?php
            } else {
                // Si el carrito está vacío, muestra un mensaje
                echo "<div> <img src='images/emptycart.png' class='image-fluid' height='150' width='150'></div><br/>";
                echo "<div class='text-bold h5'>¡Agrega cosas a tu carrito!<div>";
            }
            ?>
        </table>
    </div>
</div>
<!-- Fin del Contenido principal -->

<!-- Incluye el footer -->
<?php include 'includes/footer.php'?>
<!-- Fin del footer -->

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
  $('[data-toggle="popover"]').popover();
});
$(document).ready(function() {
    // Muestra el modal de inicio de sesión si se encuentra en la URL
    if(window.location.href.indexOf('#login') != -1) {
        $('#login').modal('show');
    }
});
</script>
<?php if (isset($_GET['error'])) {$z = $_GET['error'];
    echo "<script type='text/javascript'>
$(document).ready(function(){
$('#signup').modal('show');
});
</script>";
    echo "<script type='text/javascript'>alert('" . $z . "')</script>";}?>
<?php if (isset($_GET['errorl'])) {$z = $_GET['errorl'];
    echo "<script type='text/javascript'>
$(document).ready(function(){
$('#login').modal('show');
});
</script>";
    echo "<script type='text/javascript'>alert('" . $z . "')</script>";}?>
</html>
