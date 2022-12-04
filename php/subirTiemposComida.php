<?php
    include 'connection.php';

    $connection = OpenConnection();
    session_start();

    if (!$connection) {
        echo 'Error de conexion a la BD...' . mysqli_connect_error();
        exit();
    } else {
        //Tomamos las variables que viene del POST del formulario "perfilPaciente.php".
        $ID_PacienteDieta = $_POST['pacienteDieta'];
        $fechaDieta = $_POST['fechaDieta'];

        //DESAYUNO
        $DESCerealesSinGrasa = $_POST['DESCerealesSinGrasa'];
        $DESCerealesConGrasa = $_POST['DESCerealesConGrasa'];
        $DESVerduras = $_POST['DESVerduras'];
        $DESFrutas = $_POST['DESFrutas'];
        $DESLeguminosas = $_POST['DESLeguminosas'];
        $DESCarne = $_POST['DESCarne'];
        $DESLeche = $_POST['DESLeche'];
        $DESGrasas = $_POST['DESGrasas'];
        $DESGrasasConProteina = $_POST['DESGrasasConProteina'];

        //COLACION MATUTINA
        $CMCerealesSinGrasa = $_POST['CMCerealesSinGrasa'];
        $CMCerealesConGrasa = $_POST['CMCerealesConGrasa'];
        $CMVerduras = $_POST['CMVerduras'];
        $CMFrutas = $_POST['CMFrutas'];
        $CMLeguminosas = $_POST['CMLeguminosas'];
        $CMCarne = $_POST['CMCarne'];
        $CMLeche = $_POST['CMLeche'];
        $CMGrasas = $_POST['CMGrasas'];
        $CMGrasasConProteina = $_POST['CMGrasasConProteina'];

        //COMIDA
        $COCerealesSinGrasa = $_POST['COCerealesSinGrasa'];
        $COCerealesConGrasa = $_POST['COCerealesConGrasa'];
        $COVerduras = $_POST['COVerduras'];
        $COFrutas = $_POST['COFrutas'];
        $COLeguminosas = $_POST['COLeguminosas'];
        $COCarne = $_POST['COCarne'];
        $COLeche = $_POST['COLeche'];
        $COGrasas = $_POST['COGrasas'];
        $COGrasasConProteina = $_POST['COGrasasConProteina'];

        //COLACION VESPERTINA
        $CVCerealesSinGrasa = $_POST['CVCerealesSinGrasa'];
        $CVCerealesConGrasa = $_POST['CVCerealesConGrasa'];
        $CVVerduras = $_POST['CVVerduras'];
        $CVFrutas = $_POST['CVFrutas'];
        $CVLeguminosas = $_POST['CVLeguminosas'];
        $CVCarne = $_POST['CVCarne'];
        $CVLeche = $_POST['CVLeche'];
        $CVGrasas = $_POST['CVGrasas'];
        $CVGrasasConProteina = $_POST['CVGrasasConProteina'];

        //CENA
        $CECerealesSinGrasa = $_POST['CECerealesSinGrasa'];
        $CECerealesConGrasa = $_POST['CECerealesConGrasa'];
        $CEVerduras = $_POST['CEVerduras'];
        $CEFrutas = $_POST['CEFrutas'];
        $CELeguminosas = $_POST['CELeguminosas'];
        $CECarne = $_POST['CECarne'];
        $CELeche = $_POST['CELeche'];
        $CEGrasas = $_POST['CEGrasas'];
        $CEGrasasConProteina = $_POST['CEGrasasConProteina'];

        //BUSQUEDA DE ID DE DIETA

        $array = array($ID_PacienteDieta, $fechaDieta, $_SESSION['ID_Nutriologo']);
        $idDieta = BuscarIDdeDieta($connection, $array);

        
        if (!$idDieta) {
            echo 'Error en la Consulta.' . mysqli_connect_error();
            //Podemos tambien redireccionarlo de nueva cuenta a la pagina de registro de Registro.
            echo "<script>alert('Error. Su registro no se pudo completa. Intentelo más tarde')</script>";
            header('Location: login.php');
        } else {
            
            $num_rows = mysqli_num_rows($idDieta);
            if ($num_rows==0){ 
                echo "<script>alert('Error. Su registro no se pudo completa. Intentelo más tarde')</script>";
                header('Location: login.php');
            }
            else
            {
                //INSERCCION DE DATOS
                $row = mysqli_fetch_array($idDieta);

                $resultadoDES = IngresarTiempoComida($connection, $row['DIETA_ID'].", 'Desayuno', '".$DESCerealesSinGrasa. "', '"
                .$DESCerealesConGrasa."', '".$DESVerduras."', '".$DESFrutas."', '".$DESLeguminosas."', '".$DESCarne."', '"
                .$DESLeche."', '".$DESGrasas."', '".$DESGrasasConProteina."'");

                $resultadoCM = IngresarTiempoComida($connection, $row['DIETA_ID'].", 'Colación Matutina', '".$CMCerealesSinGrasa. "', '"
                .$CMCerealesConGrasa."', '".$CMVerduras."', '".$CMFrutas."', '".$CMLeguminosas."', '".$CMCarne."', '"
                .$CMLeche."', '".$CMGrasas."', '".$CMGrasasConProteina."'");

                $resultadoCO = IngresarTiempoComida($connection, $row['DIETA_ID'].", 'Comida', '".$COCerealesSinGrasa. "', '"
                .$COCerealesConGrasa."', '".$COVerduras."', '".$COFrutas."', '".$COLeguminosas."', '".$COCarne."', '"
                .$COLeche."', '".$COGrasas."', '".$COGrasasConProteina."'");

                $resultadoCV = IngresarTiempoComida($connection, $row['DIETA_ID'].", 'Colación Vespertina', '".$CVCerealesSinGrasa. "', '"
                .$CVCerealesConGrasa."', '".$CVVerduras."', '".$CVFrutas."', '".$CVLeguminosas."', '".$CVCarne."', '"
                .$CVLeche."', '".$CVGrasas."', '".$CVGrasasConProteina."'");

                $resultadoCE = IngresarTiempoComida($connection, $row['DIETA_ID'].", 'Cena', '".$CECerealesSinGrasa. "', '"
                .$CECerealesConGrasa."', '".$CEVerduras."', '".$CEFrutas."', '".$CELeguminosas."', '".$CECarne."', '"
                .$CELeche."', '".$CEGrasas."', '".$CEGrasasConProteina."'");

                if (!$resultadoDES||!$resultadoCM||!$resultadoCO||!$resultadoCV||!$resultadoCE) {
                    echo 'Error en la Consulta.' . mysqli_connect_error();
                    //Podemos tambien redireccionarlo de nueva cuenta a la pagina de registro de Registro.
                    echo "<script>alert('Error. Su registro no se pudo completar. Intentelo más tarde')</script>";
                    header('Location: ../php/login.php');
                } else {
                    echo 'Se realizó correctamente el registro.';
                    header('Location: ../nutriologos/dietas.php');
                }
            }
        }
    }

    CloseConnection($connection);
?>