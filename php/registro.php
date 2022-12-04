<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/formulario.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <title>Registrate</title>
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
                <a href="registro.php" class="link link--active">Registrate</a>
                <a href="login.php" class="link">Login</a>
            </div>
        </div>
    </nav>
    <div style="display: flex; justify-content:center">
        <form action="registrar.php" method="POST" class="formulario">
            <h1>Registrate</h1>
            <div class="contenedor">

                <div class="input-contenedor">
                    <i class='bx bx-envelope icon'></i>
                    <input type="email" name="eCorreo" maxlength="60" 
                    value="<?php if (isset($_GET['Correo'])) echo $_GET['Correo']; ?>" 
                    placeholder="correo electronico" required>
                </div>
                
                <?php
                    if (isset($_GET['Error']))
                        echo $_GET['Error'];
                ?>

                <div class="input-contenedor">
                    <i class='bx bx-lock-alt icon'></i>
                    <input type="password" name="pContrasenia" minlength="6" maxlength="10" placeholder="contraseña" required>
                </div>

                <div style="padding-bottom: 20px; width: 40%; font-size:19px; display:flex; 
                    flex-direction: row; justify-content:space-between">
                    <div><input type="radio" name="xTipo" value="paciente" required>Paciente</div>
                    <div><input type="radio" name="xTipo" value="nutriolog@">Nutriolog@</div>
                </div>

                <input type="submit" value="Registrate" class="button">

                <p style="padding-top:30px">Al registrarte, aceptas las condiciones de uso y privacidad.</p>
                <p>¿Ya tienes cuenta? 
                    <a href="login.php" style="color: #f88502;" class="link"><b>Iniciar Sesión</b></a>
                </p>
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