<?php
    session_start();
    // recojo los datos del REQUEST
    $txtID = $_REQUEST["txtID"];
    $txtNombre = $_REQUEST["txtNombre"];
    $precio = $_REQUEST["precio"];
    $imagen = $_REQUEST["imagen"];

    // Lo guardo en la sesion

    $prodsession = [$txtID, $txtNombre, $precio, $imagen];
    $_SESSION["$txtNombre"] = $prodsession;


    // Me redirijo a index.php
    header("Location:carrito.php");
?>