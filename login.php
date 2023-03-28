<?php


$password = '$2y$10$Vf5B6BHZz2Iwe4RF.O8fbut/tYrexO.vxaxlX4T/0AFVzszmu8/W2';

//You must authenticate before proceeding with the changes in the crm
if (isset($_POST['login'])) {
    if ($_POST['email'] == 'cobros@email' && password_verify($_POST['password'], $password)) {
        session_start();
        $_SESSION['status'] = 1;
        header('Location: upload_file.php'); 
    } else {
        header('Location: index.php?status=0');
    }
}

//Log out user
if (isset($_GET['status']) && $_GET['status'] == 0) {
    session_start();
    session_destroy();
    header("Location: index.php");
}
