<?php
session_start();
if (!isset($_SESSION['status'])) {  header("Location: index.php"); die();} 
else if($_SESSION['status'] == 0){  header("Location: index.php"); die();}
?>