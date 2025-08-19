<?php
// Configuración de la conexión a la base de datos
$serverName = "PA-S1-DATA\\UCQNDATA";  
$connectionInfo = array(
    "Database" => "Brief",  
    "UID" => "sadumesm",        
    "PWD" => "Dumes100%",       
    "characterset" => "UTF-8"   
);
$conn = sqlsrv_connect($serverName, $connectionInfo);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Realizamos la consulta a la tabla "informe"
$query = "SELECT 
  id, created_at, turno, area_servicio, quien_registra, 
  personal1, observacion1, personal2, observacion2, 
  personal3, observacion3, personal4, observacion4, 
  personal5, observacion5, personal6, observacion6, 
  personal7, observacion7, personal8, observacion8, 
  personal9, observacion9, personal10, observacion10,
  personal11, observacion11, carro, observacionescarro, 
  equipo, observacionesequipo, insumos, observacionesinsumos, 
  lider, via, admin_medi, compre, circu
FROM informe
ORDER BY created_at DESC;
";
$stmt = sqlsrv_query($conn, $query);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Crear un array de los resultados
$results = [];
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    // Formatear la fecha si es necesario
    $row['created_at'] = $row['created_at']->format('Y-m-d H:i:s');
    $results[] = $row;
}

// Si no hay datos, devolver un mensaje
if (empty($results)) {
    $results[] = ["mensaje" => "Sin datos"];
}

// Retornar los resultados como JSON
header('Content-Type: application/json');
echo json_encode($results);

// Cerrar la conexión
sqlsrv_close($conn);
?>