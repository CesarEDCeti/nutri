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
        <form action="../php/subirTiemposComida.php" method="POST" class="formulario">
            <h1 style="padding-top:30px;">Tiempos de comida y sus porciones</h1>
            <div class="contenedor">
                <input type="text" name="pacienteDieta" required value="<?php if (isset($_GET['pacienteDieta'])) { echo $_GET['pacienteDieta']; } ?>" hidden>
                <input type="text" name="fechaDieta" required value="<?php if (isset($_GET['fechaDieta'])) { echo $_GET['fechaDieta']; } ?>" hidden>
                
                <h2 style="display:flex; justify-content:left;">Desayuno</h2>
                <div style="display:flex; justify-content:left; width:100%; padding-left:30px;"><h3>Cereales sin grasa</h3></div>
                <div class="input-contenedor">
                    <i class='bx bx-list-check icon' ></i>
                    <input type="text" name="DESCerealesSinGrasa" placeholder="ej: 2 porciones" maxlength="20" required>
                </div>
                <div style="display:flex; justify-content:left; width:100%; padding-left:30px;"><h3>Cereales con grasa</h3></div>
                <div class="input-contenedor">
                    <i class='bx bx-list-check icon' ></i>
                    <input type="text" name="DESCerealesConGrasa" placeholder="ej: 2 porciones" maxlength="20" required>
                </div>
                <div style="display:flex; justify-content:left; width:100%; padding-left:30px;"><h3>Verduras</h3></div>
                <div class="input-contenedor">
                    <i class='bx bx-list-check icon' ></i>
                    <input type="text" name="DESVerduras" placeholder="ej: 2 porciones" maxlength="20" required>
                </div>
                <div style="display:flex; justify-content:left; width:100%; padding-left:30px;"><h3>Frutas</h3></div>
                <div class="input-contenedor">
                    <i class='bx bx-list-check icon' ></i>
                    <input type="text" name="DESFrutas" placeholder="ej: 2 porciones" maxlength="20" required>
                </div>
                <div style="display:flex; justify-content:left; width:100%; padding-left:30px;"><h3>Leguminosas</h3></div>
                <div class="input-contenedor">
                    <i class='bx bx-list-check icon' ></i>
                    <input type="text" name="DESLeguminosas" placeholder="ej: 2 porciones" maxlength="20" required>
                </div>
                <div style="display:flex; justify-content:left; width:100%; padding-left:30px;"><h3>Carne</h3></div>
                <div class="input-contenedor">
                    <i class='bx bx-list-check icon' ></i>
                    <input type="text" name="DESCarne" placeholder="ej: 2 porciones" maxlength="20" required>
                </div>
                <div style="display:flex; justify-content:left; width:100%; padding-left:30px;"><h3>Leche</h3></div>
                <div class="input-contenedor">
                    <i class='bx bx-list-check icon' ></i>
                    <input type="text" name="DESLeche" placeholder="ej: 2 porciones" maxlength="20" required>
                </div>
                <div style="display:flex; justify-content:left; width:100%; padding-left:30px;"><h3>Grasas</h3></div>
                <div class="input-contenedor">
                    <i class='bx bx-list-check icon' ></i>
                    <input type="text" name="DESGrasas" placeholder="ej: 2 porciones" maxlength="20" required>
                </div>
                <div style="display:flex; justify-content:left; width:100%; padding-left:30px;"><h3>Grasas con proteína</h3></div>
                <div class="input-contenedor">
                    <i class='bx bx-list-check icon' ></i>
                    <input type="text" name="DESGrasasConProteina" placeholder="ej: 2 porciones" maxlength="20" required>
                </div>


                <h2 style="display:flex; justify-content:left;">Colación Matutina</h2>
                <div style="display:flex; justify-content:left; width:100%; padding-left:30px;"><h3>Cereales sin grasa</h3></div>
                <div class="input-contenedor">
                    <i class='bx bx-list-check icon' ></i>
                    <input type="text" name="CMCerealesSinGrasa" placeholder="ej: 2 porciones" maxlength="20" required>
                </div>
                <div style="display:flex; justify-content:left; width:100%; padding-left:30px;"><h3>Cereales con grasa</h3></div>
                <div class="input-contenedor">
                    <i class='bx bx-list-check icon' ></i>
                    <input type="text" name="CMCerealesConGrasa" placeholder="ej: 2 porciones" maxlength="20" required>
                </div>
                <div style="display:flex; justify-content:left; width:100%; padding-left:30px;"><h3>Verduras</h3></div>
                <div class="input-contenedor">
                    <i class='bx bx-list-check icon' ></i>
                    <input type="text" name="CMVerduras" placeholder="ej: 2 porciones" maxlength="20" required>
                </div>
                <div style="display:flex; justify-content:left; width:100%; padding-left:30px;"><h3>Frutas</h3></div>
                <div class="input-contenedor">
                    <i class='bx bx-list-check icon' ></i>
                    <input type="text" name="CMFrutas" placeholder="ej: 2 porciones" maxlength="20" required>
                </div>
                <div style="display:flex; justify-content:left; width:100%; padding-left:30px;"><h3>Leguminosas</h3></div>
                <div class="input-contenedor">
                    <i class='bx bx-list-check icon' ></i>
                    <input type="text" name="CMLeguminosas" placeholder="ej: 2 porciones" maxlength="20" required>
                </div>
                <div style="display:flex; justify-content:left; width:100%; padding-left:30px;"><h3>Carne</h3></div>
                <div class="input-contenedor">
                    <i class='bx bx-list-check icon' ></i>
                    <input type="text" name="CMCarne" placeholder="ej: 2 porciones" maxlength="20" required>
                </div>
                <div style="display:flex; justify-content:left; width:100%; padding-left:30px;"><h3>Leche</h3></div>
                <div class="input-contenedor">
                    <i class='bx bx-list-check icon' ></i>
                    <input type="text" name="CMLeche" placeholder="ej: 2 porciones" maxlength="20" required>
                </div>
                <div style="display:flex; justify-content:left; width:100%; padding-left:30px;"><h3>Grasas</h3></div>
                <div class="input-contenedor">
                    <i class='bx bx-list-check icon' ></i>
                    <input type="text" name="CMGrasas" placeholder="ej: 2 porciones" maxlength="20" required>
                </div>
                <div style="display:flex; justify-content:left; width:100%; padding-left:30px;"><h3>Grasas con proteína</h3></div>
                <div class="input-contenedor">
                    <i class='bx bx-list-check icon' ></i>
                    <input type="text" name="CMGrasasConProteina" placeholder="ej: 2 porciones" maxlength="20" required>
                </div>


                <h2 style="display:flex; justify-content:left;">Comida</h2>
                <div style="display:flex; justify-content:left; width:100%; padding-left:30px;"><h3>Cereales sin grasa</h3></div>
                <div class="input-contenedor">
                    <i class='bx bx-list-check icon' ></i>
                    <input type="text" name="COCerealesSinGrasa" placeholder="ej: 2 porciones" maxlength="20" required>
                </div>
                <div style="display:flex; justify-content:left; width:100%; padding-left:30px;"><h3>Cereales con grasa</h3></div>
                <div class="input-contenedor">
                    <i class='bx bx-list-check icon' ></i>
                    <input type="text" name="COCerealesConGrasa" placeholder="ej: 2 porciones" maxlength="20" required>
                </div>
                <div style="display:flex; justify-content:left; width:100%; padding-left:30px;"><h3>Verduras</h3></div>
                <div class="input-contenedor">
                    <i class='bx bx-list-check icon' ></i>
                    <input type="text" name="COVerduras" placeholder="ej: 2 porciones" maxlength="20" required>
                </div>
                <div style="display:flex; justify-content:left; width:100%; padding-left:30px;"><h3>Frutas</h3></div>
                <div class="input-contenedor">
                    <i class='bx bx-list-check icon' ></i>
                    <input type="text" name="COFrutas" placeholder="ej: 2 porciones" maxlength="20" required>
                </div>
                <div style="display:flex; justify-content:left; width:100%; padding-left:30px;"><h3>Leguminosas</h3></div>
                <div class="input-contenedor">
                    <i class='bx bx-list-check icon' ></i>
                    <input type="text" name="COLeguminosas" placeholder="ej: 2 porciones" maxlength="20" required>
                </div>
                <div style="display:flex; justify-content:left; width:100%; padding-left:30px;"><h3>Carne</h3></div>
                <div class="input-contenedor">
                    <i class='bx bx-list-check icon' ></i>
                    <input type="text" name="COCarne" placeholder="ej: 2 porciones" maxlength="20" required>
                </div>
                <div style="display:flex; justify-content:left; width:100%; padding-left:30px;"><h3>Leche</h3></div>
                <div class="input-contenedor">
                    <i class='bx bx-list-check icon' ></i>
                    <input type="text" name="COLeche" placeholder="ej: 2 porciones" maxlength="20" required>
                </div>
                <div style="display:flex; justify-content:left; width:100%; padding-left:30px;"><h3>Grasas</h3></div>
                <div class="input-contenedor">
                    <i class='bx bx-list-check icon' ></i>
                    <input type="text" name="COGrasas" placeholder="ej: 2 porciones" maxlength="20" required>
                </div>
                <div style="display:flex; justify-content:left; width:100%; padding-left:30px;"><h3>Grasas con proteína</h3></div>
                <div class="input-contenedor">
                    <i class='bx bx-list-check icon' ></i>
                    <input type="text" name="COGrasasConProteina" placeholder="ej: 2 porciones" maxlength="20" required>
                </div>

                
                <h2 style="display:flex; justify-content:left;">Colación Vespertina</h2>
                <div style="display:flex; justify-content:left; width:100%; padding-left:30px;"><h3>Cereales sin grasa</h3></div>
                <div class="input-contenedor">
                    <i class='bx bx-list-check icon' ></i>
                    <input type="text" name="CVCerealesSinGrasa" placeholder="ej: 2 porciones" maxlength="20" required>
                </div>
                <div style="display:flex; justify-content:left; width:100%; padding-left:30px;"><h3>Cereales con grasa</h3></div>
                <div class="input-contenedor">
                    <i class='bx bx-list-check icon' ></i>
                    <input type="text" name="CVCerealesConGrasa" placeholder="ej: 2 porciones" maxlength="20" required>
                </div>
                <div style="display:flex; justify-content:left; width:100%; padding-left:30px;"><h3>Verduras</h3></div>
                <div class="input-contenedor">
                    <i class='bx bx-list-check icon' ></i>
                    <input type="text" name="CVVerduras" placeholder="ej: 2 porciones" maxlength="20" required>
                </div>
                <div style="display:flex; justify-content:left; width:100%; padding-left:30px;"><h3>Frutas</h3></div>
                <div class="input-contenedor">
                    <i class='bx bx-list-check icon' ></i>
                    <input type="text" name="CVFrutas" placeholder="ej: 2 porciones" maxlength="20" required>
                </div>
                <div style="display:flex; justify-content:left; width:100%; padding-left:30px;"><h3>Leguminosas</h3></div>
                <div class="input-contenedor">
                    <i class='bx bx-list-check icon' ></i>
                    <input type="text" name="CVLeguminosas" placeholder="ej: 2 porciones" maxlength="20" required>
                </div>
                <div style="display:flex; justify-content:left; width:100%; padding-left:30px;"><h3>Carne</h3></div>
                <div class="input-contenedor">
                    <i class='bx bx-list-check icon' ></i>
                    <input type="text" name="CVCarne" placeholder="ej: 2 porciones" maxlength="20" required>
                </div>
                <div style="display:flex; justify-content:left; width:100%; padding-left:30px;"><h3>Leche</h3></div>
                <div class="input-contenedor">
                    <i class='bx bx-list-check icon' ></i>
                    <input type="text" name="CVLeche" placeholder="ej: 2 porciones" maxlength="20" required>
                </div>
                <div style="display:flex; justify-content:left; width:100%; padding-left:30px;"><h3>Grasas</h3></div>
                <div class="input-contenedor">
                    <i class='bx bx-list-check icon' ></i>
                    <input type="text" name="CVGrasas" placeholder="ej: 2 porciones" maxlength="20" required>
                </div>
                <div style="display:flex; justify-content:left; width:100%; padding-left:30px;"><h3>Grasas con proteína</h3></div>
                <div class="input-contenedor">
                    <i class='bx bx-list-check icon' ></i>
                    <input type="text" name="CVGrasasConProteina" placeholder="ej: 2 porciones" maxlength="20" required>
                </div>

                
                <h2 style="display:flex; justify-content:left;">Cena</h2>
                <div style="display:flex; justify-content:left; width:100%; padding-left:30px;"><h3>Cereales sin grasa</h3></div>
                <div class="input-contenedor">
                    <i class='bx bx-list-check icon' ></i>
                    <input type="text" name="CECerealesSinGrasa" placeholder="ej: 2 porciones" maxlength="20" required>
                </div>
                <div style="display:flex; justify-content:left; width:100%; padding-left:30px;"><h3>Cereales con grasa</h3></div>
                <div class="input-contenedor">
                    <i class='bx bx-list-check icon' ></i>
                    <input type="text" name="CECerealesConGrasa" placeholder="ej: 2 porciones" maxlength="20" required>
                </div>
                <div style="display:flex; justify-content:left; width:100%; padding-left:30px;"><h3>Verduras</h3></div>
                <div class="input-contenedor">
                    <i class='bx bx-list-check icon' ></i>
                    <input type="text" name="CEVerduras" placeholder="ej: 2 porciones" maxlength="20" required>
                </div>
                <div style="display:flex; justify-content:left; width:100%; padding-left:30px;"><h3>Frutas</h3></div>
                <div class="input-contenedor">
                    <i class='bx bx-list-check icon' ></i>
                    <input type="text" name="CEFrutas" placeholder="ej: 2 porciones" maxlength="20" required>
                </div>
                <div style="display:flex; justify-content:left; width:100%; padding-left:30px;"><h3>Leguminosas</h3></div>
                <div class="input-contenedor">
                    <i class='bx bx-list-check icon' ></i>
                    <input type="text" name="CELeguminosas" placeholder="ej: 2 porciones" maxlength="20" required>
                </div>
                <div style="display:flex; justify-content:left; width:100%; padding-left:30px;"><h3>Carne</h3></div>
                <div class="input-contenedor">
                    <i class='bx bx-list-check icon' ></i>
                    <input type="text" name="CECarne" placeholder="ej: 2 porciones" maxlength="20" required>
                </div>
                <div style="display:flex; justify-content:left; width:100%; padding-left:30px;"><h3>Leche</h3></div>
                <div class="input-contenedor">
                    <i class='bx bx-list-check icon' ></i>
                    <input type="text" name="CELeche" placeholder="ej: 2 porciones" maxlength="20" required>
                </div>
                <div style="display:flex; justify-content:left; width:100%; padding-left:30px;"><h3>Grasas</h3></div>
                <div class="input-contenedor">
                    <i class='bx bx-list-check icon' ></i>
                    <input type="text" name="CEGrasas" placeholder="ej: 2 porciones" maxlength="20" required>
                </div>
                <div style="display:flex; justify-content:left; width:100%; padding-left:30px;"><h3>Grasas con proteína</h3></div>
                <div class="input-contenedor">
                    <i class='bx bx-list-check icon' ></i>
                    <input type="text" name="CEGrasasConProteina" placeholder="ej: 2 porciones" maxlength="20" required>
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