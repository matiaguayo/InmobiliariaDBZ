<?php

// CREAR METODO DE CONEXION ALA BASE DE DATOS
function conectar()
{

    $con = mysqli_connect("localhost", "root", "", "inmobiliariadbz");
    return $con;
}


function saberTipo($t)
{
    switch ($t) {
        case 1:
            $tipo = "SUPER ADMIN";
            break;
        case 2:
            $tipo = "PROPIETARIO";
            break;
        case 3:
            $tipo = "VENDEDOR";
            break;
    }
    return $tipo;
}

#Aqui se le modifica algo

function color($t)
{

    switch ($t) {
        case 1:
            $color = "text-danger";
            break;
        case 2:
            $color = "text-primary";
            break;
        case 3:
            $color = "text-success";
            break;
    }
    return $color;
}
