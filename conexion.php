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
    $consulta = $conexion->query('SELECT titulo, tipo, precio FROM titulos');

    // Imprimir resultados en una tabla
    echo  "<table style='margin-left:2vw'>
                <tr>
                    <th>Título</th>
                    <th>Tipo</th>
                    <th>Precio</th>
                </tr>";


    while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
                <td>{$fila['titulo']}</td>
                <td>{$fila['tipo']}</td>
                <td>{$fila['precio']}</td>
              </tr>";
    }

    echo "</table>";
} catch (PDOException $e) {
    echo 'Error de conexión: ' . $e->getMessage();
}