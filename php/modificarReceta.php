<?php
    include 'connection.php';

    $connection = OpenConnection();
    session_start();

    if (!$connection) {
        echo 'Error de conexion a la BD...' . mysqli_connect_error();
        exit();
    } else {
        //Tomamos las variables que viene del POST del formulario "perfilPaciente.php".
        $rID = $_POST["txtID"];
        $rNombre = $_POST['txtNombre'];
        $rTiempo = $_POST['txtTiempo'];
        $rDescripcion = $_POST['txtDescripcion'];

        $array=array($rID, $rNombre, $rTiempo, $rDescripcion);

        //INSERCCION DE DATOS
        $resultado = ModificarReceta($connection, $array);

        if (!$resultado) {
            echo 'Error en la Consulta.' . mysqli_connect_error();
            //Podemos tambien redireccionarlo de nueva cuenta a la pagina de registro de Registro.
            echo "<script>alert('Error. Su registro no se pudo completar. Intentelo más tarde')</script>";
            header('Location: login.php');
        } else {
            echo 'Se realizó correctamente el registro.';
            header('Location: ../nutriologos/recetas.php');
        }
    }

    CloseConnection($connection);
?>