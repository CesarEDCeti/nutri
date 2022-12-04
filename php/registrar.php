<?php

    //Realizamos la conexion a la BD: "login"
    include 'connection.php';
    $connection = OpenConnection();

    // for testing connection
    if(!$connection) {
        echo 'Error de conexion a la BD...'. mysqli_connect_error();
        exit();
    }
    else{
        
        //Tomamos las variables que viene del POST del registro "registrar.html".
        $iCorreo = $_POST['eCorreo'];
        $iPassw = MD5($_POST['pContrasenia']); //Se aplica la función MD5 a la contraseña.
        $iTipo = $_POST['xTipo'];

        //Verifica si ya existe un correo en la tabla login.
        
        $resultcorreo=ConsultaUsuario($connection, $iCorreo);
        //Verificamos cuantas filas (row) trae la consulta 
        $num_rows = mysqli_num_rows($resultcorreo);
        if ($num_rows>=1)
        {
            echo "<script>alert('Este correo ya existe.')</script>";
            header('Location: registro.php?Error=Este correo ya existe.&Correo='.$iCorreo);
        }
        else
        {

            //La función: "mysqli_query" ejecuta cualquier instrucción SQL en la BD correspondiente que se encuentre en la conexión especificada.
            //En este caso, la Consulta fue un INSERT-INTO
            $resultado=IngresarUsuario($connection, "'$iCorreo', '$iPassw', '$iTipo'");
            
            if (!$resultado)
            {
                echo 'Error en la Consulta.'.mysqli_connect_error();
                //Podemos tambien redireccionarlo de nueva cuenta a la pagina de registro de Registro.
                header('Location: registro.php');
            }
            else{
                echo 'Se realizó correctamente el registro.';
                //Una vez que se insertaron los datos en la tabla "login", cargamos la pagina: "login.php" 
                header('Location:login.php');
            }
            
        }
        CloseConnection($connection);
    }

?>