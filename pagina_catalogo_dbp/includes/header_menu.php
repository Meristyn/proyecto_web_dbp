<!-- Barra de navegación -->
<nav class="navbar fixed-top navbar-expand-sm navbar-dark" style="background-color:rgba(0,0,0,0.5)">
    <div class="container">
        <!-- Logo -->
        <a href="index.php" class="navbar-brand" style="font-family: 'Delius Swash Caps'">Tech21</a>
        <!-- Botón para dispositivos móviles -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="nav navbar-nav">
                <!-- Dropdown de Productos -->
                <li class="nav-item dropdown">
                    <a href="" class="nav-link dropdown-toggle" id="navbar-drop" data-toggle="dropdown">Productos</a>
                    <div class="dropdown-menu">
                        <a href="products.php#Cámaras" class="dropdown-item">Cámaras</a>
                        <a href="products.php#Alarmas" class="dropdown-item">Alarmas</a>
                        <a href="products.php#Biométrico" class="dropdown-item">Biométricas</a>
                    </div>
                </li>
                <!-- Enlace a Ofertas -->
                <li class="nav-item"><a href="index.php" class="nav-link">Ofertas</a></li>
                <!-- Enlace a Sobre nosotros -->
                <li class="nav-item"><a href="about.php" class="nav-link">Sobre nosotros</a></li>
                <!-- Si el usuario está logueado, muestra enlace al Carrito -->
                <?php
                if (isset($_SESSION['email'])) {
                ?>
                    <li class="nav-item"><a href="cart.php" class="nav-link">Carrito</a></li>
                <?php
                }
                ?>
            </ul>
            <!-- Si el usuario está logueado, muestra enlaces de Usuario y Salir -->
            <?php
            if (isset($_SESSION['email'])) {
            ?>
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item"><a href="logout_script.php" class="nav-link"><i class="fa fa-sign-out"></i>Salir</a></li>
                    <li class="nav-item"><a class="nav-link" data-placement="bottom" data-toggle="popover" data-trigger="hover" data-content="<?php echo $_SESSION['email'] ?>"><i class="fa fa-user-circle"></i></a></li>
                </ul>
            <?php
            } else {
            ?>
                <!-- Si el usuario no está logueado, muestra enlaces de Registrarse y Entrar -->
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item"><a href="#signup" class="nav-link" data-toggle="modal"><i class="fa fa-user"></i> Registrarse</a></li>
                    <li class="nav-item"><a href="#login" class="nav-link" data-toggle="modal"><i class="fa fa-sign-in"></i> Entrar</a></li>
                </ul>
            <?php
            }
            ?>
        </div>
    </div>
</nav>
<!-- Fin de la barra de navegación -->

<!-- Modal de Inicio de Sesión -->
<div class="modal fade" id="login">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="background-color:rgba(255,255,255,0.95)">
            <div class="modal-header">
                <h5 class="modal-title">Inicio de Sesión</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario de Inicio de Sesión -->
                <form action="login_script.php" method="post">
                    <div class="form-group">
                        <label for="email">Correo electrónico:</label>
                        <input type="email" class="form-control" name="lemail" placeholder="Introduce tu correo electrónico" required>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Contraseña:</label>
                        <input type="password" class="form-control" id="pwd" name="lpassword" placeholder="Contraseña" required>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input">
                        <label for="checkbox" class="form-check-label">Recordarme</label>
                    </div>
                    <button type="submit" class="btn btn-secondary btn-block" name="Submit">Iniciar Sesión</button>
                </form>
                <a href="#">¿Olvidaste tu contraseña?</a>
            </div>
            <div class="modal-footer">
                <!-- Enlace para nuevos usuarios -->
                <p class="mr-auto">¿Nuevo usuario? <a href="#signup" data-toggle="modal" data-dismiss="modal">Registrarse</a></p>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Fin del Modal de Inicio de Sesión -->

<!-- Modal de Registro -->
<div class="modal fade" id="signup">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="background-color:rgba(255,255,255,0.95)">
            <div class="modal-header">
                <h5 class="modal-title">Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario de Registro -->
                <form action="signup_script.php" method="post">
                    <div class="form-group">
                        <label for="email">Correo electrónico:</label>
                        <input type="email" class="form-control" name="eMail" placeholder="Introduce tu correo electrónico" required>
                        <?php if(isset($_GET['error'])){ echo "<span class='text-danger'>".$_GET['error']."</span>"; } ?>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Contraseña:</label>
                        <input type="password" class="form-control" id="pwd" name="password" placeholder="Contraseña" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="validation1">Nombre</label>
                            <input type="text" class="form-control" id="validation1" name="firstName" placeholder="Nombre" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="validation2">Apellido</label>
                            <input type="text" class="form-control" id="validation2" name="lastName" placeholder="Apellido">
                        </div>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" required>
                        <label for="checkbox" class="form-check-label">Acepto los términos y condiciones</label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" name="Submit">Registrarse</button>
                </form>
            </div>
            <div class="modal-modal-footer">
                <!-- Enlace para usuarios registrados -->
                <p class="mr-auto">¿Ya estás registrado? <a href="#login" data-toggle="modal" data-dismiss="modal">Iniciar Sesión</a></p>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Fin del Modal de Registro -->
