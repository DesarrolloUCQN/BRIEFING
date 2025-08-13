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
    <!-- Incluir jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Incluir DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <!-- Incluir DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <link rel="shortcut icon" href="icono.ico" type="image/x-icon">

    <style>
      /* Estilos personalizados */
body {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;

    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    height: 85vh;

}

h1 {
    text-align: center;
    color: #1C2F55; /* Azul oscuro */
}

.table-container {
    width: 94%;
    margin: 0 auto;
    position: relative;
    overflow: auto;
    top: 20%;
    margin-right: 50px;
    margin-left: 50px;
}



table {
    width: 100%;
    border-collapse: collapse;
    border-radius: 8px;
    overflow: hidden;
    margin-top: 20px;
    min-height: 400px; /* Establecer un mínimo de altura */
}

th, td {
    padding: 12px;
    text-align: center;
    font-size: 1rem;
    color: #34495E;
    border-bottom: 2px solid #BDC3C7;
    text-overflow: ellipsis;
}

th {
    background-color: #1C2F55; /* Azul #1 */
    color: white;
}

td {
    background-color: #ECF0F1;
}

td input[type="text"], td input[type="datetime-local"], td input[type="radio"] {
    width: 90%;
    padding: 8px;
    margin: 5px 0;
    border: 2px solid #BDC3C7;
    border-radius: 5px;
    background-color: #fff;
    font-size: 1rem;
    transition: border 0.3s ease;
}

td input[type="text"]:focus, td input[type="datetime-local"]:focus {
    border-color: #3498DB;
    box-shadow: 0 0 5px rgba(52, 152, 219, 0.6);
}

.section-title {
    font-size: 1.1rem;
    font-weight: 600;
    color: #2C3E50;
    margin-top: 20px;
    margin-bottom: 15px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

hr {
    border: 0;
    height: 1px;
    background-color: #BDC3C7;
    margin: 10px 0;
}

input::placeholder {
    color: #BDC3C7;
    font-style: italic;
}

/* Estilo para hacer scroll en la tabla */
.dataTables_wrapper .dataTables_scrollBody {
    overflow-y: auto !important;
    max-height: 400px; /* Altura máxima del cuerpo de la tabla */
    overflow-x: auto; /* Habilitar desplazamiento horizontal */
}

/* Fijar los encabezados de la tabla */
.dataTables_wrapper .dataTables_scrollHead {
    position: sticky;
    top: 0;
    z-index: 2;
}
.button {
  --bg: #d93a3a;
  --hover-bg:rgb(39, 58, 146);
  --hover-text: #ffffffff;
  color: white;
  cursor: pointer;
  border: 1px solid var(--bg);
  border-radius: 4px;
  padding: 0.8em 2em;
  background: var(--bg);
  transition: 0.2s;
  height: 46px;
    width: 126px;
}

.button:hover {
  color: var(--hover-text);
  transform: translate(-0.25rem, -0.25rem);
  background: var(--hover-bg);
  box-shadow: 0.25rem 0.25rem var(--bg);
}

.button:active {
  transform: translate(0);
  box-shadow: none;
}


    </style>
    <div class="nombre" style="
    position: absolute;
">
<div id="datetime" style="
    position: absolute;
    right: 147%;
    top: 40px;
    font-family: cursive;
    font-size: larger;
"></div>
<img src="sin.png" alt="" style="
    position: fixed;
    height: 199px;
    left: 10px;
    top: -15px;
">
        <h1>REPORTE GENERAL</h1>
        <hr>

        </div>
        <div class="regis" style="
    left: 87%;
    position: absolute;
    top: 43px;
    
">
            <a href="index.php" >
            <button  class ="button"> Registrar</button>
            </a>
        </div>
</head>
<body>

    <br>

    <div class="table-container">
        <table id="informeTable" class="display" style="margin-left: 0px;width: 4166.13px;margin-bottom: -102px;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha de Creación</th>
                    <th>Turno</th>
                    <th>Área de Servicio</th>
                    <th>Quien Registra</th>
                    <th>¿Dentro del equipo de trabajo se encuentra personal nuevo?</th>
                    <th>Observación</th>
                    <th>¿Dentro del equipo de trabajo se encuentra personal enfermo?</th>
                    <th>Observación</th>
                    <th>¿Existen pacientes pendientes para ingreso?</th>
                    <th>Observación</th>
                    <th>¿Existen pacientes con alergia a medicamentos?</th>
                    <th>Observación</th>
                    <th>¿Existen pacientes con riesgo de UPP?</th>
                    <th>Observación</th>
                    <th>¿Existen pacientes con riesgo de Caída?</th>
                    <th>Observación</th>
                    <th>¿Existen pacientes con riesgo de fuga?</th>
                    <th>Observación</th>
                    <th>¿Existen pacientes pendientes de transfusiones?</th>
                    <th>Observación</th>
                    <th>¿Existen pacientes con aislamiento?</th>
                    <th>Observación</th>
                    <th>¿Existen Pacientes con condición de riesgo ?</th>
                    <th>Observación</th>
                    <th>¿Existen Pacientes con pendientes administrativos?</th>
                    <th>Observación</th>
                    <th>¿El carro de paro se encuentra sin novedad?</th>
                    <th>Observació</th>
                    <th>Durante el turno anterior se presentaron fallas con equipos médicos?</th>
                    <th>Observación</th>
                    <th>¿Existen novedades de insumos o dispositivos faltantes en farmacia?</th>
                    <th>Observación</th>
                    <th>Lider</th>
                    <th>Vía Aérea</th>
                    <th>Administración de Medicamentos</th>
                    <th>Compresiones</th>
                    <th>Circulante</th>
                </tr>
            </thead>
            <tbody>
                <!-- Los datos se cargarán dinámicamente aquí -->
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            // Inicializar DataTables con paginación y scroll
            var table = $('#informeTable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
                },
                "ajax": {
                    "url": "fetch_data.php", // Archivo PHP que obtiene los datos
                    "dataSrc": "" // La fuente de datos es el array directamente
                },
                "columns": [
                    { "data": "id" },
                    { "data": "created_at" },
                    { "data": "turno" },
                    { "data": "area_servicio" },
                    { "data": "quien_registra" },
                    { "data": "personal1" },
                    { "data": "observacion1" },
                    { "data": "personal2" },
                    { "data": "observacion2" },
                    { "data": "personal3" },
                    { "data": "observacion3" },
                    { "data": "personal4" },
                    { "data": "observacion4" },
                    { "data": "personal5" },
                    { "data": "observacion5" },
                    { "data": "personal6" },
                    { "data": "observacion6" },
                    { "data": "personal7" },
                    { "data": "observacion7" },
                    { "data": "personal8" },
                    { "data": "observacion8" },
                    { "data": "personal9" },
                    { "data": "observacion9" },
                    { "data": "personal10" },
                    { "data": "observacion10" },
                    { "data": "personal11" },
                    { "data": "observacion11" },
                    { "data": "carro" },
                    { "data": "observacionescarro" },
                    { "data": "equipo" },
                    { "data": "observacionesequipo" },
                    { "data": "insumos" },
                    { "data": "observacionesinsumos" },
                    { "data": "lider" },
                    { "data": "via" },
                    { "data": "admin_medi" },
                    { "data": "compre" },
                    { "data": "circu" }
                ],
                "order": [[1, 'desc']],  // Ordenar por la columna 'created_at' de manera descendente
                "pageLength": 10, // Limitar el número de filas por página
                "scrollY": "400px", // Habilitar el scroll vertical (ajustar según el tamaño de la tabla)
        "scrollX": true, // Habilitar el scroll horizontal
        "fixedHeader": true, // Fijar los encabezados de la tabla al hacer scroll
                "initComplete": function(settings, json) {
                    console.log("Datos cargados:", json);  // Verifica los datos que DataTables está recibiendo
                }
            });

            // Función para actualizar la tabla en tiempo real
            function actualizarTabla() {
                table.ajax.reload(null, false); // Recargar los datos sin resetear la paginación
            }

            // Actualizar la tabla cada 5 segundos
            setInterval(actualizarTabla, 5000);
        });

        // Función para actualizar la fecha y hora cada segundo
        function actualizarFechaYHora() {
            var tiempo = new Date();

            // Obtener partes de la fecha y hora
            var dia = tiempo.getDate().toString().padStart(2, '0');
            var mes = (tiempo.getMonth() + 1).toString().padStart(2, '0'); // Mes comienza en 0
            var anio = tiempo.getFullYear();
            var horas = tiempo.getHours().toString().padStart(2, '0');
            var minutos = tiempo.getMinutes().toString().padStart(2, '0');
            var segundos = tiempo.getSeconds().toString().padStart(2, '0');

            // Mostrar la fecha y la hora en el div con id "datetime"
            document.getElementById("datetime").innerHTML = `${dia}/${mes}/${anio} ${horas}:${minutos}:${segundos}`;
        }

        // Llamamos a la función al cargar la página y luego cada segundo
        window.onload = function() {
            actualizarFechaYHora();
            setInterval(actualizarFechaYHora, 1000); // Actualiza cada segundo
        };
    </script>
</body>
</html>
