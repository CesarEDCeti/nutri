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

<script>
    function editar(id_receta) {
        window.location = "editarReceta.php?editarreceta=" + id_receta;
    }
</script>

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
                <a href="recetas.php" class="link link--active">Recetas</a>
                <a href="infoPerfilNutriologo.php" class="link">Perfil</a>
                <a href="dietas.php" class="link">Dietas</a>
                <a href="../php/salir.php" class="link">Salir</a>
            </div>
        </div>
    </nav>

    <div style="display:flex; justify-content:center; margin-bottom:210px;">
        <div class="formulario" style="border-radius:20px; width:80%; height:auto; background:#fff; display:flex; align-items:left; flex-direction:column;">
            <div style="padding:20px;">
                <div style="display:flex; width:100%; justify-content: space-between;">
                    <h1>Mis Recetas</h1>
                    <a href="formularioRecetas.php" class="link">Agregar Receta<i class='bx bx-add-to-queue icon'></i></a>                
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
                    $resultado = ConsultaRecetasPublicadas($connection, $_SESSION['ID']);
                    if (!$resultado) {
                        echo 'Error en la Consulta.' . mysqli_connect_error();
                    } else {
                        //Verificamos cuantas filas (row) trae la consulta 
                        $num_rows = mysqli_num_rows($resultado);
                        if ($num_rows == 0) {
                            //NUT será 0 Cuando no hay nut registrados
                            echo '<h2 style="padding:20px;">Aún no has publicado recetas.</h2>';
                        } else {
                            //Mostramos todos los registros de la consulta
                            while ($res = mysqli_fetch_array($resultado)) {
                                echo '<div style="padding:20px">
                                <div style="display:flex; width:100%; justify-content: space-between;">
                                    <h2 style="display:flex; justify-content:left;">' . $res["REC_Nombre"] . '</h2>
                                    <input type="button"  onclick="editar(' . $res["REC_ID"] . ');" value="Editar" class="button" style="font-size: 15px; padding: 5px 10px; width:auto; text-align:center">
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
                CloseConnection($connection); //Cierra la conexión activa ...

                if (isset($_GET['Error'])) {
                    echo '<div style= "padding: 15px;"><font color="red">';
                    echo $_GET['Error'];
                    echo '</font></div>';
                }
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