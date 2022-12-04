<?php 
    session_start();

    //En caso de que no se encuentre informacion hacerca del nutriologo
    if(!isset($_SESSION["ID_Nutriologo"])){
        include '../php/connection.php';
        $connection = OpenConnection();
        // for testing connection
        if (!$connection) {
            echo 'Error de conexion a la BD...' . mysqli_connect_error();
            exit();
        } else {
            $resultado = ConsultaNutriologo($connection, $_SESSION['ID']);
            if (!$resultado){
                echo 'Error en la Consulta.'.mysqli_connect_error();
                //Podemos tambien redireccionarlo de nueva cuenta a la pagina de Formulario de "login.php".
                header('Location: login.php');
            }
            else{
                //Verificamos cuantas filas (row) trae la consulta 
                $num_rows = mysqli_num_rows($resultado);
                if ($num_rows==0){ 
                    //si no se encuentra información del paciente, lo dirigimos a que la ingrese
                    header('Location: ../nutriologos/perfilNutriologo.php');
                }
                else{
                    //se almacena la información encontrada en la session
                    $row = mysqli_fetch_array($resultado);
                    SaveNutriologo($row);
                }
            }
        }
        CloseConnection($connection); //Cierra la conexión activa ...
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <title>Nutri Help</title>
</head>

<body>
    <nav class="nav_hero">
        <div class="container nav_container">
            <div class="logo">
                <h2 class="logo_name">
                    <div style="padding-right:20px; height: 50px; "><img src="../images/salud-y-nutricion1.jpg" width="50px" height="50px"></div>Nutri Help
                </h2>

            </div>
            <div class="links">
                <a href="indexNutriologos.php" class="link link--active">Inicio</a>
                <a href="recetas.php" class="link">Recetas</a>
                <a href="infoPerfilNutriologo.php" class="link">Perfil</a>
                <a href="dietas.php" class="link">Dietas</a>
                <a href="../php/salir.php" class="link">Salir</a>
            </div>
        </div>
    </nav>

    <header class="hero" style="background-color:#F5B041;">
        <section class="container hero_main" style="border-radius:20px; width:80%; background:#fff; display:flex; justify-content:center; flex-direction:column;">
            <div class="hero_textos">
                <?php
                    if (!isset($_SESSION["ID"])) {
                        header('Location: ../index.html');
                    } else {
                        echo "<h1 class= 'title';>Bienvenido a Nutrihelp<i style='font-size: 30px; vertical-align:top' class='bx bx-registered'></i> nutriolog@<br>" .$_SESSION['Nombre']."</h1>";
                    }
                ?>
                <div class="title_active"><h1>Una plataforma en la cual puedes llevar el historial clinico de tus pacientes y más.</h1></div>
                <p class="copy">Lleva todo tu trabajo en digital, todos tus datos seguros y al alcance de un click.</p>
            </div>
        </section>
    </header>

    <footer style="background-color: #000000; padding:30px;">
        <div class="contact" id="contacto">
            <div class="item_contact">
                <h3 class="contact_title">Nutri Help <i style="vertical-align:top"class='bx bx-registered'></i></h3>
                <h3 class="contact_title">Contacto: mireyaivette19@gmail.com <i class='bx bxs-message-dots' style='color:#ffffff'></i></h3>
            </div>
            
        </div>
    </footer>

</body>

</html>