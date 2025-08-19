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
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>REPORTE GENERAL</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Incluir jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Incluir DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <!-- Incluir DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <link rel="shortcut icon" href="icono.ico" type="image/x-icon">

    <style>
        :root {
            --primary-color: #e62e49;
            --secondary-color: #dff2fd;
            --gradient-bg: linear-gradient(135deg, #dff2fd 0%, #ceeafc 50%, #9bc5eb 100%);
            --dark-color: #1f3055;
            --light-blue: #a5d2f2;
            --accent-color: #1d1d1b;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--gradient-bg);
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }

        .main-header {
            background: linear-gradient(135deg, #e62e49, #dff2fd);
            color: white;
            padding: 20px 0;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .main-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent 40%, rgba(255, 255, 255, 0.1) 50%, transparent 60%);
            animation: shimmer 3s infinite;
        }

        @keyframes shimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        .main-header h1 {
            text-align: center;
            margin: 0;
            font-weight: 700;
            font-size: 2.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            position: relative;
            z-index: 2;
        }

        .logo-container {
            position: fixed;
            left: 10px;
            top: -15px;
            z-index: 1000;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            padding: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
        }

        .logo-container img {
            height: 199px;
            filter: drop-shadow(0 4px 8px rgba(0,0,0,0.1));
        }

        .datetime-display {
            position: fixed;
            right: 20px;
            top: 40px;
            background: rgba(255, 255, 255, 0.95);
            border: 2px solid #e62e49;
            border-radius: 15px;
            padding: 15px 20px;
            font-family: 'Courier New', monospace;
            font-size: 1.2rem;
            font-weight: bold;
            color: #333;
            box-shadow: 0 8px 25px rgba(230, 46, 73, 0.2);
            backdrop-filter: blur(10px);
        }

        .control-buttons {
            position: fixed;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1000;
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .button {
            background: linear-gradient(135deg, #e62e49, #d12448);
            color: white;
            cursor: pointer;
            border: none;
            border-radius: 12px;
            padding: 12px 24px;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(230, 46, 73, 0.3);
            display: flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .button:hover {
            color: white;
            transform: translateY(-2px);
            background: linear-gradient(135deg, #d12448, #c12040);
            box-shadow: 0 8px 25px rgba(230, 46, 73, 0.4);
            text-decoration: none;
        }

        .button:active {
            transform: translateY(0);
        }

        .table-container {
            margin: 40px auto;
            padding: 0 20px;
            max-width: 95%;
            margin-bottom: 140px; /* Espacio para 3 botones */
        }

        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            overflow: hidden;
        }

        .card-header {
            background: linear-gradient(135deg, #1f3055, #9bc5eb);
            color: white;
            font-weight: 700;
            text-align: center;
            border: none;
            padding: 20px;
        }

        .card-body {
            padding: 0;
        }

        /* Personalización de DataTables */
        #informeTable {
            width: 100% !important;
            border-collapse: separate;
            border-spacing: 0;
        }

        #informeTable thead th {
            background: linear-gradient(135deg, #1f3055, #1d1d1b) !important;
            color: white !important;
            font-weight: 600;
            text-align: center;
            border: none !important;
            padding: 12px 8px !important;
            font-size: 0.8rem;
            position: sticky;
            top: 0;
            z-index: 10;
            white-space: nowrap;
            min-width: 120px;
        }

        #informeTable tbody td {
            background-color: #ffffff;
            border: 1px solid #dff2fd;
            padding: 8px 6px;
            vertical-align: middle;
            font-size: 0.8rem;
            text-align: center;
            white-space: nowrap;
            max-width: 150px;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        #informeTable tbody tr:nth-child(even) td {
            background-color: #dff2fd;
        }

        #informeTable tbody tr:hover td {
            background-color: rgba(230, 46, 73, 0.1);
            transition: background-color 0.3s ease;
        }

        /* Personalización de controles de DataTables */
        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter,
        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_paginate {
            margin: 15px 0;
        }

        .dataTables_wrapper .dataTables_length select,
        .dataTables_wrapper .dataTables_filter input {
            border: 2px solid #dff2fd;
            border-radius: 8px;
            padding: 5px 10px;
            margin: 0 5px;
        }

        .dataTables_wrapper .dataTables_filter input:focus {
            border-color: #e62e49;
            outline: none;
            box-shadow: 0 0 0 0.2rem rgba(230, 46, 73, 0.25);
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            border: 1px solid #dff2fd;
            background: white;
            color: #333;
            margin: 0 2px;
            border-radius: 6px;
            padding: 6px 12px;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: #e62e49;
            color: white;
            border-color: #e62e49;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #e62e49;
            color: white;
            border-color: #e62e49;
        }

        .dataTables_wrapper .dataTables_scrollBody {
            overflow-y: auto !important;
            max-height: 500px;
            overflow-x: auto;
            border-radius: 0 0 15px 15px;
        }

        /* Indicadores de estado */
        .status-indicator {
            padding: 4px 8px;
            border-radius: 20px;
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .status-si {
            background: rgba(230, 46, 73, 0.2);
            color: #d63384;
            border: 1px solid #e62e49;
        }

        .status-no {
            background: rgba(223, 242, 253, 0.5);
            color: #1f3055;
            border: 1px solid #dff2fd;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .main-header h1 {
                font-size: 1.8rem;
            }
            
            .datetime-display {
                right: 10px;
                top: 20px;
                font-size: 1rem;
                padding: 10px 15px;
            }
            
            .control-buttons {
                bottom: 20px;
                flex-direction: column;
                gap: 10px;
                align-items: center;
            }
            
            .button {
                padding: 8px 16px;
                font-size: 0.85rem;
                min-width: 150px;
            }
            
            .table-container {
                padding: 0 10px;
                margin: 20px auto;
                margin-bottom: 180px; /* Más espacio para 3 botones */
            }
            
            .logo-container {
                left: 5px;
                top: -10px;
            }
            
            .logo-container img {
                height: 120px;
            }
        }

        /* Animaciones */
        .card {
            animation: fadeInUp 0.6s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Loading spinner */
        .loading-spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(230, 46, 73, 0.3);
            border-radius: 50%;
            border-top-color: #e62e49;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .table-stats {
            background: rgba(223, 242, 253, 0.2);
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #dff2fd;
            text-align: center;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 1.5rem;
            font-weight: bold;
            color: #e62e49;
        }

        .stat-label {
            font-size: 0.9rem;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
    </style>
</head>
<body>
    <!-- Logo en posición original -->
    <div class="logo-container">
        <img src="sin.png" alt="Logo">
    </div>

    <!-- Header principal -->
    <div class="main-header">
        <div class="container-fluid">
            <h1>
                <i class="bi bi-graph-up-arrow me-3"></i>
                REPORTE GENERAL
                <i class="bi bi-clipboard-data ms-3"></i>
            </h1>
        </div>
    </div>

    <!-- Fecha y hora en posición original -->
    <div id="datetime" class="datetime-display">
        <i class="bi bi-calendar3 me-2"></i>
        <span id="datetime-text">Cargando...</span>
    </div>

    <!-- Botones de control centrados en la parte inferior -->
    <div class="control-buttons">
        <a href="index.php" class="button">
            <i class="bi bi-plus-circle-fill"></i>
            Registrar
        </a>
        <button class="button" onclick="location.reload()">
            <i class="bi bi-arrow-clockwise"></i>
            Actualizar
        </button>
        <a href="export_excel.php" class="button" target="_blank">
            <i class="bi bi-file-earmark-excel"></i>
            Exportar Excel
        </a>
    </div>

    <div class="container-fluid">
        <div class="table-container">
            <!-- Estadísticas -->
            <div class="table-stats">
                <div class="stat-item">
                    <div class="stat-number" id="last-update">-</div>
                    <div class="stat-label">Última Actualización</div>
                </div>
            </div>

            <!-- Tabla principal -->
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">
                        <i class="bi bi-table me-2"></i>
                        Datos de Briefings - Panel de Control
                        <span class="loading-spinner ms-3" id="loading-indicator" style="display: none;"></span>
                    </h4>
                </div>
                <div class="card-body">
                    <table id="informeTable" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fecha de Creación</th>
                                <th>Turno</th>
                                <th>Área de Servicio</th>
                                <th>Quien Registra</th>
                                <th>Personal Nuevo</th>
                                <th>Obs. Personal Nuevo</th>
                                <th>Personal Enfermo</th>
                                <th>Obs. Personal Enfermo</th>
                                <th>Pend. Ingreso</th>
                                <th>Obs. Pend. Ingreso</th>
                                <th>Alergia Med.</th>
                                <th>Obs. Alergia Med.</th>
                                <th>Riesgo UPP</th>
                                <th>Obs. Riesgo UPP</th>
                                <th>Riesgo Caída</th>
                                <th>Obs. Riesgo Caída</th>
                                <th>Riesgo Fuga</th>
                                <th>Obs. Riesgo Fuga</th>
                                <th>Transfusiones</th>
                                <th>Obs. Transfusiones</th>
                                <th>Aislamiento</th>
                                <th>Obs. Aislamiento</th>
                                <th>Cond. Riesgo</th>
                                <th>Obs. Cond. Riesgo</th>
                                <th>Pend. Admin.</th>
                                <th>Obs. Pend. Admin.</th>
                                <th>Carro Paro</th>
                                <th>Obs. Carro Paro</th>
                                <th>Equipos Médicos</th>
                                <th>Obs. Equipos Médicos</th>
                                <th>Insumos</th>
                                <th>Obs. Insumos</th>
                                <th>Líder</th>
                                <th>Vía Aérea</th>
                                <th>Admin. Med.</th>
                                <th>Compresiones</th>
                                <th>Circulante</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Los datos se cargarán dinámicamente aquí -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            // Inicializar DataTables con paginación y scroll
            var table = $('#informeTable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
                },
                "ajax": {
                    "url": "fetch_data.php",
                    "dataSrc": "",
                    "beforeSend": function() {
                        $('#loading-indicator').show();
                    },
                    "complete": function() {
                        $('#loading-indicator').hide();
                        updateStats();
                    }
                },
                "columns": [
                    { "data": "id" },
                    { 
                        "data": "created_at",
                        "render": function(data) {
                            return data || 'N/A';
                        }
                    },
                    { 
                        "data": "turno",
                        "render": function(data) {
                            return data || 'N/A';
                        }
                    },
                    { 
                        "data": "area_servicio",
                        "render": function(data) {
                            return data || 'N/A';
                        }
                    },
                    { 
                        "data": "quien_registra",
                        "render": function(data) {
                            return data || 'N/A';
                        }
                    },
                    { 
                        "data": "personal1",
                        "render": function(data) {
                            if (!data) return 'N/A';
                            return data === 'SI' ? 
                                '<span class="status-indicator status-si">SÍ</span>' : 
                                '<span class="status-indicator status-no">NO</span>';
                        }
                    },
                    { 
                        "data": "observacion1",
                        "render": function(data) {
                            return data || 'N/A';
                        }
                    },
                    { 
                        "data": "personal2",
                        "render": function(data) {
                            if (!data) return 'N/A';
                            return data === 'SI' ? 
                                '<span class="status-indicator status-si">SÍ</span>' : 
                                '<span class="status-indicator status-no">NO</span>';
                        }
                    },
                    { 
                        "data": "observacion2",
                        "render": function(data) {
                            return data || 'N/A';
                        }
                    },
                    { 
                        "data": "personal3",
                        "render": function(data) {
                            if (!data) return 'N/A';
                            return data === 'SI' ? 
                                '<span class="status-indicator status-si">SÍ</span>' : 
                                '<span class="status-indicator status-no">NO</span>';
                        }
                    },
                    { 
                        "data": "observacion3",
                        "render": function(data) {
                            return data || 'N/A';
                        }
                    },
                    { 
                        "data": "personal4",
                        "render": function(data) {
                            if (!data) return 'N/A';
                            return data === 'SI' ? 
                                '<span class="status-indicator status-si">SÍ</span>' : 
                                '<span class="status-indicator status-no">NO</span>';
                        }
                    },
                    { 
                        "data": "observacion4",
                        "render": function(data) {
                            return data || 'N/A';
                        }
                    },
                    { 
                        "data": "personal5",
                        "render": function(data) {
                            if (!data) return 'N/A';
                            return data === 'SI' ? 
                                '<span class="status-indicator status-si">SÍ</span>' : 
                                '<span class="status-indicator status-no">NO</span>';
                        }
                    },
                    { 
                        "data": "observacion5",
                        "render": function(data) {
                            return data || 'N/A';
                        }
                    },
                    { 
                        "data": "personal6",
                        "render": function(data) {
                            if (!data) return 'N/A';
                            return data === 'SI' ? 
                                '<span class="status-indicator status-si">SÍ</span>' : 
                                '<span class="status-indicator status-no">NO</span>';
                        }
                    },
                    { 
                        "data": "observacion6",
                        "render": function(data) {
                            return data || 'N/A';
                        }
                    },
                    { 
                        "data": "personal7",
                        "render": function(data) {
                            if (!data) return 'N/A';
                            return data === 'SI' ? 
                                '<span class="status-indicator status-si">SÍ</span>' : 
                                '<span class="status-indicator status-no">NO</span>';
                        }
                    },
                    { 
                        "data": "observacion7",
                        "render": function(data) {
                            return data || 'N/A';
                        }
                    },
                    { 
                        "data": "personal8",
                        "render": function(data) {
                            if (!data) return 'N/A';
                            return data === 'SI' ? 
                                '<span class="status-indicator status-si">SÍ</span>' : 
                                '<span class="status-indicator status-no">NO</span>';
                        }
                    },
                    { 
                        "data": "observacion8",
                        "render": function(data) {
                            return data || 'N/A';
                        }
                    },
                    { 
                        "data": "personal9",
                        "render": function(data) {
                            if (!data) return 'N/A';
                            return data === 'SI' ? 
                                '<span class="status-indicator status-si">SÍ</span>' : 
                                '<span class="status-indicator status-no">NO</span>';
                        }
                    },
                    { 
                        "data": "observacion9",
                        "render": function(data) {
                            return data || 'N/A';
                        }
                    },
                    { 
                        "data": "personal10",
                        "render": function(data) {
                            if (!data) return 'N/A';
                            return data === 'SI' ? 
                                '<span class="status-indicator status-si">SÍ</span>' : 
                                '<span class="status-indicator status-no">NO</span>';
                        }
                    },
                    { 
                        "data": "observacion10",
                        "render": function(data) {
                            return data || 'N/A';
                        }
                    },
                    { 
                        "data": "personal11",
                        "render": function(data) {
                            if (!data) return 'N/A';
                            return data === 'SI' ? 
                                '<span class="status-indicator status-si">SÍ</span>' : 
                                '<span class="status-indicator status-no">NO</span>';
                        }
                    },
                    { 
                        "data": "observacion11",
                        "render": function(data) {
                            return data || 'N/A';
                        }
                    },
                    { 
                        "data": "carro",
                        "render": function(data) {
                            if (!data) return 'N/A';
                            return data === 'SI' ? 
                                '<span class="status-indicator status-si">SÍ</span>' : 
                                '<span class="status-indicator status-no">NO</span>';
                        }
                    },
                    { 
                        "data": "observacionescarro",
                        "render": function(data) {
                            return data || 'N/A';
                        }
                    },
                    { 
                        "data": "equipo",
                        "render": function(data) {
                            if (!data) return 'N/A';
                            return data === 'SI' ? 
                                '<span class="status-indicator status-si">SÍ</span>' : 
                                '<span class="status-indicator status-no">NO</span>';
                        }
                    },
                    { 
                        "data": "observacionesequipo",
                        "render": function(data) {
                            return data || 'N/A';
                        }
                    },
                    { 
                        "data": "insumos",
                        "render": function(data) {
                            if (!data) return 'N/A';
                            return data === 'SI' ? 
                                '<span class="status-indicator status-si">SÍ</span>' : 
                                '<span class="status-indicator status-no">NO</span>';
                        }
                    },
                    { 
                        "data": "observacionesinsumos",
                        "render": function(data) {
                            return data || 'N/A';
                        }
                    },
                    { 
                        "data": "lider",
                        "render": function(data) {
                            return data || 'N/A';
                        }
                    },
                    { 
                        "data": "via",
                        "render": function(data) {
                            return data || 'N/A';
                        }
                    },
                    { 
                        "data": "admin_medi",
                        "render": function(data) {
                            return data || 'N/A';
                        }
                    },
                    { 
                        "data": "compre",
                        "render": function(data) {
                            return data || 'N/A';
                        }
                    },
                    { 
                        "data": "circu",
                        "render": function(data) {
                            return data || 'N/A';
                        }
                    }
                ],
                "order": [[1, 'desc']],
                "pageLength": 10,
                "scrollY": "500px",
                "scrollX": true,
                "fixedHeader": true,
                "responsive": true,
                "dom": '<"row"<"col-sm-6"l><"col-sm-6"f>>rtip',
                "columnDefs": [
                    {
                        "targets": "_all",
                        "className": "text-center"
                    }
                ],
                "initComplete": function(settings, json) {
                    console.log("Datos cargados:", json);
                    updateStats();
                }
            });

            // Función para actualizar estadísticas
            function updateStats() {
                // Solo actualizar última actualización
                $('#last-update').text(new Date().toLocaleTimeString());
            }

            // Función para actualizar la tabla en tiempo real
            function actualizarTabla() {
                table.ajax.reload(null, false);
            }

            // Actualizar la tabla cada 30 segundos
            setInterval(actualizarTabla, 30000);
        });

        // Función para actualizar la fecha y hora cada segundo
        function actualizarFechaYHora() {
            var tiempo = new Date();

            var dia = tiempo.getDate().toString().padStart(2, '0');
            var mes = (tiempo.getMonth() + 1).toString().padStart(2, '0');
            var anio = tiempo.getFullYear();
            var horas = tiempo.getHours().toString().padStart(2, '0');
            var minutos = tiempo.getMinutes().toString().padStart(2, '0');
            var segundos = tiempo.getSeconds().toString().padStart(2, '0');

            var dias = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
            var meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 
                        'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
            
            var diaSemana = dias[tiempo.getDay()];
            var mesNombre = meses[tiempo.getMonth()];

            document.getElementById("datetime-text").innerHTML = 
                `${diaSemana}, ${dia} de ${mesNombre} ${anio}<br>${horas}:${minutos}:${segundos}`;
        }

        // Inicializar fecha y hora
        window.onload = function() {
            actualizarFechaYHora();
            setInterval(actualizarFechaYHora, 1000);
        };

        // Efectos adicionales
        $(document).ready(function() {
            // Animación de entrada para las tarjetas
            $('.card').addClass('animate__animated animate__fadeInUp');
            
            // Tooltip para botones
            $('[data-bs-toggle="tooltip"]').tooltip();
            
            // Notificación de actualización automática
            let updateNotification = false;
            setInterval(function() {
                if (!updateNotification) {
                    console.log("Actualizando datos automáticamente...");
                    updateNotification = true;
                    setTimeout(() => { updateNotification = false; }, 5000);
                }
            }, 30000);
        });
    </script>
</body>
</html>