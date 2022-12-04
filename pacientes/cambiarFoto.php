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
                <a href="indexPacientes.php" class="link">Inicio</a>
                <a href="recetas.php" class="link">Recetas</a>
                <a href="infoPerfilPaciente.php" class="link link--active">Perfil</a>
                <a href="misDietas.php" class="link">Mis Dietas</a>
                <a href="../php/salir.php" class="link">Salir</a>
            </div>
        </div>
    </nav>

    <div style="display: flex; justify-content:center">
        <form enctype="multipart/form-data" action="../php/actualizarFoto.php" method="POST" class="formulario">
            <div class="contenedor">
                <h2>Actualizar foto de perfil</h2>
                <div style="text-align:center; padding: 30px;">
                    <h3 style="padding-bottom: 30px;">Foto de perfil actual</h3>
                    <img src="../<?php echo $_SESSION['Foto'] ?>" width="200px" height="200px" style="border-radius: 50%">
                </div>
               <?php 
                    if (isset($_GET['Error'])){
                        echo '<div style= "padding: 15px;"><font color="red">';
                        echo $_GET['Error'];
                        echo '</font></div>';
                    }
                ?>
                <h3 style="padding-bottom: 30px;">Ingresar nueva foto</h3>
                <div class="input-contenedor">
                    <i class="bx bxs-image-alt icon"></i>
                    <input type="file" name="fileImagenPerfil" required>
                </div style="padding-bottom: 30px;">

                <div class="input-contenedor" style="border: none;">
                    <input type="submit" value="Guardar" class="button" style="width:100%;">
                </div>
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