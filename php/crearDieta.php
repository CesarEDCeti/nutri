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
        $dPaciente = $_POST['paciente'];
        $dFecha = $_POST['datetimeFecha'];
        $dNotas = $_POST['txtNotas'];
        
        $spl=str_split($dFecha);
        $dato = "";
        foreach ($spl as $valor) {
            if($valor!=":"){
                $dato=$dato.$valor;
            }else{
                $dato=$dato."_";
            }
        }
        $pathFilePdf = "pdfDietas/";
        
        $nameFilePdf = randomName().$_SESSION['ID_Nutriologo'].$dPaciente.$dato;

        $archivo = $_FILES['filePDFDieta']['name'];

        //PROCESAMIENTO DE LA IMAGEN
        //Si el archivo contiene algo y es diferente de vacio
        if (isset($archivo) && $archivo != "") {
            //Obtenemos algunos datos necesarios sobre el archivo
            $tipo = $_FILES['filePDFDieta']['type'];
            $tamano = $_FILES['filePDFDieta']['size'];
            $temp = $_FILES['filePDFDieta']['tmp_name'];

            
            //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
            if (!((strpos($tipo, "pdf")) && ($tamano < 5000000000))) {
                echo "<script>alert('Error. La extensión o el tamaño de los archivos no es correcta.\n- Se permiten pdf y de 5Mb como máximo.')</script>";
                header('Location: ../nutriologos/formularioCrearDieta.php?Error= Tamaño o formato incorrectos');
            }
            else {
                //Si la imagen es correcta en tamaño y tipo
                //Se intenta subir al servidor
                $tipo="pdf";

                $filename=$pathFilePdf.$nameFilePdf.".".$tipo;
                if (move_uploaded_file($temp, "../".$filename)) {
                    //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                    chmod("../".$filename, 0777);
                    echo $temp."   ".$filename;
                    //INSERCCION DE DATOS
                    $resultado = IngresarDieta($connection, $dPaciente.", '".$dFecha."', '".$_SESSION['ID_Nutriologo']."', '".$filename."', '".$dNotas."'");
                    
                    if (!$resultado)
                    {
                        echo 'Error en la Consulta.'.mysqli_connect_error();
                        //Podemos tambien redireccionarlo de nueva cuenta a la pagina de registro de Registro.
                        echo "<script>alert('Error. Su registro no se pudo completa. Intentelo más tarde')</script>";
                        header('Location: login.php');
                    }
                    else{
                        echo 'Se realizó correctamente el registro.'; 
                        header("Location: ../nutriologos/tiemposComida.php?pacienteDieta=".$dPaciente."&fechaDieta=".$dFecha);
                    }
                }
                else {
                    //Si no se ha podido subir la imagen, mostramos un mensaje de error
                    echo "<script>alert('Ocurrió algún error al subir el fichero. No pudo guardarse su información.\nVuelva a intentar')</script>";
                    header('Location: ../nutriologos/formularioCrearDieta.php?Error= Guardado de información fallido');
                }
            }
        }
        
    }

    CloseConnection($connection);
?>