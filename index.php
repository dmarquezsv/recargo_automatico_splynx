<?php
//Si hay sesion iniciada no dedebera a volver a iniciar
session_start();
if (isset($_SESSION['status'])) {
    if ($_SESSION['status'] == 1) {
        header("Location: upload_file.php");
        die();
    }
}
?>
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
    <link rel="stylesheet" type="text/css" href="assets/css/signin.css">
    <link rel="stylesheet" type="text/css" href="assets/css/sweetalert2.css">

</head>

<body class="text-center">

    <main class="form-signin">
        <form action="login.php" method="POST">
            <img class="mb-4" src="assets/img/#" alt="" width="75" height="75">

            <h1 class="h3 mb-3 fw-normal">Empresa El Salvador</h1>

            <div class="form-floating">
                <input type="email" name="email" class="form-control" id="floatingInput" require placeholder="name@example.com">
                <label for="floatingInput">Correo electrónico</label>
            </div>

            <br>

            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword" require placeholder="contraseña">
                <label for="floatingPassword">Contraseña</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" name='login' type="submit">Iniciar Sesión</button>
        </form>
    </main>

</body>

<!-- script for website -->
<script src="assets/js/jquery-1.10.1.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="assets/js/sweetalert2.js"></script>

<script type="text/javascript">
    //an alert to notify the user that it was warning
    <?php
    if (isset($_GET['status']) && $_GET['status'] == 0) {
    ?>
        $(document).ready(function() {
            swal({
                title: 'Advertencia',
                text: 'Usuario o contraseña son invalido',
                type: 'warning'
            });
        });
    <?php } ?>
</script>

</html>