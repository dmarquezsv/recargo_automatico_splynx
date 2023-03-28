<?php include_once 'validate_login.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresa El Salvador</title>
    <link rel="icon" type="image/png" href="assets/img/beenetsv.jpeg">

    <!-- site styles -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/sweetalert2.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>

<body class="container d-flex h-100 text-center text-dark">

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="mb-auto">
            <div>
                <h3 class="float-md-start mb-0"> <img src="img/logo.png" alt="#" width="135px" height="75px"></h3>
                <nav class="nav nav-masthead justify-content-center float-md-end">
                    <a class="nav-link active text-dark" aria-current="page" href="documents/">Documentos</a>
                    <a class="nav-link active text-dark" aria-current="page" href="login.php?status=0">Cerrar Sesión</a>
                </nav>
            </div>
        </header>
        <br><br>
        <main class="px-3">
            <h1>Recargo Automático</h1>

            <p class="lead">Seleccione el archivo Excel que desea importar y espere hasta que termine la ejecución del programa.</p>

            <br><br>

            <form action="read_file_excel.php" method="POST" name="form_file" id="form_file" enctype="multipart/form-data">
                <label>Seleccionar Archivo</label><br>
                <input type="file" name="file" id="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" accept required />
                <br> <br>
                <p class="lead">
                    <button type="button" class="btn btn-dark " id="btn_submit" name="btn_submit">Importar Datos</button>
                </p>

            </form>
        </main>

        <br><br>

        <footer class="mt-auto">
            <p>TODOS LOS DERECHOS RESERVADOS DANIEL MARQUEZ © 2022</p>
        </footer>

    </div>
</body>

<!-- script for website -->
<script src="assets/js/jquery-1.10.1.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="assets/js/sweetalert2.js"></script>

<script type="text/javascript">
    //previous
    $("#btn_submit").click(function(event) {

        swal({
            title: "Cargando...",
            text: "Por favor espera",
            imageUrl: "assets/img/progress.gif",
            button: false,
            closeOnEsc: false,
            imageWidth: 150,
            imageHeight: 150,
            showCancelButton: false,
            showConfirmButton: false,
            allowOutsideClick: false
        });

        $('#form_file').submit();

    });

    //an alert to notify the user that it was successful
    <?php
    if (isset($_GET['status']) && $_GET['status'] == 1) {
    ?>
        $(document).ready(function() {
            swal({
                title: 'éxito',
                text: 'La información se ha importado con éxito en splynx',
                type: 'success'
            });
        });
    <?php } ?>
</script>

</html>