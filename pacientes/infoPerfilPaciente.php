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
                <a href="indexPacientes.php" class="link">Inicio</a>
                <a href="recetas.php" class="link">Recetas</a>
                <a href="infoPerfilPaciente.php" class="link link--active">Perfil</a>
                <a href="misDietas.php" class="link">Mis Dietas</a>
                <a href="../php/salir.php" class="link">Salir</a>
            </div>
        </div>
    </nav>


    <div class="contenedor">
        <div class="formulario">
            <div style="text-align:center; padding: 30px;">
                <h1 style="padding-bottom: 30px;">Mi Perfil</h1>
                <img src="../<?php echo $_SESSION['Foto'] ?>" width="200px" height="200px" style="border-radius: 50%">
            </div>

            <div style="font-size:20px; display:flex; flex-direction:column; padding-top:10px; padding-bottom:30px; align-items:center;">
                <div style="display:flex; flex-direction:column; align-items:flex-start; padding:10px;">
                    <p style="text-align:left;"><i class='bx bxs-envelope icon'></i><?php echo $_SESSION['Email'] ?></p>
                    <p style="text-align:left;"><i class='bx bxs-user icon'></i><?php echo $_SESSION['Nombre'] . ' ' . $_SESSION['ApellidoP'] . ' ' . $_SESSION['ApellidoM'] ?></p>
                    <p style="text-align:left;"><i class='bx bxs-calendar icon'></i><?php echo $_SESSION['FechaNacimiento'] ?></p>
                    <p style="text-align:left;"><i class='bx bxs-face icon'></i>
                        <?php
                        include '../php/connection.php';
                        $connection = OpenConnection();
                        $nutriologoQuery = "SELECT NUT_Nombre, NUT_Apellido_paterno, NUT_Apellido_materno FROM nutriologos WHERE NUT_ID = " . $_SESSION['Nutriologo'];
                        $resultadoNutriologo = mysqli_query($connection, $nutriologoQuery);

                        if ($resultadoNutriologo) {
                            $rowNutriologo = mysqli_fetch_array($resultadoNutriologo);
                            echo $rowNutriologo['NUT_Nombre'] . ' ' . $rowNutriologo['NUT_Apellido_paterno'] . ' ' . $rowNutriologo['NUT_Apellido_materno'];
                        } else {
                            echo 'Error en consulta de nutriologo';
                        }
                        ?>
                    </p>

                    <div style="padding:10px; display:flex; width:100%; padding-left:0px; padding-right:0px; justify-content: space-around;">
                        <input type="button" value="Modificar" class="button" style="font-size: 15px; padding: 10px 20px; width:45%; text-align:center;" onclick="location.href='perfilModificar.php'">
                        <input type="button" value="Cambiar foto" class="button" style="font-size: 15px; padding: 10px 20px;  width:45%; text-align:center;" onclick="location.href='cambiarFoto.php'">
                    </div>
                </div>
            </div>


        </div>
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