<?php
// Establecer la conexión con la base de datos
$serverName = "PA-S1-DATA\\UCQNDATA";  
$connectionInfo = array(
    "Database" => "Brief",  
    "UID" => "sadumesm",        
    "PWD" => "Dumes100%",       
    "characterset" => "UTF-8"   
);
$conn = sqlsrv_connect($serverName, $connectionInfo);

// Verificar si la conexión fue exitosa
if (!$conn) {
    die(print_r(sqlsrv_errors(), true));
}

// Recibir los valores del formulario
$turno = $_POST['turno'];  // Ejemplo: "2025-02-25T10:48"
$area = $_POST['area'];
$quien = $_POST['quien-registra'];
$persona1 = $_POST['persona'];  // Cambié el nombre de la variable de persona a persona1 para mantener coherencia
$observaciones_persona1 = empty($_POST['observaciones-persona']) ? NULL : $_POST['observaciones-persona'];
$persona2 = $_POST['persona2'];
$observaciones_persona2 = empty($_POST['observaciones2']) ? NULL : $_POST['observaciones2'];
$persona3 = $_POST['persona3'];
$observaciones_persona3 = empty($_POST['observaciones3']) ? NULL : $_POST['observaciones3'];
$persona4 = $_POST['persona4'];
$observaciones_persona4 = empty($_POST['observaciones4']) ? NULL : $_POST['observaciones4'];
$persona5 = $_POST['persona5'];
$observaciones_persona5 = empty($_POST['observaciones5']) ? NULL : $_POST['observaciones5'];
$persona6 = $_POST['persona6'];
$observaciones_persona6 = empty($_POST['observaciones6']) ? NULL : $_POST['observaciones6'];
$persona7 = $_POST['persona7'];
$observaciones_persona7 = empty($_POST['observaciones7']) ? NULL : $_POST['observaciones7'];
$persona8 = $_POST['persona8'];
$observaciones_persona8 = empty($_POST['observaciones8']) ? NULL : $_POST['observaciones8'];
$persona9 = $_POST['persona9'];
$observaciones_persona9 = empty($_POST['observaciones9']) ? NULL : $_POST['observaciones9'];

// Recibir los valores de los nuevos campos
$persona10 = $_POST['persona10'];
$observaciones_persona10 = empty($_POST['observaciones10']) ? NULL : $_POST['observaciones10'];
$persona11 = $_POST['persona11'];
$observaciones_persona11 = empty($_POST['observaciones11']) ? NULL : $_POST['observaciones11'];

//module emm areaaa
$carro = $_POST['carro'];
$observaciones_carro = empty($_POST['observacionescarro']) ? NULL : $_POST['observacionescarro'];
$equipos = $_POST['equipos'];
$observaciones_equipo = empty($_POST['observacionesequipos']) ? NULL : $_POST['observacionesequipos'];
$insumos = $_POST['insumos'];
$observaciones_insumos = empty($_POST['observacionesinsumos']) ? NULL : $_POST['observacionesinsumos'];

//CODIGO AZULL-VERDEEEE
$lider = $_POST['lider'];
$via = $_POST['via-area'];
$admin = $_POST['admin-medicamentos'];
$compre = $_POST['compresiones'];
$circu = $_POST['circulante'];

// Consulta SQL
$sql = "INSERT INTO informe (turno, area_servicio, quien_registra, personal1, observacion1, personal2, observacion2, personal3, observacion3,
 personal4, observacion4, personal5, observacion5, personal6, observacion6, personal7, observacion7, personal8, observacion8, personal9,
  observacion9, personal10, observacion10, personal11, observacion11, carro, observacionescarro, equipo, observacionesequipo, insumos, 
  observacionesinsumos, lider, via, admin_medi, compre, circu) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

// Preparar los parámetros
$params = array(
    $turno, $area, $quien, 
    $persona1, $observaciones_persona1, 
    $persona2, $observaciones_persona2, 
    $persona3, $observaciones_persona3, 
    $persona4, $observaciones_persona4, 
    $persona5, $observaciones_persona5, 
    $persona6, $observaciones_persona6, 
    $persona7, $observaciones_persona7, 
    $persona8, $observaciones_persona8, 
    $persona9, $observaciones_persona9,
    $persona10, $observaciones_persona10,
    $persona11, $observaciones_persona11,
    $carro,    $observaciones_carro,
    $equipos,   $observaciones_equipo,
    $insumos,  $observaciones_insumos,
    $lider, $via, $admin, $compre, $circu
);

// Preparar y ejecutar la consulta
$stmt = sqlsrv_prepare($conn, $sql, $params);

// Ejecutar la consulta
if (sqlsrv_execute($stmt)) {
    // Si la consulta es exitosa, mostrar alerta y redirigir
    echo "<script type='text/javascript'>
            alert('Formulario enviado correctamente.');
            window.location.href = 'index.php';  // Cambia esta URL a la página de destino después del éxito
          </script>";
} else {
    // Si ocurre un error, mostrar alerta y permanecer en la misma página
    echo "<script type='text/javascript'>
            alert('Error al guardar los datos. " . addslashes(print_r(sqlsrv_errors(), true)) . "');
            window.location.href = 'pagina_de_error.php';  // Cambia esta URL a la página de error si es necesario
          </script>";
    die(print_r(sqlsrv_errors(), true)); // Opcional: para imprimir los errores en el servidor
}
?>
