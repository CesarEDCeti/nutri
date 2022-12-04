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
        <form enctype="multipart/form-data" action="../php/actualizarDatosPaciente.php" method="POST" class="formulario">
            <h1>Mi Perfil</h1>
            <div class="contenedor">

                <?php
                include '../php/connection.php';

                echo '<h3>Modificar Datos</h3>
                <div class="input-contenedor">
                    <i class="bx bxs-user icon"></i>
                    <input type="text" name="txtNombre" maxlength="50" required
                    value="' . $_SESSION['Nombre'] . '"
                    >
                </div>

                <div class="input-contenedor">
                    <i class="bx bxs-user icon"></i>
                    <input type="text" name="txtApellidoPaterno"  maxlength="50" required
                    value="' . $_SESSION['ApellidoP'] . '"
                    >
                </div>

                <div class="input-contenedor">
                    <i class="bx bxs-user icon"></i>
                    <input type="text" name="txtApellidoMaterno" placeholder="Apellido Materno" maxlength="50" required
                    value="' . $_SESSION['ApellidoM'] . '"  
                    >
                </div>

                <h3>Fecha de nacimiento</h3>
                <div class="input-contenedor">
                    <i class="bx bxs-calendar icon"></i>
                    <input type="date" name="dateFechaNacimiento" min="1930-06-01" max="2004-06-01" required
                    value="' . $_SESSION['FechaNacimiento'] . '"  
                    >
                </div>
                

                <h3>Mi nutriolog@</h3>
                <div class="input-contenedor">
                    <i class="bx bxs-face icon"></i>';
                $connection = OpenConnection();
                // for testing connection
                if (!$connection) {
                    echo 'Error de conexion a la BD...' . mysqli_connect_error();
                    exit();
                } else {
                    $resultado = ConsultaNombresNutriologos($connection);
                    if (!$resultado) {
                        echo 'Error en la Consulta.' . mysqli_connect_error();
                    } else {
                        //Mostramos todos los registros de la consulta
                        echo '<select name="nutriologo" required>';
                        while ($res = mysqli_fetch_array($resultado)) {

                            if ($res["NUT_ID"] == $_SESSION['Nutriologo']) {
                                echo '<option value="' . $res["NUT_ID"] . '" selected>';
                                echo $res["NUT_Nombre"] . ' ' . $res["NUT_Apellido_paterno"] . ' '
                                    . $res["NUT_Apellido_materno"];
                                echo '</option>';
                            } else {
                                echo '<option value="' . $res["NUT_ID"] . '">';
                                echo $res["NUT_Nombre"] . ' ' . $res["NUT_Apellido_paterno"] . ' '
                                    . $res["NUT_Apellido_materno"];
                                echo '</option>';
                            }
                        }
                        echo '</select>';
                    }
                }
                CloseConnection($connection); //Cierra la conexión activa ...
                echo '</div>';

                if (isset($_GET['Error'])) {
                    echo '<div style= "padding: 15px;"><font color="red">';
                    echo $_GET['Error'];
                    echo '</font></div>';
                }
                ?>

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