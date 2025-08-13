<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BRIEFING</title>
    <link rel="stylesheet" href="style.css?<?php echo time(); ?>">
    <link rel="shortcut icon" href="icono.ico" type="image/x-icon">
   <style>
    #resolucion {
    position: fixed;  /* Hace que el div quede fijo en la pantalla */
    top: 82%;  /* Posición desde la parte superior de la ventana */
    left: 22px;  /* Posición desde la parte izquierda de la ventana */
    z-index: 1000;  /* Asegura que esté por encima de otros elementos */
    background-color: transparent;  /* Si deseas que el fondo sea transparente */
}

#resolucion img {
    width: 275px;  /* Ajusta el tamaño de la imagen si es necesario */
    height: 90px;  /* Mantiene la relación de aspecto de la imagen */
}
.button{
    --bg: #E32D47;
    --hover-bg: rgb(39, 58, 146);
    --hover-text: #ffffffff;
    color: white;
    cursor: pointer;
    border: 1px solid var(--bg);
    border-radius: 4px;
    padding: 0.8em 2em;
    background: var(--bg);
    transition: 0.2s;
    height: 49px;
    width: 154px;
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
</head>
<body>
<div id="resolucion" class="resolucion">
    <img src="recurso.png" alt="">
</div>
<div class="boton" style="
    position: fixed;  /* Hace que el div quede fijo en la pantalla */
    top: 88%;  /* Posición desde la parte superior de la ventana */
    left: 88%;  /* Posición desde la parte izquierda de la ventana */
    z-index: 1000;  /* Asegura que esté por encima de otros elementos */
    background-color: transparent;  /* Si deseas que el fondo sea transparente */
">
<a href="mostrar.php"><button class="button">PANEL DE CONTROL</button></a>
</div>
<div class="form-container">

<form id="briefing-form" action='procesar.php' method="POST">
<table border="1">
<tr style="height: 30px;"> <!-- Ajusta la altura de la fila aquí -->
    <!-- Celda que contiene la imagen con rowspan para ocupar 2 filas -->
    <td rowspan="1" style="width: 50px;">
        <img src="foto.png" alt="" style="width: 196px;">
    </td>
    <td colspan="2">
        <!-- Celda con el texto "MACROPROCESOS TRANSVERSALES" -->
        <h5>MACROPROCESOS TRANSVERSALES</h5>
    </td>
    <td>
        <!-- Celda con "CODIGO: SP-FR-070" alineado a la derecha -->
        <p><strong>CODIGO:</strong> SP-FR-070</p>
        <!-- Línea separadora -->
        <hr style="margin: 1px 0;">
        <!-- Celda con "VIGENCIA: 15/02/2025" alineado a la derecha -->
        <p><strong>VIGENCIA:</strong> 15/02/2025</p>
    </td>
</tr>

<tr style="height: 30px;"> <!-- Ajusta la altura de la fila aquí -->
    <!-- Celda de texto debajo de la imagen -->
    <td colspan="3">
        <h5>SEGURIDAD DEL PACIENTE</h5>
    </td>
    <td>
        <!-- Celda con "VERSION: 001" alineado a la derecha -->
        <p><strong>VERSION:</strong> 001</p>
        <!-- Línea separadora -->
        <hr style="margin: 1px 0;">
        <!-- Celda con "PAGINA: 1 de 1" alineado a la derecha -->
        <p><strong>PAGINA:</strong> 1 de 1</p>
    </td>
</tr>

    <tr>
        <td colspan="5" style='text-align: center;'>
            <h5>Formato de Briefing</h5>
        </td>
    </tr>
    <tr>
        <td colspan="5" style='text-align: center;'>
        <strong>Objetivo:</strong> Proporcionar una herramienta adecuada para fortalecer el proceso de comunicación entre el personal de salud, en base a situaciones potenciales riesgosas para el paciente y trabajador.
        </td>
    </tr>
    <tr>

    <td colspan="4" >
        <div style="position: relative;
    left: 25%;">
    <div style="display: flex; align-items: center; gap: 20px;"> <!-- Ajusta el valor de gap si deseas más o menos espacio -->
        <div style="display: flex; align-items: center;">
            <label for="Fecha"><strong>Fecha:</strong></label>
            <?php
                // Establecer la zona horaria a Colombia
                date_default_timezone_set('America/Bogota');
                
                // Obtener la fecha y hora actual en formato 'Y-m-d\TH:i'
                $fecha_colombia = date('Y-m-d\TH:i');
            ?>
            <input type="datetime-local" name="tiempo" value="<?php echo $fecha_colombia; ?>" readonly style="width: 229px; margin-left: 10px;">
        </div>
        
        <div style="display: flex; align-items: center;">
            <label for="turno"><strong>Turno:</strong></label>
            <input type="text" id="turno" name="turno" readonly style="width: 122px; text-align: center; margin-left: 10px;">
        </div>
    </div>
    </div>
</td>





    </tr>
    <tr>
         <td colspan="4" style="text-align: center;">
         <div>
                <label for="area"><strong>Área/Servicio:</strong></label>
             
                <select name="area" id="area" required="" style="padding: 8px;margin: 5px 0;border: 2px solid #BDC3C7;border-radius: 5px;background-color: #fff;font-size: 1rem;transition: border 0.3s ease;">
                    <option value="HOSPITALIZACION 4">HOSPITALIZACIÓN 4</option>
                    <option value="HOSPITALIZACION 5">HOSPITALIZACIÓN 5</option>
                    <option value="UCI">UCI</option>
                </select>
            </div>
         </td>
    </tr>
    <tr>
    <td colspan="4" style="text-align: center;">
    <div>
                <label for="quien-registra"><strong>Quién Registra:</strong></label>
                <input type="text" id="quien-registra" name="quien-registra" required style="width: 294px;" placeholder="Nombre Completo">
            </div>

    </td>
    </tr>
    <tr>
    <td colspan="4" style="text-align: center;">
    <div class="section-title">Situaciones de Riesgo</div>
    </td>
    </tr>

    <tr>
                        <th>Personal de Salud</th>
                        <th>¿Sí?</th>
                        <th>¿No?</th>
                        <th>Observaciones (Registrar el nombre de la persona)</th>
                    </tr>

                    <tr>
                    <td>¿Dentro del equipo de trabajo se encuentra personal nuevo?</td>
<td><input type="radio" name="persona" value="SI" onclick="habilitarObservaciones()"></td>
<td><input type="radio" name="persona" value="NO" onclick="habilitarObservaciones()"></td>
<td><input type="text" name="observaciones-persona" id="observaciones"  disabled required></td>


                    </tr>
                    <tr>
                        <td>¿Dentro del equipo de trabajo se encuentra personal enfermo?</td>
                        <td><input type="radio" name="persona2" value="SI" onclick="habilitarObservaciones1()"></td>
<td><input type="radio" name="persona2" value="NO" onclick="habilitarObservaciones1()"></td>
<td><input type="text" name="observaciones2" id="observaciones2"  disabled required></td>
                    </tr>

                    <tr>
                        <th>Pacientes</th>
                        <th>¿Sí?</th>
                        <th>¿No?</th>
                        <th>Observaciones (Registrar número de cama si aplica)</th>
                    </tr>

                    <tr>
                        <td>¿Existen pacientes pendientes para ingreso?</td>
                        <td><input type="radio" name="persona3" value="SI" onclick="habilitarObservaciones2()"></td>
                    <td><input type="radio" name="persona3" value="NO" onclick="habilitarObservaciones2()"></td>
                    <td><input type="text" name="observaciones3" id="observaciones3"  disabled required></td>
                    </tr>
                    <tr>
                        <td>¿Existen pacientes con alergia a medicamentos?</td>
                        <td><input type="radio" name="persona4" value="SI" onclick="habilitarObservaciones3()"></td>
                    <td><input type="radio" name="persona4" value="NO" onclick="habilitarObservaciones3()"></td>
                    <td><input type="text" name="observaciones4" id="observaciones4"  disabled required></td>
                    </tr>
                    <tr>
                        <td>¿Existen pacientes con riesgo de UPP?</td>
                        <td><input type="radio" name="persona5" value="SI" onclick="habilitarObservaciones4()"></td>
                    <td><input type="radio" name="persona5" value="NO" onclick="habilitarObservaciones4()"></td>
                    <td><input type="text" name="observaciones5" id="observaciones5"  disabled required></td>
                    </tr>
                    <tr>
                        <td>¿Existen pacientes con riesgo de Caída?</td>
                        <td><input type="radio" name="persona6" value="SI" onclick="habilitarObservaciones5()"></td>
                    <td><input type="radio" name="persona6" value="NO" onclick="habilitarObservaciones5()"></td>
                    <td><input type="text" name="observaciones6" id="observaciones6"  disabled required></td>
                    </tr>
                    <tr>
                        <td>¿Existen pacientes con riesgo de fuga?</td>
                        <td><input type="radio" name="persona7" value="SI" onclick="habilitarObservaciones6()"></td>
                    <td><input type="radio" name="persona7" value="NO" onclick="habilitarObservaciones6()"></td>
                    <td><input type="text" name="observaciones7" id="observaciones7"  disabled required></td>
                    </tr>
                    <tr>
                        <td>¿Existen pacientes pendientes de transfusiones?</td>
                        <td><input type="radio" name="persona8" value="SI" onclick="habilitarObservaciones7()"></td>
                    <td><input type="radio" name="persona8" value="NO" onclick="habilitarObservaciones7()"></td>
                    <td><input type="text" name="observaciones8" id="observaciones8"  disabled required></td>
                    </tr>
                    <tr>
                
                    <td>¿Existen pacientes con aislamiento?</td>
                    <td><input type="radio" name="persona9" value="SI" onclick="habilitarObservaciones8()"></td>
                    <td><input type="radio" name="persona9" value="NO" onclick="habilitarObservaciones8()"></td>
                    <td><input type="text" name="observaciones9" id="observaciones9"  disabled required></td>
                    </tr>

                    <td>¿Existen Pacientes con condición de riesgo ?</td>
                    <td><input type="radio" name="persona10" value="SI" onclick="habilitarObservaciones12()"></td>
                    <td><input type="radio" name="persona10" value="NO" onclick="habilitarObservaciones12()"></td>
                    <td><input type="text" name="observaciones10" id="observaciones10"  disabled required></td>
                    </tr>
                    <td>¿Existen Pacientes con pendientes administrativos?</td>
                    <td><input type="radio" name="persona11" value="SI" onclick="habilitarObservaciones13()"></td>
                    <td><input type="radio" name="persona11" value="NO" onclick="habilitarObservaciones13()"></td>
                    <td><input type="text" name="observaciones11" id="observaciones11"  disabled required></td>
                    </tr>


                    <tr>
                        <th>Aérea</th>
                        <th>¿Sí?</th>
                        <th>¿No?</th>
                        <th>Observaciones (Registrar qué novedad presenta)</th>
                    </tr>
                    <tr>
                        <td>¿El carro de paro se encuentra sin novedad?</td>
                        <td><input type="radio" name="carro" value="SI" onclick="habilitarObservaciones9()"></td>
                    <td><input type="radio" name="carro" value="NO" onclick="habilitarObservaciones9()"></td>
                    <td><input type="text" name="observacionescarro" id="observacionescarro"  disabled required></td>
                    </tr>
                    <tr>
                        <td>Durante el turno anterior se presentaron fallas con equipos médicos?</td>
                        <td><input type="radio" name="equipos" value="SI" onclick="habilitarObservaciones10()"></td>
                    <td><input type="radio" name="equipos" value="NO" onclick="habilitarObservaciones10()"></td>
                    <td><input type="text" name="observacionesequipos" id="observacionesequipos"  disabled required></td>
                    </tr>
                    <tr>
                        <td>¿Existen novedades de insumos o dispositivos faltantes en farmacia?</td>
                        <td><input type="radio" name="insumos" value="SI" onclick="habilitarObservaciones11()"></td>
                    <td><input type="radio" name="insumos" value="NO" onclick="habilitarObservaciones11()"></td>
                    <td><input type="text" name="observacionesinsumos" id="observacionesinsumos"  disabled required></td>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align:center;">
                        <div class="section-title">Asignación de Código Azul</div>
                        </td>
                    </tr>

                    <tr>
                        <th colspan="2">Rol</th>
                        <th colspan="2">Nombre</th>
                    </tr>
                    <tr>
    <td colspan="2">Líder</td>
    <td colspan="2"><input type="text" name="lider" id="lider"></td>
</tr>
<tr>
    <td colspan="2">Vía Aérea</td>
    <td colspan="2"><input type="text" name="via-area" id="via-area"></td>
</tr>
<tr>
    <td colspan="2">Administración de Medicamentos</td>
    <td colspan="2"><input type="text" name="admin-medicamentos" id="admin-medicamentos"></td>
</tr>
<tr>
    <td colspan="2">Compresiones</td>
    <td colspan="2"><input type="text" name="compresiones" id="compresiones"></td>
</tr>
<tr>
    <td colspan="2">Circulante</td>
    <td colspan="2"><input type="text" name="circulante" id="circulante"></td>
</tr>


</table>
<button type="button" onclick="validarFormulario()">Guardar</button>
 </form>
    </div>

    <div class="timer" id="timer">
        <div>Tiempo Restante: <span id="time-display">00:00</span></div>
    </div>

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

        // Si prefieres limpiar los campos de forma manual sin recargar la página, puedes hacerlo así:
        /*
        document.querySelector("form").reset(); // Resetea el formulario
        */
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

        // Set turno when the page loads
        setTurno();
  



    </script>
    <script src="validacion.js?<?php echo time(); ?>"></script>
    <script src="observaciones.js?<?php echo time(); ?>"></script>
</body>
</html>
