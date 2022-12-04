<?php
    include 'connection.php';

    $connection = OpenConnection();
    session_start();

    //Realizamos la conexion a la BD: "login"
    // for testing connection
    if (!$connection) {
        echo 'Error de conexion a la BD...' . mysqli_connect_error();
        exit();
    } else {
        //Tomamos las variables que viene del POST del formulario
        $nNombre = $_POST['txtNombre'];
        $nApellidoPaterno = $_POST['txtApellidoPaterno'];
        $nApellidoMaterno = $_POST['txtApellidoMaterno'];
        $nFechaNacimiento = $_POST['dateFechaNacimiento'];

        $array= array($_SESSION['ID_Nutriologo'], $nNombre, $nApellidoPaterno, $nApellidoMaterno, $nFechaNacimiento);


        //INSERCCION DE DATOS
        $resultado = ActualizarInfoNutriologo($connection, $array);

        if (!$resultado) {
            echo 'Error en la Consulta.' . mysqli_connect_error();
            //Podemos tambien redireccionarlo de nueva cuenta a la pagina de registro de Registro.
            echo "<script>alert('Error. Su registro no se pudo completa. Intentelo más tarde')</script>";
            header('Location: login.php');
        } else {
            echo 'Se realizó correctamente el registro.';

            //Refrescamos datos
            $_SESSION['Nombre'] = $nNombre;
            $_SESSION['ApellidoP'] = $nApellidoPaterno;
            $_SESSION['ApellidoM'] = $nApellidoMaterno;
            $_SESSION['FechaNacimiento'] = $nFechaNacimiento;
    
            header('Location: ../nutriologos/infoPerfilNutriologo.php');
        }
    }

    CloseConnection($connection);
?>