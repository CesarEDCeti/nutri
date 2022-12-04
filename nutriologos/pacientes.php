<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/tabla.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <title>Nutri Help</title>
</head>

<script>
    function editar(id_login) {
        //alert("Seleccionaste el ID: "+id_login);
        window.location = "pacientes.php?editausuario=" + id_login;
    }
</script>

<script>
    function eliminar(id_login) {
        //alert("Seleccionaste el ID: "+id_login);
        window.location = "pacientes.php?eliminausuario=" + id_login;
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
                <a href="pacientes.php" class="link link--active">Pacientes</a>
                <a href="../php/salir.php" class="link">Salir</a>
            </div>
        </div>
    </nav>


    <section style="padding: 100px 0px; background-color: #BB8FCE; display:flex; justify-content: center">
        <div style="padding:20px 40px 70px; border-radius:20px; width:80%; background:#fff; display:flex; align-items:center; flex-direction:column;">
            <h3 class='title'>Mis pacientes</h3>

            <?php
                //Realizamos la conexion a la BD: "cursos"
                include 'connection.php';
                $connection = OpenConnection();
                // for testing connection
                if (!$connection) {
                    echo 'Error de conexion a la BD...' . mysqli_connect_error();
                    exit();
                } else {

                    if (isset($_GET['editausuario'])) {
                        //Aqui se muestra el formulario haciendo una consulta para extraer los datos ...
                        echo 'Editar usuario: ' . $_GET['editausuario'];
                        header('Location: edit.php?us=' . $_GET['editausuario']);
                    } else {
                        if (isset($_GET['eliminausuario'])) {
                            //Aqui se muestra el formulario haciendo una consulta para extraer los datos ...
                            echo 'Eliminar usuario: ' . $_GET['eliminausuario'];
                            header('Location: elimina.php?us=' . $_GET['eliminausuario']);
                        } else {
                            //Consultamos todos los registros de la tabla "login"
                            $query = "SELECT idLogin, nombre, correoElectronico, tipo FROM login ORDER BY idLogin";
                            $resultado = mysqli_query($connection, $query);

                            if (!$resultado) {
                                echo 'Error en la Consulta.' . mysqli_connect_error();
                            } else {
                                //Verificamos cuantas filas (row) trae la consulta 
                                $num_rows = mysqli_num_rows($resultado);

                                //Una vez que fue correcta la consulta y que existe el usuario en la tabla "login", cargamos la pagina: "menuresponsivo.html"

                                if ($num_rows == 0)
                                    echo "Se encontraron 0 registros.";
                                else {

                                    echo '<table style="width: 100%;">'; //Se crea la tabla 
                                    echo '<tr style="text-align: center;">'; //Crear una fila 
                                    echo '<th><h3 style="">Código de paciente</h3></th> 
                                    <th><h3>Nombre de paciente</h3></th> 
                                    <th><h3>Correo electronico</h3></th> 
                                    <th><h3>Tipo de Cuenta</h3></th>
                                    <th colspan="2"; align="center"; width:"200px";><h3>Configuraciones</h3></th> ';
                                    echo '</tr>'; //Se cierra la fila 

                                    //Mostramos todos los registros de la consulta 
                                    while ($row = mysqli_fetch_array($resultado)) {
                                        $cIdLog = $row['idLogin'];
                                        $cNombre = $row['nombre'];
                                        $cCorreo = $row['correoElectronico'];
                                        $cTipo = $row['tipo'];

                                        echo '<tr style="height:70px;">';
                                        echo '<td style="height: 70px; text-align:center;">' . $cIdLog . ' </td> 
                                            <td>' . $cNombre . ' </td> <td>' . $cCorreo . ' </td><td style="text-align: center;">' . $cTipo . ' </td>';
                                        echo '<td style="height: 70px; text-align:center; "> 
                                            <input type="button" onclick="editar(' . $cIdLog . ');" style="background: #82E0AA; width: 70px;font-family: Poppins; height: 22px;  cursor: pointer; border-radius: 5px;" value="Editar">
                                            <input type="button" onclick="eliminar(' . $cIdLog . ');" style="width:70px; background: #F1948A; font-family: Poppins; height: 22px; cursor: pointer; border-radius: 5px;" value="Eliminar"> </td>';
                                        echo '</tr>';
                                    }
                                    echo '</table>';

                                    CloseConnection($connection); //Cierra la conexión activa ...
                                }
                            }
                        }
                    }
                }
            ?>
        </div>
    </section>

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