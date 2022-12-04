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
                <a href="indexPacientes.php" class="link">Inicio</a>
                <a href="recetas.php" class="link">Recetas</a>
                <a href="infoPerfilPaciente.php" class="link">Perfil</a>
                <a href="misDietas.php" class="link link--active">Dietas</a>
                <a href="../php/salir.php" class="link">Salir</a>
            </div>
        </div>
    </nav>

    <div style="display:flex; justify-content:center; margin-bottom: 205px;">
        <div class="formulario" style="border-radius:20px; width:80%; height:auto; background:#fff; display:flex; align-items:left; flex-direction:column;">
            <div style="padding:20px;">
                <div style="display:flex; width:100%; ">
                    <h1>Mis Planes alimenticios</h1>
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
                    $resultado = ConsultaMisDietas($connection, $_SESSION['ID_Paciente']);
                    if (!$resultado) {
                        echo 'Error en la Consulta.' . mysqli_connect_error();
                    } else {
                        //Verificamos cuantas filas (row) trae la consulta 
                        $num_rows = mysqli_num_rows($resultado);
                        if ($num_rows == 0) {
                            //NUT será 0 Cuando no hay nut registrados
                            echo'<div style="display:flex; justify-content:left; width:100%; padding:25px;"><h3>Aún no tienes dietas.</h3></div>';
                        } else {
                            //Mostramos todos los registros de la consulta
                            while ($res = mysqli_fetch_array($resultado)) {
                                $NutriDieta= NombreNutriologoDieta($connection, $res["DIETA_Nutriologo"]);
                                $nutriNombre = mysqli_fetch_array($NutriDieta);

                                $desayuno= ConsultaTiempoComida($connection, $res["DIETA_ID"], "Desayuno");
                                $de = mysqli_fetch_array($desayuno);

                                $coMatutina= ConsultaTiempoComida($connection, $res["DIETA_ID"], "Colación Matutina");
                                $cM = mysqli_fetch_array($coMatutina);

                                $comida= ConsultaTiempoComida($connection, $res["DIETA_ID"], "Comida");
                                $co = mysqli_fetch_array($comida);

                                $coVespertina= ConsultaTiempoComida($connection, $res["DIETA_ID"], "Colación Vespertina");
                                $cV = mysqli_fetch_array($coVespertina);

                                $cena= ConsultaTiempoComida($connection, $res["DIETA_ID"], "Cena");
                                $ce = mysqli_fetch_array($cena);

                                echo '<div style="padding:20px">
                                <div style="display:flex; width:100%; justify-content: space-between;">
                                    <h2 style="display:flex; justify-content:left;">Dieta asignada por: '.$nutriNombre["NUT_Nombre"].' '.$nutriNombre["NUT_Apellido_paterno"].' '.$nutriNombre["NUT_Apellido_materno"].'.</h2>
                                    <h2 style="display:flex; justify-content:left;">Fecha:'.$res["DIETA_Fecha"].'</h2>
                                </div>
                                
                                <div style="display:flex; width:100%;">
                                <h3><i class="bx bx-file icon"></i>PDF o archivo adicional: '.$res["DIETA_PDF"].'</h3>
                                </div>

                                <div style="display:flex; width:100%;">
                                <h3><i class="bx bx-note icon"></i>Notas: '.$res["DIETA_Notas"].'</h3>
                                </div>

                                
                                <div style="text-align:center; padding:20px;">
                                <table style="border: solid 1px; width:100%;">
                                <tr><td> </td><td>Desayuno</td><td>Colación Matutina</td><td>Comida</td><td>Colación Vespertina</td><td>Cena</td></tr>
                                <tr><td>Cereales sin grasa</td><td>'.$de["TC_Cereales_sg"].'</td><td>'.$cM["TC_Cereales_sg"].'</td><td>'.$co["TC_Cereales_sg"].'</td><td>'.$cV["TC_Cereales_sg"].'</td><td>'.$ce["TC_Cereales_sg"].'</td></tr>
                                <tr><td>Cereales con grasa</td><td>'.$de["TC_Cereales_cg"].'</td><td>'.$cM["TC_Cereales_cg"].'</td><td>'.$co["TC_Cereales_cg"].'</td><td>'.$cV["TC_Cereales_cg"].'</td><td>'.$ce["TC_Cereales_cg"].'</td></tr>
                                <tr><td>Verduras</td><td>'.$de["TC_Verduras"].'</td><td>'.$cM["TC_Verduras"].'</td><td>'.$co["TC_Verduras"].'</td><td>'.$cV["TC_Verduras"].'</td><td>'.$ce["TC_Verduras"].'</td></tr>
                                <tr><td>Frutas</td><td>'.$de["TC_Frutas"].'</td><td>'.$cM["TC_Frutas"].'</td><td>'.$co["TC_Frutas"].'</td><td>'.$cV["TC_Frutas"].'</td><td>'.$ce["TC_Frutas"].'</td></tr>
                                <tr><td>Leguminosas</td><td>'.$de["TC_Leguminosas"].'</td><td>'.$cM["TC_Leguminosas"].'</td><td>'.$co["TC_Leguminosas"].'</td><td>'.$cV["TC_Leguminosas"].'</td><td>'.$ce["TC_Leguminosas"].'</td></tr>
                                <tr><td>Carne</td><td>'.$de["TC_Carne"].'</td><td>'.$cM["TC_Carne"].'</td><td>'.$co["TC_Carne"].'</td><td>'.$cV["TC_Carne"].'</td><td>'.$ce["TC_Carne"].'</td></tr>
                                <tr><td>Leche</td><td>'.$de["TC_Leche"].'</td><td>'.$cM["TC_Leche"].'</td><td>'.$co["TC_Leche"].'</td><td>'.$cV["TC_Leche"].'</td><td>'.$ce["TC_Leche"].'</td></tr>
                                <tr><td>Grasas</td><td>'.$de["TC_Grasas"].'</td><td>'.$cM["TC_Grasas"].'</td><td>'.$co["TC_Grasas"].'</td><td>'.$cV["TC_Grasas"].'</td><td>'.$ce["TC_Grasas"].'</td></tr>
                                <tr><td>Grasas con proteína</td><td>'.$de["TC_Grasas_con_proteina"].'</td><td>'.$cM["TC_Grasas_con_proteina"].'</td><td>'.$co["TC_Grasas_con_proteina"].'</td><td>'.$cV["TC_Grasas_con_proteina"].'</td><td>'.$ce["TC_Grasas_con_proteina"].'</td></tr>
                                </table>
                                </div>

                                
                                <div>
                                    
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