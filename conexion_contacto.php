<?php
// Configuración de la base de datos
$dsn = 'mysql:host=localhost;dbname=dblibreria';
$usuario = 'root';
$contraseña = '';

// Intentar establecer la conexión
try {
    $conexion = new PDO($dsn, $usuario, $contraseña);
    echo "<script>console.log('Conexión exitosa');</script>";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recibir los datos del formulario
        $nombre = $_POST['nombre'];
        $correo = $_POST['gmail'];
        $asunto = $_POST['asunto'];
        $comentario = $_POST['mensaje'];

        // Preparar la consulta SQL para la inserción
        $consulta = $conexion->prepare('INSERT INTO contacto (nombre, correo, asunto, comentario, fecha) VALUES (:nombre, :correo, :asunto, :comentario, NOW())');

        // Asignar valores a los parámetros
        $consulta->bindParam(':nombre', $nombre);
        $consulta->bindParam(':correo', $correo);
        $consulta->bindParam(':asunto', $asunto);
        $consulta->bindParam(':comentario', $comentario);

        // Ejecutar la consulta
        $consulta->execute();

        if ($consulta) {
            echo "Datos Enviados";
        }
    }
} catch (PDOException $e) {
    echo 'Error de conexión: ' . $e->getMessage();
}