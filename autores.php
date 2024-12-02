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
        <div class="contenedor_main_libros">

            <div class="col-md-auto div_main_autores">
                <h2 class="h2_nuestros">Autores</h2>
                <div class="div_tabla div_tabla_autores">
                    <?php
                    include("conexion_autores.php");
                    ?>
                </div>
            </div>

            <div class="contenedor_img col-md-auto">
                <img class="img-fluid imagenPrincipallibros" src="./img/dswamin.png" alt="">
            </div>
        </div>
    </main>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>