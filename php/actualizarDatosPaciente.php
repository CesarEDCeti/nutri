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
        //Tomamos las variables que viene del POST del formulario "perfilPaciente.php".
        $pNombre = $_POST['txtNombre'];
        $pApellidoPaterno = $_POST['txtApellidoPaterno'];
        $pApellidoMaterno = $_POST['txtApellidoMaterno'];
        $pFechaNacimiento = $_POST['dateFechaNacimiento'];
        $pNutriologo = $_POST['nutriologo'];

        $array=array($_SESSION['ID_Paciente'], $pNombre, $pApellidoPaterno, $pApellidoMaterno, $pFechaNacimiento, $pNutriologo);

        //INSERCCION DE DATOS
        $resultado = ActualizarInfoPaciente($connection, $array);

        if (!$resultado) {
            echo 'Error en la Consulta.' . mysqli_connect_error();
            //Podemos tambien redireccionarlo de nueva cuenta a la pagina de registro de Registro.
            echo "<script>alert('Error. Su registro no se pudo completa. Intentelo más tarde')</script>";
            header('Location: login.php');
        } else {
            echo 'Se realizó correctamente el registro.';
            
            //Refrescamos datos
            $_SESSION['Nombre'] = $pNombre;
            $_SESSION['ApellidoP'] = $pApellidoPaterno;
            $_SESSION['ApellidoM'] = $pApellidoMaterno;
            $_SESSION['FechaNacimiento'] = $pFechaNacimiento;
            $_SESSION['Nutriologo'] = $pNutriologo;

            //Una vez que se insertaron los datos en la tabla "login", cargamos la pagina: "login.php" 
            header('Location: ../pacientes/infoPerfilPaciente.php');
        }
    }

    CloseConnection($connection);
    ?>