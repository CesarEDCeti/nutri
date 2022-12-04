<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/formulario.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <title>Nutri Help</title>
</head>

<body>
    <nav class="nav_hero">
        <div class="container nav_container">
            <div class="logo">
                <h2 class="logo_name">
                    <div style="padding-right:20px; height: 50px; ">
                        <img src="../images/salud-y-nutricion1.jpg" width="50px" height="50px">
                    </div>Nutri Help
                </h2>

            </div>

            <div class="links">
                <a href="../php/salir.php" class="link link--active">Salir</a>
            </div>
        </div>
    </nav>

    <div style="display: flex; justify-content:center">
        <form enctype="multipart/form-data" action="../php/ingresarDatosNutriologo.php" method="POST" class="formulario">
            <h1>Mi Perfil</h1>
            <div class="contenedor">

                <h3>Datos</h3>
                <div class="input-contenedor">
                    <i class='bx bxs-user icon'></i>
                    <input type="text" name="txtNombre" placeholder="Nombre (s)" maxlength="50" required>
                </div>

                <div class="input-contenedor">
                    <i class='bx bxs-user icon'></i>
                    <input type="text" name="txtApellidoPaterno" placeholder="Apellido Paterno" maxlength="50" required>
                </div>

                <div class="input-contenedor">
                    <i class='bx bxs-user icon'></i>
                    <input type="text" name="txtApellidoMaterno" placeholder="Apellido Materno" maxlength="50" required>
                </div>

                <div class="input-contenedor">
                    <i class='bx bxs-certification icon'></i>
                    <input type="text" name="txtCedulaProfesional" placeholder="Cédula Profesional" minlength="8" maxlength="8" required>
                </div>

                <h3>Fecha de nacimiento</h3>
                <div class="input-contenedor">
                    <i class='bx bxs-calendar icon'></i>
                    <input type="date" name="dateFechaNacimiento" min="1930-06-01" max="2004-06-01" placeholder="Fecha de nacimiento" required>
                </div>

                <h3>Foto de perfil</h3>
                <div class="input-contenedor">
                    <i class='bx bxs-image-alt icon'></i>
                    <input type="file" name="fileImagenPerfil" required>
                </div>

                <div style="padding: 15px;">
                <?php
                if (isset($_GET['Error'])) {
                    echo '<font color="red">';
                    echo $_GET['Error'];
                    echo '</font>';
                }
                ?>
                </div>

                <input type="submit" value="Guardar" class="button">

            </div>
        </form>
    </div>


    <footer style="background-color: #000000; padding:30px;">
        <div class="contact" id="contacto">
            <div class="item_contact">
                <h3 class="contact_title">Nutri Help <i style="vertical-align:top" class='bx bx-registered'></i></h3>
                <h3 class="contact_title">Contacto: mireyaivette19@gmail.com <i class='bx bxs-message-dots' style='color:#ffffff'></i></h3>
            </div>

        </div>
    </footer>

</body>

</html>