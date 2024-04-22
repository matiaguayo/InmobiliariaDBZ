<?php


// Validar Base de Datos

// Conectamos ala base de datos


include("setup/config.php");

$sql = "select * from usuarios where mailUsuario = '" . $_POST['email'] . "' and clave = '" . md5($_POST['pwd']) . "' and estado = 1";

$result = mysqli_query(conectar(), $sql);


// Obtener los datos de la tabla usuario
$datos = mysqli_fetch_array($result);


$cont = mysqli_num_rows($result);


if ($cont == 0) {
    header("Location:login.html");
    
} else {
    session_start();
    $_SESSION['usu'] = $datos['mailUsuario'];
    $_SESSION['tipo']=$datos['id_tipo'];
    header("Location:dashboard.php");
}
