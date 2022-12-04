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

            </div>
        </div>
    </nav>

    <div style="display: flex; justify-content:center">
        <form enctype="multipart/form-data" action="../php/crearDieta.php" method="POST" class="formulario">
            <h1 style="padding-top:30px;">Dieta</h1>
            <div class="contenedor">

                <h3 style="display:flex; justify-content:left;">Paciente</h3>
                <div class="input-contenedor">
                    <i class='bx bxs-face icon'></i>
                    <?php
                    include '../php/connection.php';
                    $connection = OpenConnection();
                    // for testing connection
                    if (!$connection) {
                        echo 'Error de conexion a la BD...' . mysqli_connect_error();
                        exit();
                    } else {
                        $resultado = ConsultaNombresPacientes($connection, $_SESSION['ID_Nutriologo']);
                        if (!$resultado) {
                            echo 'Error en la Consulta.' . mysqli_connect_error();
                        } else {
                            //Verificamos cuantas filas (row) trae la consulta 
                            $num_rows = mysqli_num_rows($resultado);
                            if ($num_rows == 0) {
                                //NUT será 0 Cuando no hay nut registrados
                                echo '<h3>Aún no tienes pacientes para asignar dietas.</h3>';
                                header('Location: ../nutriologos/dietas.php?Error= No tienes pacientes');
                            } else {
                                //Mostramos todos los registros de la consulta
                                echo '<select name="paciente" required>';
                                while ($res = mysqli_fetch_array($resultado)) {
                                    echo '<option value="' . $res["PAC_ID"] . '">';
                                    echo $res["PAC_Nombre"] . ' ' . $res["PAC_Apellido_paterno"] . ' '
                                        . $res["PAC_Apellido_materno"];
                                    echo '</option>';
                                }
                                echo '</select>';
                            }
                        }
                    }
                    CloseConnection($connection); //Cierra la conexión activa ...
                    echo '</div>';
                    ?>

                    <h3>Fecha</h3>
                    <div class="input-contenedor">
                        <i class='bx bx-time-five icon'></i>
                        <input type="datetime-local" value="auto" name="datetimeFecha" required>
                    </div>

                    <h3>PDF o documentos</h3>
                    <div class="input-contenedor">
                        <i class='bx bxs-file-pdf icon'></i>
                        <input type="file" accept=".pdf" name="filePDFDieta" required>
                    </div>

                    <h3>Notas adicionales</h3>
                    <div class="input-contenedor">
                        <div style="display: flex; flex-direction:row; ">
                            <i class='bx bx-file icon' style="padding-top: 16px;"></i>
                            <textarea name="txtNotas" autocapitalize="sentences" required spellcheck="true" wrap="hard" rows="5" cols="123" placeholder="Notas extras"></textarea>
                        </div>
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

                    <input type="submit" value="Continuar" class="button">

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
