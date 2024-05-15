<?php
include("setup/config.php");

$nombre = htmlspecialchars($_POST['nombreusuario'], ENT_QUOTES, 'UTF-8');
$apellidos = htmlspecialchars($_POST['apellidousuario'], ENT_QUOTES, 'UTF-8');
$rut = htmlspecialchars($_POST['rut'], ENT_QUOTES, 'UTF-8');
$email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
$fechaNacimientoval = htmlspecialchars($_POST['fnacimiento'], ENT_QUOTES, 'UTF-8');
$clave = htmlspecialchars($_POST['clave'], ENT_QUOTES, 'UTF-8');
$sexo = htmlspecialchars($_POST['sexo'], ENT_QUOTES, 'UTF-8');
$telefono = htmlspecialchars($_POST['telefono'], ENT_QUOTES, 'UTF-8');
$estado = htmlspecialchars($_POST['valoroculto1'], ENT_QUOTES, 'UTF-8');
$tipousuario = htmlspecialchars($_POST['valoroculto2'], ENT_QUOTES, 'UTF-8');

ingresar();

function ingresar(){
    $sql="INSERT INTO usuarios (rut, nombre, apellidos, fechaNacimiento, sexo, mailUsuario, telefono, clave, estado, id_tipo) VALUES ('".$_POST['rut']."', '".$_POST['nombreusuario']."', '".$_POST['apellidousuario']."', '".$_POST['fnacimiento']."', ".$_POST['sexo'].", '".$_POST['email']."', ".$_POST['telefono'].", '".md5($_POST['clave'])."', ".$_POST['valoroculto1'].", ".$_POST['valoroculto2'].")";
    mysqli_query(conectar(),$sql);
    header("Location:exito.html");
    die;
}


