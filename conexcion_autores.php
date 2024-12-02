<?php
// Configuración de la base de datos
$dsn = 'mysql:host=localhost;dbname=dblibreria';
$usuario = 'root';
$contraseña = '';

// Intentar establecer la conexión
try {
    $conexion = new PDO($dsn, $usuario, $contraseña);
    echo "<script>console.log('Conexión exitosa');</script>";

    // Realizar una consulta
    $consulta = $conexion->query('SELECT nombre, apellido, ciudad FROM autores');

    // Imprimir resultados en una tabla
    echo  "<table >
                <tr>
                    <th>nombre</th>
                    <th>apellido</th>
                    <th>ciudad</th>
                </tr>";


    while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
                <td>{$fila['nombre']}</td>
                <td>{$fila['apellido']}</td>
                <td>{$fila['ciudad']}</td>
              </tr>";
    }

    echo "</table>";
} catch (PDOException $e) {
    echo 'Error de conexión: ' . $e->getMessage();