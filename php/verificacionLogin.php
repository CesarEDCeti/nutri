<?php
    include 'connection.php';

    $connection = OpenConnection();
    
    session_start(); //Inicializa que puedas tener o crear sesiones de usuario.

    //Realizamos la conexion a la BD: "login"
    // for testing connection
    if(!$connection) {
        echo 'Error de conexion a la BD...'. mysqli_connect_error();
        exit();
    }
    else{
        
        //Tomamos las variables que viene del POST del formulario "login.php".
        $cCorreo = $_POST['txtCorreo'];
        $cPassw = MD5($_POST['txtContra']); //Se aplica la función MD5 a la contraseña.

        //La función: "mysqli_query" ejecuta cualquier instrucción SQL en la BD correspondiente que se encuentre en la conexión especificada.
        //En este caso, la Consulta fue un SELECT-FROM-WHERE
        $resultado = Login($connection,$cCorreo,$cPassw);

        if (!$resultado)
        {
            echo 'Error en la Consulta.'.mysqli_connect_error();
            //Podemos tambien redireccionarlo de nueva cuenta a la pagina de Formulario de "login.php".
            header('Location: login.php');
        }
        else{
            echo 'Se realizó correctamente la consulta.<br>';
            
            //Verificamos cuantas filas (row) trae la consulta 
            $num_rows = mysqli_num_rows($resultado);

            //Una vez que fue correcta la consulta y que existe el usuario en la tabla "login", 
            //cargamos la pagina: "menuresponsivo.html"
        
            if ($num_rows==0){ 
                echo "<script>alert('Correo o contraseña incorrectos.')</script>";
                header('Location: login.php?Error= Correo o contraseña incorrectos');
            }
            else
            {
                $row = mysqli_fetch_array($resultado);
                header(SaveLogin($connection, $row));
            }
            
        }
        
    }

    CloseConnection($connection);
?>