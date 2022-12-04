<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/formulario.css">
    <link rel="stylesheet" href="../css/muestraInformacion.css">
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
                <a href="indexNutriologos.php" class="link">Inicio</a>
                <a href="recetas.php" class="link">Recetas</a>
                <a href="infoPerfilNutriologo.php" class="link link--active">Perfil</a>
                <a href="dietas.php" class="link">Dietas</a>
                <a href="../php/salir.php" class="link">Salir</a>
            </div>
        </div>
    </nav>


    <section class="container hero_main" style="margin-top:50px; padding-bottom:0px; margin-bottom:50px; border-radius:20px; width:80%; background:#fff; display:flex; justify-content:center; flex-direction:column;">
        <div style="text-align:center;">
            <h1 style="padding-bottom: 30px;">Mi Perfil</h1>
            <img src="../<?php echo $_SESSION['Foto'] ?>" width="200px" height="200px" style="border-radius: 50%">
        </div>

        <div style="font-size:20px; display:flex; flex-direction:column; padding-top:10px; padding-bottom:30px; align-items:center;">
            <div style="display:flex; flex-direction:column; align-items:flex-start; padding:10px;">
                <p style="text-align:left;"><i class='bx bxs-envelope icon'></i><?php echo $_SESSION['Email'] ?></p>
                <p style="text-align:left;"><i class='bx bxs-user icon'></i><?php echo $_SESSION['Nombre'] . ' ' . $_SESSION['ApellidoP'] . ' ' . $_SESSION['ApellidoM'] ?></p>
                <p style="text-align:left;"><i class='bx bxs-calendar icon'></i><?php echo $_SESSION['FechaNacimiento'] ?></p>
                <p style="text-align:left;"><i class='bx bxs-certification icon'></i><?php echo $_SESSION['Cedula'] ?></p>

                <div style="padding:10px; display:flex; width:100%; padding-left:0px; padding-right:0px; justify-content: space-around;">
                    <input type="button" value="Modificar" class="button" style="font-size: 15px; padding: 10px 20px; width:45%; text-align:center" onclick="location.href='perfilModificar.php'">
                    <input type="button" value="Cambiar foto" class="button" style="font-size: 15px; padding: 10px 20px;  width:45%; text-align:center" onclick="location.href='cambiarFoto.php'">
                </div>
            </div>
        </div>

    </section>


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