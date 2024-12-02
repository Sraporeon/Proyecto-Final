<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libreria Umerhara</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <header>
        <?php
        include("navbar.php")
        ?>
    </header>

    <main>
        <div class=" contenedor_main_contacto">

            <div class="col-md-auto div_main_contacto">

                <h2 class="h2_nuestros h2_formulario">Formulario de Contacto</h2>


                <div class="label_contenedor">
                    <form action="" method="post">
                        <label>
                            <span class="span_label">Correo:</span>
                            <input type="email" placeholder="Email" name="gmail" required>
                        </label>

                        <label>
                            <span class="span_label">Nombre:</span>
                            <input type="text" placeholder="Nombre Completo" name="nombre" required>
                        </label>

                        <label>
                            <span class="span_label">Asunto:</span>
                            <input type="text" placeholder="Asunto" name="asunto" required>
                        </label>

                        <label class="label_comentario">
                            <p class="p_comentario">Comentario:</p>
                            <textarea name="mensaje" cols="30" rows="10" placeholder="Detalle su inquietud" required></textarea>
                        </label>

                        <button class="boton_enviar" type="submit">Enviar Formulario</button>
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
                                    echo "<p class='Datos_e'>Datos Enviados</p>";
                                }
                            }
                        } catch (PDOException $e) {
                            echo 'Error de conexión: ' . $e->getMessage();
                        }
                        ?>
                    </form>
                </div>
            </div>

            <div class="contenedor_img col-md-auto">
                <img class="img-fluid imagenPrincipallibros" src="./img/dswamin.png" alt="">
            </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>