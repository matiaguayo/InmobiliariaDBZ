<?php

include("setup/config.php");
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
    <div id="sesion">
        <div class="card">
            <div class="card-header sesion">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-bounding-box" viewBox="0 0 16 16">
                        <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5M.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5"/>
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                </svg> 
            Bienvenido Usuario</div>
            <div class="card-body sesion">Usuario: <?php echo $_SESSION['usu'];?> <br> <b> <?php echo $tipo;?></b></div>
        
            <div class="card-footer sesion"><a href="cerrar.php" class="cerrarsesion">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
                    <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
                </svg>
                
            Cerrar Sesión</a></div>
        </div>
    </div>
    <hr>
    <div class="menu frm">
        <div class="card">
            <div class="card-header" style="text-align: center;" ><h5>Administrador de Usuarios</h5>
            </div>
            <div class="card-body col-auto">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                        <input type="text" class="form-control space" placeholder="Nombre">
                        <input type="text" class="form-control space" placeholder="Apellido">
                        <input type="text" class="form-control space" placeholder="Rut">
                        <span class="form-label"></span>
                        </div>
                        <div class="col-sm-6">
                        <input type="date" class="form-control space" placeholder="Fecha Nacimiento">
                        <input type="email" class="form-control space" placeholder="Email">
                        <input type="number" class="form-control space" placeholder="Telefono">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="menu tamaño">
        <div class="card">
            <div class="card-header" style="text-align: center;"><h5>Listados de Usuarios</h5>
            </div>
            <div class="card-body">
            <table class="table table-hover">
        <thead>
        <tr class="textaling">
            <th>ID</th>
            <th>Rut</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Fecha Nacimiento</th>
            <th>Sexo</th>
            <th>Mail Usuario</th>
            <th>Telefono</th>
            <th>Estado</th>
            <th>Tipo de Usuario</th>
            <th>Accion</th>
            
        </tr>
        </thead>
        <?php
            // TRAEMOS LOS CAMPOS DE LA BASE DE DATOS  
            $sql="select * from usuarios";
            $result = mysqli_query(conectar(), $sql);
            $con = mysqli_num_rows($result);

        ?>
        <tbody>
        <!-- CREAMOS UN CICLO PARA TRAER LOS DATOS -->
        <?php
        $cont = 1;
    
        while($datos = mysqli_fetch_array($result))
        {

        ?>
        <tr class="textaling">
            <td><?php echo $cont; ?></td>
            <td><?php echo $datos['rut']; ?></td>
            <td><?php echo $datos['nombre']; ?></td>
            <td><?php echo $datos['apellido']; ?></td>
            <td><?php echo $datos['fechaNacimiento']; ?></td>
            <td><?php echo $datos['sexo']; ?></td>
            <td><?php echo $datos['mailUsuario']; ?></td>
            <td><?php echo $datos['telefono']; ?></td>
            <td><?php
                
                
            if($datos['estado']==1)
            {
                ?>
                <img src="img/Icons/ok.png" alt="">
<?php
            }else{
                ?>
                <img src="img/Icons/x.png" alt="">
<?php
            }
                
                
            ?></td>
            <td>
            <p class="<?php echo color($datos['id_tipo']);?>"><strong><?php echo sabertipo($datos['id_tipo']);?></strong></p>
            </td>
            <td>
                <img src="img/Icons/reload.png" alt="" width="25px"> &nbsp; &nbsp; | &nbsp; &nbsp; 
                <img src="img/Icons/eliminar.png" alt="" width="25px"> 
            </td>

        </tr>
        <?php
            $cont++;
        }

        ?>
        </tbody>
    </table>
            </div>
        </div>
    </div>
            </div>
            <div class="card-footer">Total de Usuarios (<?php echo $con; ?>)</div>
        </div>
    </div>


    </body>
</html>
<?php
}else{
    header("Location:error.html");
}
?>






