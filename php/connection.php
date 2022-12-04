<?php

    function OpenConnection(){
        $dbhost = "sql102.epizy.com";
        $dbuser = "epiz_31885176";
        $dbpass = "qQUltMcvMZDzPE9";
        $db = "epiz_31885176_nutrihelp";
        /*$dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "root";
        $db = "nutrihelp";*/
        $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

        return $conn;
    }
    
    function CloseConnection($conn){
        $conn -> close();
    }

    //Metodos SELECT
    function ConsultaUsuario($conn, $iCorreo){
        $query = "SELECT LOG_Correo_electronico FROM login WHERE LOG_Correo_electronico='$iCorreo'";
        return mysqli_query($conn, $query);
    }

    function Login($conn, $correo, $pass){
        $query = "SELECT * FROM login WHERE LOG_Correo_electronico='$correo' AND LOG_Contrasenia='$pass'";
        return mysqli_query($conn, $query);
    }

    function ConsultaPaciente($conn, $idUsuario){
        $query = "SELECT * FROM pacientes WHERE PAC_Usuario='$idUsuario'";
        return mysqli_query($conn, $query);
    }

    function ConsultaNutriologo($conn, $idUsuario){
        $query = "SELECT * FROM nutriologos WHERE NUT_Usuario='$idUsuario'";
        return mysqli_query($conn, $query);
    }

    function ConsultaNombresNutriologos($conn){
        $query = "SELECT NUT_ID, NUT_Nombre, NUT_Apellido_paterno, NUT_Apellido_materno FROM nutriologos ORDER BY NUT_ID";
        return mysqli_query($conn, $query);
    }

    function ConsultaRecetasPublicadas($conn, $idUsuario){
        $query = "SELECT * FROM recetas WHERE REC_Publicado_por='$idUsuario'";
        return mysqli_query($conn, $query);
    }

    function BuscarReceta($conn, $idReceta){
        $query = "SELECT * FROM recetas WHERE REC_ID='$idReceta'";
        return mysqli_query($conn, $query);
    }

    function ConsultaNombresPacientes($conn, $idNutriologo){
        $query = "SELECT PAC_ID, PAC_Nombre, PAC_Apellido_paterno, PAC_Apellido_materno FROM pacientes 
        WHERE PAC_Nutriologo='$idNutriologo' ORDER BY PAC_ID";
        return mysqli_query($conn, $query);
    }

    function NombrePacienteDieta($conn, $idPaciente){
        $query = "SELECT PAC_Nombre, PAC_Apellido_paterno, PAC_Apellido_materno FROM pacientes 
        WHERE PAC_ID='$idPaciente' ORDER BY PAC_Nombre";
        return mysqli_query($conn, $query);
    }

    function NombreNutriologoDieta($conn, $idNutriologo){
        $query = "SELECT NUT_Nombre, NUT_Apellido_paterno, NUT_Apellido_materno FROM nutriologos 
        WHERE NUT_ID='$idNutriologo' ORDER BY NUT_Nombre";
        return mysqli_query($conn, $query);
    }

    function BuscarIDdeDieta($conn, $arrayData){
        $query = "SELECT DIETA_ID FROM dieta WHERE DIETA_Paciente= '".$arrayData[0]."' AND
        DIETA_Fecha ='".$arrayData[1]."' AND DIETA_Nutriologo ='".$arrayData[2]."'";
        return mysqli_query($conn, $query);
    }

    function ConsultaDietasAsignadas($conn, $idNutriologo){
        $query = "SELECT DIETA_ID, DIETA_Paciente, DIETA_Fecha, DIETA_PDF, DIETA_Notas FROM dieta 
        WHERE DIETA_Nutriologo=".$idNutriologo." ORDER BY DIETA_ID";
        return mysqli_query($conn, $query);
    }

    function ConsultaTiempoComida($conn, $idDieta, $tiempo){
        $query = "SELECT TC_ID, TC_Cereales_sg, TC_Cereales_cg, TC_Verduras, TC_Frutas, TC_Leguminosas, TC_Carne, TC_Leche, TC_Grasas, TC_Grasas_con_proteina FROM tiempo_comida 
        WHERE TC_Dieta=".$idDieta." AND TC_Tiempo='".$tiempo."' ORDER BY TC_ID";
        return mysqli_query($conn, $query);
    }

    function ConsultaIDUsuariodeNutriologo($conn, $idNutriologo){
        $query = "SELECT NUT_Usuario FROM nutriologos WHERE NUT_ID='".$idNutriologo."'";
        return mysqli_query($conn, $query);
    }

    function ConsultaMisDietas($conn, $idPaciente){
        $query = "SELECT DIETA_ID, DIETA_Fecha,DIETA_Nutriologo, DIETA_PDF, DIETA_Notas FROM dieta 
        WHERE  DIETA_Paciente=".$idPaciente." ORDER BY DIETA_ID";
        return mysqli_query($conn, $query);
    }
    

    //Metodos INSERT
    function IngresarUsuario($conn,$data){
        $query = "INSERT INTO login(LOG_Correo_electronico, LOG_Contrasenia, LOG_Tipo_usuario) VALUES(".$data.")";
        return mysqli_query($conn, $query);
    }

    function IngresarPaciente($conn,$data){
        $query = "INSERT INTO pacientes(PAC_Usuario, PAC_Nombre, PAC_Apellido_paterno, PAC_Apellido_materno, PAC_Fecha_de_nacimiento, ".
        "PAC_Foto, PAC_Nutriologo) VALUES(".$data.")";
        return mysqli_query($conn, $query);
    }

    function IngresarNutriologo($conn,$data){
        $query = "INSERT INTO nutriologos(NUT_Usuario, NUT_Cedula_profesional, NUT_Nombre, NUT_Apellido_paterno, NUT_Apellido_materno, ".
        "NUT_Fecha_de_nacimiento, NUT_Foto) VALUES(".$data.")";
        return mysqli_query($conn, $query);
    }

    function IngresarReceta($conn,$data){
        $query = "INSERT INTO recetas(REC_Publicado_por, REC_Nombre, REC_Tiempo_preparacion, REC_Descripcion, REC_Imagen) VALUES(".$data.")";
        return mysqli_query($conn, $query);
    }

    function IngresarDieta($conn,$data){
        $query = "INSERT INTO dieta(DIETA_Paciente, DIETA_Fecha, DIETA_Nutriologo, DIETA_PDF, DIETA_Notas) VALUES(".$data.")";
        return mysqli_query($conn, $query);
    }

    function IngresarTiempoComida($conn,$data){
        $query = "INSERT INTO tiempo_comida(TC_Dieta, TC_Tiempo, TC_Cereales_sg, TC_Cereales_cg, TC_Verduras, TC_Frutas, TC_Leguminosas, TC_Carne, TC_Leche, TC_Grasas, TC_Grasas_con_proteina) VALUES(".$data.")";
        return mysqli_query($conn, $query);
    }
    
	

    //Metodos UPDATE
    function ActualizarInfoNutriologo($conn,$arrayData){
        $query = "UPDATE nutriologos SET NUT_Nombre='".$arrayData[1]."', NUT_Apellido_paterno='".$arrayData[2].
        "', NUT_Apellido_materno='".$arrayData[3]."', NUT_Fecha_de_nacimiento='".$arrayData[4].
        "' WHERE NUT_ID=".$arrayData[0];  
        return mysqli_query($conn, $query);
    }

    function ActualizarFotoNutriologo($conn,$id,$pathFoto){
        $query = "UPDATE nutriologos SET NUT_Foto=".$pathFoto." WHERE NUT_ID=".$id;
        return mysqli_query($conn, $query);
    }

    function ActualizarInfoPaciente($conn,$arrayData){
        $query = "UPDATE pacientes SET PAC_Nombre='".$arrayData[1]."', PAC_Apellido_paterno='".$arrayData[2].
        "', PAC_Apellido_materno='".$arrayData[3]."', PAC_Fecha_de_nacimiento='".$arrayData[4]."', PAC_Nutriologo=".$arrayData[5].
        " WHERE PAC_ID=".$arrayData[0];  
        return mysqli_query($conn, $query);
    }

    function ActualizarFotoPaciente($conn,$id,$pathFoto){
        $query = "UPDATE pacientes SET PAC_Foto='".$pathFoto."' WHERE PAC_ID=".$id;
        return mysqli_query($conn, $query);
    }

    function ModificarReceta($conn,$arrayData){
        $query = "UPDATE recetas SET REC_Nombre='".$arrayData[1]."', REC_Tiempo_preparacion='".$arrayData[2].
        "', REC_Descripcion='".$arrayData[3]."' WHERE REC_ID=".$arrayData[0];  
        return mysqli_query($conn, $query);
    }

    //SAVE FUNTIONS
    function SaveNutriologo($data){
        $_SESSION['ID_Nutriologo'] = $data['NUT_ID'];
        $_SESSION['Nombre'] = $data['NUT_Nombre'];
        $_SESSION['ApellidoP'] = $data['NUT_Apellido_paterno'];
        $_SESSION['ApellidoM'] = $data['NUT_Apellido_materno'];
        $_SESSION['FechaNacimiento'] = $data['NUT_Fecha_de_nacimiento'];
        $_SESSION['Foto'] = $data['NUT_Foto'];
        $_SESSION['Cedula'] = $data['NUT_Cedula_profesional'];
    }

    function SavePaciente($data){
        $_SESSION['ID_Paciente'] = $data['PAC_ID'];
        $_SESSION['Nombre'] = $data['PAC_Nombre'];
        $_SESSION['ApellidoP'] = $data['PAC_Apellido_paterno'];
        $_SESSION['ApellidoM'] = $data['PAC_Apellido_materno'];
        $_SESSION['FechaNacimiento'] = $data['PAC_Fecha_de_nacimiento'];
        $_SESSION['Foto'] = $data['PAC_Foto'];
        $_SESSION['Nutriologo'] = $data['PAC_Nutriologo'];
    } 

    function SaveLogin($conn, $data){
        $_SESSION['ID'] = $data['LOG_ID'];
        $_SESSION['Email'] = $data['LOG_Correo_electronico'];
        $_SESSION['Tipo'] = $data['LOG_Tipo_usuario'];
        if($_SESSION['Tipo']=='nutriolog@'){
            //Se genera la Sesión para el usuario y se manda llamar al index.php de la carpeta: admin
            $resultado = ConsultaNutriologo($conn, $data['LOG_ID']);
            if (!$resultado){
                echo 'Error en la Consulta.'.mysqli_connect_error();
                //Podemos tambien redireccionarlo de nueva cuenta a la pagina de Formulario de "login.php".
                header('Location: login.php');
            }
            else{
                //Verificamos cuantas filas (row) trae la consulta 
                $num_rows = mysqli_num_rows($resultado);
                if ($num_rows==0){ 
                    return'Location: ../nutriologos/perfilNutriologo.php';
                }
                else{
                    $row = mysqli_fetch_array($resultado);
                    SaveNutriologo($row);
                    return'Location: ../nutriologos/indexNutriologos.php';
                }
            }
        }
        else{
            $resultado = ConsultaPaciente($conn, $data['LOG_ID']);
            if (!$resultado){
                echo 'Error en la Consulta.'.mysqli_connect_error();
                return 'Location: login.php';
            }
            else{
                //Verificamos cuantas filas (row) trae la consulta 
                $num_rows = mysqli_num_rows($resultado);
                if ($num_rows==0){ 
                    return'Location: ../pacientes/perfilPaciente.php';
                }
                else{
                    $row = mysqli_fetch_array($resultado);
                    SavePaciente($row);
                    return'Location: ../pacientes/indexPacientes.php';
                }
            }
        }     
    }

    //Clear data session
    function CloseSession(){
        session_start(); //inicio session 
        session_unset(); //Libera todas las variables de session que esten activas
        session_destroy(); // Destruye la session 
    }


    function randomName(){
        $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijkmnopqrstuvwx yz234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz234567890";
        $cad = "";
        for($i=0;$i<20;$i++) {
            $cad .= substr($str,rand(0,120),1);
        }
        return $cad;
    }

?>