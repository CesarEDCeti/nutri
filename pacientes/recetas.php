<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/formulario.css">
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
                <a href="recetas.php" class="link link--active">Recetas</a>
                <a href="infoPerfilPaciente.php" class="link">Perfil</a>
                <a href="misDietas.php" class="link">Mis Dietas</a>
                <a href="../php/salir.php" class="link">Salir</a>
            </div>
        </div>
    </nav>

    <div style="display:flex; justify-content:center; margin-bottom:210px;">
        <div class="formulario" style="border-radius:20px; width:80%; padding:0px 20px 20px; height:auto; background:#fff; display:flex; align-items:left; flex-direction:column;">
            <div style="padding:20px;">
                <div style="width:100%;">
                    <h1>Recetas publicadas por mi nutriolog@</h1>
                </div>
            </div>
            <?php
                include '../php/connection.php';
                $connection = OpenConnection();
                // for testing connection
                if (!$connection) {
                    echo 'Error de conexion a la BD...' . mysqli_connect_error();
                    exit();
                } else {
                    $resultado = ConsultaIDUsuariodeNutriologo($connection, $_SESSION['Nutriologo']);
                    if (!$resultado) {
                        echo 'Error en la Consulta.' . mysqli_connect_error();
                    } else {
                        $idNutriologo = mysqli_fetch_array($resultado);
                        $recetasNutriologo = ConsultaRecetasPublicadas($connection, $idNutriologo["NUT_Usuario"]);
                        if (!$recetasNutriologo) {
                            echo 'Error en la Consulta.' . mysqli_connect_error();
                        } else {
                            //Verificamos cuantas filas (row) trae la consulta 
                            $num_rows = mysqli_num_rows($recetasNutriologo);
                            if ($num_rows == 0) {
                            //NUT será 0 Cuando no hay nut registrados
                            echo '<h2 style="padding:20px;">Tu nutriolog@ aún no ha publicado recetas.</h2>';
                            } else {
                                //Mostramos todos los registros de la consulta
                                while ($res = mysqli_fetch_array($recetasNutriologo)) {
                                    echo '<div style="padding:20px">
                                    <div style="display:flex; width:100%; justify-content: space-between;">
                                        <h2 style="display:flex; justify-content:left;">' . $res["REC_Nombre"] . '</h2>
                                    </div>

                                    <div>
                                    <h3><i class="bx bx-time-five icon"></i>Tiempo de preparación: '
                                        . $res["REC_Tiempo_preparacion"] . '</h3>
                                    </div>
                                    <div>
                                    <h3><i class="bx bx-file icon"></i>Ingredientes y preparación</h3>
                                    </div>
                                    <div>
                                        <h4 style="padding-left:50px; padding-right:50px;">' . $res["REC_Descripcion"] . '</h4>
                                        <div style="text-align:center"><img src="../' . $res["REC_Imagen"] . '" width="500px" height="300px" 
                                        object-fit: cover; object-position: center center;></div>
                                    </div>
                                    </div>';
                                }
                            }
                        }
                    }
                }
                CloseConnection($connection); //Cierra la conexión activa ...
            ?>

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