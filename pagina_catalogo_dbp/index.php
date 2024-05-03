<?php
// Inicia la sesión para mantener la información del usuario
session_start();
?>
<!DOCTYPE html>
<html lang="es"> <!-- Establece el lenguaje de la página como español -->
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
<body style="margin-bottom:200px">
    <!-- Incluye el menú de encabezado -->
    <?php
include 'includes/header_menu.php';
include 'includes/comprobar.php'; // Incluye el archivo de comprobación
?>
    <!--Fin del encabezado-->

    <!-- Contenido principal -->
    <div id="content">
        <div id="bg" class=" ">
            <div class="container" style="padding-top:150px">
            <div class="mx-auto p-5 text-white" id="banner_content" style="border-radius: 0.5rem;" >
            <h1>Vendemos felicidad :)</h1>
            <p>¡40% de descuento en marcas premium!</p>
            <a href="products.php" class="btn btn-warning btn-lg text-white">Comprar ahora</a>
            </div>
            </div>
        </div>
    </div>
    <div class="text-center pt-4 h3">
        *Sé actualizado*
    </div>
    <!-- Menú destacado -->
    <div class="container pt-3">
        <div class="row text-center ">
            <div class="col-6 col-md-3 py-3">
                <a href="products.php#watch"> <img src="images/watch.jpg" class="img-fluid " alt="" style="border-radius:0.5rem">
                    <div class="h5 pt-3 font-weight-bolder">
                      Cámaras
                   </div>
                 </a>
             </div>
            <div class="col-6 col-md-3 py-3 " >
                <a href="products.php#shirt"  >
                  <img src="images/clothing.jpg" class="img-fluid zoom" alt="" style="border-radius:0.5rem" >
                     <div class="h5 pt-3 font-weight-bolder">
                        Alarmas
                     </div>
                  </a>
             </div>
            <div class="col-6 col-md-3 py-3">
                <a href="products.php#shoes">
                 <img src="images/shoes.jpg" class="img-fluid   " alt="" style="border-radius:0.5rem">
                <div class="h5 pt-3 font-weight-bolder">
                    Biométricas
                 </div>
             </a>
             </div>
        </div>
    </div>
    <!-- Fin del menú destacado -->

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
