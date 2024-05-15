<?php

include("setup/config.php");


switch ($_POST['accion']) {
    case "Ingresar":
        ingresar();
        break;
    case "Modificar":
        modificar();
        break;
    case "Cancelar":
        cancelar();
        break;
    case "Eliminar":
        eliminar();
        break;
}


function ingresar()
{
    $sql = "INSERT INTO `usuarios` (`rut`, `nombre`, `apellido`, `fechaNacimiento`, `sexo`, `mailUsuario`, `clave`, `estado`, `id_tipo`) VALUES ('" . $_POST['frm_rut'] . "', '" . $_POST['frm_name'] . "', '" . $_POST['frm_apellido'] . "', '" . $_POST['frm_fecha'] . "', '" . $_POST['frm_sexo'] . "', '" . $_POST['frm_email'] . "', '" . md5($_POST['frm_re_clave']) . "', '" . $_POST['frm_estado'] . "', '" . $_POST['frm_id_tipo'] . "')";

    mysqli_query(conectar(), $sql);
    header("Location:frm_vendedores.php");
    die;
}

function modificar()
{
    $sql= "UPDATE `usuarios` SET `rut` = '" . $_POST['frm_rut'] . "', `nombre` = '" . $_POST['frm_name'] . "', `apellido` = '" . $_POST['frm_apellido'] . "', `fechaNacimiento` = '" . $_POST['frm_fecha'] . "', `sexo` = '" . $_POST['frm_sexo'] . "', `mailUsuario` = '" . $_POST['frm_email'] . "', `clave` = '" . md5($_POST['frm_re_clave']) . "', `estado` = '" . $_POST['frm_estado'] . "', `id_tipo` = '" . $_POST['frm_id_tipo'] . "' WHERE `usuarios`.`id` = ".$_POST['idoculto'];

    mysqli_query(conectar(), $sql);
    header("Location:frm_vendedores.php");
    die;
}


function cancelar()
{
    header("Location:frm_vendedores.php");
}

function eliminar()
{
    $sql = "DELETE FROM `usuarios` WHERE `usuarios`.`id` = ".$_POST['idoculto'];
    mysqli_query(conectar(), $sql);
    header("Location:frm_vendedores.php");
    die;
}




// Consultar
// ISSET = si algo existe, Cuando viene por url es _Get

if (isset($_GET['id'])) {
    if ($_GET['estado'] == 1) {
        $sql = "UPDATE `usuarios` SET `estado` = '0' WHERE `usuarios`.`id` = ". $_GET['id'];
    } else {
        $sql = "UPDATE `usuarios` SET `estado` = '1' WHERE `usuarios`.`id` = ". $_GET['id'];
    }
    mysqli_query(conectar(), $sql);
    header("Location:frm_vendedores.php");
}
