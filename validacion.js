function validarFormulario() {
    var formValido = true;
    var camposFaltantes = [];
    var tdFaltantes = [];

    // Validar Fecha
    var fecha = document.querySelector('input[name="tiempo"]');
    if (!fecha.value) {
        formValido = false;
        camposFaltantes.push('Fecha');
        tdFaltantes.push(fecha.closest('td'));
    }

    // Validar Turno
    var turno = document.getElementById('turno');
    if (!turno.value) {
        formValido = false;
        camposFaltantes.push('Turno');
        tdFaltantes.push(turno.closest('td'));
    }

    // Validar Área/Servicio
    var area = document.getElementById('area');
    if (!area.value) {
        formValido = false;
        camposFaltantes.push('Área/Servicio');
        tdFaltantes.push(area.closest('td'));
    }

    // Validar Quién Registra
    var quienRegistra = document.getElementById('quien-registra');
    if (!quienRegistra.value) {
        formValido = false;
        camposFaltantes.push('Nombre Completo');
        tdFaltantes.push(quienRegistra.closest('td'));
    }

     // Validar Quién Registra
    var lider = document.getElementById('lider');
    if (!lider.value) {
           formValido = false;
           camposFaltantes.push('Lider');
           tdFaltantes.push(lider.closest('td'));
     }

        // Validar Quién Registra
    var via = document.getElementById('via-area');
    if (!via.value) {
        formValido = false;
        camposFaltantes.push('VIa-area');
        tdFaltantes.push(via.closest('td'));
    }
      // Validar Quién Registra
    var medi = document.getElementById('admin-medicamentos');
    if (!medi.value) {
    formValido = false;
    camposFaltantes.push('Administración Medicamentos');
    tdFaltantes.push(medi.closest('td'));
    }

      // Validar Quién Registra
    var compre = document.getElementById('compresiones');
    if (!compre.value) {
      formValido = false;
      camposFaltantes.push('Compresiones');
      tdFaltantes.push(compre.closest('td'));
    }
    
    var circulante = document.getElementById('circulante');
    if (!circulante.value) {
      formValido = false;
      camposFaltantes.push('circulante');
      tdFaltantes.push(circulante.closest('td'));
    }
    
    // Validar las observaciones de las personas y pacientes (solo si están habilitadas)
    var observacionesIds = [
        'observaciones', 'observaciones2', 'observaciones3', 'observaciones4', 'observaciones5',
        'observaciones6', 'observaciones7', 'observaciones8', 'observaciones9', 'observaciones10',
        'observaciones11', 'observacionescarro', 'observacionesequipos', 'observacionesinsumos'
    ];

    observacionesIds.forEach(function(id) {
        var observacionInput = document.getElementById(id);
        if (observacionInput.disabled === false && !observacionInput.value) {
            formValido = false;
            camposFaltantes.push('Observación ' + id.replace('observaciones', ''));
            tdFaltantes.push(observacionInput.closest('td'));
        }
    });

    // Validar los radio buttons para las preguntas de SI/NO
    var radioGroups = [
        ['persona', 'persona2', 'persona3', 'persona4', 'persona5', 'persona6', 'persona7', 'persona8', 'persona9', 'persona10', 'persona11', 'carro', 'equipos', 'insumos']
    ];

    radioGroups[0].forEach(function(groupName) {
        var radios = document.getElementsByName(groupName);
        var tdYes = radios[0].closest('td');  // Celda para la opción "Sí"
        var tdNo = radios[1].closest('td');   // Celda para la opción "No"
        
        // Inicialmente, ponemos ambas celdas en rojo si ninguno de los radios está seleccionado
        tdYes.style.backgroundColor = '#df7c43';
        tdNo.style.backgroundColor = '#df7c43';

        radios.forEach(function(radio) {
            radio.addEventListener('change', function() {
                // Cuando se selecciona una opción, eliminamos el color rojo de las dos celdas
                tdYes.style.backgroundColor = '';  // Elimina el color rojo de la celda de "Sí"
                tdNo.style.backgroundColor = '';   // Elimina el color rojo de la celda de "No"
            });
        });

        // Verificar si ninguno de los radio buttons está seleccionado
        var checked = Array.from(radios).some(function(radio) {
            return radio.checked;
        });

        if (!checked) {
            formValido = false;
            camposFaltantes.push('Pregunta ' + groupName);
            tdFaltantes.push(tdYes.closest('tr')); // Marcar la fila del grupo de radio buttons
        }
    });

    // Si algún campo no está completo, mostrar alerta
    if (!formValido) {
        alert('Faltan campos obligatorios: ');
    
        // Resaltar en rojo los campos faltantes
        tdFaltantes.forEach(function(td) {
            td.style.backgroundColor = '#df7c43';
        });
    } else {
        alert('Formulario completado correctamente');
        
        // Enviar el formulario
        document.getElementById('briefing-form').submit();
        
    }
    
}

// Función para habilitar los campos de observación cuando se selecciona "Sí"
function habilitarObservaciones() {
    var observacion = document.getElementById('observaciones');
    observacion.disabled = false;
    observacion.closest('td').style.backgroundColor = ''; // Eliminar el color rojo si se habilita el campo
}

function habilitarObservaciones1() {
    var observacion = document.getElementById('observaciones2');
    observacion.disabled = false;
    observacion.closest('td').style.backgroundColor = ''; // Eliminar el color rojo si se habilita el campo
}

function habilitarObservaciones2() {
    var observacion = document.getElementById('observaciones3');
    observacion.disabled = false;
    observacion.closest('td').style.backgroundColor = ''; // Eliminar el color rojo si se habilita el campo
}

function habilitarObservaciones3() {
    var observacion = document.getElementById('observaciones4');
    observacion.disabled = false;
    observacion.closest('td').style.backgroundColor = ''; // Eliminar el color rojo si se habilita el campo
}

function habilitarObservaciones4() {
    var observacion = document.getElementById('observaciones5');
    observacion.disabled = false;
    observacion.closest('td').style.backgroundColor = ''; // Eliminar el color rojo si se habilita el campo
}

function habilitarObservaciones5() {
    var observacion = document.getElementById('observaciones6');
    observacion.disabled = false;
    observacion.closest('td').style.backgroundColor = ''; // Eliminar el color rojo si se habilita el campo
}

function habilitarObservaciones6() {
    var observacion = document.getElementById('observaciones7');
    observacion.disabled = false;
    observacion.closest('td').style.backgroundColor = ''; // Eliminar el color rojo si se habilita el campo
}

function habilitarObservaciones7() {
    var observacion = document.getElementById('observaciones8');
    observacion.disabled = false;
    observacion.closest('td').style.backgroundColor = ''; // Eliminar el color rojo si se habilita el campo
}

function habilitarObservaciones8() {
    var observacion = document.getElementById('observaciones9');
    observacion.disabled = false;
    observacion.closest('td').style.backgroundColor = ''; // Eliminar el color rojo si se habilita el campo
}

function habilitarObservaciones9() {
    var observacion = document.getElementById('observacionescarro');
    observacion.disabled = false;
    observacion.closest('td').style.backgroundColor = ''; // Eliminar el color rojo si se habilita el campo
}

function habilitarObservaciones10() {
    var observacion = document.getElementById('observacionesequipos');
    observacion.disabled = false;
    observacion.closest('td').style.backgroundColor = ''; // Eliminar el color rojo si se habilita el campo
}

function habilitarObservaciones11() {
    var observacion = document.getElementById('observacionesinsumos');
    observacion.disabled = false;
    observacion.closest('td').style.backgroundColor = ''; // Eliminar el color rojo si se habilita el campo
}


// para los nuevos campos

function habilitarObservaciones12() {
    var observacion = document.getElementById('observaciones10');
    observacion.disabled = false;
    observacion.closest('td').style.backgroundColor = ''; // Eliminar el color rojo si se habilita el campo
}

function habilitarObservaciones13() {
    var observacion = document.getElementById('observaciones11');
    observacion.disabled = false;
    observacion.closest('td').style.backgroundColor = ''; // Eliminar el color rojo si se habilita el campo
}

// Añadir evento para quitar el color rojo al corregir los campos
document.querySelectorAll('input').forEach(function(input) {
    input.addEventListener('input', function() {
        var td = input.closest('td');
        if (input.value && !input.disabled) {
            td.style.backgroundColor = ''; // Eliminar el color rojo si el campo tiene valor y no está deshabilitado
        } else if (!input.value && input.disabled === false) {
            td.style.backgroundColor = '#df7c43'; // Volver a poner rojo si el campo está vacío y habilitado
        }
    });

    // Validación para radio buttons
    if (input.type === 'radio') {
        input.addEventListener('change', function() {
            var td = input.closest('td');
            if (input.checked) {
                td.style.backgroundColor = ''; // Eliminar el color rojo si el radio button está seleccionado
            }
        });
    }
});
    