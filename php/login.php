<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/formulario.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <title>Iniciar sesión</title>
</head>

<body>
    <nav class="nav_hero">
        <div class="container nav_container">
            <div class="logo">
                <h2 class="logo_name">
                    <div style="padding-right:20px; height: 50px; "><img src="../images/salud-y-nutricion1.jpg" width="50px" height="50px"></div>Nutri Help
                </h2>

            </div>
            <div class="links">
                <a href="../index.html#inicio" class="link">Inicio</a>
                <a href="../index.html#nosotros" class="link">Sobre nosotros</a>
                <a href="../index.html#recetas" class="link">Recetas</a>
                <a href="registro.php" class="link">Registrate</a>
                <a href="login.php" class="link link--active">Login</a>
            </div>
        </div>
    </nav>

    <div style="display: flex; justify-content:center">
        <form action="verificacionLogin.php" method="post" class="formulario">
            <h1>Login</h1>
            <div class="contenedor">

                <div class="input-contenedor">
                    <i class='bx bx-envelope icon'></i>
                    <input type="email" name="txtCorreo" maxlength="60" placeholder="correo electronico" required>
                </div>

                <div class="input-contenedor">
                    <i class='bx bx-lock-alt icon'></i>
                    <input type="password" name="txtContra" minlength="6" maxlength="10" placeholder="contraseña" required>
                </div>
                <?php
                if (isset($_GET['Error']))
                    echo $_GET['Error'];
                ?>

                <input type="submit" value="Iniciar sesión" class="button">

                <p style="padding-top:50px">Al registrarte, aceptas las condiciones de uso y privacidad.</p>
                <p>¿No tienes cuenta? <a href="registro.php" style="color: #f88502;" class="link"><b>Registrate</b></a></p>
            </div>
        </form>
    </div>
</body>

<footer style="background-color: #000000; padding:30px;">
    <div class="contact" id="contacto">
        <div class="item_contact">
            <h3 class="contact_title">Nutri Help <i style="vertical-align:top" class='bx bx-registered'></i></h3>
            <h3 class="contact_title">Contacto: mireyaivette19@gmail.com <i class='bx bxs-message-dots' style='color:#ffffff'></i></h3>
        </div>
    </div>
</footer>

</html>