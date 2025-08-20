<?php
// Configuración de la conexión a la base de datos
$serverName = "PA-S1-DATA\\UCQNDATA";  
$connectionInfo = array(
    "Database" => "ejemplo",  
    "UID" => "sadumesm",        
    "PWD" => "Dumes100%",       
    "characterset" => "UTF-8"   
);

$conn = sqlsrv_connect($serverName, $connectionInfo);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Insertar nuevo registroz
if (isset($_POST['agregar'])) {
    $nuevoNombre = $_POST['nombre'];
    $sql = "INSERT INTO ejemplo2 (nombre) VALUES (?)";
    $params = array($nuevoNombre);
    sqlsrv_query($conn, $sql, $params);
}

// Modificar registro existente
if (isset($_POST['modificar'])) {
    $id = $_POST['id'];
    $nombreModificado = $_POST['nombre'];
    $sql = "UPDATE ejemplo2 SET nombre = ? WHERE id = ?";
    $params = array($nombreModificado, $id);
    sqlsrv_query($conn, $sql, $params);
}

// Consultar registros
$sql = "SELECT id, nombre FROM ejemplo2";
$resultado = sqlsrv_query($conn, $sql);

// Guardamos los resultados en un arreglo para usarlos en el HTML más abajo
$nombres = [];
while ($row = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)) {
    $nombres[] = $row;
}
?>

<!-- HTML PURO ABAJO -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Nombres</title>
</head>
<body>
    <h2>Agregar un nuevo nombre</h2>
    <form method="POST">
        <input type="text" name="nombre" placeholder="Escribe un nombre" required>
        <button type="submit" name="agregar">Agregar</button>
    </form>

    <h2>Lista de nombres</h2>
    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Modificar</th>
        </tr>
        <?php foreach ($nombres as $row) { ?>
        <tr>
            <form method="POST">
                <td><?= $row['id'] ?></td>
                <td>
                    <input type="text" name="nombre" value="<?= htmlspecialchars($row['nombre']) ?>" required>
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                </td>
                <td>
                    <button type="submit" name="modificar">Modificar</button>
                </td>
            </form>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
