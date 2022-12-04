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

    <div style="display: flex; justify-content:center">
        <form enctype="multipart/form-data" action="../php/modificarReceta.php" method="POST" class="formulario">
            <h1 style="padding-top:30px;">Editar receta</h1>
            <div class="contenedor">
                <?php
                    include '../php/connection.php';
                    $connection = OpenConnection();
                    $idReceta = $_GET['editarreceta'];

                    if (!$connection) {
                        echo 'Error de conexion a la BD...' . mysqli_connect_error();
                        exit();
                    } else {
                        $resultado = BuscarReceta($connection, $idReceta);
                        if (!$resultado) {
                            echo 'Error en la Consulta.' . mysqli_connect_error();
                        } else {
                            $res = mysqli_fetch_array($resultado);
                            echo '
                        <input type="text" name="txtID" required value="' . $res["REC_ID"] . '" hidden>
                        <h3 style="display:flex; justify-content:left;">Nombre de la receta</h3>
                        <div class="input-contenedor">
                            <i class="bx bxs-user icon"></i>
                            <input type="text" name="txtNombre" placeholder="Nombre" maxlength="50" required
                            value="' . $res["REC_Nombre"] . '">
                        </div>

                        <h3>Tiempo de preparación</h3>
                        <div class="input-contenedor">
                            <i class="bx bx-time-five icon"></i>
                            <input type="text" name="txtTiempo" placeholder="ej: 40 minutos" maxlength="15" required
                            value="' . $res["REC_Tiempo_preparacion"] . '">
                        </div>

                        <h3>Ingredientes y preparación</h3>
                        <div class="input-contenedor">
                            <div style="display: flex; flex-direction:row; ">
                                <i class="bx bx-file icon" style="padding-top: 16px;"></i>
                                <textarea name="txtDescripcion" autocapitalize="sentences" 
                                spellcheck="true" wrap="hard" rows="15" cols="123"  
                                placeholder="Ingredientes y pasos a seguir">'.$res["REC_Descripcion"].'</textarea>
                            </div>
                        </div>
                        <input type="submit" value="Guardar" class="button">';
                        }
                    }

                    CloseConnection($connection); //Cierra la conexión activa ...

                    echo '<div style="padding: 15px;">';
                    if (isset($_GET['Error'])) {
                        echo '<font color="red">';
                        echo $_GET['Error'];
                        echo '</font>';
                    }
                ?>
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