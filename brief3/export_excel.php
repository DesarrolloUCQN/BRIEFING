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

// Consulta para obtener todos los datos
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
ORDER BY created_at DESC";

$stmt = sqlsrv_query($conn, $query);

if ($stmt === false) {
    die("Error en la consulta: " . print_r(sqlsrv_errors(), true));
}

// Configurar headers para descarga de Excel
$filename = 'Reporte_Briefings_' . date('Y-m-d_H-i-s') . '.xls';
header('Content-Type: application/vnd.ms-excel; charset=UTF-8');
header('Content-Disposition: attachment; filename="' . $filename . '"');
header('Cache-Control: max-age=0');

// Comenzar la salida del archivo Excel
echo "\xEF\xBB\xBF"; // BOM para UTF-8

// Crear el encabezado de la tabla
echo '<table border="1">';
echo '<thead>';
echo '<tr style="background-color: #F77171; color: white; font-weight: bold;">';
echo '<th>ID</th>';
echo '<th>Fecha de Creación</th>';
echo '<th>Turno</th>';
echo '<th>Área de Servicio</th>';
echo '<th>Quien Registra</th>';
echo '<th>Personal Nuevo</th>';
echo '<th>Obs. Personal Nuevo</th>';
echo '<th>Personal Enfermo</th>';
echo '<th>Obs. Personal Enfermo</th>';
echo '<th>Pendientes Ingreso</th>';
echo '<th>Obs. Pendientes Ingreso</th>';
echo '<th>Alergia Medicamentos</th>';
echo '<th>Obs. Alergia Medicamentos</th>';
echo '<th>Riesgo UPP</th>';
echo '<th>Obs. Riesgo UPP</th>';
echo '<th>Riesgo Caída</th>';
echo '<th>Obs. Riesgo Caída</th>';
echo '<th>Riesgo Fuga</th>';
echo '<th>Obs. Riesgo Fuga</th>';
echo '<th>Transfusiones</th>';
echo '<th>Obs. Transfusiones</th>';
echo '<th>Aislamiento</th>';
echo '<th>Obs. Aislamiento</th>';
echo '<th>Condición Riesgo</th>';
echo '<th>Obs. Condición Riesgo</th>';
echo '<th>Pendientes Administrativos</th>';
echo '<th>Obs. Pendientes Administrativos</th>';
echo '<th>Carro Paro</th>';
echo '<th>Obs. Carro Paro</th>';
echo '<th>Equipos Médicos</th>';
echo '<th>Obs. Equipos Médicos</th>';
echo '<th>Insumos</th>';
echo '<th>Obs. Insumos</th>';
echo '<th>Líder</th>';
echo '<th>Vía Aérea</th>';
echo '<th>Administración Medicamentos</th>';
echo '<th>Compresiones</th>';
echo '<th>Circulante</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

// Procesar y mostrar los datos
$rowCount = 0;
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $rowCount++;
    
    // Alternar colores de las filas
    $rowColor = ($rowCount % 2 == 0) ? '#DBEAFE' : '#FFFFFF';
    
    echo '<tr style="background-color: ' . $rowColor . ';">';
    echo '<td>' . htmlspecialchars($row['id'] ?? '') . '</td>';
    
    // Formatear la fecha
    $fecha = '';
    if ($row['created_at']) {
        if (is_object($row['created_at'])) {
            $fecha = $row['created_at']->format('Y-m-d H:i:s');
        } else {
            $fecha = $row['created_at'];
        }
    }
    echo '<td>' . htmlspecialchars($fecha) . '</td>';
    
    echo '<td>' . htmlspecialchars($row['turno'] ?? '') . '</td>';
    echo '<td>' . htmlspecialchars($row['area_servicio'] ?? '') . '</td>';
    echo '<td>' . htmlspecialchars($row['quien_registra'] ?? '') . '</td>';
    echo '<td>' . htmlspecialchars($row['personal1'] ?? '') . '</td>';
    echo '<td>' . htmlspecialchars($row['observacion1'] ?? '') . '</td>';
    echo '<td>' . htmlspecialchars($row['personal2'] ?? '') . '</td>';
    echo '<td>' . htmlspecialchars($row['observacion2'] ?? '') . '</td>';
    echo '<td>' . htmlspecialchars($row['personal3'] ?? '') . '</td>';
    echo '<td>' . htmlspecialchars($row['observacion3'] ?? '') . '</td>';
    echo '<td>' . htmlspecialchars($row['personal4'] ?? '') . '</td>';
    echo '<td>' . htmlspecialchars($row['observacion4'] ?? '') . '</td>';
    echo '<td>' . htmlspecialchars($row['personal5'] ?? '') . '</td>';
    echo '<td>' . htmlspecialchars($row['observacion5'] ?? '') . '</td>';
    echo '<td>' . htmlspecialchars($row['personal6'] ?? '') . '</td>';
    echo '<td>' . htmlspecialchars($row['observacion6'] ?? '') . '</td>';
    echo '<td>' . htmlspecialchars($row['personal7'] ?? '') . '</td>';
    echo '<td>' . htmlspecialchars($row['observacion7'] ?? '') . '</td>';
    echo '<td>' . htmlspecialchars($row['personal8'] ?? '') . '</td>';
    echo '<td>' . htmlspecialchars($row['observacion8'] ?? '') . '</td>';
    echo '<td>' . htmlspecialchars($row['personal9'] ?? '') . '</td>';
    echo '<td>' . htmlspecialchars($row['observacion9'] ?? '') . '</td>';
    echo '<td>' . htmlspecialchars($row['personal10'] ?? '') . '</td>';
    echo '<td>' . htmlspecialchars($row['observacion10'] ?? '') . '</td>';
    echo '<td>' . htmlspecialchars($row['personal11'] ?? '') . '</td>';
    echo '<td>' . htmlspecialchars($row['observacion11'] ?? '') . '</td>';
    echo '<td>' . htmlspecialchars($row['carro'] ?? '') . '</td>';
    echo '<td>' . htmlspecialchars($row['observacionescarro'] ?? '') . '</td>';
    echo '<td>' . htmlspecialchars($row['equipo'] ?? '') . '</td>';
    echo '<td>' . htmlspecialchars($row['observacionesequipo'] ?? '') . '</td>';
    echo '<td>' . htmlspecialchars($row['insumos'] ?? '') . '</td>';
    echo '<td>' . htmlspecialchars($row['observacionesinsumos'] ?? '') . '</td>';
    echo '<td>' . htmlspecialchars($row['lider'] ?? '') . '</td>';
    echo '<td>' . htmlspecialchars($row['via'] ?? '') . '</td>';
    echo '<td>' . htmlspecialchars($row['admin_medi'] ?? '') . '</td>';
    echo '<td>' . htmlspecialchars($row['compre'] ?? '') . '</td>';
    echo '<td>' . htmlspecialchars($row['circu'] ?? '') . '</td>';
    echo '</tr>';
}

// Cerrar la tabla
echo '</tbody>';
echo '</table>';

// Agregar información adicional al final
echo '<br><br>';
echo '<table border="1">';
echo '<tr style="background-color: #F77171; color: white; font-weight: bold;">';
echo '<td colspan="2">INFORMACIÓN DEL REPORTE</td>';
echo '</tr>';
echo '<tr>';
echo '<td><strong>Total de Registros:</strong></td>';
echo '<td>' . $rowCount . '</td>';
echo '</tr>';
echo '<tr>';
echo '<td><strong>Fecha de Generación:</strong></td>';
echo '<td>' . date('Y-m-d H:i:s') . '</td>';
echo '</tr>';
echo '<tr>';
echo '<td><strong>Sistema:</strong></td>';
echo '<td>Briefing UCQN - Unidad Cardioquirúrgica de Nariño</td>';
echo '</tr>';
echo '</table>';

// Cerrar la conexión
sqlsrv_close($conn);
exit;
?>