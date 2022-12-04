<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
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
                <a href="../php/alimentos.php" class="link link--active">Alimentos</a>
                <a href="../php/salir.php" class="link">Salir</a>
            </div>
        </div>
    </nav>

    <header class="hero" style="background-color: #AED6F1; padding-bottom:180px;" id="inicio">
        <section class="container hero_main" style="padding:40px; border-radius:20px; width:80%; background:#fff; display:flex; justify-content:center; flex-direction:column;">
            <div class="hero_textos">
                <div class="title title_active">
                    <h1>Alimentos</h1>
                </div>
                <h1 class='title'>Verduras</h1>
                <h1 class='title'>Frutas</h1>
                <h1 class='title'>Cereales sin grasa</h1>
                <h1 class='title'>Cereales con grasa</h1>
                <h1 class='title'>Leguminosas</h1>
                <h1 class='title'>Alimentos de origen animal muy bajo aporte de grasa</h1>
                <h1 class='title'>Alimentos de origen animal bajo aporte de grasa</h1>
                <h1 class='title'>Alimentos de origen animal moderado aporte de grasa</h1>
                <h1 class='title'>Alimentos de origen animal alto aporte de grasa</h1>
                <h1 class='title'>Leche descremada</h1>
                <h1 class='title'>Leche semidescremada</h1>
                <h1 class='title'>Leche entera</h1>
                <h1 class='title'>Leche con azúcar</h1>
                <h1 class='title'>Aceites y grasas</h1>
                <h1 class='title'>Aceites y grasas con proteína</h1>
                <h1 class='title'>Azúcares sin grasa</h1>
                <h1 class='title'>Azúcares con grasa</h1>
                <h1 class='title'>Bebidas alcohólicas</h1>
                <h1 class='title'>Libre</h1>
                <p style="margin-bottom: 10px;" class="copy_section">Ingredientes</p>
                <ul style="padding-left: 50px;" class="copy_section">
                    <li>2 berenjenas, lavadas y desinfectadas.
                    <li>2 tazas de agua, para desflemar.
                    <li>1/4 tazas de sal de grano, para desflemar.
                    <li>2 jitomates bola, lavados y desinfectados.
                    <li>3 calabazas, lavadas y desinfectadas.
                    <li>2 cucharadas de aceite de oliva.
                    <li>1 1/2 tazas de salsa de tomate, para pasta.
                    <li>2 cucharadas de albahaca, finamente picada.
                    <li>al gusto de sal.
                    <li>al gusto de pimienta.
                    <li>suficiente de albahaca, para decorar.
                </ul>

                <p style="margin-bottom: 10px;" class="copy_section">Preparación</p>
                <ul style="padding-left: 50px;" class="copy_section">
                    <li>Con ayuda de un cuchillo, corta la berenjena en rodajas de grosor mediano. Coloca las rodajas en un recipiente amplio, vierte el agua y la sal de grano.
                    <li>Deja reposar por 20 minutos. Durante este tiempo notarás que la berenjena comenzará a soltar un jugo de color obscuro; esta acción se conoce cómo desflemar y ayuda a que la consistencia del vegetal se vuelva más suave y su sabor se vuelva menos fuerte. Escurre, enjuaga y reserva.
                    <li>Corta el jitomate y la calabaza en rodajas de grosor mediano y reserva.
                    <li>Precalienta el horno a 180 °C.
                    <li>En un molde circular vierte y distribuye el aceite de oliva, la salsa de tomate preparada y la albahaca. Acomoda una rodaja de berenjena, una de tomate y una de calabaza una tras otra alternadamente hasta llenar el molde; comienza de afuera hacia adentro, esto ayudará a darle la forma deseada. Sazona con sal y pimienta.
                    <li>Hornea por 35 minutos, a 190 °C. La idea principal es dejar que la verdura comience a rostizarse.
                    <li>Decora con albahaca y disfruta.
                </ul>
                <div style="display: flex; padding-bottom:60px; justify-content:center;">
                    <img src="../images/receta1.jpg" />
                </div>
            </div>
        </section>
    </header>

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