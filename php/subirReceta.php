<?php
    include 'connection.php';

    $connection = OpenConnection();
    session_start();

    if(!$connection) {
        echo 'Error de conexion a la BD...'. mysqli_connect_error();
        exit();
    }
    else{
        //Tomamos las variables que viene del POST del formulario "perfilPaciente.php".
        $rNombre = $_POST['txtNombre'];
        $rTiempo = $_POST['txtTiempo'];
        $rDescripcion = $_POST['txtDescripcion'];

        $pathFileImg = "imagesRecetas/";
        $nameFileImg = randomName().$rNombre.$rTiempo;

        $archivo = $_FILES['fileImagenReceta']['name'];

        //PROCESAMIENTO DE LA IMAGEN
        //Si el archivo contiene algo y es diferente de vacio
        if (isset($archivo) && $archivo != "") {
            //Obtenemos algunos datos necesarios sobre el archivo
            $tipo = $_FILES['fileImagenReceta']['type'];
            $tamano = $_FILES['fileImagenReceta']['size'];
            $temp = $_FILES['fileImagenReceta']['tmp_name'];
            echo $tipo;

            
            //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
            if (!((strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
                echo "<script>alert('Error. La extensión o el tamaño de los archivos no es correcta.\n- Se permiten archivos .jpg, .png. y de 100 kb como máximo.')</script>";
                header('Location: ../nutriologos/formularioRecetas.php?Error= Tamaño o formato incorrectos');
            }
            else {
                //Si la imagen es correcta en tamaño y tipo
                //Se intenta subir al servidor
                if(strpos($tipo, "jpeg")){
                    $tipo="jpeg";
                }else if (strpos($tipo, "jpg")){
                    $tipo="jpg";
                }else if (strpos($tipo, "png")){
                    $tipo="png";
                }

                $filename=$pathFileImg.$nameFileImg.".".$tipo;
                if (move_uploaded_file($temp, "../".$filename)) {
                    //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                    chmod("../".$filename, 0777);

                    //INSERCCION DE DATOS
                    $resultado = IngresarReceta($connection, $_SESSION['ID'].", '".$rNombre."', '".$rTiempo."', '".$rDescripcion."', '".$filename."'");

                    if (!$resultado)
                    {
                        echo 'Error en la Consulta.'.mysqli_connect_error();
                        //Podemos tambien redireccionarlo de nueva cuenta a la pagina de registro de Registro.
                        echo "<script>alert('Error. Su registro no se pudo completa. Intentelo más tarde')</script>";
                        header('Location: login.php');
                    }
                    else{
                        echo 'Se realizó correctamente el registro.'; 
                        header('Location: ../nutriologos/recetas.php');
                    }
                }
                else {
                    //Si no se ha podido subir la imagen, mostramos un mensaje de error
                    echo "<script>alert('Ocurrió algún error al subir el fichero. No pudo guardarse su información.\nVuelva a intentar')</script>";
                    header('Location: ../nutriologos/formularioRecetas.php?Error= Guardado de información fallido');
                }
            }
        }
        
    }

    CloseConnection($connection);
?>