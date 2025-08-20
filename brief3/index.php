<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BRIEFING</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css?<?php echo time(); ?>">
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
        background: var(--gradient-bg);
        min-height: 100vh;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    #resolucion {
        position: fixed;
        top: 82%;
        left: 22px;
        z-index: 1000;
        background-color: transparent;
    }

    #resolucion img {
        width: 275px;
        height: 90px;
        filter: drop-shadow(0 4px 8px rgba(0,0,0,0.1));
    }

    .button{
        --bg: #e62e49;
        --hover-bg: #d12448;
        --hover-text: #ffffff;
        color: white;
        cursor: pointer;
        border: none;
        border-radius: 12px;
        padding: 12px 20px;
        background: var(--bg);
        transition: all 0.3s ease;
        font-weight: 600;
        font-size: 0.9rem;
        box-shadow: 0 4px 15px rgba(230, 46, 73, 0.3);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        white-space: nowrap;
        min-width: 180px;
        text-decoration: none;
    }

    .button:hover {
        color: var(--hover-text);
        transform: translateY(-2px);
        background: var(--hover-bg);
        box-shadow: 0 8px 25px rgba(230, 46, 73, 0.4);
    }

    .button:active {
        transform: translateY(0);
    }

    .form-container {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        margin: 20px auto;
        padding: 30px;
        border: 1px solid rgba(155, 197, 235, 0.3);
    }

    .table-responsive {
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    table {
        border: none !important;
        background: white;
    }

    th {
        background: linear-gradient(135deg, #1f3055, #1d1d1b) !important;
        color: white !important;
        font-weight: 600;
        text-align: center;
        border: none !important;
        padding: 15px 8px !important;
    }

    td {
        background-color: #ffffff !important;
        border: 1px solid #dff2fd !important;
        padding: 12px 8px !important;
        vertical-align: middle;
    }

    tr:nth-child(even) td {
        background-color: #dff2fd !important;
    }

    /* Header específico - COMPLETAMENTE ESTÁTICO Y BLANCO */
    .header-logo-row,
    .header-logo-row td,
    .header-logo-row th,
    .header-logo-row img,
    .header-logo-row h5,
    .header-logo-row .header-cell,
    .header-logo-row strong,
    .header-logo-row div,
    .header-logo-row i {
        transition: none !important;
        transform: none !important;
        animation: none !important;
        box-shadow: none !important;
        pointer-events: none !important;
    }

    .header-logo-row:hover,
    .header-logo-row td:hover,
    .header-logo-row th:hover,
    .header-logo-row img:hover,
    .header-logo-row h5:hover,
    .header-logo-row .header-cell:hover,
    .header-logo-row strong:hover,
    .header-logo-row div:hover,
    .header-logo-row i:hover {
        transition: none !important;
        transform: none !important;
        animation: none !important;
        box-shadow: none !important;
        scale: none !important;
        filter: none !important;
    }

    /* FORZAR FONDO BLANCO EN TODO EL HEADER */
    .header-logo-row td,
    .header-logo-row td:hover,
    .header-logo-row:nth-child(even) td,
    .header-logo-row:nth-child(even) td:hover,
    .header-logo-row:nth-child(odd) td,
    .header-logo-row:nth-child(odd) td:hover {
        background-color: #ffffff !important;
        background: #ffffff !important;
    }

    /* FORZAR FONDO BLANCO EN LAS CELDAS DE HEADER CELL */
    .header-logo-row .header-cell,
    .header-logo-row .header-cell:hover {
        background: #ffffff !important;
        background-color: #ffffff !important;
        color: #1f3055 !important;
    }

    /* Anular específicamente las reglas del style.css para el header */
    .header-logo-row td {
        transition: none !important;
        transform: none !important;
    }

    .header-logo-row tr:hover td {
        background-color: #ffffff !important;
        transform: none !important;
        box-shadow: none !important;
        scale: 1 !important;
    }

    .header-logo-row:nth-child(even) tr:hover td {
        background-color: #ffffff !important;
        transform: none !important;
        box-shadow: none !important;
        scale: 1 !important;
    }

    /* Anular animaciones de imágenes del style.css */
    .header-logo-row img {
        filter: drop-shadow(0 4px 8px rgba(0,0,0,0.1)) !important;
        transition: none !important;
        transform: none !important;
    }

    .header-logo-row img:hover {
        filter: drop-shadow(0 4px 8px rgba(0,0,0,0.1)) !important;
        transition: none !important;
        transform: none !important;
        scale: 1 !important;
    }

    /* Validación visual - Bordes rojos para campos faltantes */
    .validation-error {
        border: 3px solid #e62e49 !important;
        background-color: rgba(230, 46, 73, 0.1) !important;
        animation: shake 0.5s ease-in-out;
    }

    .validation-error td {
        border-color: #e62e49 !important;
        background-color: rgba(230, 46, 73, 0.05) !important;
    }

    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-5px); }
        75% { transform: translateX(5px); }
    }

    .form-control, .form-select {
        border: 2px solid #ceeafc;
        border-radius: 10px;
        transition: all 0.3s ease;
        background: rgba(255, 255, 255, 0.9);
    }

    .form-control:focus, .form-select:focus {
        border-color: #e62e49;
        box-shadow: 0 0 0 0.2rem rgba(230, 46, 73, 0.25);
        background: white;
    }

    .form-control:disabled {
        background-color: #f8f9fa;
        border-color: #dee2e6;
    }

    .form-check-input {
        border: 2px solid #e62e49;
        background-color: white;
    }

    .form-check-input:checked {
        background-color: #e62e49;
        border-color: #e62e49;
    }

    .section-header {
        background: #a5d2f2 !important;
        color: #1f3055 !important;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        text-align: center;
        padding: 15px;
        margin: 0;
        border-radius: 10px 10px 0 0;
    }

    .save-btn {
        background: linear-gradient(135deg, #e62e49, #d12448);
        border: none;
        border-radius: 15px;
        padding: 15px 40px;
        color: white;
        font-weight: 600;
        font-size: 1.1rem;
        box-shadow: 0 8px 25px rgba(230, 46, 73, 0.3);
        transition: all 0.3s ease;
        width: 100%;
        margin-top: 20px;
    }

    .save-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 35px rgba(230, 46, 73, 0.4);
        background: linear-gradient(135deg, #d12448, #c12040);
    }

    .timer {
        position: fixed;
        top: 68px;
        right: 20px;
        font-size: 1.2em;
        background: linear-gradient(135deg, #e62e49, #d12448);
        padding: 15px 20px;
        border-radius: 15px;
        color: white;
        box-shadow: 0 8px 25px rgba(230, 46, 73, 0.3);
        font-weight: 600;
        border: 2px solid rgba(255, 255, 255, 0.2);
    }

    .datetime-container {
        background: rgba(255, 255, 255, 0.9);
        border-radius: 15px;
        padding: 20px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        border: 1px solid #ceeafc;
    }

    .input-group {
        margin-bottom: 15px;
    }

    .input-group-text {
        background: #ceeafc;
        border: 2px solid #ceeafc;
        color: #1f3055;
        font-weight: 600;
    }

    .header-cell {
        background: #ffffff !important;
        color: #1f3055 !important;
        font-weight: 700;
    }

    /* Mejoras responsivas */
    @media (max-width: 768px) {
        .form-container {
            margin: 10px;
            padding: 20px;
        }
        
        #resolucion {
            top: 85%;
            left: 10px;
        }
        
        #resolucion img {
            width: 200px;
            height: 65px;
        }
        
        .timer {
            top: 10px;
            right: 10px;
            font-size: 1rem;
            padding: 10px 15px;
        }
    }

    .card-header {
        background: linear-gradient(135deg, #1f3055, #9bc5eb);
        color: white;
        font-weight: 700;
        text-align: center;
        border-radius: 15px 15px 0 0 !important;
    }

    .logo-container {
        background: rgba(255, 255, 255, 0.9);
        border-radius: 15px;
        padding: 10px;
        display: inline-block;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
   </style>
</head>
<body>
<!-- Logo en posición original -->
<div id="resolucion" class="resolucion">
    <div class="logo-container">
        <img src="recurso.png" alt="Logo">
    </div>
</div>

<!-- Botón Panel de Control en posición original -->
<div class="boton" style="
    position: fixed;
    top: 88%;
    left: 88%;
    z-index: 1000;
    background-color: transparent;
">
    <a href="mostrar.php" class="button">
        <i class="bi bi-gear-fill"></i>
        PANEL DE CONTROL
    </a>
</div>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-xl-11">
            <div class="form-container">
                <form id="briefing-form" action='procesar.php' method="POST">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <!-- Header con logo y información - COMPLETAMENTE ESTÁTICO Y BLANCO -->
                            <tr class="header-logo-row">
                                <td rowspan="2" class="text-center p-3" style="width: 200px;">
                                    <img src="foto.png" alt="Logo" class="img-fluid" style="max-width: 196px;">
                                </td>
                                <td colspan="2" class="header-cell">
                                    <h5 class="mb-0"><i class="bi bi-building me-2"></i>MACROPROCESOS TRANSVERSALES</h5>
                                </td>
                                <td class="text-center">
                                    <div class="mb-2">
                                        <strong><i class="bi bi-code-square me-1"></i>CODIGO:</strong> SP-FR-070
                                    </div>
                                    <hr class="my-2">
                                    <div>
                                        <strong><i class="bi bi-calendar-event me-1"></i>VIGENCIA:</strong> 15/02/2025
                                    </div>
                                </td>
                            </tr>
                            <tr class="header-logo-row">
                                <td colspan="2" class="header-cell">
                                    <h5 class="mb-0"><i class="bi bi-shield-heart me-2"></i>SEGURIDAD DEL PACIENTE</h5>
                                </td>
                                <td class="text-center">
                                    <div class="mb-2">
                                        <strong><i class="bi bi-tag me-1"></i>VERSION:</strong> 001
                                    </div>
                                    <hr class="my-2">
                                    <div>
                                        <strong><i class="bi bi-file-text me-1"></i>PAGINA:</strong> 1 de 1
                                    </div>
                                </td>
                            </tr>
                            
                            <!-- Título del formulario -->
                            <tr>
                                <td colspan="4" class="text-center section-header">
                                    <i class="bi bi-clipboard-data me-2"></i>Formato de Briefing
                                </td>
                            </tr>
                            
                            <!-- Objetivo -->
                            <tr>
                                <td colspan="4" class="text-center p-3" style="background: rgba(223, 242, 253, 0.3) !important;">
                                    <strong><i class="bi bi-target me-2"></i>Objetivo:</strong> 
                                    Proporcionar una herramienta adecuada para fortalecer el proceso de comunicación entre el personal de salud, en base a situaciones potenciales riesgosas para el paciente y trabajador.
                                </td>
                            </tr>
                            
                            <!-- Fecha y Turno -->
                            <tr>
                                <td colspan="4" class="p-4">
                                    <div class="row justify-content-center">
                                        <div class="col-md-6">
                                            <div class="datetime-container">
                                                <div class="row g-3">
                                                    <div class="col-md-7">
                                                        <div class="input-group">
                                                            <span class="input-group-text">
                                                                <i class="bi bi-calendar3 me-1"></i>Fecha:
                                                            </span>
                                                            <?php
                                                                date_default_timezone_set('America/Bogota');
                                                                $fecha_colombia = date('Y-m-d\TH:i');
                                                            ?>
                                                            <input type="datetime-local" name="tiempo" value="<?php echo $fecha_colombia; ?>" readonly class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="input-group">
                                                            <span class="input-group-text">
                                                                <i class="bi bi-clock me-1"></i>Turno:
                                                            </span>
                                                            <input type="text" id="turno" name="turno" readonly class="form-control text-center">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            
                            <!-- Área/Servicio -->
                            <tr>
                                <td colspan="4" class="text-center p-3">
                                    <div class="row justify-content-center">
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i class="bi bi-hospital me-1"></i>Área/Servicio:
                                                </span>
                                                <select name="area" id="area" required class="form-select">
                                                    <option value="HOSPITALIZACION 4">HOSPITALIZACIÓN 4</option>
                                                    <option value="HOSPITALIZACION 5">HOSPITALIZACIÓN 5</option>
                                                    <option value="UCI">UCI</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            
                            <!-- Quién Registra -->
                            <tr>
                                <td colspan="4" class="text-center p-3">
                                    <div class="row justify-content-center">
                                        <div class="col-md-5">
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i class="bi bi-person-badge me-1"></i>Quién Registra:
                                                </span>
                                                <input type="text" id="quien-registra" name="quien-registra" required class="form-control" placeholder="Nombre Completo">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            
                            <!-- Sección: Situaciones de Riesgo -->
                            <tr>
                                <td colspan="4" class="section-header">
                                    <i class="bi bi-exclamation-triangle me-2"></i>Situaciones de Riesgo
                                </td>
                            </tr>

                            <!-- Personal de Salud Header -->
                            <tr class="table-secondary">
                                <th style="background: #a5d2f2 !important; color: #1f3055 !important;">
                                    <i class="bi bi-people-fill me-2"></i>Personal de Salud
                                </th>
                                <th style="background: #a5d2f2 !important; color: #1f3055 !important;">¿Sí?</th>
                                <th style="background: #a5d2f2 !important; color: #1f3055 !important;">¿No?</th>
                                <th style="background: #a5d2f2 !important; color: #1f3055 !important;">
                                    <i class="bi bi-chat-square-text me-2"></i>Observaciones (Registrar el nombre de la persona)
                                </th>
                            </tr>

                            <tr>
                                <td>¿Dentro del equipo de trabajo se encuentra personal nuevo?</td>
                                <td class="text-center">
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="persona" value="SI" onclick="habilitarObservaciones()">
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="persona" value="NO" onclick="habilitarObservaciones()">
                                    </div>
                                </td>
                                <td>
                                    <input type="text" name="observaciones-persona" id="observaciones" disabled required class="form-control">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>¿Dentro del equipo de trabajo se encuentra personal enfermo?</td>
                                <td class="text-center">
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="persona2" value="SI" onclick="habilitarObservaciones1()">
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="persona2" value="NO" onclick="habilitarObservaciones1()">
                                    </div>
                                </td>
                                <td>
                                    <input type="text" name="observaciones2" id="observaciones2" disabled required class="form-control">
                                </td>
                            </tr>

                            <!-- Pacientes Header -->
                            <tr class="table-secondary">
                                <th style="background: #a5d2f2 !important; color: #1f3055 !important;">
                                    <i class="bi bi-person-heart me-2"></i>Pacientes
                                </th>
                                <th style="background: #a5d2f2 !important; color: #1f3055 !important;">¿Sí?</th>
                                <th style="background: #a5d2f2 !important; color: #1f3055 !important;">¿No?</th>
                                <th style="background: #a5d2f2 !important; color: #1f3055 !important;">
                                    <i class="bi bi-chat-square-text me-2"></i>Observaciones (Registrar número de cama si aplica)
                                </th>
                            </tr>

                            <tr>
                                <td>¿Existen pacientes pendientes para ingreso?</td>
                                <td class="text-center">
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="persona3" value="SI" onclick="habilitarObservaciones2()">
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="persona3" value="NO" onclick="habilitarObservaciones2()">
                                    </div>
                                </td>
                                <td>
                                    <input type="text" name="observaciones3" id="observaciones3" disabled required class="form-control">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>¿Existen pacientes con alergia a medicamentos?</td>
                                <td class="text-center">
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="persona4" value="SI" onclick="habilitarObservaciones3()">
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="persona4" value="NO" onclick="habilitarObservaciones3()">
                                    </div>
                                </td>
                                <td>
                                    <input type="text" name="observaciones4" id="observaciones4" disabled required class="form-control">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>¿Existen pacientes con riesgo de UPP?</td>
                                <td class="text-center">
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="persona5" value="SI" onclick="habilitarObservaciones4()">
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="persona5" value="NO" onclick="habilitarObservaciones4()">
                                    </div>
                                </td>
                                <td>
                                    <input type="text" name="observaciones5" id="observaciones5" disabled required class="form-control">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>¿Existen pacientes con riesgo de Caída?</td>
                                <td class="text-center">
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="persona6" value="SI" onclick="habilitarObservaciones5()">
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="persona6" value="NO" onclick="habilitarObservaciones5()">
                                    </div>
                                </td>
                                <td>
                                    <input type="text" name="observaciones6" id="observaciones6" disabled required class="form-control">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>¿Existen pacientes con riesgo de fuga?</td>
                                <td class="text-center">
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="persona7" value="SI" onclick="habilitarObservaciones6()">
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="persona7" value="NO" onclick="habilitarObservaciones6()">
                                    </div>
                                </td>
                                <td>
                                    <input type="text" name="observaciones7" id="observaciones7" disabled required class="form-control">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>¿Existen pacientes pendientes de transfusiones?</td>
                                <td class="text-center">
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="persona8" value="SI" onclick="habilitarObservaciones7()">
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="persona8" value="NO" onclick="habilitarObservaciones7()">
                                    </div>
                                </td>
                                <td>
                                    <input type="text" name="observaciones8" id="observaciones8" disabled required class="form-control">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>¿Existen pacientes con aislamiento?</td>
                                <td class="text-center">
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="persona9" value="SI" onclick="habilitarObservaciones8()">
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="persona9" value="NO" onclick="habilitarObservaciones8()">
                                    </div>
                                </td>
                                <td>
                                    <input type="text" name="observaciones9" id="observaciones9" disabled required class="form-control">
                                </td>
                            </tr>

                            <tr>
                                <td>¿Existen Pacientes con condición de riesgo?</td>
                                <td class="text-center">
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="persona10" value="SI" onclick="habilitarObservaciones12()">
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="persona10" value="NO" onclick="habilitarObservaciones12()">
                                    </div>
                                </td>
                                <td>
                                    <input type="text" name="observaciones10" id="observaciones10" disabled required class="form-control">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>¿Existen Pacientes con pendientes administrativos?</td>
                                <td class="text-center">
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="persona11" value="SI" onclick="habilitarObservaciones13()">
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="persona11" value="NO" onclick="habilitarObservaciones13()">
                                    </div>
                                </td>
                                <td>
                                    <input type="text" name="observaciones11" id="observaciones11" disabled required class="form-control">
                                </td>
                            </tr>

                            <!-- Área Header -->
                            <tr class="table-secondary">
                                <th style="background: #a5d2f2 !important; color: #1f3055 !important;">
                                    <i class="bi bi-geo-alt me-2"></i>Área
                                </th>
                                <th style="background: #a5d2f2 !important; color: #1f3055 !important;">¿Sí?</th>
                                <th style="background: #a5d2f2 !important; color: #1f3055 !important;">¿No?</th>
                                <th style="background: #a5d2f2 !important; color: #1f3055 !important;">
                                    <i class="bi bi-chat-square-text me-2"></i>Observaciones (Registrar qué novedad presenta)
                                </th>
                            </tr>
                            
                            <tr>
                                <td>¿El carro de paro se encuentra sin novedad?</td>
                                <td class="text-center">
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="carro" value="SI" onclick="habilitarObservaciones9()">
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="carro" value="NO" onclick="habilitarObservaciones9()">
                                    </div>
                                </td>
                                <td>
                                    <input type="text" name="observacionescarro" id="observacionescarro" disabled required class="form-control">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Durante el turno anterior se presentaron fallas con equipos médicos?</td>
                                <td class="text-center">
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="equipos" value="SI" onclick="habilitarObservaciones10()">
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="equipos" value="NO" onclick="habilitarObservaciones10()">
                                    </div>
                                </td>
                                <td>
                                    <input type="text" name="observacionesequipos" id="observacionesequipos" disabled required class="form-control">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>¿Existen novedades de insumos o dispositivos faltantes en farmacia?</td>
                                <td class="text-center">
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="insumos" value="SI" onclick="habilitarObservaciones11()">
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="insumos" value="NO" onclick="habilitarObservaciones11()">
                                    </div>
                                </td>
                                <td>
                                    <input type="text" name="observacionesinsumos" id="observacionesinsumos" disabled required class="form-control">
                                </td>
                            </tr>
                            
                            <!-- Asignación de Código Azul -->
                            <tr>
                                <td colspan="4" class="section-header">
                                    <i class="bi bi-shield-plus me-2"></i>Asignación de Código Azul
                                </td>
                            </tr>

                            <tr class="table-secondary">
                                <th colspan="2" style="background: #a5d2f2 !important; color: #1f3055 !important;">
                                    <i class="bi bi-person-badge me-2"></i>Rol
                                </th>
                                <th colspan="2" style="background: #a5d2f2 !important; color: #1f3055 !important;">
                                    <i class="bi bi-person-fill me-2"></i>Nombre
                                </th>
                            </tr>
                            
                            <tr>
                                <td colspan="2" class="fw-bold text-center">
                                    <i class="bi bi-star-fill me-2 text-warning"></i>Líder
                                </td>
                                <td colspan="2">
                                    <input type="text" name="lider" id="lider" class="form-control">
                                </td>
                            </tr>
                            
                            <tr>
                                <td colspan="2" class="fw-bold text-center">
                                    <i class="bi bi-lungs me-2 text-info"></i>Vía Aérea
                                </td>
                                <td colspan="2">
                                    <input type="text" name="via-area" id="via-area" class="form-control">
                                </td>
                            </tr>
                            
                            <tr>
                                <td colspan="2" class="fw-bold text-center">
                                    <i class="bi bi-capsule me-2 text-success"></i>Administración de Medicamentos
                                </td>
                                <td colspan="2">
                                    <input type="text" name="admin-medicamentos" id="admin-medicamentos" class="form-control">
                                </td>
                            </tr>
                            
                            <tr>
                                <td colspan="2" class="fw-bold text-center">
                                    <i class="bi bi-heart-pulse me-2 text-danger"></i>Compresiones
                                </td>
                                <td colspan="2">
                                    <input type="text" name="compresiones" id="compresiones" class="form-control">
                                </td>
                            </tr>
                            
                            <tr>
                                <td colspan="2" class="fw-bold text-center">
                                    <i class="bi bi-arrow-repeat me-2 text-primary"></i>Circulante
                                </td>
                                <td colspan="2">
                                    <input type="text" name="circulante" id="circulante" class="form-control">
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                    <div class="text-center mt-4">
                        <button type="button" onclick="validarFormulario()" class="save-btn">
                            <i class="bi bi-save me-2"></i>Guardar Briefing
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Timer en posición original -->
<div class="timer" id="timer">
    <div>
        <i class="bi bi-clock-fill me-2"></i>Tiempo Restante: <span id="time-display">00:00</span>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
let timeLeft = 600; // 5 minutes in seconds
const timeDisplay = document.getElementById("time-display");
const turnoInput = document.getElementById("turno");

// Function to format time as mm:ss
function formatTime(seconds) {
    const minutes = Math.floor(seconds / 60);
    const remainingSeconds = seconds % 60;
    return `${String(minutes).padStart(2, '0')}:${String(remainingSeconds).padStart(2, '0')}`;
}

// Update the timer every second
function updateTimer() {
    timeLeft--;
    timeDisplay.textContent = formatTime(timeLeft);

    if (timeLeft <= 0) {
        // Mostrar el mensaje de alerta
        alert("¡Se acabó el tiempo! Vuelve a intentar.");

        // Reset the timer to 5 minutes
        timeLeft = 600;

        // Recargar la página
        location.reload(); // Recarga la página
    }
}

setInterval(updateTimer, 1000);

// Function to set the turno based on the current time
function setTurno() {
    const now = new Date();
    const hour = now.getHours();
    if (hour >= 6 && hour < 12) {
        turnoInput.value = "Mañana";
    } else if (hour >= 12 && hour < 18) {
        turnoInput.value = "Tarde";
    } else {
        turnoInput.value = "Noche";
    }
}

// Función para sobrescribir la validación existente y agregar bordes rojos a las filas
document.addEventListener('DOMContentLoaded', function() {
    // Esperar a que se cargue validacion.js
    setTimeout(function() {
        if (typeof window.validarFormulario === 'function') {
            // Guardar la función original
            window.originalValidarFormulario = window.validarFormulario;
            
            // Sobrescribir la función
            window.validarFormulario = function() {
                var formValido = true;
                var camposFaltantes = [];
                var tdFaltantes = [];

                // Limpiar errores previos de filas
                document.querySelectorAll('.validation-error').forEach(row => {
                    row.classList.remove('validation-error');
                });

                // Validar Fecha
                var fecha = document.querySelector('input[name="tiempo"]');
                if (!fecha.value) {
                    formValido = false;
                    camposFaltantes.push('Fecha');
                    tdFaltantes.push(fecha.closest('td'));
                    fecha.closest('tr').classList.add('validation-error');
                }

                // Validar Turno
                var turno = document.getElementById('turno');
                if (!turno.value) {
                    formValido = false;
                    camposFaltantes.push('Turno');
                    tdFaltantes.push(turno.closest('td'));
                    turno.closest('tr').classList.add('validation-error');
                }

                // Validar Área/Servicio
                var area = document.getElementById('area');
                if (!area.value) {
                    formValido = false;
                    camposFaltantes.push('Área/Servicio');
                    tdFaltantes.push(area.closest('td'));
                    area.closest('tr').classList.add('validation-error');
                }

                // Validar Quién Registra
                var quienRegistra = document.getElementById('quien-registra');
                if (!quienRegistra.value) {
                    formValido = false;
                    camposFaltantes.push('Nombre Completo');
                    tdFaltantes.push(quienRegistra.closest('td'));
                    quienRegistra.closest('tr').classList.add('validation-error');
                }

                // Validar Líder
                var lider = document.getElementById('lider');
                if (!lider.value) {
                    formValido = false;
                    camposFaltantes.push('Lider');
                    tdFaltantes.push(lider.closest('td'));
                    lider.closest('tr').classList.add('validation-error');
                }

                // Validar Vía área
                var via = document.getElementById('via-area');
                if (!via.value) {
                    formValido = false;
                    camposFaltantes.push('VIa-area');
                    tdFaltantes.push(via.closest('td'));
                    via.closest('tr').classList.add('validation-error');
                }

                // Validar Administración Medicamentos
                var medi = document.getElementById('admin-medicamentos');
                if (!medi.value) {
                    formValido = false;
                    camposFaltantes.push('Administración Medicamentos');
                    tdFaltantes.push(medi.closest('td'));
                    medi.closest('tr').classList.add('validation-error');
                }

                // Validar Compresiones
                var compre = document.getElementById('compresiones');
                if (!compre.value) {
                    formValido = false;
                    camposFaltantes.push('Compresiones');
                    tdFaltantes.push(compre.closest('td'));
                    compre.closest('tr').classList.add('validation-error');
                }

                // Validar Circulante
                var circulante = document.getElementById('circulante');
                if (!circulante.value) {
                    formValido = false;
                    camposFaltantes.push('circulante');
                    tdFaltantes.push(circulante.closest('td'));
                    circulante.closest('tr').classList.add('validation-error');
                }

                // Validar las observaciones (solo si están habilitadas)
                var observacionesIds = [
                    'observaciones', 'observaciones2', 'observaciones3', 'observaciones4', 'observaciones5',
                    'observaciones6', 'observaciones7', 'observaciones8', 'observaciones9', 'observaciones10',
                    'observaciones11', 'observacionescarro', 'observacionesequipos', 'observacionesinsumos'
                ];

                observacionesIds.forEach(function(id) {
                    var observacionInput = document.getElementById(id);
                    if (observacionInput && observacionInput.disabled === false && !observacionInput.value) {
                        formValido = false;
                        camposFaltantes.push('Observación ' + id.replace('observaciones', ''));
                        tdFaltantes.push(observacionInput.closest('td'));
                        observacionInput.closest('tr').classList.add('validation-error');
                    }
                });

                // Validar los radio buttons
                var radioGroups = ['persona', 'persona2', 'persona3', 'persona4', 'persona5', 'persona6', 'persona7', 'persona8', 'persona9', 'persona10', 'persona11', 'carro', 'equipos', 'insumos'];

                radioGroups.forEach(function(groupName) {
                    var radios = document.getElementsByName(groupName);
                    var checked = Array.from(radios).some(function(radio) {
                        return radio.checked;
                    });

                    if (!checked) {
                        formValido = false;
                        camposFaltantes.push('Pregunta ' + groupName);
                        if (radios[0]) {
                            radios[0].closest('tr').classList.add('validation-error');
                        }
                    }
                });

                // Si algún campo no está completo, mostrar alerta
                if (!formValido) {
                    alert('Faltan campos obligatorios: ');
                    
                    // Ejecutar la lógica original para los colores de fondo en celdas
                    tdFaltantes.forEach(function(td) {
                        td.style.backgroundColor = '#df7c43';
                    });
                } else {
                    alert('Formulario completado correctamente');
                    document.getElementById('briefing-form').submit();
                }
            };
        }
    }, 100); // Esperar 100ms para que se cargue validacion.js

    // Agregar event listeners para quitar el borde rojo cuando se corrija
    setTimeout(function() {
        // Para campos de texto
        document.querySelectorAll('input[type="text"], input[type="datetime-local"], select').forEach(function(input) {
            input.addEventListener('input', function() {
                if (this.value.trim()) {
                    const row = this.closest('tr');
                    if (row) {
                        row.classList.remove('validation-error');
                    }
                }
            });
        });

        // Para radio buttons
        document.querySelectorAll('input[type="radio"]').forEach(function(radio) {
            radio.addEventListener('change', function() {
                const row = this.closest('tr');
                if (row) {
                    row.classList.remove('validation-error');
                }
            });
        });
    }, 200);
});     

// Set turno when the page loads
setTurno();
</script>
<script src="validacion.js?<?php echo time(); ?>"></script>
<script src="observaciones.js?<?php echo time(); ?>"></script>
</body>
</html>