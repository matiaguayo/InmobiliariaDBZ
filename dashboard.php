<?php
session_start();

if (isset($_SESSION['usu']))
{
    switch ($_SESSION['tipo']){
        case 1: $tipo= "SUPER ADMINISTRADOR";
        break;
        case 2: $tipo = "PROPIETARIO";
        break;
        case 3: $tipo = "VENDEDOR";
        break;
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <link rel="stylesheet" href="css/Bootstrap.style.css">
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
    <div>
        <div class="card" id="sesion">
            <div class="card-header">
                <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" fill="currentColor" class="bi bi-person-bounding-box" viewBox="0 0 16 16">
                        <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5M.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5"/>
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                </svg> 
            Bienvenido Usuario</div>
            <div class="card-body">Usuario: <?php echo $_SESSION['usu'];?> <br> <b> <?php echo $tipo;?></b></div>
        
            <div class="card-footer"><a href="cerrar.php" class="cerrarsesion">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
                    <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
                </svg>
                
            Cerrar Sesión</a>
        </div>
    </div>
    <br>
    <div class="menu">
        <div class="card">
            <div class="card-header" style="text-align: center;"><h5>Seleccionar Acciones a Realizar</h5></div>
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-4">
                            <?php
                            if($_SESSION['tipo']!=1)
                            {
                                ?>   
                            <div class="caja">
                                <img src="img/icons/perfil.png"><br>
                                    <h6 class="separar">Editar Perfil</h6>
                            </div>
                            <?php
                                }else{
                            ?>
                            <div class="caja">
                            <a class="textcaja" href="frm_usuarios.php"><img src="img/icons/user.png"><br>
                                    <h6 class="separar">Admin. Usuarios</h6></a>
                            </div>
                            <?php
                                }
                                ?>
                            </div>
                            <div class="col-sm-4">
                            <?php
                                if($_SESSION['tipo']==1)
                                {
                                    ?>
                                <div class="caja">
                                <a class="textcaja" href="frm_propietarios.php"> 
                                    <img src="img/icons/propietario.png"> <br>
                                    <h6 class="separar">Admin. Propietarios</h6> </a>   
                                </div>
                            <?php
                                }
                                if($_SESSION['tipo']==2)
                                {
                                ?>
                                <div class="caja">
                                    <img src="img/icons/casa.png"><br>
                                    <h6>Admin. Propiedades</h6>
                                </div>
                            <?php
                                }
                                ?>
                            </div>
                            <div class="col-sm-4">
                            <?php
                                if($_SESSION['tipo']==1)
                                {
                                    ?>
                                <div class="caja">
                                <a class="textcaja" href="frm_vendedores.php">    
                                    <img src="img/icons/vendedor.png"><br>
                                    <h6 class="separar">Admin. Vendedores</h6> </a>
                                </div>
                                <?php
                                }
                                if($_SESSION['tipo']==3)
                                {
                                ?>
                                
                                <div class="caja">
                                    <img src="img/icons/shopping-online.png"><br>
                                    <h6 class="separar">Admin. Ventas</h6>
                                </div>
                            <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
<?php
}else{
    header("Location:error.html");
}
?>
