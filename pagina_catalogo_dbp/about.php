<?php
session_start(); // Inicia la sesión para mantener la información del usuario
?>
<!DOCTYPE html>
<html lang="es"> <!-- Establece el lenguaje de la página como español -->
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tech21 Security | Tienda virtual</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Delius Swash Caps' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Andika' rel='stylesheet'>
  <link rel="stylesheet" href="style.css">
</head>
<body style="overflow-x:hidden; padding-bottom:100px;">
  <?php
    include 'includes/header_menu.php'; // Incluye el archivo de menú de encabezado
  ?>
  <div>
    <div class="container mt-5 ">
      <div class="row justify-content-around">
        <div class="col-md-5 mt-3">
          <h3 class="text-warning pt-3 title">¿Quiénes somos?</h3>
          <hr />
          <img
            src="images/logo.png"
            class="img-fluid d-block rounded mx-auto image-thumbnail">
          <p class="mt-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed atque, consequuntur cumque odit
            sapiente blanditiis, expedita ipsam molestiae voluptates reprehenderit ea modi eaque rerum dicta dolores,
            iusto ullam aliquid non?
            Quidem quae odio nemo cumque consectetur natus doloremque voluptatem consequatur voluptate laboriosam, amet
            maiores excepturi sunt aliquid magni voluptatibus aperiam laudantium dolores reiciendis? Laborum laboriosam,
            nam ullam totam amet et.
            Earum recusandae voluptate accusantium, placeat alias consequuntur aspernatur sed explicabo impedit et aut
            assumenda hic repellendus esse facere ratione quod vitae laudantium. Obcaecati nobis sequi esse assumenda,
            rerum dolores pariatur.</p>
        </div>
        <div class="col-md-5 mt-3">
          <span class="text-warning pt-3">
            <h1 class="title">SOPORTE EN VIVO</h1>
            <h3>Soporte técnico en vivo 24 horas | 7 días a la semana | 365 días al año</h3>
          </span>
          <hr>
          <p>Es un hecho establecido de que un lector se distraerá con el contenido legible de una página cuando
            esté mirando su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de
            letras. Hay muchas variaciones de pasajes de Lorem Ipsum disponibles, pero la mayoría han sufrido
            alteración de alguna forma, ya sea por humor inyectado o palabras aleatorias que no parecen creíbles en
            absoluto. Si vas a usar un pasaje de Lorem Ipsum, necesitas estar seguro de que no hay nada embarazoso
            oculto en el medio del texto.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat nam ducimus a illum, at voluptate, iusto
            eos tempora in quam exercitationem officia autem maxime deserunt. Reprehenderit necessitatibus sequi in
            fugit? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magni, facilis. Reiciendis dicta fuga esse
            at excepturi inventore perferendis? Consequatur dicta blanditiis, magnam consequuntur possimus excepturi
            eaque neque nulla libero temporibus!
          </p>

        </div>
      </div>
    </div>
  </div>
  <div class="container pb-3">
  </div>
  <div class="container mt-3 d-flex justify-content-center card pb-3 col-md-6">

    <form class="col-md-12" action="https://formspree.io/aqui_el_correo" method="POST" name="_next">
      <h3 class="text-warning pt-3 title mx-auto">Formulario de contacto</h3>
      <div class="form-group">
        <label for="exampleFormControlInput1">Correo electrónico</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Ingresa tu correo electrónico"
          name="email">
      </div>

      <div class="form-group">
        <label for="exampleFormControlTextarea1">Mensaje</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="message" rows="5"></textarea>
      </div>
      <input type="hidden" name="_next" value="http://localhost/foody/about.php" />
      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
  </div>


  </div>
  <!--el footer -->
  <?php include 'includes/footer.php'?> <!-- Incluye el archivo de footer -->
  <!--fin del footer-->


</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script>
  $(document).ready(function () {
    $('[data-toggle="popover"]').popover();
  });
  $(document).ready(function () {

    if (window.location.href.indexOf('#login') != -1) {
      $('#login').modal('show');
    }

  });
</script>
<?php if(isset($_GET['error'])){ $z=$_GET['error']; echo "<script type='text/javascript'>
$(document).ready(function(){
$('#signup').modal('show');
});
</script>"; echo "
<script type='text/javascript'>alert('".$z."')</script>";} ?>
<?php if(isset($_GET['errorl'])){ $z=$_GET['errorl']; echo "<script type='text/javascript'>
$(document).ready(function(){
$('#login').modal('show');
});
</script>"; echo "
<script type='text/javascript'>alert('".$z."')</script>";} ?>
</html>
