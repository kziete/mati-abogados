<?php

if (isset($_POST["login"])) {

    $accion = $_POST["login"];

    switch ($accion) {
        case "Login":
            echo 'llegamos al login';
            break;
        case "Listar":
            listar();
            break;
        case "Disponibilidad":
            disponible();
            break;
    }
}