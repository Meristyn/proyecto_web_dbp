<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tech21 Security | Compras en línea</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <link href='https://fonts.googleapis.com/css?family=Delius Swash Caps' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Andika' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<!--header -->
 <?php
include 'includes/header_menu.php';
include 'includes/comprobar.php';
?>
<!--header ends -->
<div class="container" style="margin-top:65px">
         <!--jumbutron start-->
        <div class="jumbotron text-center">
            <h1>Bienvenido a Tech21 Security</h1>
            <p>Nosotros nos preocupamos por tu seguridad</p>
        </div>
        <!--jumbutron ends-->
        <!--breadcrumb start-->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Casa</a></li>
                <li class="breadcrumb-item active" aria-current="page">Productos</li>
            </ol>
        </nav>
        <!--breadcrumb end-->
    <hr/>
    <!--menu list-->
    <!-- CHAT GPT -->
    <?php
    require "includes/basedatos.php";
    // Consulta para obtener todos los tipos de productos
    $product_types_query = "SELECT DISTINCT type FROM products";
    $product_types_result = mysqli_query($con, $product_types_query);

    if (mysqli_num_rows($product_types_result) > 0) {
        // Recorre los tipos de productos
        while ($row = mysqli_fetch_assoc($product_types_result)) {
            $product_type = $row['type']; // Tipo de producto

            // Consulta para obtener los productos de este tipo
            $products_query = "SELECT * FROM products WHERE type = '$product_type'";
            $products_result = mysqli_query($con, $products_query);

            // Verifica si hay productos de este tipo
            if (mysqli_num_rows($products_result) > 0) {
    ?>
                <h2><?php echo $product_type; ?></h2>
                <div class="row text-center" id="<?php echo $product_type; ?>">
                    <?php
                    // Recorre los productos de este tipo
                    while ($product_row = mysqli_fetch_assoc($products_result)) {
                        ?>
                        <div class="col-md-3 col-6 py-3">
                            <div class="card">
                                <img src="images/<?php echo $product_row['image']; ?>" alt="" class="img-fluid pb-1">
                                <div class="figure-caption">
                                    <h6><?php echo $product_row['name']; ?></h6>
                                    <h6><?php echo $product_row['description']; ?></h6>
                                    <h6>Precio: <?php echo $product_row['price']; ?> soles</h6>
                                    <?php
                                    // Lógica para verificar si el usuario ha iniciado sesión y si el producto está en el carrito
                                    if (!isset($_SESSION['email'])) {
                                        ?>
                                        <p><a href="index.php#login" role="button" class="btn btn-warning  text-white">Agregar al carrito</a></p>
                                    <?php } else {
                                        if (cart($product_row['id'])) {
                                            echo '<p><a href="#" class="btn btn-warning  text-white" disabled>Agregar al carrito</a></p>';
                                        } else {
                                            ?>
                                            <p><a href="cart-add.php?id=<?php echo $product_row['id']; ?>" name="add" value="add" class="btn btn-warning  text-white">Agregar al carrito</a></p>
                                    <?php }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
    <?php
            }
        }
    }
    ?>
            
    </div>
    <!--menu list ends-->
    <!-- footer-->
    <?php include 'includes/footer.php'?>
    <!--footer ends-->
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
  $('[data-toggle="popover"]').popover();
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